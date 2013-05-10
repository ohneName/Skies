<?php
/**
 * @author    Janek Ostendorf (ozzy) <ozzy2345de@gmail.com>
 * @copyright Copyright (c) 2013 Janek Ostendorf
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
 */
// Load BBCode parser
if(!defined('PUN'))
	define('PUN', true);

if(!defined('PUN_ROOT'))
	define('PUN_ROOT', ROOT_DIR.'lib/fluxbb/');

// Settings
$GLOBALS['pun_config'] = [
	'o_censoring' => 0,
	'o_smilies' => 0,
	'p_message_bbcode' => 1,
	'p_message_img_tag' => 1,
	'o_base_url' => \Skies::getConfig()['board']['boardUrl'],
];

require_once ROOT_DIR.'lib/fluxbb/include/utf8/trim.php';
require_once ROOT_DIR.'lib/fluxbb/include/functions.php';
require_once ROOT_DIR.'lib/fluxbb/include/parser.php';

function smarty_modifier_parseMessage($message, $smileys = false) {
	return parse_message($message, $smileys);
}
