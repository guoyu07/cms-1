<?php
/**
* @version $Id: mambot.class.php,v 1.17 2004/09/21 23:12:26 prazgod Exp $
* @package Mambo_4.5.1
* @copyright (C) 2000 - 2004 Miro International Pty Ltd
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Mambo is Free Software
* @subpackage Installer
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* Module installer
* @package Mambo_4.5.1
*/
class mosInstallerMambot extends mosInstaller {
	/**
	* Custom install method
	* @param boolean True if installing from directory
	*/
	function install( $p_fromdir = null ) {
		global $mosConfig_absolute_path, $database;

		if (!$this->preInstallCheck( $p_fromdir, 'mambot' )) {
			return false;
		}

		$xml = $this->xmlDoc();
		$mosinstall =& $xml->documentElement;

		// Set some vars
		$e = &$xml->getElementsByPath( 'name', 1 );
		$this->elementName( $e->getText() );

		$folder = $mosinstall->getAttribute( 'group' );
		$this->elementDir( mosPathName( $mosConfig_absolute_path
		. '/mambots/' . $folder )
		);

		//if(!file_exists($this->elementDir()) && !mkdir($this->elementDir(),0777)) {
		if(!file_exists($this->elementDir()) && !mkdir($this->elementDir(),0777)) {
			$this->setError( 1, 'Failed to create directory "' . $this->elementDir() . '"' );
			return false;
		}

		if ($this->parseFiles( 'files', 'mambot', 'No file is marked as mambot file' ) === false) {
			return false;
		}

		// Insert in module in DB
		$database->setQuery( "SELECT id FROM #__mambots WHERE element = '" . $this->elementName() . "'" );
		if (!$database->query()) {
			$this->setError( 1, 'SQL error: ' . $database->stderr( true ) );
			return false;
		}

		$id = $database->loadResult();

		if (!$id) {
			$row = new mosMambot( $database );
			$row->name = $this->elementName();
			$row->ordering = 0;
			$row->folder = $folder;
			$row->iscore = 0;
			$row->access = 0;
			$row->client_id = 0;
			$row->element = $this->elementSpecial();

			if (!$row->store()) {
				$this->setError( 1, 'SQL error: ' . $row->getError() );
				return false;
			}
		} else {
			$this->setError( 1, 'Mambot "' . $this->elementName() . '" already exists!' );
			return false;
		}
		if ($e = &$xml->getElementsByPath( 'description', 1 )) {
			$this->setError( 0, $this->elementName() . '<p>' . $e->getText() . '</p>' );
		}

		return $this->copySetupFile('front');
	}
	/**
	* Custom install method
	* @param int The id of the module
	* @param string The URL option
	* @param int The client id
	*/
	function uninstall( $id, $option, $client=0 ) {
		global $database, $mosConfig_absolute_path;

		$id = intval( $id );
		$database->setQuery( "SELECT name, folder, element, iscore FROM #__mambots WHERE id = '$id'" );

		$row = null;
		$database->loadObject( $row );
		if ($database->getErrorNum()) {
			HTML_installer::showInstallMessage( $database->stderr(), 'Uninstall -  error',
			$installer->returnTo( $option, 'mambot', $client ) );
			exit();
		}

		if (trim( $row->folder ) == '') {
			HTML_installer::showInstallMessage( 'Folder field empty, cannot remove files', 'Uninstall -  error',
			$installer->returnTo( $option, 'mambot', $client ) );
			exit();
		}

		$basepath = $mosConfig_absolute_path . '/mambots/' . $row->folder . '/';
		$xmlfile = $basepath . $row->element . '.xml';

		// see if there is an xml install file, must be same name as element
		if (file_exists( $xmlfile )) {
			$this->i_xmldoc =& new DOMIT_Lite_Document();
			$this->i_xmldoc->resolveErrors( true );

			if ($this->i_xmldoc->loadXML( $xmlfile, false, true )) {
				$mosinstall =& $this->i_xmldoc->documentElement;
				// get the files element
				$files_element =& $mosinstall->getElementsByPath( 'files', 1 );
				if (!is_null( $files_element )) {
					$files = $files_element->childNodes;
					foreach ($files as $file) {
						// delete the files
						$filename = $file->getText();
						if (file_exists( $basepath . $filename )) {
							$parts = pathinfo( $filename );
							$subpath = $parts['dirname'];
							if ($subpath <> '' && $subpath <> '.' && $subpath <> '..') {
								echo '<br />Deleting: '. $basepath . $subpath;
								$result = deldir(mosPathName( $basepath . $subpath . '/' ));
							} else {
								echo '<br />Deleting: '. $basepath . $filename;
								$result = unlink( mosPathName ($basepath . $filename, false));
							}
							echo intval( $result );
						}
					}
					
					// remove XML file from front
          echo "Deleting XML File: $xmlfile";
          @unlink(  mosPathName ($xmlfile, false ) );
					
					// define folders that should not be removed
					$sysFolders = array(
					'content',
					'search'
					);
					if (!in_array( $row->folder, $sysFolders )) {
						// delete the non-system folders if empty
						if (count( mosReadDirectory( $basepath ) ) < 1) {
							deldir( $basepath );
						}
					}
				}
			}
		}

		if ($row->iscore) {
			HTML_installer::showInstallMessage( $row->name .' is a core element, and cannot be uninstalled.<br />You need to unpublish it if you don\'t want to use it',
			'Uninstall -  error', $this->returnTo( $option, 'mambot', $client ) );
			exit();
		}

		$database->setQuery( "DELETE FROM #__mambots WHERE id = '$id'" );
		if (!$database->query()) {
			$msg = $database->stderr;
			die( $msg );
		}
		return true;
	}
}
?>
