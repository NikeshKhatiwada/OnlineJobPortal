<?php
class Application {
    private $appStatus;
    private $appLetter;
    private $replyLetter;
    private $appConnection;
    private $cId;
    private $jId;
    private $aId;
    public function getAppStatus() {
        return $this->appStatus;
    }
    public function setAppStatus($appStatus) {
        $this->appStatus = $appStatus;
    }
    public function getAppLetter() {
        return $this->appLetter;
    }
    public function setAppLetter($appLetter) {
        $this->appLetter = $appLetter;
    }
    public function getReplyLetter() {
        return $this->replyLetter;
    }
    public function setReplyLetter($replyLetter) {
        $this->replyLetter = $replyLetter;
    }
    public function getCandidateId() {
        return $this->cId;
    }
    public function setCandidateId($cId) {
        $this->cId = $cId;
    }
    public function getJobId() {
        return $this->jId;
    }
    public function setJobId($jId) {
        $this->jId = $jId;
    }
    public function getAgencyId() {
        return $this->aId;
    }
    public function setAgencyId($aId) {
        $this->aId = $aId;
    }
    public function __construct() {
        require_once "/JobPortal/Services/Config.php";
        $this->appConnection = Config::getConnection();
    }
    public function selectApplicationInfo() {
        $query = "SELECT * FROM application_info WHERE cID='$this->cId' AND jID='$this->jId';";
        return mysqli_query($this->appConnection, $query);
    }
    public function selectApplicationsByJob() {
        $query = "SELECT * FROM application_info WHERE jID='$this->jId';";
        return mysqli_query($this->appConnection, $query);
    }
    public function selectApplicationsByAgency() {
        $query = "SELECT cID, jID, appStatus, appLetter, replyLetter, aID FROM application_info INNER JOIN agency_info WHERE aID='$this->aId';";
        return mysqli_query($this->appConnection, $query);
    }
    public function selectApplicationsByCandidate() {
        $query = "SELECT * FROM application_info WHERE cId='$this->cId';";
        return mysqli_query($this->appConnection, $query);
    }
    public function insertApplication() : bool {
        $query = "INSERT INTO application_info (cID, jID, appLetter) VALUES ('$this->cId', '$this->jId', '$this->appLetter');";
        if(mysqli_query($this->appConnection, $query))
            return true;
        else
            return false;
    }
    public function insertApplicationReply() : bool {
        $query = "UPDATE application_info SET appStatus='$this->appStatus', replyLetter='$this->replyLetter' WHERE cID='$this->cId' AND jID='$this->jId';";
        if(mysqli_query($this->appConnection, $query))
            return true;
        else
            return false;
    }
    public function updateApplication() : bool {
        $query = "UPDATE application_info SET appLetter='$this->appLetter' WHERE cID='$this->cId' AND jID='$this->jId';";
        if(mysqli_query($this->appConnection, $query))
            return true;
        else
            return false;
    }
    public function updateApplicationReply() : bool {
        $query = "UPDATE application_info SET replyLetter='$this->replyLetter' WHERE cID='$this->cId' AND jID='$this->jId';";
        if(mysqli_query($this->appConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteApplication() : bool {
        $query = "DELETE FROM application_info WHERE cID='$this->cId' AND jID='$this->jId';";
        if(mysqli_query($this->appConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteApplicationsByJob() : bool {
        $query = "DELETE FROM application_info WHERE jID='$this->jId';";
        if(mysqli_query($this->appConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteApplicationsByAgency() : bool {
        $query = "DELETE ai FROM application_info ai INNER JOIN job_info ji on ai.jID = ji.jID WHERE aID='$this->aId';";
        if(mysqli_query($this->appConnection, $query))
            return true;
        else
            return false;
    }
    public function deleteApplicationsByCandidate() : bool {
        $query = "DELETE FROM application_info WHERE cID='$this->cId';";
        if(mysqli_query($this->appConnection, $query))
            return true;
        else
            return false;
    }
}