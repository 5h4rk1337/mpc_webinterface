<?php
shell_exec('mpc stop');
if (empty($_GET['ajax'])) {
    header('Location: /index.php');
} else {
    echo "This is stop.php";
}
?>
