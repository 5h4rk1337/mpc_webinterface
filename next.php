<?php
shell_exec('mpc next');
if (empty($_GET['ajax'])) {
    header('Location: /index.php');
} else {
    echo "This is next.php";
}
?>
