<?php
/**
 * @author    Janek Ostendorf (ozzy) <ozzy2345de@gmail.com>
 * @copyright Copyright (c) 2013 Janek Ostendorf
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
 */

namespace skies\model\page;

use skies\model\Page;
use skies\system\database\Database;
use skies\system\exception\SystemException;

/**
 * Main page
 */
class HomePage extends Page {

	/**
	 * Prepare the output
	 *
	 * @throws \skies\system\exception\SystemException
	 * @return void
	 */
	public function prepare() {

		// NULL values
		$dbHost = $dbUser = $dbPassword = $dbName = '';
		$dbPort = 0;
		$dbType = 'skies\system\database\MysqlDatabase';

		// Fetch configuration
		require_once ROOT_DIR.'lib/model/page/boardConfig.inc.php';

		$boardDb = new $dbType($dbHost, $dbUser, $dbPassword, $dbName, $dbPort);

		if(!$boardDb instanceof Database || !$boardDb->isSupported()) {
			throw new SystemException('Failed to create database object.', 0, 'Failed to create Database object or database type is not supported.');
		}

		// Fetch posts
		$query = $boardDb->prepare('SELECT * FROM `topics` INNER JOIN `posts` ON `topics`.`first_post_id` = `posts`.`id` WHERE `topics`.`forum_id` = 2 ORDER BY `topics`.`posted` DESC LIMIT 5');

		$query->execute();

		$news = [];

		foreach($query->fetchAllArray() as $newsArray) {

			$news[] = [
				'id' => $newsArray['id'],
				'poster' => $newsArray['poster'],
				'posterId' => $newsArray['poster_id'],
				'subject' => $newsArray['subject'],
				'message' => $newsArray['message'],
				'replyCount' => $newsArray['num_replies'],
				'timePosted' => $newsArray['posted']
			];

		}

		\Skies::getTemplate()->assign(['news' => $news]);

	}

	/**
	 * What's our style name?
	 *
	 * @return string
	 */
	public function getTemplateName() {

		return 'homePage.tpl';

	}

	/**
	 * Get the name of this page (short form for the URL)
	 *
	 * @return string
	 */
	public function getPath() {

		return ['home'];

	}

	/**
	 * Get the title of this page.
	 *
	 * @return string
	 */
	public function getTitle() {

		return 'Home';

	}

	/**
	 * Get the name of the page
	 *
	 * @return string
	 */
	public function getName() {
		return 'home';
	}

}
