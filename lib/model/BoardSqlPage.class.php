<?php
/**
 * @author    Janek Ostendorf (ozzy) <ozzy2345de@gmail.com>
 * @copyright Copyright (c) 2013 Janek Ostendorf
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
 */
 
namespace skies\model;

use skies\system\database\Database;
use skies\system\exception\SystemException;

/**
 * Page using a SQL connection to the board
 */
abstract class BoardSqlPage extends Page {

	/**
	 * @var Database
	 */
	protected $boardDb = null;

	public function __construct() {

		// Connect to the board SQL
		$dbHost = $dbUser = $dbPassword = $dbName = '';
		$dbPort = 0;
		$dbType = 'skies\system\database\MysqlDatabase';

		// Fetch configuration
		require ROOT_DIR.'lib/boardConfig.inc.php';

		$this->boardDb = new $dbType($dbHost, $dbUser, $dbPassword, $dbName, $dbPort);

		if(!$this->boardDb instanceof Database || !$this->boardDb->isSupported()) {
			throw new SystemException('Failed to create database object.', 0, 'Failed to create Database object or database type is not supported.');
		}

	}

}
