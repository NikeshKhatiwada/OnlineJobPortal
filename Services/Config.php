<?php
class Config {
    public static function getConnection() {
        $db_server = "localhost";
        $db_user = "root";
        $db_password = "my_database2";
        $database = "jobportal";
        return mysqli_connect($db_server, $db_user, $db_password, $database);
    }
}