<?php
class Agency {
    private $aId;
    private $aName;
    private $aCity;
    private $aDistrict;
    private $aEmail;
    private $aPhone;
    private $aDateOfEstablishment;
    private $aType;
    private $aPassword;
    private $aDescription;
    private $aImage;
    private $aConnection;
    public function getAgencyId() {
        return $this->aId;
    }
    public function setAgencyId($aId) {
        $this->aId = $aId;
    }
    public function getAgencyName() {
        return $this->aName;
    }
    public function setAgencyName($aName) {
        $this->aName = $aName;
    }
    public function getAgencyCity() {
        return $this->aCity;
    }
    public function setAgencyCity($aCity) {
        $this->aCity = $aCity;
    }
    public function getAgencyDistrict() {
        return $this->aDistrict;
    }
    public function setAgencyDistrict($aDistrict) {
        $this->aDistrict = $aDistrict;
    }
    public function getAgencyEmail() {
        return $this->aEmail;
    }
    public function setAgencyEmail($aEmail) {
        $this->aEmail = $aEmail;
    }
    public function getAgencyPhone() {
        return $this->aPhone;
    }
    public function setAgencyPhone($aPhone) {
        $this->aPhone = $aPhone;
    }
    public function getAgencyDOE() {
        return $this->aDateOfEstablishment;
    }
    public function setAgencyDOE($aDateOfEstablishment) {
        $this->aDateOfEstablishment = $aDateOfEstablishment;
    }
    public function getAgencyType() {
        return $this->aType;
    }
    public function setAgencyType($aType) {
        $this->aType = $aType;
    }
    public function getAgencyPassword() {
        return $this->aPassword;
    }
    public function setAgencyPassword($aPassword) {
        $this->aPassword = $aPassword;
    }
    public function getAgencyDesc() {
        return $this->aDescription;
    }
    public function setAgencyDesc($aDescription) {
        $this->aDescription = $aDescription;
    }
    public function getAgencyImage() {
        return $this->aImage;
    }
    public function setAgencyImage($aImage) {
        $this->aImage = $aImage;
    }
    public function __construct() {
        require_once "/JobPortal/Services/Config.php";
        $this->aConnection = Config::getConnection();
    }
    public function checkAgency() {
        $query = "SELECT DISTINCT agency_info.aID FROM agency_info INNER JOIN agency_email WHERE aEmail='$this->aEmail' AND aPassword='$this->aPassword';";
        return mysqli_query($this->aConnection, $query);
    }
    public function selectAgencyInfo() {
        $query = "SELECT * FROM agency_info WHERE aID='$this->aId';";
        return mysqli_query($this->aConnection, $query);
    }
    public function selectAgencyEmail() {
        $query = "SELECT * FROM agency_email WHERE aID='$this->aId';";
        return mysqli_query($this->aConnection, $query);
    }
    public function selectAgencyPhone() {
        $query = "SELECT * FROM agency_phone WHERE aID='$this->aId';";
        return mysqli_query($this->aConnection, $query);
    }
    public function selectAgencyType() {
        $query = "SELECT * FROM agency_type WHERE aID='$this->aId';";
        return mysqli_query($this->aConnection, $query);
    }
    public function checkAgencyEmail() {
        $query = "SELECT * FROM agency_email WHERE aEmail='$this->aEmail';";
        return mysqli_query($this->aConnection, $query);
    }
    public function checkAgencyPhone() {
        $query = "SELECT * FROM agency_phone WHERE aPhone='$this->aPhone';";
        return mysqli_query($this->aConnection, $query);
    }
    public function selectInsertedAgencyId() {
        return mysqli_insert_id($this->aConnection);
    }
    public function insertAgency() : bool {
        $query = "INSERT INTO agency_info (aName, aCity, aDistrict, aEstablishmentDate, aPassword, aDescription) VALUES ('$this->aName', '$this->aCity', '$this->aDistrict', '$this->aDateOfEstablishment', '$this->aPassword', '$this->aDescription');";
        if(mysqli_query($this->aConnection, $query))
            return true;
        else
            return false;
    }
    public function insertAgencyImage() : bool {
        $query = "UPDATE agency_info SET aImage='$this->aImage' WHERE aID='$this->aId';";
        if(mysqli_query($this->aConnection, $query))
            return true;
        else
            return false;
    }
    public function insertAgencyEmail() : bool {
        $query = "INSERT INTO agency_email (aID, aEmail) VALUES ('$this->aId', '$this->aEmail');";
        if(mysqli_query($this->aConnection, $query))
            return true;
        else
            return false;
    }
    public function insertAgencyPhone() : bool {
        $query = "INSERT INTO agency_phone (aID, aPhone) VALUES ('$this->aId', '$this->aPhone');";
        if(mysqli_query($this->aConnection, $query))
            return true;
        else
            return false;
    }
    public function insertAgencyType() : bool {
        $query = "INSERT INTO agency_type (aID, aType) VALUES ('$this->aId', '$this->aType');";
        if(mysqli_query($this->aConnection, $query))
            return true;
        else
            return false;
    }
    public function updateAgency() : bool {
        $query = "UPDATE agency_info SET aName='$this->aName', aCity='$this->aCity', aDistrict='$this->aDistrict', aEstablishmentDate='$this->aDateOfEstablishment', aDescription='$this->aDescription' WHERE aID='$this->aId';";
        if(mysqli_query($this->aConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteAgency() : bool {
        $query = "DELETE FROM agency_info WHERE aID='$this->aId';";
        if(mysqli_query($this->aConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteAgencyEmail() : bool {
        $query = "DELETE FROM agency_email WHERE aID='$this->aId';";
        if(mysqli_query($this->aConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteAgencyPhone() : bool {
        $query = "DELETE FROM agency_phone WHERE aID='$this->aId';";
        if(mysqli_query($this->aConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteAgencyType() : bool {
        $query = "DELETE FROM agency_type WHERE aID='$this->aId';";
        if(mysqli_query($this->aConnection, $query))
            return true;
        else
            return false;
    }
}