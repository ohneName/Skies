
jQuery.fn.mcServerStatus = function(Host, Port) {

	var container = jQuery(this);

	jQuery.post("/lib/minecraft/serverStatus.php", {
			host: Host,
			port: Port
		}, function(data) {
			container.html(data);
		}
	);

};

jQuery.fn.mcPlayerCount = function(Host, Port) {

	var container = jQuery(this);

	jQuery.post("/lib/minecraft/playerCount.php", {
			host: Host,
			port: Port
		}, function(data) {
			container.html(data);
		}
	);

};

jQuery.fn.mcPlayers = function(Host, Port) {

	var container = jQuery(this);

	jQuery.post("/lib/minecraft/players.php", {
			host: Host,
			port: Port
		}, function(data) {
			container.html(data);
		}
	);

};

/*
 * Container beschreiben
 */

function getServerStatus() {

	// Server status and version
	jQuery("#statusServerStatus").mcServerStatus('silexboard.org', 25565);

	// Player count
	jQuery("#statusPlayerCount").mcPlayerCount('silexboard.org', 25565);

	// Players avatars
	jQuery("#statusPlayers").mcPlayers('silexboard.org', 25565);

}

// Alle 30 Sekunden neu laden
var timer = setInterval(reloadStatus, 30000);

function reloadStatus() {
	getServerStatus();
}

function restartTimer() {
	clearInterval(timer);
	timer = setInterval(reloadStatus, 30000);
}

// Beim Seitenaufruf laden
jQuery(document).ready(function() {
	getServerStatus();
});
