<?php
session_start();
function Redirect_to($New_Location){
    header("Location:".$New_Location);
    exit;
}
?>