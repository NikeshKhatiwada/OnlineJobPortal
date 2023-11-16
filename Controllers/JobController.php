<?php
session_start();
class JobController {
    private $job;
    private $applicationController;
    private $agencyController;
    private $jobSkill;
    private $agencyJob = [];
    private $candidateJob = [];
    function __construct() {
        require_once "/JobPortal/Models/Job.php";
        require_once "/JobPortal/Controllers/ApplicationController.php";
        $this->job = new Job();
        $this->applicationController = new ApplicationController();
        if($_SESSION["user_type"] == "candidate") {
            require_once "/JobPortal/Controllers/AgencyController.php";
            $this->agencyController = new AgencyController();
        }
    }
    function selectJobInfo($jobId) {
        $this->job->setJobId($jobId);
        $result = $this->job->selectJobInfo();
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    function selectJobSkill($jobId) {
        $this->job->setJobId($jobId);
        $result = $this->job->selectJobSkill();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $this->jobSkill[$i] = $row["jSkill"];
            ++$i;
        }
        return $this->jobSkill;
    }
    function selectJobsByAgency($agencyId): array
    {
        $this->job->setAgencyId($agencyId);
        $result = $this->job->selectJobsByAgency();
        $currentDate = date('Y-m-d');
        $i = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $this->agencyJob[$i]["jobId"] = $row["jID"];
            $this->agencyJob[$i]["jobName"] = $row["jName"];
            $this->agencyJob[$i]["jobCity"] = $row["jCity"];
            $this->agencyJob[$i]["jobDistrict"] = $row["jDistrict"];
            $this->agencyJob[$i]["jobDeadline"] = $row["jDeadline"];
            if($this->agencyJob[$i]["jobDeadline"] >= $currentDate)
                $this->agencyJob[$i]["jobAvailability"] = "Available";
            else
                $this->agencyJob[$i]["jobAvailability"] = "Expired";
            ++$i;
        }
        return $this->agencyJob;
    }
    function selectJobsByEduLevel($candidateEduLevel) : array {
        if($candidateEduLevel == "None")
            $result = $this->job->selectJobsForNoneEducation();
        elseif($candidateEduLevel == "Primary")
            $result = $this->job->selectJobsForPrimaryEducation();
        elseif($candidateEduLevel == "Secondary")
            $result = $this->job->selectJobsForSecondaryEducation();
        elseif($candidateEduLevel == "Bachelor")
            $result = $this->job->selectJobsForBachelorEducation();
        elseif($candidateEduLevel == "Master")
            $result = $this->job->selectJobsForMasterEducation();
        elseif($candidateEduLevel == "Doctorate")
            $result = $this->job->selectJobsForDoctorateEducation();
        $currentDate = date('Y-m-d');
        $i = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            if($row["jDeadline"] >= $currentDate) {
                $this->candidateJob[$i]["jobId"] = $row["jID"];
                $agencyId = $row["aID"];
                $this->agencyController->selectAgencyInfoById($agencyId);
                $this->candidateJob[$i]["agencyId"] = $this->agencyController->agencyInfo["aID"];
                $this->candidateJob[$i]["agencyName"] = $this->agencyController->agencyInfo["aName"];
                $this->candidateJob[$i]["agencyImage"] = $this->agencyController->agencyInfo["aImage"];
                $this->candidateJob[$i]["jobName"] = $row["jName"];
                $this->candidateJob[$i]["jobCity"] = $row["jCity"];
                $this->candidateJob[$i]["jobDistrict"] = $row["jDistrict"];
                $this->candidateJob[$i]["jobDeadline"] = $row["jDeadline"];
                $this->candidateJob[$i]["jobSalary"] = $row["jSalary"];
                ++$i;
            }
        }
        return $this->candidateJob;
    }
    function selectInsertedJobId() {
        return $this->job->selectInsertedJobId();
    }
    function insertJob($jobName, $jobCity, $jobDistrict, $jobDeadline, $jobSalary, $jobType, $jobDescription, $jobEduLevel, $jobExperienceYear, $agencyId) : bool {
        $this->job->setJobName($jobName);
        $this->job->setJobCity($jobCity);
        $this->job->setJobDistrict($jobDistrict);
        $this->job->setJobDeadline($jobDeadline);
        $this->job->setJobSalary($jobSalary);
        $this->job->setJobType($jobType);
        $this->job->setJobDesc($jobDescription);
        $this->job->setJobEdu($jobEduLevel);
        $this->job->setJobExp($jobExperienceYear);
        $this->job->setAgencyId($agencyId);
        return $this->job->insertJob();
    }
    function insertJobSkill($jobId, $jobSkill) : bool {
        $this->job->setJobId($jobId);
        $this->job->setJobSkill($jobSkill);
        return $this->job->insertJobSkill();
    }
    function updateJob($jobId, $jobName, $jobCity, $jobDistrict, $jobDeadline, $jobSalary, $jobType, $jobDescription, $jobEduLevel, $jobExperienceYear) : bool {
        $this->job->setJobId($jobId);
        $this->job->setJobName($jobName);
        $this->job->setJobCity($jobCity);
        $this->job->setJobDistrict($jobDistrict);
        $this->job->setJobDeadline($jobDeadline);
        $this->job->setJobSalary($jobSalary);
        $this->job->setJobType($jobType);
        $this->job->setJobDesc($jobDescription);
        $this->job->setJobEdu($jobEduLevel);
        $this->job->setJobExp($jobExperienceYear);
        return $this->job->updateJob();
    }
    function deleteJob($jobId) : bool {
        $this->job->setJobId($jobId);
        return $this->job->deleteJob();
    }
    function deleteJobSkill($jobId) : bool {
        $this->job->setJobId($jobId);
        return $this->job->deleteJobSkill();
    }
    function deleteApplicationsByJob($jobId) : bool {
        return $this->applicationController->deleteApplicationsByJob($jobId);
    }
    function deleteJobsByAgency($agencyId) : bool {
        $this->job->setAgencyId($agencyId);
        return $this->job->deleteJobsByAgency();
    }
    function deleteJobSkillsByAgency($agencyId) : bool {
        $this->job->setAgencyId($agencyId);
        return $this->job->deleteJobSkillsByAgency();
    }
}