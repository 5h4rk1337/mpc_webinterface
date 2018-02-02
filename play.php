<?php
shell_exec('mpc play');
if (empty($_GET['ajax'])) {
    header('Location: /index.php');
} else {
    echo "This is play.php";
}
?>
