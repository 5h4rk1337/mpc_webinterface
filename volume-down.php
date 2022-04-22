<?php
shell_exec('mpc volume -1 > /dev/null 2>/dev/null &');
if (empty($_GET['ajax'])) {
    header('Location: index.php');
} else {
    echo "This is volume-down.php";
}
?>
