<?php
session_start();
class AgencyController {
    private $agency;
    private $jobController;
    private $applicationController;
    private $candidateController;
    public $agencyInfo;
    public $agencyEmail;
    public $agencyPhone;
    public $agencyType;
    public $agencyJob;
    public $agencyApplication;
    public $jobInfo;
    public $jobSkill;
    public $applicationInfo;
    public $candidateInfo;
    public $candidateEmail;
    public $candidatePhone;
    public $candidateExperience;
    public $candidateSkill;
    function __construct() {
        require_once "/JobPortal/Models/Agency.php";
        $this->agency = new Agency();
        if($_SESSION["user_type"] == "agency") {
            require_once "/JobPortal/Controllers/JobController.php";
            require_once "/JobPortal/Controllers/ApplicationController.php";
            require_once "/JobPortal/Controllers/CandidateController.php";
            $this->jobController = new JobController();
            $this->applicationController = new ApplicationController();
            $this->candidateController = new CandidateController();
        }
    }
    function selectAgencyInfo() {
        $this->agency->setAgencyId($_SESSION["user_id"]);
        $result = $this->agency->selectAgencyInfo();
        $this->agencyInfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    function selectAgencyEmail() {
        $this->agency->setAgencyId($this->agency->getAgencyId());
        $result = $this->agency->selectAgencyEmail();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $this->agencyEmail[$i] = $row["aEmail"];
            ++$i;
        }
    }
    function selectAgencyPhone() {
        $this->agency->setAgencyId($this->agency->getAgencyId());
        $result = $this->agency->selectAgencyPhone();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $this->agencyPhone[$i] = $row["aPhone"];
            ++$i;
        }
    }
    function selectAgencyType() {
        $this->agency->setAgencyId($this->agency->getAgencyId());
        $result = $this->agency->selectAgencyType();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $this->agencyType[$i] = $row["aType"];
            ++$i;
        }
    }
    function selectAgencyInfoById($agencyId) {
        $this->agency->setAgencyId($agencyId);
        $result = $this->agency->selectAgencyInfo();
        $this->agencyInfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    function checkAgencyEmail($agencyEmail) : bool {
        $this->agency->setAgencyEmail($agencyEmail);
        $result = $this->agency->checkAgencyEmail();
        if(mysqli_num_rows($result) > 0)
            return true;
        else
            return false;
    }
    function checkAgencyPhone($agencyPhone) : bool {
        $this->agency->setAgencyPhone($agencyPhone);
        $result = $this->agency->checkAgencyPhone();
        if(mysqli_num_rows($result) > 0)
            return true;
        else
            return false;
    }
    function selectInsertedAgencyId() {
        return $this->agency->selectInsertedAgencyId();
    }
    function insertAgency($agencyName, $agencyCity, $agencyDistrict, $agencyDateOfEstablishment, $agencyPassword, $agencyDescription) : bool {
        $this->agency->setAgencyName($agencyName);
        $this->agency->setAgencyCity($agencyCity);
        $this->agency->setAgencyDistrict($agencyDistrict);
        $this->agency->setAgencyDOE($agencyDateOfEstablishment);
        $this->agency->setAgencyPassword($agencyPassword);
        $this->agency->setAgencyDesc($agencyDescription);
        return $this->agency->insertAgency();
    }
    function insertAgencyImage($agencyId, $agencyImage) : bool {
        $this->agency->setAgencyId($agencyId);
        $this->agency->setAgencyImage($agencyImage);
        return $this->agency->insertAgencyImage();
    }
    function insertAgencyEmail($agencyId, $agencyEmail) : bool {
        $this->agency->setAgencyId($agencyId);
        $this->agency->setAgencyEmail($agencyEmail);
        return $this->agency->insertAgencyEmail();
    }
    function insertAgencyPhone($agencyId, $agencyPhone) : bool {
        $this->agency->setAgencyId($agencyId);
        $this->agency->setAgencyPhone($agencyPhone);
        return $this->agency->insertAgencyPhone();
    }
    function insertAgencyType($agencyId, $agencyType) : bool {
        $this->agency->setAgencyId($agencyId);
        $this->agency->setAgencyType($agencyType);
        return $this->agency->insertAgencyType();
    }
    function updateAgency($agencyId, $agencyName, $agencyCity, $agencyDistrict, $agencyDateOfEstablishment, $agencyDescription) : bool {
        $this->agency->setAgencyId($agencyId);
        $this->agency->setAgencyName($agencyName);
        $this->agency->setAgencyCity($agencyCity);
        $this->agency->setAgencyDistrict($agencyDistrict);
        $this->agency->setAgencyDOE($agencyDateOfEstablishment);
        $this->agency->setAgencyDesc($agencyDescription);
        return $this->agency->updateAgency();
    }
    function deleteAgency($agencyId) : bool {
        $this->agency->setAgencyId($agencyId);
        return $this->agency->deleteAgency();
    }
    function deleteAgencyEmail($agencyId) : bool {
        $this->agency->setAgencyId($agencyId);
        return $this->agency->deleteAgencyEmail();
    }
    function deleteAgencyPhone($agencyId) : bool {
        $this->agency->setAgencyId($agencyId);
        return $this->agency->deleteAgencyPhone();
    }
    function deleteAgencyType($agencyId) : bool {
        $this->agency->setAgencyId($agencyId);
        return $this->agency->deleteAgencyType();
    }
    function selectJobsByAgency() {
        $this->agencyJob = $this->jobController->selectJobsByAgency($this->agency->getAgencyId());
    }
    function selectApplicationsByAgency() {
        $this->agencyApplication = $this->applicationController->selectApplicationsByAgency($this->agency->getAgencyId());
        $i = 0;
        while ($i < count($this->agencyApplication)) {
            $jobId = $this->agencyApplication[$i]["candidateId"];
            $this->jobInfo[$i] = $this->jobController->selectJobInfo($jobId);
            $candidateId = $this->agencyApplication[$i]["candidateId"];
            $this->candidateController->selectCandidateInfoById($candidateId);
            $this->candidateInfo[$i] = $this->candidateController->candidateInfo;
            ++$i;
        }
    }
    function InsertProfile() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $agencyName = $_POST["agency-name"];
            $agencyImageName = "";
            $agencyImageSize = 0;
            if(is_uploaded_file($_FILES["agency-image"]["tmp_name"])) {
                $agencyImageName = $_FILES["agency-image"]["name"];
                $agencyImageTmp = $_FILES["agency-image"]["tmp_name"];
                $agencyImageExtension = strtolower(pathinfo($agencyImageName, PATHINFO_EXTENSION));
                $agencyImageSize = $_FILES["agency-image"]["size"];
            }
            $agencyPassword1 = $_POST["agency-password1"];
            $agencyPassword2 = $_POST["agency-password2"];
            $agencyDescription = $_POST["agency-description"];
            $i = 0;
            $j = 0;
            $agencyType = [];
            while ($i < 6) {
                if(isset($_POST["agency-type". ($i + 1)])) {
                    $agencyType[$j] = $_POST["agency-type". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            $agencyCity = $_POST["agency-city"];
            $agencyDistrict = $_POST["agency-district"];
            $agencyDateOfEstablishment = $_POST["agency-doe"];
            $i = 0;
            $j = 0;
            $agencyPhone = [];
            while ($i < 3) {
                if(isset($_POST["agency-phone". ($i + 1)])) {
                    $agencyPhone[$j] = $_POST["agency-phone". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            $i = 0;
            $j = 0;
            $agencyEmail = [];
            while ($i < 3) {
                if(isset($_POST["agency-email". ($i + 1)])) {
                    $agencyEmail[$j] = $_POST["agency-email". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            if($agencyPassword1 != $agencyPassword2) {
                echo("Both passwords are not same.");
                return;
            }
            if($agencyImageSize != 0 && $agencyImageSize >= 10485760) {
                echo("Image size should be less than 10 MB.");
                return;
            }
            $emailAlreadyUsed = false;
            $i = 0;
            while ($i < count($agencyEmail)) {
                if($agencyEmail[$i] != null && $agencyEmail[$i] != "") {
                    $temp = $this->checkAgencyEmail($agencyEmail[$i]);
                    if($temp) {
                        echo($agencyEmail[$i]. " has been already used by another agency.\n");
                        if(!$emailAlreadyUsed)
                            $emailAlreadyUsed = true;
                    }
                }
                ++$i;
            }
            if($emailAlreadyUsed)
                return;
            $phoneAlreadyUsed = false;
            $i = 0;
            while ($i < count($agencyPhone)) {
                if($agencyPhone[$i] != null && $agencyPhone[$i] != "") {
                    $temp = $this->checkAgencyPhone($agencyPhone[$i]);
                    if($temp) {
                        echo($agencyPhone[$i]. " has been already used by another agency.\n");
                        if(!$phoneAlreadyUsed)
                            $phoneAlreadyUsed = true;
                    }
                }
                ++$i;
            }
            if($phoneAlreadyUsed)
                return;
            $agencyInsertionResult = $this->insertAgency($agencyName, $agencyCity, $agencyDistrict, $agencyDateOfEstablishment, $agencyPassword1, $agencyDescription);
            $agencyImageInsertionResult = true;
            $agencyEmailInsertionResult = true;
            $agencyPhoneInsertionResult = true;
            $agencyTypeInsertionResult = true;
            if($agencyInsertionResult) {
                $agencyId = $this->selectInsertedAgencyId();
                if($agencyImageName != "") {
                    move_uploaded_file($agencyImageTmp, "/JobPortal/Images/Agencies/". $agencyImageName);
                    if(!rename("/JobPortal/Images/Agencies/" . $agencyImageName, "/JobPortal/Images/Agencies/" . $agencyId . "." . $agencyImageExtension))
                        $agencyImageInsertionResult = false;
                    if(!$this->insertAgencyImage($agencyId, "/Images/Agencies/" . $agencyId . "." . $agencyImageExtension))
                        $agencyImageInsertionResult = false;
                }
                $i = 0;
                while ($i < count($agencyEmail)) {
                    if($agencyEmail[$i] != null && $agencyEmail[$i] != "") {
                        $temp = $this->insertAgencyEmail($agencyId, $agencyEmail[$i]);
                        if($agencyEmailInsertionResult)
                            $agencyEmailInsertionResult = $temp;
                    }
                    ++$i;
                }
                $i = 0;
                while ($i < count($agencyPhone)) {
                    if($agencyPhone[$i] != null && $agencyPhone[$i] != "") {
                        $temp = $this->insertAgencyPhone($agencyId, $agencyPhone[$i]);
                        if($agencyPhoneInsertionResult)
                            $agencyPhoneInsertionResult = $temp;
                    }
                    ++$i;
                }
                $i = 0;
                while ($i < count($agencyType)) {
                    if($agencyType[$i] != null && $agencyType[$i] != "") {
                        $temp = $this->insertAgencyType($agencyId, $agencyType[$i]);
                        if($agencyTypeInsertionResult)
                            $agencyTypeInsertionResult = $temp;
                    }
                    ++$i;
                }
            }
            header("Refresh: 6; /Views/Shared/Login.php");
            if($agencyInsertionResult && $agencyImageInsertionResult && $agencyEmailInsertionResult && $agencyPhoneInsertionResult && $agencyTypeInsertionResult) {
                echo "Agency insertion successful.";
            }
            else {
                echo "Agency insertion failed.";
            }
        }
    }
    function UpdateProfile() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $agencyId = $_SESSION["user_id"];
            $agencyName = $_POST["agency-name"];
            $agencyImageName = "";
            $agencyImageSize = 0;
            if(is_uploaded_file($_FILES["agency-image"]["tmp_name"])) {
                $agencyImageName = $_FILES["agency-image"]["name"];
                $agencyImageTmp = $_FILES["agency-image"]["tmp_name"];
                $agencyImageExtension = strtolower(pathinfo($agencyImageName, PATHINFO_EXTENSION));
                $agencyImageSize = $_FILES["agency-image"]["size"];
            }
            $agencyDescription = $_POST["agency-description"];
            $i = 0;
            $j = 0;
            $agencyType = [];
            while ($i < 6) {
                if(isset($_POST["agency-type". ($i + 1)])) {
                    $agencyType[$j] = $_POST["agency-type". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            $agencyCity = $_POST["agency-city"];
            $agencyDistrict = $_POST["agency-district"];
            $agencyDateOfEstablishment = $_POST["agency-doe"];
            $i = 0;
            $j = 0;
            $agencyPhone = [];
            while ($i < 3) {
                if(isset($_POST["agency-phone". ($i + 1)])) {
                    $agencyPhone[$j] = $_POST["agency-phone". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            $i = 0;
            $j = 0;
            $agencyEmail = [];
            while ($i < 3) {
                if(isset($_POST["agency-email". ($i + 1)])) {
                    $agencyEmail[$j] = $_POST["agency-email". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            if($agencyImageSize != 0 && $agencyImageSize >= 10485760) {
                echo("Image size should be less than 10 MB.");
                return;
            }
            $agencyImageInsertionResult = true;
            if($agencyImageName != "") {
                move_uploaded_file($agencyImageTmp, "/JobPortal/Images/Agencies/". $agencyImageName);
                if(!rename("/JobPortal/Images/Agencies/" . $agencyImageName, "/JobPortal/Images/Agencies/" . $agencyId . "." . $agencyImageExtension))
                    $agencyImageInsertionResult = false;
                if(!$this->insertAgencyImage($agencyId, "/Images/Agencies/" . $agencyId . "." . $agencyImageExtension))
                    $agencyImageInsertionResult = false;
            }
            $agencyUpdateResult = $this->updateAgency($agencyId, $agencyName, $agencyCity, $agencyDistrict, $agencyDateOfEstablishment, $agencyDescription);
            $this->deleteAgencyEmail($agencyId);
            $agencyEmailInsertionResult = true;
            if($agencyUpdateResult) {
                $i = 0;
                while ($i < count($agencyEmail)) {
                    if($agencyEmail[$i] != null && $agencyEmail[$i] != "") {
                        $temp = $this->insertAgencyEmail($agencyId, $agencyEmail[$i]);
                        if ($agencyEmailInsertionResult)
                            $agencyEmailInsertionResult = $temp;
                    }
                    ++$i;
                }
            }
            $this->deleteAgencyPhone($agencyId);
            $agencyPhoneInsertionResult = true;
            if($agencyUpdateResult) {
                $i = 0;
                while ($i < count($agencyPhone)) {
                    if($agencyPhone[$i] != null && $agencyPhone[$i] != "") {
                        $temp = $this->insertAgencyPhone($agencyId, $agencyPhone[$i]);
                        if ($agencyPhoneInsertionResult)
                            $agencyPhoneInsertionResult = $temp;
                    }
                    ++$i;
                }
            }
            $this->deleteAgencyType($agencyId);
            $agencyTypeInsertionResult = true;
            if($agencyUpdateResult) {
                $i = 0;
                while ($i < count($agencyType)) {
                    if($agencyType[$i] != null && $agencyType[$i] != "") {
                        $temp = $this->insertAgencyType($agencyId, $agencyType[$i]);
                        if ($agencyTypeInsertionResult)
                            $agencyTypeInsertionResult = $temp;
                    }
                    ++$i;
                }
            }
            header("Refresh: 6; /Views/Agency/Home.php");
            if($agencyUpdateResult && $agencyImageInsertionResult && $agencyEmailInsertionResult && $agencyPhoneInsertionResult && $agencyTypeInsertionResult) {
                echo "Agency update successful.";
            }
            else {
                echo "Agency update failed.";
            }
        }
    }
    function DeleteProfile() {
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            $agencyId = $_GET["agency-id"];
            $agencyApplicationDeletionResult = $this->applicationController->deleteApplicationsByAgency($agencyId);
            $this->jobController->deleteJobSkillsByAgency($agencyId);
            $this->jobController->deleteJobsByAgency($agencyId);
            $this->selectAgencyInfoById($agencyId);
            $this->deleteAgencyEmail($agencyId);
            $this->deleteAgencyPhone($agencyId);
            $this->deleteAgencyType($agencyId);
            $agencyImageDeletionResult = unlink("/JobPortal". $this->agencyInfo["aImage"]);
            $agencyDeletionResult = $this->deleteAgency($agencyId);
            header("Refresh: 6; /Views/Shared/Login.php");
            if($agencyDeletionResult && $agencyImageDeletionResult && $agencyApplicationDeletionResult) {
                session_destroy();
                echo "Agency deletion successful.";
            }
            else {
                echo "Agency deletion failed.";
            }
        }
    }
    function InsertJob() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $jobName = $_POST["job-title"];
            $jobDescription = $_POST["job-info"];
            $i = 0;
            $j = 0;
            $jobSkill = [];
            while ($i < 6) {
                if(isset($_POST["job-skill". ($i + 1)])) {
                    $jobSkill[$j] = $_POST["job-skill". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            $jobEduLevel = $_POST["job-education"];
            $jobExperienceYear = $_POST["job-experience"];
            $jobType = $_POST["job-type"];
            $jobCity = $_POST["job-city"];
            $jobDistrict = $_POST["job-district"];
            $jobSalary = $_POST["job-salary"];
            $jobDeadline = $_POST["job-deadline"];
            $agencyId = $_SESSION["user_id"];
            $jobInsertionResult = $this->jobController->insertJob($jobName, $jobCity, $jobDistrict, $jobDeadline, $jobSalary, $jobType, $jobDescription, $jobEduLevel, $jobExperienceYear, $agencyId);
            $jobSkillInsertionResult = true;
            if($jobInsertionResult) {
                $i = 0;
                $jobId = $this->jobController->selectInsertedJobId();
                while ($i < count($jobSkill)) {
                    if($jobSkill[$i] != null && $jobSkill[$i] != "") {
                        $temp = $this->jobController->insertJobSkill($jobId, $jobSkill[$i]);
                        if ($jobSkillInsertionResult)
                            $jobSkillInsertionResult = $temp;
                    }
                    ++$i;
                }
            }
            header("Refresh: 6; /Views/Agency/Home.php");
            if($jobInsertionResult && $jobSkillInsertionResult) {
                echo "Both Job insertion and Job Skill insertion successful.";
            }
            elseif($jobInsertionResult) {
                echo "Only job insertion successful.";
            }
            else {
                echo "Both Job insertion and Job Skill insertion failed.";
            }
        }
    }
    function UpdateJob() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $jobId = $_GET["job-id"];
            $jobName = $_POST["job-title"];
            $jobDescription = $_POST["job-info"];
            $i = 0;
            $j = 0;
            $jobSkill = [];
            while ($i < 6) {
                if(isset($_POST["job-skill". ($i + 1)])) {
                    $jobSkill[$j] = $_POST["job-skill". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            $jobEduLevel = $_POST["job-education"];
            $jobExperienceYear = $_POST["job-experience"];
            $jobType = $_POST["job-type"];
            $jobCity = $_POST["job-city"];
            $jobDistrict = $_POST["job-district"];
            $jobSalary = $_POST["job-salary"];
            $jobDeadline = $_POST["job-deadline"];
            $jobUpdateResult = $this->jobController->updateJob($jobId, $jobName, $jobCity, $jobDistrict, $jobDeadline, $jobSalary, $jobType, $jobDescription, $jobEduLevel, $jobExperienceYear);
            $this->jobController->deleteJobSkill($jobId);
            $jobSkillInsertionResult = true;
            if($jobUpdateResult) {
                $i = 0;
                while ($i < count($jobSkill)) {
                    if($jobSkill[$i] != null && $jobSkill[$i] != "") {
                        $temp = $this->jobController->insertJobSkill($jobId, $jobSkill[$i]);
                        if ($jobSkillInsertionResult)
                            $jobSkillInsertionResult = $temp;
                    }
                    ++$i;
                }
            }
            header("Refresh: 6; /Views/Agency/Home.php");
            if($jobUpdateResult && $jobSkillInsertionResult) {
                echo "Job update successful.";
            }
            else {
                echo "Job update failed.";
            }
        }
    }
    function DeleteJob() {
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            $jobId = $_GET["job-id"];
            $this->jobController->deleteApplicationsByJob($jobId);
            $this->jobController->deleteJobSkill($jobId);
            $jobDeletionResult = $this->jobController->deleteJob($jobId);
            header("Refresh: 6; /Views/Agency/Home.php");
            if($jobDeletionResult) {
                echo "Job deletion successful.";
            }
            else {
                echo "Job deletion failed.";
            }
        }
    }
    function InsertApplicationReply() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $candidateId = $_GET["candidate-id"];
            $jobId = $_GET["job-id"];
            $applicationStatus = $_POST["submit"];
            $replyLetter = $_POST["replyLetter"];
            $applicationReplyInsertionResult = $this->applicationController->insertApplicationReply($candidateId, $jobId, $applicationStatus, $replyLetter);
            header("Refresh: 6; /Views/Agency/Home.php");
            if($applicationReplyInsertionResult) {
                echo "Job Application Reply insertion successful.";
            }
            else {
                echo "Job Application Reply insertion failed.";
            }
        }
    }
    function UpdateApplicationReply() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $candidateId = $_GET["candidate-id"];
            $jobId = $_GET["job-id"];
            $replyLetter = $_POST["replyLetter"];
            $applicationReplyUpdateResult = $this->applicationController->updateApplicationReply($candidateId, $jobId, $replyLetter);
            header("Refresh: 6; /Views/Agency/Home.php");
            if($applicationReplyUpdateResult) {
                echo "Job Application Reply update successful.";
            }
            else {
                echo "Job Application Reply update failed.";
            }
        }
    }
    function Home() {
        include "Views/Agency/Home.php";
    }
    function Jobs() {
        $this->selectAgencyInfo();
        $this->selectJobsByAgency();
        include "Views/Agency/Jobs.php";
    }
    function Applications() {
        $this->selectAgencyInfo();
        $this->selectApplicationsByAgency();
        include "Views/Agency/Applications.php";
    }
    function Profile() {
        $this->selectAgencyInfo();
        $this->selectAgencyEmail();
        $this->selectAgencyPhone();
        $this->selectAgencyType();
        include "Views/Agency/Agency-profile.php";
    }
    function About() {
        include "Views/Shared/About.php";
    }
    function CreateProfile() {
        include "Views/Agency/Profile-create.php";
    }
    function EditProfile() {
        $this->selectAgencyInfo();
        $this->selectAgencyEmail();
        $this->selectAgencyPhone();
        $this->selectAgencyType();
        include "Views/Agency/Profile-edit.php";
    }
    function ViewJob() {
        $this->selectAgencyInfo();
        $jobId = $_GET["job-id"];
        $this->jobInfo = $this->jobController->selectJobInfo($jobId);
        $this->jobSkill = $this->jobController->selectJobSkill($jobId);
        include "Views/Agency/Job-details.php";
    }
    function CreateJob() {
        $this->selectAgencyInfo();
        include "Views/Agency/Job-create.php";
    }
    function EditJob() {
        $this->selectAgencyInfo();
        $jobId = $_GET["job-id"];
        $this->jobInfo = $this->jobController->selectJobInfo($jobId);
        $this->jobSkill = $this->jobController->selectJobSkill($jobId);
        include "Views/Agency/Job-edit.php";
    }
    function ViewApplication() {
        $this->selectAgencyInfo();
        $candidateId = $_GET["candidate-id"];
        $jobId = $_GET["job-id"];
        $this->candidateController->selectCandidateInfoById($candidateId);
        $this->candidateController->selectCandidateEmail();
        $this->candidateController->selectCandidatePhone();
        $this->jobInfo = $this->jobController->selectJobInfo($jobId);
        $this->applicationInfo = $this->applicationController->selectApplicationInfo($candidateId, $jobId);
        $this->candidateInfo = $this->candidateController->candidateInfo;
        $this->candidateEmail = $this->candidateController->candidateEmail[count($this->candidateController->candidateEmail) - 1];
        $this->candidatePhone = $this->candidateController->candidatePhone[count($this->candidateController->candidatePhone) - 1];
        include "Views/Agency/Application-details.php";
    }
    function CreateApplicationReply() {
        $this->selectAgencyInfo();
        $candidateId = $_GET["candidate-id"];
        $jobId = $_GET["job-id"];
        $this->candidateController->selectCandidateInfoById($candidateId);
        $this->candidateController->selectCandidateEmail();
        $this->candidateController->selectCandidatePhone();
        $this->jobInfo = $this->jobController->selectJobInfo($jobId);
        $this->applicationInfo = $this->applicationController->selectApplicationInfo($candidateId, $jobId);
        $this->candidateInfo = $this->candidateController->candidateInfo;
        $this->candidateEmail = $this->candidateController->candidateEmail[count($this->candidateController->candidateEmail) - 1];
        $this->candidatePhone = $this->candidateController->candidatePhone[count($this->candidateController->candidatePhone) - 1];
        include "Views/Agency/Reply-create.php";
    }
    function EditApplicationReply() {
        $this->selectAgencyInfo();
        $candidateId = $_GET["candidate-id"];
        $jobId = $_GET["job-id"];
        $this->candidateController->selectCandidateInfoById($candidateId);
        $this->candidateController->selectCandidateEmail();
        $this->candidateController->selectCandidatePhone();
        $this->jobInfo = $this->jobController->selectJobInfo($jobId);
        $this->applicationInfo = $this->applicationController->selectApplicationInfo($candidateId, $jobId);
        $this->candidateInfo = $this->candidateController->candidateInfo;
        $this->candidateEmail = $this->candidateController->candidateEmail[count($this->candidateController->candidateEmail) - 1];
        $this->candidatePhone = $this->candidateController->candidatePhone[count($this->candidateController->candidatePhone) - 1];
        include "Views/Agency/Reply-edit.php";
    }
    function ViewCandidate() {
        $candidateId = $_GET["candidate-id"];
        $this->candidateController->selectCandidateInfoById($candidateId);
        $this->candidateController->selectCandidateEmail();
        $this->candidateController->selectCandidatePhone();
        $this->candidateController->selectCandidateExperience();
        $this->candidateController->selectCandidateSkill();
        $this->candidateInfo = $this->candidateController->candidateInfo;
        $this->candidateEmail = $this->candidateController->candidateEmail[count($this->candidateController->candidateEmail) - 1];
        $this->candidatePhone = $this->candidateController->candidatePhone[count($this->candidateController->candidatePhone) - 1];
        $this->candidateExperience = $this->candidateController->candidateExperience;
        $this->candidateSkill = $this->candidateController->candidateSkill;
        include "Views/Agency/Candidate-profile.php";
    }
    function Logout() {
        session_destroy();
        include "Views/Shared/Login.php";
    }
}