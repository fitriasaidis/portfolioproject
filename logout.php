<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['pass']);
    session_destroy();
    echo "<meta http-equiv=\"refresh\" content=\"1;URL=index.php\">";
?>