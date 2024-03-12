<?php
    session_start();
    if(!isset($_SESSION['table'])){
        echo 1;
    }else{
        echo 0;
    }
?>