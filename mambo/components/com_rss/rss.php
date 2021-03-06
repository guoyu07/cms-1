<?php
/**
* @version $Id: rss.php,v 1.16 2004/09/19 15:38:45 prazgod Exp $
* @package Mambo_4.5
* @copyright (C) 2000 - 2004 Miro International Pty Ltd
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Mambo is Free Software
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

require_once( $GLOBALS['mosConfig_absolute_path'] .'/includes/feedcreator.class.php' );

global $database, $mainframe, $my, $Itemid;



$query = "SELECT a.id"
. "\n FROM #__components AS a"
. "\n WHERE a.name = 'Syndicate'"
;
$database->setQuery( $query );
$id = $database->loadResult();
$component = new mosComponent( $database );
$component->load( $id );
$params =& new mosParameters( $component->params );

// parameters
$now 				= date( 'Y-m-d H:i:s', time()+$mosConfig_offset*60*60 );
$info[ 'date' ] 		= date( 'r' );
$info[ 'year' ] 		= date( 'Y' );
$info[ 'encoding' ] 	= split( '=', _ISO );
$info[ 'link' ] 		= htmlspecialchars( $mosConfig_sitename );

$info[ 'cache' ] 		= $params->def( 'cache', 1 );
$info[ 'cache_time' ] 	= $params->def( 'cache_time', 3600 );
$info[ 'count' ]		= $params->def( 'count', 5 );
$info[ 'orderby' ] 		= $params->def( 'orderby', '' );
$info[ 'title' ] 		= $params->def( 'title', 'Powered by Mambo 4.5.1' );
$info[ 'description' ] 	= $params->def( 'description', 'Mambo site syndication' );
$info[ 'image_file' ]	= $params->def( 'image_file', 'mambo_rss.png' );
if ( $info[ 'image_file' ] == -1 ) {
	$info[ 'image' ]	= NULL;
} else{
	$info[ 'image' ]	= $mosConfig_live_site .'/images/M_images/'. $info[ 'image_file' ];
}
$info[ 'image_alt' ] 	= $params->def( 'image_alt', 'Powered by Mambo 4.5.1' );
$info[ 'limit_text' ] 	= $params->def( 'limit_text', 1 );
$info[ 'text_length' ] 	= $params->def( 'text_length', 20 );

// load feed creator class
$rss = new UniversalFeedCreator();
// load image creator class
$image = new FeedImage();

// get feedtype from url
$info[ 'feed ' ] = mosGetParam( $_GET, 'feed', 'RSS2.0' ); 

// set filename for feed
$info[ 'file ' ] = strtolower( str_replace( '.', '', $info[ 'feed ' ] ) );
$info[ 'file ' ] = $GLOBALS['mosConfig_absolute_path'] .'/cache/'. $info[ 'file ' ] .'.xml';

// loads cache file 
if ( $info[ 'cache' ] ) {
	$rss->useCached( $info[ 'feed ' ], $info[ 'file ' ], $info[ 'cache_time' ] );
}

$rss->title 			= $info[ 'title' ];
$rss->description 		= $info[ 'description' ];
$rss->link 			= $info[ 'link' ];
$rss->syndicationURL 	= $info[ 'link' ];
$rss->cssStyleSheet 	= NULL;
$rss->encoding 		= split( '=', _ISO );

$image->url 			= $info[ 'image' ];
$image->link 			= $info[ 'link' ];
$image->title 			= $info[ 'image_alt' ];
$image->description		= $info[ 'description' ];
// loads image info into rss array
$rss->image 			= $image;

// Determine ordering for sql
switch ( strtolower( $info[ 'orderby' ] ) ) {
	case 'date':
	$orderby = 'a.created';
	break;

	case 'rdate':
	$orderby = 'a.created DESC';
	break;

	case 'alpha':
	$orderby = 'a.title';
	break;

	case 'ralpha':
	$orderby = 'a.title DESC';
	break;

	case 'hits':
	$orderby = 'a.hits DESC';
	break;

	case 'rhits':
	$orderby = 'a.hits ASC';
	break;

	case 'front':
	$orderby = 'f.ordering';
	break;

	default:
	$orderby = 'f.ordering';
	break;
}

$query = "SELECT a.*, u.name AS author, u.usertype"
. "\n FROM #__content AS a"
. "\n INNER JOIN #__content_frontpage AS f ON f.content_id = a.id"
. "\n LEFT JOIN #__users AS u ON u.id = a.created_by"
. "\n WHERE a.state = '1'"
. "\n AND a.access = 0"
. "\n AND ( publish_up = '0000-00-00 00:00:00' OR publish_up <= '". $now ."' )"
. "\n AND ( publish_down = '0000-00-00 00:00:00' OR publish_down >= '". $now ."' )"
. "\n ORDER BY ". $orderby
. ( $info[ 'count' ] ? "\n LIMIT ". $info[ 'count' ] : '' )
;
$database->setQuery( $query );
$rows = $database->loadObjectList();

foreach ( $rows as $row ) {
	// title for particular item
	$item_title = htmlspecialchars( $row->title );

	// url link to article
	global $mosConfig_sef;
	// & used instead of &amp; as this is converted by feedcreator
	if ($mosConfig_sef =='1') {
  	$item_link = sefRelToAbs( 'index.php?option=com_content&task=view&id='. $row->id );
  } else {
    $item_link = $mosConfig_live_site . '/index.php?option=com_content&task=view&id='. $row->id;
  }

	// removes all formating from the intro text for the description text
	$item_description = $row->introtext;
	$item_description = mosHTML::cleanText( $item_description );
	if ( $info[ 'limit_text' ] ) {
		if ( $info[ 'text_length' ] ) {
			// limits description text to x words
			$item_description_array = split( ' ', $item_description );
			$count = count( $item_description_array );
			if ( $count > $info[ 'text_length' ] ) {
				$item_description = '';
				for ( $a = 0; $a < $info[ 'text_length' ]; $a++ ) {
					$item_description .= $item_description_array[$a]. ' '; 
				}	
				$item_description = trim( $item_description );
				$item_description .= '...';
			}
		} else  { 
			// do not include description when text_length = 0
			$item_description = NULL;
		}
	}

	// load individual item creator class
	$item = new FeedItem();
	// item info
	$item->title 		= $item_title;
	$item->link 		= $item_link;
	$item->description 	= $item_description;
	//$item->date 		= 
	$item->source 		= $info[ 'link' ];
	$item->author 		= $row->author;

	// loads item info into rss array
	$rss->addItem( $item );
}

// save feed file
$rss->saveFeed( $info[ 'feed ' ], $info[ 'file ' ], true ); 

?>
