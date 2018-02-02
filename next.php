<?php
sleep(2);
shell_exec('mpc next');
header('Location: /index.php');
?>
