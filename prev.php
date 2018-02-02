<?php
sleep(2);
shell_exec('mpc prev');
header('Location: /index.php');
?>
