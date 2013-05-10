<?php
/**
 * @author    Janek Ostendorf (ozzy) <ozzy2345de@gmail.com>
 * @copyright Copyright (c) 2013 Janek Ostendorf
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
 */
 
namespace skies\model\page;

use skies\model\BoardSqlPage;
use skies\model\Page;

/**
 * 
 */
class InfoPage extends BoardSqlPage {

	/**
	 * Prepare the output
	 *
	 * @return void
	 */
	public function prepare() {

		$postArray = [];

		$query = $this->boardDb->prepare('SELECT * FROM `posts` WHERE `id` = :postId');

		// Fetch pages
		foreach(\Skies::getConfig()['board']['infoPosts'] as $postId) {

			$query->execute([':postId' => $postId]);
			$postArray[] = $query->fetchArray();

		}

		\Skies::getTemplate()->assign([
			'infoPosts' => $postArray,
		]);

	}

	/**
	 * What's our style name?
	 *
	 * @return string
	 */
	public function getTemplateName() {
		return 'infoPage.tpl';
	}

	/**
	 * Get the path to this page (short form for the URL)
	 *
	 * @return array
	 */
	public function getPath() {
		return [$this->getName()];
	}

	/**
	 * Get the title of this page.
	 *
	 * @return string
	 */
	public function getTitle() {
		return 'Infos';
	}

	/**
	 * Get the name of the page
	 *
	 * @return string
	 */
	public function getName() {
		return 'infos';
	}

}
