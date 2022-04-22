<?php
$Status = shell_exec('mpc current');
$Song = shell_exec('mpc -f %title% | head -n 1');
$Sender = shell_exec('mpc -f %name% | head -n 1');
$Volume = shell_exec('mpc volume');

$PlayStatus = shell_exec('mpc status | egrep -o "paused|playing"');

echo json_encode(array(
	$Status, // Element 0
	$Song, // Element 1
	$Sender, // ...
	$Volume,
	trim($PlayStatus)
), JSON_PRETTY_PRINT);

// Klassisches Array (Zugriff auf Elemente nur Index-basiert)
