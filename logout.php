<?php
session_start();
session_unset(); //Just added. Can be remove
if(session_destroy()) // Destroying All Sessions
{
    header("Location: index.php"); // Redirecting To Home Page
}
?>