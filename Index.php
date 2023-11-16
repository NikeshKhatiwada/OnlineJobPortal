<?php
session_start();
$url = "";
if(empty($_GET["url"])) {
    if($_SESSION["user_id"] !== null) {
        if($_SESSION["user_type"] == "agency")
            $url = "Agency/Home";
        elseif($_SESSION["user_type"] == "candidate")
            $url = "Candidate/Home";
    }
    else
        $url = "Login/Login";
}
else
    $url = $_GET["url"];
$url = explode("/", $url);
$controller = $url[count($url) - 2]."Controller";
require_once "Controllers/".$controller.".php";
$method = $url[count($url) - 1];
$obj = new $controller();
$obj->$method();