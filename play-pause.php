<?php
shell_exec('mpc toggle > /dev/null 2>/dev/null &');
if (empty($_GET['ajax'])) {
    header('Location: index.php');
} else {
    echo "This is play-pause.php";
}
?>
