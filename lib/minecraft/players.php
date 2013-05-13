<?php
/**
 * @author    Janek Ostendorf (ozzy) <ozzy2345de@gmail.com>
 * @copyright Copyright (c) 2013 Janek Ostendorf
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
 */

require_once 'init.php';

/** @var $serverStatus MinecraftServerStatus */

if($serverStatus->Get('online')) {

	$boardUrl = 'http://forum.ohne-name.de/';

	if(is_array($serverStatus->Get('players')) && count($serverStatus->Get('players')) > 0) {

		foreach($serverStatus->Get('players') as $player) {

			// Fetch from FluxBBrdige API
			$json = (array) @json_decode(@file_get_contents($boardUrl.'fluxbbridge.php?action=profileLink&mcUser='.$player));

			if($json !== null && isset($json['status']) && $json['status'] == 'ok') {

				?>
				<a href="<?=$json['message']?>"><img src="https://minotar.net/helm/<?=$player?>/32.png" title="<?=$player?> (<?=$json['boardUser']?>)" style="padding-left: 5px;" /></a>
				<?php

			}
			else {
				?>
				<img src="https://minotar.net/helm/<?=$player?>/32.png" title="<?=$player?>" style="padding-left: 5px;" />
				<?php
			}

		}
	}

}
