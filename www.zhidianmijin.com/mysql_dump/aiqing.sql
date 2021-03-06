-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost:3308
-- 生成日期: 2009 年 07 月 28 日 09:13
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `ming`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `aiqing`
-- 

CREATE TABLE `aiqing` (
  `title` varchar(50) default NULL,
  `content` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `aiqing`
-- 

INSERT INTO `aiqing` VALUES ('水瓶座', '活力、劳动力、集中力、企划性、应变力、审美度和独创性皆是你的个人特色，在工作上若是善用这些长处，可以一嚐成功滋味；不过最好选择发展一些个人性的事业或工作，避免与别人合作，而过份的个人作风易於招致不必的麻烦！贵为上司的你是一个平等至上的人；作为同事，你不会搞小圈子；身为下属，老板会觉得你有才华但很难搞。对你这一类奇人，唯有讲一句：『我行我素，只管喜欢做的事，能否成功对你无关重要。');
INSERT INTO `aiqing` VALUES ('白羊座', '管理能力、活力、劳动力、应变力都达到满分的白羊座，在工作上面喜欢单打独斗；唔合意的话，任何方法都不能改变他的主观；利用自己的长处，掌握开发时衍生的衝劲，时间一拖延，不利的只是自己；协调性太低，过於独断独行，坚持自己的主意，导致一起共事的人感觉很辛苦；倘使用霸气同权威降服别人，请小心一旦失势，便会构成眾叛亲离的局面；【凡事留一线，日后好相见】无须事事都毫不留情，而且太忌才有时只会招致损失！');
INSERT INTO `aiqing` VALUES ('金牛座', '★金牛座：交涉力，忍耐力和责任心是你的强项，在工作些你需要用时间一步一步迈向成功，你本身的应变不够，很需要有合拍的伙伴帮你一把，最好是一个策划力强的人，将事情的进度列好计划书和进度过程表，会让你发挥到你实务性的工作表现最高状态出来，某个程度上你偏向於好逸恶劳，最好可以有实际的固定收入，你彰列你基本的生活，上进决心要看环境，缺乏主动力，加上你会有偏见，在工作上太过固执，会严重影响到你的成功和将来。');
INSERT INTO `aiqing` VALUES ('双子座', '交涉力、劳动力、企划力、应变力是你的工作上四大强项，而且热衷在工作上得到的乐趣，不会因外围而影响情绪。善用口才和灵活性，适宜一些变化多端、临危应变的工作，便会发挥到自我的效能。小心的是如果工作的职责需求管理、协调、集中、判断、推进、规律和忍耐力，必须花上时间去改善自己这方面的控制力；倘若尚未做好，便难以达到成功的目标，往往给人半桶水、不是大将之才的感觉。');
INSERT INTO `aiqing` VALUES ('巨蟹座', '交涉力是你在工作上的强项，因为月亮是你的守护星，赐予你令人留下一个亲切的印象，交涉时懂得利用感情牌，掌握适当的时机去让步；配合比别人强的管理力、企划性、审美眼光、独创性同沟通力，可以在执行与人际关係两者皆得到好处，使成功做好一盘生意的机会很大！请小心，某段时间你会容易受到感情上的困扰，陷於低潮，会因情绪而拖垮进行中的事情，必须控制自己这个大问题；因为问题的发生主因是来自於自我内心的矛盾。');
INSERT INTO `aiqing` VALUES ('狮子座', '交涉力、管理力、活力、判断力、责任感、应变力都极佳的你，天赋领导才能，只是看你能否善於运用。勇敢的行为往往会完成别人没法实践的事情，但是过於个人主义和独裁性格，想得到生意上长久而关係良好的伙伴，有点儿难度，取决於自我的修维；与合作的人协调性非常微妙，通常一见如故，当时间越来越久协调性便相应降低。惟独请你牢记：【当赢得全世界，但是换来永恆的孤独，赢了又如何呢！】');
INSERT INTO `aiqing` VALUES ('处女座', '交涉力、管理能力、集中力、判断力、规律性、中立度和沟通力非常高的你，在工作上往往有一定的成就，可以做好管理层的工作，不会感情用事，成功度极高。【针无两头利】相对地和合作伙伴只适宜君子之交，除工作之外，不宜有进一步的关係，一旦纠缠便会自觉麻烦多多。旺盛的好奇心令自我要求不断进步，太多的顾虑又会令你反覆思量，复杂而矛盾的心理将你陷入不安的情绪之中，很容易產生神经衰弱，小心！');
INSERT INTO `aiqing` VALUES ('天秤座', '交涉力、协调性、规律性、审美眼光、独创性和沟通力是你天赋的优点，发挥在工作方面，可以令成就更为卓越，善用口才和社交力在工作之上。犹豫不决会严重影响应变力，常常令合作伙伴无所适从，而且自我的日常生活管理不善，使人留下处事混乱的印象；只着重外表装潢，试问谁人有信心付予大任给你。尝试遇到不满的地方迅即提部A有时一针见血的建议未必得罪别人，反而加速推动工作的进展。');
INSERT INTO `aiqing` VALUES ('天蝎座', '管理力、活力、集中力、判断力、推进力、忍耐力、责任感、中立性，全是你在工作上胜人一筹的地方。你的斗志顽强，一旦决定要做到的事情，不达到目的便不会罢休，加上权力慾比任何人强盛，喜欢做话事人，由你控制大局，成功率颇高；但你异常不喜欢显露名声，不爱出风头，甘心做幕后玩家，而且拥有过人的判断力，足以一眼就洞察到对方的心意，在用人方面知人善任。注意自己的作息安排，以及工作出现问题时，衍生倾向暴力的报復心态。');
INSERT INTO `aiqing` VALUES ('射手座', '劳动力和企划性加上应变能力，算是你一生的幸运护身符；不惧失败，只是有一点机会便可以翻身，而且充满活力和四围的人际网络，可作多元化发展；一旦计划进行时出现危机，迅即斩钉截铁地制止，改变行程往另一个码头。如果你负责管理一套工作系统，必须拥有胜任的下属，过於散漫同缺乏耐性，令你难以成功。人马座的人想成功可谓轻而易举，可是从未察觉到已经成功，正是【身在福中不知福】！');
INSERT INTO `aiqing` VALUES ('摩羯座', '管理能力、活力、集中力、判断力、规律性、忍耐力、责任感、中立性皆高人一等的山羊座，天生就是成功的领导人才，惟独他们那种实务性，需长期斗争便大器晚成；会有许多实质的意见提供给合伙人，令到别人从现实的角度着想；不过野心太大会使到在人际关係失利，难以拥有深交的知心朋友，而心灵孤独！意会一下人生只是匆匆几十年，何必贪求身外之物而营营役役，免除生活在担心及惶恐之中，便是生命的最大成就。');
INSERT INTO `aiqing` VALUES ('双鱼座', '你可以成功，主要依靠审美眼光和独创性；因为自我执行力和管理能力非常低，世俗人眼中难成大器的一类人，最适合当艺术家或可以宣洩过分情绪的工作。在和别人合作时，往往流於感性化，不理会现实，牺牲自己去成全别人，最后只落得悲惨收场！切忌给这些而打击自我的发展，仍然有机会成功的，只要清楚自己的优点和缺点在那裡，削减一些无谓的悲观消极心态；拥有一套自己快乐生活的方式，另外慎防利用精神麻醉药去逃避现实。');
