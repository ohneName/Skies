<?php
/**
 * @author    Janek Ostendorf (ozzy) <ozzy2345de@gmail.com>
 * @copyright Copyright (c) 2013 Janek Ostendorf
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
 */

require_once 'init.php';

/** @var $serverStatus MinecraftServerStatus */

if($serverStatus->Get('online') && isset($_POST['userName'])) {


	if(in_array($_POST['userName'], $serverStatus->Get('players'))) {
		echo 'Spielt gerade auf dem Server.';
	}

}
