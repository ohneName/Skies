<?php
/**
 * @author    Janek Ostendorf (ozzy) <ozzy2345de@gmail.com>
 * @copyright Copyright (c) Janek Ostendorf
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
 * @package   skies
 */

// Debug
define('DEBUG', true);

// Show full query in exceptions
define('DEBUG_MYSQL', true);

// Version
define('VERSION', '0.2');

// Guest ID for settings-handling
define('GUEST_ID', null);

// Cookie prefix
define('COOKIE_PRE', 'skies_');

// End of line
define('EOL', "\n");

// Page namespace. Changes the directory as well, due to the autoloader function
define('PAGE_NAMESPACE', 'skies\model\page\\');

// Path constants
define('DIR_TPL', 'template/');
define('DIR_STYLE', 'style/');
define('DIR_CACHE', 'cache/');
define('DIR_LANGUAGE', 'language/');
