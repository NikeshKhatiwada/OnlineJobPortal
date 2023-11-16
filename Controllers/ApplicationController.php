<?php
session_start();
class ApplicationController {
    private $application;
    public $jobApplication = [];
    public $agencyApplication = [];
    public $candidateApplication = [];
    function __construct() {
        require_once "/JobPortal/Models/Application.php";
        $this->application = new Application();
        require_once "/JobPortal/Controllers/JobController.php";
    }
    function selectApplicationInfo($candidateId, $jobId) {
        $this->application->setCandidateId($candidateId);
        $this->application->setJobId($jobId);
        $result = $this->application->selectApplicationInfo();
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    function selectApplicationsByJob($jobId) : array {
        $this->application->setJobId($jobId);
        $result = $this->application->selectApplicationsByJob();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $this->agencyApplication[$i]["candidateId"] = $row["cID"];
            ++$i;
        }
        return $this->jobApplication;
    }
    function selectApplicationsByAgency($agencyId) : array {
        $this->application->setAgencyId($agencyId);
        $result = $this->application->selectApplicationsByAgency();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $jobId = $row["jID"];
            $this->agencyApplication[$i]["candidateId"] = $row["cID"];
            $this->agencyApplication[$i]["jobId"] = $row["jID"];
            if($row["appStatus"] == "P")
                $this->agencyApplication[$i]["applicationStatus"] = "Pending";
            elseif($row["appStatus"] == "A")
                $this->agencyApplication[$i]["applicationStatus"] = "Accepted";
            if($row["appStatus"] == "R")
                $this->agencyApplication[$i]["applicationStatus"] = "Rejected";
            ++$i;
        }
        return $this->agencyApplication;
    }
    function selectApplicationsByCandidate($candidateId) : array {
        $this->application->setCandidateId($candidateId);
        $result = $this->application->selectApplicationsByCandidate();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $jobId = $row["jID"];
            $this->candidateApplication[$i]["jobId"] = $row["jID"];
            if($row["appStatus"] == "P")
                $this->candidateApplication[$i]["applicationStatus"] = "Pending";
            elseif($row["appStatus"] == "A")
                $this->candidateApplication[$i]["applicationStatus"] = "Accepted";
            if($row["appStatus"] == "R")
                $this->candidateApplication[$i]["applicationStatus"] = "Rejected";
            ++$i;
        }
        return $this->candidateApplication;
    }
    function insertApplication($candidateId, $jobId, $applicationLetter) : bool {
        $this->application->setCandidateId($candidateId);
        $this->application->setJobId($jobId);
        $this->application->setAppLetter($applicationLetter);
        return $this->application->insertApplication();
    }
    function insertApplicationReply($candidateId, $jobId, $applicationStatus, $replyLetter) : bool {
        $this->application->setCandidateId($candidateId);
        $this->application->setJobId($jobId);
        $this->application->setAppStatus($applicationStatus);
        $this->application->setReplyLetter($replyLetter);
        return $this->application->insertApplicationReply();
    }
    function updateApplication($candidateId, $jobId, $applicationLetter) : bool {
        $this->application->setCandidateId($candidateId);
        $this->application->setJobId($jobId);
        $this->application->setAppLetter($applicationLetter);
        return $this->application->updateApplication();
    }
    function updateApplicationReply($candidateId, $jobId, $replyLetter) : bool {
        $this->application->setCandidateId($candidateId);
        $this->application->setJobId($jobId);
        $this->application->setReplyLetter($replyLetter);
        return $this->application->updateApplicationReply();
    }
    function deleteApplication($candidateId, $jobId) : bool {
        $this->application->setCandidateId($candidateId);
        $this->application->setJobId($jobId);
        return $this->application->deleteApplication();
    }
    function deleteApplicationsByJob($jobId) : bool {
        $this->application->setJobId($jobId);
        return $this->application->deleteApplicationsByJob();
    }
    function deleteApplicationsByAgency($agencyId) : bool {
        $this->application->setAgencyId($agencyId);
        return $this->application->deleteApplicationsByAgency();
    }
    function deleteApplicationsByCandidate($candidateId) : bool {
        $this->application->setCandidateId($candidateId);
        return $this->application->deleteApplicationsByCandidate();
    }
}