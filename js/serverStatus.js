var baseUrl = 'http://ohne-name.de/';

(function($) {

	$.fn.mcServerStatus = function(Host, Port) {

		var container = $(this);

		$.post(baseUrl + "lib/minecraft/serverStatus.php", {
				host: Host,
				port: Port
			}, function(data) {
				container.html(data);
			}
		);

	};

	$.fn.mcPlayerCount = function(Host, Port) {

		var container = $(this);

		$.post(baseUrl + "lib/minecraft/playerCount.php", {
				host: Host,
				port: Port
			}, function(data) {
				container.html(data);
			}
		);

	};

	$.fn.mcPlayers = function(Host, Port) {

		var container = $(this);

		$.post(baseUrl + "lib/minecraft/players.php", {
				host: Host,
				port: Port
			}, function(data) {
				container.html(data);
			}
		);

	};

	$.fn.mcUserStatus = function(Host, Port) {

		this.each(function() {

			var container = $(this);

			var playerName = container.find('input.mcUser').val();

			$.post(baseUrl + "lib/minecraft/userStatus.php", {
					host: Host,
					port: Port,
					userName: playerName
				}, function(data) {
					container.find('.status').html(data);
				}
			);

		});

	};

})(jQuery);

/*
 * Container beschreiben
 */

function getServerStatus() {

	// Server status and version
	$("#statusServerStatus").mcServerStatus('server.ohne-name.de', 25565);

	// Player count
	$("#statusPlayerCount").mcPlayerCount('server.ohne-name.de', 25565);

	// Players avatars
	$("#statusPlayers").mcPlayers('server.ohne-name.de', 25565);

	// User status
	$('.mcUserStatus').mcUserStatus('server.ohne-name.de', 25565);

}

// Alle 30 Sekunden neu laden
var timer = setInterval(reloadStatus, 30000);

function reloadStatus() {
	getServerStatus();
}

// Beim Seitenaufruf laden
$(function() {
	getServerStatus();
});
