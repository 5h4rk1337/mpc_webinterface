<?php
shell_exec('mpc prev');
if (empty($_GET['ajax'])) {
    header('Location: /index.php');
} else {
    echo "This is prev.php";
}
?>
