<?php
shell_exec('mpc stop > /dev/null 2>/dev/null &');
if (empty($_GET['ajax'])) {
    header('Location: index.php');
} else {
    echo "This is stop.php";
}
?>
