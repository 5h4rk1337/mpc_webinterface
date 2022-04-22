<?php
$sender_id = intval($_GET['sender_id']);
shell_exec('mpc play '.$sender_id.' > /dev/null 2>/dev/null &');
if (empty($_GET['ajax'])) {
    header('Location: index.php');
} else {
    echo "This is switch-sender.php";
}
?>
