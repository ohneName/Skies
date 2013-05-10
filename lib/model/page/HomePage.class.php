<?php
/**
 * @author    Janek Ostendorf (ozzy) <ozzy2345de@gmail.com>
 * @copyright Copyright (c) 2013 Janek Ostendorf
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
 */

namespace skies\model\page;

use skies\model\BoardSqlPage;
use skies\model\Page;
use skies\system\exception\SystemException;

/**
 * Main page
 */
class HomePage extends BoardSqlPage {

	/**
	 * Prepare the output
	 *
	 * @throws \skies\system\exception\SystemException
	 * @return void
	 */
	public function prepare() {

		// Fetch posts
		$query = $this->boardDb->prepare('SELECT * FROM `topics` INNER JOIN `posts` ON `topics`.`first_post_id` = `posts`.`id` WHERE `topics`.`forum_id` = :newsForum AND `sticky` = 0 ORDER BY `topics`.`posted` DESC LIMIT 5');

		$query->execute([':newsForum' => \Skies::getConfig()['board']['newsForum']]);

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

		\Skies::getTemplate()->assign(['news' => $news, 'boardUrl' => \Skies::getConfig()['board']['boardUrl']]);

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
