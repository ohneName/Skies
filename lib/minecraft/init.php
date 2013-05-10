<?php
/**
 * @author    Janek Ostendorf (ozzy) <ozzy2345de@gmail.com>
 * @copyright Copyright (c) 2013 Janek Ostendorf
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3
 */

// Initialize status
$host = 'silexboard.org';
$port = 25565;

if(isset($_POST['host']))
	$host = $_POST['host'];

if(isset($_POST['port']))
	$port = $_POST['port'];

require_once 'MinecraftServerStatus.class.php';

$serverStatus = new MinecraftServerStatus($host, $port, 2);
