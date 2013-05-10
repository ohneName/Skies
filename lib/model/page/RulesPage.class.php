<?php
/**
 * @author    Janek Ostendorf (ozzy) <ozzy2345de@gmail.com>
 * @copyright Copyright (c) 2013 Janek Ostendorf
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
 */
 
namespace skies\model\page;

use skies\model\BoardSqlPage;

/**
 * 
 */
class RulesPage extends BoardSqlPage {

	/**
	 * Prepare the output
	 *
	 * @return void
	 */
	public function prepare() {

		// Fetch rules post and last post of the thread.
		$query = $this->boardDb->prepare('SELECT * FROM `topics` INNER JOIN `posts` ON `topics`.`first_post_id` = `posts`.`id` WHERE `topics`.`id` = :topicId');
		$query->execute([':topicId' => \Skies::getConfig()['board']['rulesTopic']]);

		$rulesPost = $query->fetchArray();

		// Fetch last post
		$query = $this->boardDb->prepare('SELECT * FROM `posts` WHERE `id` = :postId');
		$query->execute([':postId' => $rulesPost['last_post_id']]);

		$lastPost = $query->fetchArray();

		\Skies::getTemplate()->assign([
			'rulesPost' => $rulesPost,
			'lastPost' => $lastPost,
			'boardUrl' => \Skies::getConfig()['board']['boardUrl'],
		]);

	}

	/**
	 * What's our style name?
	 *
	 * @return string
	 */
	public function getTemplateName() {
		return 'rulesPage.tpl';
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
		return 'Regeln';
	}

	/**
	 * Get the name of the page
	 *
	 * @return string
	 */
	public function getName() {
		return 'regeln';
	}

}
