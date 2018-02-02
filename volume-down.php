<?php
shell_exec('mpc volume -1');
if (empty($_GET['ajax'])) {
    header('Location: /index.php');
} else {
    echo "This is volume-down.php";
}
?>
