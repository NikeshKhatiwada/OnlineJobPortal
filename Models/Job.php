<?php
class Job {
    private $jId;
    private $jName;
    private $jCity;
    private $jDistrict;
    private $jDeadline;
    private $jSalary;
    private $jType;
    private $jDescription;
    private $jEduLevel;
    private $jExperienceYear;
    private $jSkill;
    private $jConnection;
    private $aId;
    public function getJobId() {
        return $this->jId;
    }
    public function setJobId($jId) {
        $this->jId = $jId;
    }
    public function getJobName() {
        return $this->jName;
    }
    public function setJobName($jName) {
        $this->jName = $jName;
    }
    public function getJobCity() {
        return $this->jCity;
    }
    public function setJobCity($jCity) {
        $this->jCity = $jCity;
    }
    public function getJobDistrict() {
        return $this->jDistrict;
    }
    public function setJobDistrict($jDistrict) {
        $this->jDistrict = $jDistrict;
    }
    public function getJobDeadline() {
        return $this->jDeadline;
    }
    public function setJobDeadline($jDeadline) {
        $this->jDeadline = $jDeadline;
    }
    public function getJobSalary() {
        return $this->jSalary;
    }
    public function setJobSalary($jSalary) {
        $this->jSalary = $jSalary;
    }
    public function getJobType() {
        return $this->jType;
    }
    public function setJobType($jType) {
        $this->jType = $jType;
    }
    public function getJobDesc() {
        return $this->jDescription;
    }
    public function setJobDesc($jDescription) {
        $this->jDescription = $jDescription;
    }
    public function getJobEdu() {
        return $this->jEduLevel;
    }
    public function setJobEdu($jEduLevel) {
        $this->jEduLevel = $jEduLevel;
    }
    public function getJobExpYear() {
        return $this->jExperienceYear;
    }
    public function setJobExp($jExperienceYear) {
        $this->jExperienceYear = $jExperienceYear;
    }
    public function getJobSkill() {
        return $this->jSkill;
    }
    public function setJobSkill($jSkill) {
        $this->jSkill = $jSkill;
    }
    public function getAgencyId() {
        return $this->aId;
    }
    public function setAgencyId($aId) {
        $this->aId = $aId;
    }
    public function __construct() {
        require_once "/JobPortal/Services/Config.php";
        $this->jConnection = Config::getConnection();
    }
    public function selectJobInfo() {
        $query = "SELECT * FROM job_info WHERE jID='$this->jId';";
        return mysqli_query($this->jConnection, $query);
    }
    public function selectJobSkill() {
        $query = "SELECT * FROM job_skill WHERE jID='$this->jId';";
        return mysqli_query($this->jConnection, $query);
    }
    public function selectJobsByAgency() {
        $query = "SELECT * FROM job_info WHERE aID='$this->aId';";
        return mysqli_query($this->jConnection, $query);
    }
    public function selectJobsForNoneEducation() {
        $query = "SELECT * FROM job_info WHERE jEduLevel='None';";
        return mysqli_query($this->jConnection, $query);
    }
    public function selectJobsForPrimaryEducation() {
        $query = "SELECT * FROM job_info WHERE jEduLevel='None' OR jEduLevel='Primary';";
        return mysqli_query($this->jConnection, $query);
    }
    public function selectJobsForSecondaryEducation() {
        $query = "SELECT * FROM job_info WHERE jEduLevel='None' OR jEduLevel='Primary' OR jEduLevel='Secondary';";
        return mysqli_query($this->jConnection, $query);
    }
    public function selectJobsForBachelorEducation() {
        $query = "SELECT * FROM job_info WHERE jEduLevel='None' OR jEduLevel='Primary' OR jEduLevel='Secondary' OR jEduLevel='Bachelor';";
        return mysqli_query($this->jConnection, $query);
    }
    public function selectJobsForMasterEducation() {
        $query = "SELECT * FROM job_info WHERE jEduLevel='None' OR jEduLevel='Primary' OR jEduLevel='Secondary' OR jEduLevel='Bachelor' OR jEduLevel='Master';";
        return mysqli_query($this->jConnection, $query);
    }
    public function selectJobsForDoctorateEducation() {
        $query = "SELECT * FROM job_info WHERE jEduLevel='None' OR jEduLevel='Primary' OR jEduLevel='Secondary' OR jEduLevel='Bachelor' OR jEduLevel='Master' OR jEduLevel='Doctorate';";
        return mysqli_query($this->jConnection, $query);
    }
    public function selectInsertedJobId() {
        return mysqli_insert_id($this->jConnection);
    }
    public function insertJob() : bool {
        $query = "INSERT INTO job_info (jName, jCity, jDistrict, jDeadline, jSalary, jType, jDescription, jEduLevel, jExperienceYear, aID) VALUES ('$this->jName', '$this->jCity', '$this->jDistrict', '$this->jDeadline', '$this->jSalary', '$this->jType', '$this->jDescription', '$this->jEduLevel', '$this->jExperienceYear', '$this->aId');";
        if(mysqli_query($this->jConnection, $query))
            return true;
        else
            return false;
    }
    public function insertJobSkill() : bool {
        $query = "INSERT INTO job_skill (jID, jSkill) VALUES ('$this->jId', '$this->jSkill');";
        if(mysqli_query($this->jConnection, $query))
            return true;
        else
            return false;
    }
    public function updateJob() : bool {
        $query = "UPDATE job_info SET jName='$this->jName', jCity='$this->jCity', jDistrict='$this->jDistrict', jDeadline='$this->jDeadline', jSalary='$this->jSalary', jType='$this->jType', jDescription='$this->jDescription', jEduLevel='$this->jEduLevel', jExperienceYear='$this->jExperienceYear' WHERE jID='$this->jId';";
        if(mysqli_query($this->jConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteJob() : bool {
        $query = "DELETE FROM job_info WHERE jID='$this->jId';";
        if(mysqli_query($this->jConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteJobSkill() : bool {
    $query = "DELETE FROM job_skill WHERE jID='$this->jId';";
    if(mysqli_query($this->jConnection, $query))
        return true;
    else
        return false;
    }
    public function deleteJobsByAgency() : bool {
        $query = "DELETE FROM job_info WHERE aID='$this->aId';";
        if(mysqli_query($this->jConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteJobSkillsByAgency() : bool {
        $query = "DELETE js FROM job_skill js JOIN job_info ji on ji.jID = js.jID WHERE aID='$this->aId';";
        if(mysqli_query($this->jConnection, $query))
            return true;
        else
            return false;
    }
}