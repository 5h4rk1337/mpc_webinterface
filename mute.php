<?php
shell_exec('amixer set PCM toggle > /dev/null 2>/dev/null &');
if (empty($_GET['ajax'])) {
    header('Location: index.php');
} else {
    echo "This is mute.php";
}
?>
