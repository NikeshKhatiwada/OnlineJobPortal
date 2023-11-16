<?php
class Candidate {
    private $cId;
    private $cName;
    private $cMunicipality;
    private $cDistrict;
    private $cEmail;
    private $cPhone;
    private $cDateOfBirth;
    private $cGender;
    private $cPassword;
    private $cImage;
    private $cEduLevel;
    private $cExperience;
    private $cExperienceYear;
    private $cSkill;
    private $cConnection;
    public function getCandidateId() {
        return $this->cId;
    }
    public function setCandidateId($cId) {
        $this->cId = $cId;
    }
    public function getCandidateName() {
        return $this->cName;
    }
    public function setCandidateName($cName) {
        $this->cName = $cName;
    }
    public function getCandidateMunicipality() {
        return $this->cMunicipality;
    }
    public function setCandidateMunicipality($cMunicipality) {
        $this->cMunicipality = $cMunicipality;
    }
    public function getCandidateDistrict() {
        return $this->cDistrict;
    }
    public function setCandidateDistrict($cDistrict) {
        $this->cDistrict = $cDistrict;
    }
    public function getCandidateEmail() {
        return $this->cEmail;
    }
    public function setCandidateEmail($cEmail) {
        $this->cEmail = $cEmail;
    }
    public function getCandidatePhone() {
        return $this->cPhone;
    }
    public function setCandidatePhone($cPhone) {
        $this->cPhone = $cPhone;
    }
    public function getCandidateDOB() {
        return $this->cDateOfBirth;
    }
    public function setCandidateDOB($cDateOfBirth) {
        $this->cDateOfBirth = $cDateOfBirth;
    }
    public function getCandidateGender() {
        return $this->cGender;
    }
    public function setCandidateGender($cGender) {
        $this->cGender = $cGender;
    }
    public function getCandidatePassword() {
        return $this->cPassword;
    }
    public function setCandidatePassword($cPassword) {
        $this->cPassword = $cPassword;
    }
    public function getCandidateImage() {
        return $this->cImage;
    }
    public function setCandidateImage($cImage) {
        $this->cImage = $cImage;
    }
    public function getCandidateEdu() {
        return $this->cEduLevel;
    }
    public function setCandidateEdu($cEduLevel) {
        $this->cEduLevel = $cEduLevel;
    }
    public function getCandidateExp() {
        return $this->cExperience;
    }
    public function setCandidateExp($cExperience) {
        $this->cExperience = $cExperience;
    }
    public function getCandidateExpYear() {
        return $this->cExperienceYear;
    }
    public function setCandidateExpYear($cExperienceYear) {
        $this->cExperienceYear = $cExperienceYear;
    }
    public function getCandidateSkill() {
        return $this->cSkill;
    }
    public function setCandidateSkill($cSkill) {
        $this->cSkill = $cSkill;
    }
    public function __construct() {
        require_once "/JobPortal/Services/Config.php";
        $this->cConnection = Config::getConnection();
    }
    public function checkCandidate() {
        $query = "SELECT DISTINCT candidate_info.cID FROM candidate_info INNER JOIN candidate_email WHERE cEmail='$this->cEmail' AND cPassword='$this->cPassword';";
        return mysqli_query($this->cConnection, $query);
    }
    public function selectCandidateInfo() {
        $query = "SELECT * FROM candidate_info WHERE cID='$this->cId';";
        return mysqli_query($this->cConnection, $query);
    }
    public function selectCandidateEmail() {
        $query = "SELECT * FROM candidate_email WHERE cID='$this->cId';";
        return mysqli_query($this->cConnection, $query);
    }
    public function selectCandidatePhone() {
        $query = "SELECT * FROM candidate_phone WHERE cID='$this->cId';";
        return mysqli_query($this->cConnection, $query);
    }
    public function selectCandidateExp() {
        $query = "SELECT * FROM candidate_experience WHERE cID='$this->cId';";
        return mysqli_query($this->cConnection, $query);
    }
    public function selectCandidateSkill() {
        $query = "SELECT * FROM candidate_skill WHERE cID='$this->cId';";
        return mysqli_query($this->cConnection, $query);
    }
    public function checkCandidateEmail() {
        $query = "SELECT * FROM candidate_email WHERE cEmail='$this->cEmail';";
        return mysqli_query($this->cConnection, $query);
    }
    public function checkCandidatePhone() {
        $query = "SELECT * FROM candidate_phone WHERE cPhone='$this->cPhone';";
        return mysqli_query($this->cConnection, $query);
    }
    public function selectInsertedCandidateId() {
        return mysqli_insert_id($this->cConnection);
    }
    public function insertCandidate() : bool {
        $query = "INSERT INTO candidate_info (cName, cMunicipality, cDistrict, cBirthDate, cGender, cPassword, cEduLevel) VALUES ('$this->cName', '$this->cMunicipality', '$this->cDistrict', '$this->cDateOfBirth', '$this->cGender', '$this->cPassword', '$this->cEduLevel');";
        if(mysqli_query($this->cConnection, $query))
            return true;
        else
            return false;
    }
    public function insertCandidateImage() : bool {
        $query = "UPDATE candidate_info SET cImage='$this->cImage' WHERE cID='$this->cId';";
        if(mysqli_query($this->cConnection, $query))
            return true;
        else
            return false;
    }
    public function insertCandidateEmail() : bool {
        $query = "INSERT INTO candidate_email (cID, cEmail) VALUES ('$this->cId', '$this->cEmail');";
        if(mysqli_query($this->cConnection, $query))
            return true;
        else
            return false;
    }
    public function insertCandidatePhone() : bool {
        $query = "INSERT INTO candidate_phone (cID, cPhone) VALUES ('$this->cId', '$this->cPhone');";
        if(mysqli_query($this->cConnection, $query))
            return true;
        else
            return false;
    }
    public function insertCandidateExp() : bool {
        $query = "INSERT INTO candidate_experience (cID, cExperience, cExperienceYear) VALUES ('$this->cId', '$this->cExperience', '$this->cExperienceYear');";
        if(mysqli_query($this->cConnection, $query))
            return true;
        else
            return false;
    }
    public function insertCandidateSkill() : bool {
        $query = "INSERT INTO candidate_skill (cID, cSkill) VALUES ('$this->cId', '$this->cSkill');";
        if(mysqli_query($this->cConnection, $query))
            return true;
        else
            return false;
    }
    public function updateCandidate() : bool {
        $query = "UPDATE candidate_info SET cName='$this->cName', cMunicipality='$this->cMunicipality', cDistrict='$this->cDistrict', cBirthDate='$this->cDateOfBirth', cGender='$this->cGender', cEduLevel='$this->cEduLevel' WHERE cID='$this->cId';";
        if(mysqli_query($this->cConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteCandidate() : bool {
        $query = "DELETE FROM candidate_info WHERE cID='$this->cId';";
        if(mysqli_query($this->cConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteCandidateEmail() : bool {
        $query = "DELETE FROM candidate_email WHERE cID='$this->cId';";
        if(mysqli_query($this->cConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteCandidatePhone() : bool {
        $query = "DELETE FROM candidate_phone WHERE cID='$this->cId';";
        if(mysqli_query($this->cConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteCandidateExp() : bool {
        $query = "DELETE FROM candidate_experience WHERE cID='$this->cId';";
        if(mysqli_query($this->cConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteCandidateSkill(): bool {
        $query = "DELETE FROM candidate_skill WHERE cID='$this->cId';";
        if(mysqli_query($this->cConnection, $query))
            return true;
        else
            return false;
    }
}