<?php
$Status = shell_exec('mpc current');
$Song = shell_exec('mpc -f %title% | head -n 1');
$Sender = shell_exec('mpc -f %name% | head -n 1');
$Volume = shell_exec('mpc volume');
$PlayStatus = shell_exec('mpc status | egrep -o "paused|playing"');

echo json_encode(array(
	"status" => $Status,
	"song" => $Song,
	"sender" => $Sender,
	"volume" => $Volume,
	"play_status" => trim($PlayStatus)
), JSON_PRETTY_PRINT);

// Assoziatives Array oder "Hashmap" oder "Dictionary", in JSON auch "Object" genannt
?>