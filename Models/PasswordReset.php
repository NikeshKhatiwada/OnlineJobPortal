<?php
class PasswordReset {
    private $uId;
    private $prCode;
    private $prConnection;
    public function getUserId() {
        return $this->uId;
    }
    public function setUserId($uId) {
        $this->uId = $uId;
    }
    public function getPasswordResetCode() {
        return $this->prCode;
    }
    public function setPasswordResetCode($prCode) {
        $this->prCode = $prCode;
    }
    public function __construct() {
        require_once "/JobPortal/Services/Config.php";
        $this->prConnection = Config::getConnection();
    }
    public function createPasswordResetTable() : bool {
        $query = "CREATE TEMPORARY TABLE IF NOT EXISTS password_reset_info ".
            "(".
            "uID SMALLINT UNSIGNED, ".
            "prCode VARCHAR(6) UNIQUE, ".
            "PRIMARY KEY (uID)".
            ");";
        if(mysqli_query($this->prConnection, $query))
            return true;
        else
            return false;
    }
    public function selectPasswordResetInfo() {
        $query = "SELECT * FROM password_reset_info WHERE uID='$this->uId';";
        return mysqli_query($this->prConnection, $query);
    }
    public function insertPasswordResetCode() : bool {
        $query = "INSERT INTO password_reset_info (uID, prCode) VALUES ('$this->uId', '$this->prCode');";
        if(mysqli_query($this->prConnection, $query))
            return true;
        else
            return false;
    }
}