<?php
/**
 * @author    Janek Ostendorf (ozzy) <ozzy2345de@gmail.com>
 * @copyright Copyright (c) 2013 Janek Ostendorf
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
 */

require_once 'init.php';

/** @var $serverStatus MinecraftServerStatus */

if($serverStatus->Get('online')) {

	foreach($serverStatus->Get('players') as $player) {

		echo '<img src="https://minotar.net/helm/'.$player.'/32.png" title="'.$player.'" style="padding-left: 5px;" />';

	}

}
