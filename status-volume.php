<?php
$Volume = shell_exec('mpc volume');

echo json_encode(array(
	"volume" => $Volume,
), JSON_PRETTY_PRINT);

// Assoziatives Array oder "Hashmap" oder "Dictionary", in JSON auch "Object" genannt
?>