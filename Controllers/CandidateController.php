<?php
session_start();
class CandidateController {
    private $candidate;
    private $jobController;
    private $applicationController;
    private $agencyController;
    public $candidateInfo;
    public $candidateEmail;
    public $candidatePhone;
    public $candidateExperience = [];
    public $candidateSkill;
    public $candidateJob;
    public $candidateApplication;
    public $jobInfo;
    public $jobSkill;
    public $applicationInfo;
    public $agencyInfo;
    public $agencyEmail;
    public $agencyPhone;
    public $agencyType;
    function __construct() {
        require_once "/JobPortal/Models/Candidate.php";
        $this->candidate = new Candidate();
        if($_SESSION["user_type"] == "candidate") {
            require_once "/JobPortal/Controllers/JobController.php";
            require_once "/JobPortal/Controllers/ApplicationController.php";
            require_once "/JobPortal/Controllers/AgencyController.php";
            $this->jobController = new JobController();
            $this->applicationController = new ApplicationController();
            $this->agencyController = new AgencyController();
        }
    }
    function selectCandidateInfo() {
        $this->candidate->setCandidateId($_SESSION["user_id"]);
        $result = $this->candidate->selectCandidateInfo();
        $this->candidateInfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    function selectCandidateEmail() {
        $this->candidate->setCandidateId($this->candidate->getCandidateId());
        $result = $this->candidate->selectCandidateEmail();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $this->candidateEmail[$i] = $row["cEmail"];
            ++$i;
        }
    }
    function selectCandidatePhone() {
        $this->candidate->setCandidateId($this->candidate->getCandidateId());
        $result = $this->candidate->selectCandidatePhone();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $this->candidatePhone[$i] = $row["cPhone"];
            ++$i;
        }
    }
    function selectCandidateExperience() {
        $this->candidate->setCandidateId($this->candidate->getCandidateId());
        $result = $this->candidate->selectCandidateExp();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $this->candidateExperience[$i]["candidateExperience"] = $row["cExperience"];
            $this->candidateExperience[$i]["candidateExperienceYear"] = $row["cExperienceYear"];
            ++$i;
        }
    }
    function selectCandidateSkill() {
        $this->candidate->setCandidateId($this->candidate->getCandidateId());
        $result = $this->candidate->selectCandidateSkill();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $this->candidateSkill[$i] = $row["cSkill"];
            ++$i;
        }
    }
    function selectCandidateInfoById($candidateId) {
        $this->candidate->setCandidateId($candidateId);
        $result = $this->candidate->selectCandidateInfo();
        $this->candidateInfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    function checkCandidateEmail($candidateEmail) : bool {
        $this->candidate->setCandidateEmail($candidateEmail);
        $result = $this->candidate->checkCandidateEmail();
        if(mysqli_num_rows($result) > 0)
            return true;
        else
            return false;
    }
    function checkCandidatePhone($candidatePhone) : bool {
        $this->candidate->setCandidatePhone($candidatePhone);
        $result = $this->candidate->checkCandidatePhone();
        if(mysqli_num_rows($result) > 0)
            return true;
        else
            return false;
    }
    function selectInsertedCandidateId() {
        return $this->candidate->selectInsertedCandidateId();
    }
    function insertCandidate($candidateName, $candidateMunicipality, $candidateDistrict, $candidateDateOfBirth, $candidateGender, $candidatePassword, $candidateEduLevel) : bool {
        $this->candidate->setCandidateName($candidateName);
        $this->candidate->setCandidateMunicipality($candidateMunicipality);
        $this->candidate->setCandidateDistrict($candidateDistrict);
        $this->candidate->setCandidateDOB($candidateDateOfBirth);
        $this->candidate->setCandidateGender($candidateGender);
        $this->candidate->setCandidatePassword($candidatePassword);
        $this->candidate->setCandidateEdu($candidateEduLevel);
        return $this->candidate->insertCandidate();
    }
    function insertCandidateImage($candidateId, $candidateImage) : bool {
        $this->candidate->setCandidateId($candidateId);
        $this->candidate->setCandidateImage($candidateImage);
        return $this->candidate->insertCandidateImage();
    }
    function insertCandidateEmail($candidateId, $candidateEmail) : bool {
        $this->candidate->setCandidateId($candidateId);
        $this->candidate->setCandidateEmail($candidateEmail);
        return $this->candidate->insertCandidateEmail();
    }
    function insertCandidatePhone($candidateId, $candidatePhone) : bool {
        $this->candidate->setCandidateId($candidateId);
        $this->candidate->setCandidatePhone($candidatePhone);
        return $this->candidate->insertCandidatePhone();
    }
    function insertCandidateExperience($candidateId, $candidateExperience, $candidateExperienceYear) : bool {
        $this->candidate->setCandidateId($candidateId);
        $this->candidate->setCandidateExp($candidateExperience);
        $this->candidate->setCandidateExpYear($candidateExperienceYear);
        return $this->candidate->insertCandidateExp();
    }
    function insertCandidateSkill($candidateId, $candidateSkill) : bool {
        $this->candidate->setCandidateId($candidateId);
        $this->candidate->setCandidateSkill($candidateSkill);
        return $this->candidate->insertCandidateSkill();
    }
    function updateCandidate($candidateId, $candidateName, $candidateMunicipality, $candidateDistrict, $candidateDateOfBirth, $candidateGender, $candidateEduLevel) : bool {
        $this->candidate->setCandidateId($candidateId);
        $this->candidate->setCandidateName($candidateName);
        $this->candidate->setCandidateMunicipality($candidateMunicipality);
        $this->candidate->setCandidateDistrict($candidateDistrict);
        $this->candidate->setCandidateDOB($candidateDateOfBirth);
        $this->candidate->setCandidateGender($candidateGender);
        $this->candidate->setCandidateEdu($candidateEduLevel);
        return $this->candidate->updateCandidate();
    }
    function deleteCandidate($candidateId) : bool {
        $this->candidate->setCandidateId($candidateId);
        return $this->candidate->deleteCandidate();
    }
    function deleteCandidateEmail($candidateId) : bool {
        $this->candidate->setCandidateId($candidateId);
        return $this->candidate->deleteCandidateEmail();
    }
    function deleteCandidatePhone($candidateId) : bool {
        $this->candidate->setCandidateId($candidateId);
        return $this->candidate->deleteCandidatePhone();
    }
    function deleteCandidateExp($candidateId) : bool {
        $this->candidate->setCandidateExp($candidateId);
        return $this->candidate->deleteCandidateExp();
    }
    function deleteCandidateSkill($candidateId) : bool {
        $this->candidate->setCandidateId($candidateId);
        return $this->candidate->deleteCandidateSkill();
    }
    function selectJobsByEduLevel() {
        $this->candidateJob = $this->jobController->selectJobsByEduLevel($this->candidateInfo["cEduLevel"]);
    }
    function selectApplicationsByCandidate() {
        $this->candidateApplication = $this->applicationController->selectApplicationsByCandidate($this->candidate->getCandidateId());
        $i = 0;
        while ($i < count($this->candidateApplication)) {
            $jobId = $this->candidateApplication[$i]["jobId"];
            $this->jobInfo[$i] = $this->jobController->selectJobInfo($jobId);
            $agencyId = $this->jobInfo[$i]["aID"];
            $this->agencyController->selectAgencyInfoById($agencyId);
            $this->agencyInfo[$i] = $this->agencyController->agencyInfo;
            ++$i;
        }
    }
    function InsertProfile() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $candidateName = $_POST["candidate-name"];
            $candidateImageName = "";
            $candidateImageSize = 0;
            if(is_uploaded_file($_FILES["candidate-image"]["tmp_name"])) {
                $candidateImageName = $_FILES["candidate-image"]["name"];
                $candidateImageTmp = $_FILES["candidate-image"]["tmp_name"];
                $candidateImageExtension = strtolower(pathinfo($candidateImageName, PATHINFO_EXTENSION));
                $candidateImageSize = $_FILES["candidate-image"]["size"];
            }
            $candidatePassword1 = $_POST["candidate-password1"];
            $candidatePassword2 = $_POST["candidate-password2"];
            $i = 0;
            $j = 0;
            $candidateSkill = [];
            while ($i < 6) {
                if(isset($_POST["candidate-skill". ($i + 1)])) {
                    $candidateSkill[$j] = $_POST["candidate-skill". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            $candidateEduLevel = $_POST["candidate-education"];
            $i = 0;
            $j = 0;
            $candidateExperience = [];
            $candidateExperienceYear = [];
            while ($i < 3) {
                if(isset($_POST["candidate-experience". ($i + 1). "-year"]) && isset($_POST["candidate-experience". ($i + 1)])) {
                    $candidateExperienceYear[$j] = $_POST["candidate-experience". ($i + 1). "-year"];
                    $candidateExperience[$j] = $_POST["candidate-experience". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            $candidateGender = $_POST["candidate-gender"];
            $candidateMunicipality = $_POST["candidate-municipality"];
            $candidateDistrict = $_POST["candidate-district"];
            $candidateDateOfBirth = $_POST["candidate-dob"];
            $i = 0;
            $j = 0;
            $candidatePhone = [];
            while ($i < 3) {
                if(isset($_POST["candidate-phone". ($i + 1)])) {
                    $candidatePhone[$j] = $_POST["candidate-phone". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            $i = 0;
            $j = 0;
            $candidateEmail = [];
            while ($i < 3) {
                if(isset($_POST["candidate-email". ($i + 1)])) {
                    $candidateEmail[$j] = $_POST["candidate-email". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            if($candidatePassword1 != $candidatePassword2) {
                echo("Both passwords are not same.");
                return;
            }
            if($candidateImageSize != 0 && $candidateImageSize >= 10485760) {
                echo("Image size should be less than 10 MB.");
                return;
            }
            $emailAlreadyUsed = false;
            $i = 0;
            while ($i < count($candidateEmail)) {
                if($candidateEmail[$i] != null && $candidateEmail[$i] != "") {
                    $temp = $this->checkCandidateEmail($candidateEmail[$i]);
                    if ($temp) {
                        echo($candidateEmail[$i]. " has been already used by another candidate.\n");
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
            while ($i < count($candidatePhone)) {
                if($candidatePhone[$i] != null && $candidatePhone[$i] != "") {
                    $temp = $this->checkCandidatePhone($candidatePhone[$i]);
                    if ($temp) {
                        echo($candidatePhone[$i]. " has been already used by another candidate.\n");
                        if(!$phoneAlreadyUsed)
                            $phoneAlreadyUsed = true;
                    }
                }
                ++$i;
            }
            if($phoneAlreadyUsed)
                return;
            $candidateInsertionResult = $this->insertCandidate($candidateName, $candidateMunicipality, $candidateDistrict, $candidateDateOfBirth, $candidateGender, $candidatePassword1, $candidateEduLevel);
            $candidateImageInsertionResult = true;
            $candidateEmailInsertionResult = true;
            $candidatePhoneInsertionResult = true;
            $candidateExperienceInsertionResult = true;
            $candidateSkillInsertionResult = true;
            if($candidateInsertionResult) {
                $candidateId = $this->selectInsertedCandidateId();
                if($candidateImageName != "") {
                    move_uploaded_file($candidateImageTmp, "/JobPortal/Images/Candidates/". $candidateImageName);
                    if(!rename("/JobPortal/Images/Candidates/" . $candidateImageName, "/JobPortal/Images/Candidates/" . $candidateId . "." . $candidateImageExtension))
                        $candidateImageInsertionResult = false;
                    if(!$this->insertCandidateImage($candidateId, "/Images/Candidates/" . $candidateId . "." . $candidateImageExtension))
                        $candidateImageInsertionResult = false;
                }
                $i = 0;
                while ($i < count($candidateEmail)) {
                    if($candidateEmail[$i] != null && $candidateEmail[$i] != "") {
                        $temp = $this->insertCandidateEmail($candidateId, $candidateEmail[$i]);
                        if($candidateEmailInsertionResult)
                            $candidateEmailInsertionResult = $temp;
                    }
                    ++$i;
                }
                $i = 0;
                while ($i < count($candidatePhone)) {
                    if($candidatePhone[$i] != null && $candidatePhone[$i] != "") {
                        $temp = $this->insertCandidatePhone($candidateId, $candidatePhone[$i]);
                        if($candidatePhoneInsertionResult)
                            $candidatePhoneInsertionResult = $temp;
                    }
                    ++$i;
                }
                $i = 0;
                while ($i < count($candidateExperience) && $i < count($candidateExperienceYear)) {
                    if($candidateExperience[$i] != null && $candidateExperience[$i] != "" && $candidateExperienceYear[$i] != null && $candidateExperienceYear[$i] != "") {
                        $temp = $this->insertCandidateExperience($candidateId, $candidateExperience[$i], $candidateExperienceYear[$i]);
                        if($candidateExperienceInsertionResult)
                            $candidateExperienceInsertionResult = $temp;
                    }
                    ++$i;
                }
                $i = 0;
                while ($i < count($candidateSkill)) {
                    if($candidateSkill[$i] != null && $candidateSkill[$i] != "") {
                        $temp = $this->insertCandidateSkill($candidateId, $candidateSkill[$i]);
                        if ($candidateSkillInsertionResult)
                            $candidateSkillInsertionResult = $temp;
                    }
                    ++$i;
                }
            }
            header("Refresh: 6; /Views/Shared/Login.php");
            if($candidateInsertionResult && $candidateImageInsertionResult && $candidateEmailInsertionResult && $candidatePhoneInsertionResult && $candidateExperienceInsertionResult && $candidateSkillInsertionResult) {
                echo "Candidate insertion successful.";
            }
            else {
                echo "Candidate insertion failed.";
            }
        }
    }
    function UpdateProfile() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $candidateId = $_SESSION["user_id"];
            $candidateName = $_POST["candidate-name"];
            $candidateImageName = "";
            $candidateImageSize = 0;
            if(is_uploaded_file($_FILES["candidate-image"]["tmp_name"])) {
                $candidateImageName = $_FILES["candidate-image"]["name"];
                $candidateImageTmp = $_FILES["candidate-image"]["tmp_name"];
                $candidateImageExtension = strtolower(pathinfo($candidateImageName, PATHINFO_EXTENSION));
                $candidateImageSize = $_FILES["candidate-image"]["size"];
            }
            $i = 0;
            $j = 0;
            $candidateSkill = [];
            while ($i < 6) {
                if(isset($_POST["candidate-skill". ($i + 1)])) {
                    $candidateSkill[$j] = $_POST["candidate-skill". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            $candidateEduLevel = $_POST["candidate-education"];
            $i = 0;
            $j = 0;
            $candidateExperience = [];
            $candidateExperienceYear = [];
            while ($i < 3) {
                if(isset($_POST["candidate-experience". ($i + 1). "-year"]) && isset($_POST["candidate-experience". ($i + 1)])) {
                    $candidateExperienceYear[$j] = $_POST["candidate-experience". ($i + 1). "-year"];
                    $candidateExperience[$j] = $_POST["candidate-experience". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            $candidateGender = $_POST["candidate-gender"];
            $candidateMunicipality = $_POST["candidate-municipality"];
            $candidateDistrict = $_POST["candidate-district"];
            $candidateDateOfBirth = $_POST["candidate-dob"];
            $i = 0;
            $j = 0;
            $candidatePhone = [];
            while ($i < 3) {
                if(isset($_POST["candidate-phone". ($i + 1)])) {
                    $candidatePhone[$j] = $_POST["candidate-phone". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            $i = 0;
            $j = 0;
            $candidateEmail = [];
            while ($i < 3) {
                if(isset($_POST["candidate-email". ($i + 1)])) {
                    $candidateEmail[$j] = $_POST["candidate-email". ($i + 1)];
                    ++$j;
                }
                ++$i;
            }
            if($candidateImageSize != 0 && $candidateImageSize >= 10485760) {
                echo("Image size should be less than 10 MB.");
                return;
            }
            $candidateImageInsertionResult = true;
            if($candidateImageName != "") {
                move_uploaded_file($candidateImageTmp, "/JobPortal/Images/Candidates/". $candidateImageName);
                if(!rename("/JobPortal/Images/Candidates/" . $candidateImageName, "/JobPortal/Images/Candidates/" . $candidateId . "." . $candidateImageExtension))
                    $candidateImageInsertionResult = false;
                if(!$this->insertCandidateImage($candidateId, "/Images/Candidates/" . $candidateId . "." . $candidateImageExtension))
                    $candidateImageInsertionResult = false;
            }
            $candidateUpdateResult = $this->updateCandidate($candidateId, $candidateName, $candidateMunicipality, $candidateDistrict, $candidateDateOfBirth, $candidateGender, $candidateEduLevel);
            $this->deleteCandidateEmail($candidateId);
            $candidateEmailInsertionResult = true;
            if($candidateUpdateResult) {
                $i = 0;
                while ($i < count($candidateEmail)) {
                    if($candidateEmail[$i] != null && $candidateEmail[$i] != "") {
                        $temp = $this->insertCandidateEmail($candidateId, $candidateEmail[$i]);
                        if ($candidateEmailInsertionResult)
                            $candidateEmailInsertionResult = $temp;
                    }
                    ++$i;
                }
            }
            $this->deleteCandidatePhone($candidateId);
            $candidatePhoneInsertionResult = true;
            if($candidateUpdateResult) {
                $i = 0;
                while ($i < count($candidatePhone)) {
                    if($candidatePhone[$i] != null && $candidatePhone[$i] != "") {
                        $temp = $this->insertCandidatePhone($candidateId, $candidatePhone[$i]);
                        if ($candidatePhoneInsertionResult)
                            $candidatePhoneInsertionResult = $temp;
                    }
                    ++$i;
                }
            }
            $this->deleteCandidateExp($candidateId);
            $candidateExperienceInsertionResult = true;
            if($candidateUpdateResult) {
                $i = 0;
                while ($i < count($candidateExperience) && $i < count($candidateExperienceYear)) {
                    if($candidateExperience[$i] != null && $candidateExperience[$i] != "" && $candidateExperienceYear[$i] != null && $candidateExperienceYear[$i] != "") {
                        $temp = $this->insertCandidateExperience($candidateId, $candidateExperience[$i], $candidateExperienceYear[$i]);
                        if ($candidateExperienceInsertionResult)
                            $candidateExperienceInsertionResult = $temp;
                    }
                    ++$i;
                }
            }
            $this->deleteCandidateSkill($candidateId);
            $candidateSkillInsertionResult = true;
            if($candidateUpdateResult) {
                $i = 0;
                while ($i < count($candidateSkill)) {
                    if($candidateSkill[$i] != null && $candidateSkill[$i] != "") {
                        $temp = $this->insertCandidateSkill($candidateId, $candidateSkill[$i]);
                        if ($candidateSkillInsertionResult)
                            $candidateSkillInsertionResult = $temp;
                    }
                    ++$i;
                }
            }
            header("Refresh: 6; /Views/Candidate/Home.php");
            if($candidateUpdateResult && $candidateImageInsertionResult && $candidateEmailInsertionResult && $candidatePhoneInsertionResult && $candidateExperienceInsertionResult && $candidateSkillInsertionResult) {
                echo "Candidate update successful.";
            }
            else {
                echo "Candidate update failed.";
            }
        }
    }
    function DeleteProfile() {
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            $candidateId = $_GET["candidate-id"];
            $candidateApplicationDeletionResult = $this->applicationController->deleteApplicationsByCandidate($candidateId);
            $this->selectCandidateInfoById($candidateId);
            $this->deleteCandidateEmail($candidateId);
            $this->deleteCandidatePhone($candidateId);
            $this->deleteCandidateExp($candidateId);
            $this->deleteCandidateSkill($candidateId);
            $candidateImageDeletionResult = unlink("/JobPortal". $this->candidateInfo["cImage"]);
            $candidateDeletionResult = $this->deleteCandidate($candidateId);
            header("Refresh: 6; /Views/Shared/Login.php");
            if($candidateDeletionResult && $candidateImageDeletionResult && $candidateApplicationDeletionResult) {
                session_destroy();
                echo "Candidate deletion successful.";
            }
            else {
                echo "Candidate deletion failed.";
            }
        }
    }
    function InsertApplication() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $candidateId = $_SESSION["user_id"];
            $jobId = $_GET["job-id"];
            $applicationLetter = $_POST["appLetter"];
            $applicationInsertionResult = $this->applicationController->insertApplication($candidateId, $jobId, $applicationLetter);
            header("Refresh: 6; /Views/Candidate/Home.php");
            if($applicationInsertionResult) {
                echo "Job Application insertion successful.";
            }
            else {
                echo "Job Application insertion failed.";
            }
        }
    }
    function UpdateApplication() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $candidateId = $_SESSION["user_id"];
            $jobId = $_GET["job-id"];
            $applicationLetter = $_POST["appLetter"];
            $applicationUpdateResult = $this->applicationController->updateApplication($candidateId, $jobId, $applicationLetter);
            header("Refresh: 6; /Views/Candidate/Home.php");
            if($applicationUpdateResult) {
                echo "Job Application update successful.";
            }
            else {
                echo "Job Application update failed.";
            }
        }
    }
    function DeleteApplication() {
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            $candidateId = $_SESSION["user_id"];
            $jobId = $_GET["job-id"];
            $applicationDeletionResult = $this->applicationController->deleteApplication($candidateId, $jobId);
            header("Refresh: 6; /Views/Candidate/Home.php");
            if($applicationDeletionResult) {
                echo "Job Application deletion successful.";
            }
            else {
                echo "Job Application deletion failed.";
            }
        }
    }
    function Home() {
        include "Views/Candidate/Home.php";
    }
    function Jobs() {
        $this->selectCandidateInfo();
        $this->selectJobsByEduLevel();
        include "Views/Candidate/Jobs.php";
    }
    function Applications() {
        $this->selectCandidateInfo();
        $this->selectApplicationsByCandidate();
        include "Views/Candidate/Applications.php";
    }
    function Profile() {
        $this->selectCandidateInfo();
        $this->selectCandidateEmail();
        $this->selectCandidatePhone();
        $this->selectCandidateExperience();
        $this->selectCandidateSkill();
        include "Views/Candidate/Candidate-profile.php";
    }
    function About() {
        include "Views/Shared/About.php";
    }
    function CreateProfile() {
        include "Views/Candidate/Profile-create.php";
    }
    function EditProfile() {
        $this->selectCandidateInfo();
        $this->selectCandidateEmail();
        $this->selectCandidatePhone();
        $this->selectCandidateExperience();
        $this->selectCandidateSkill();
        include "Views/Candidate/Profile-edit.php";
    }
    function ViewJob() {
        $jobId = $_GET["job-id"];
        $agencyId = $_GET["agency-id"];
        $this->agencyController->selectAgencyInfoById($agencyId);
        $this->agencyController->selectAgencyEmail();
        $this->jobInfo = $this->jobController->selectJobInfo($jobId);
        $this->jobSkill = $this->jobController->selectJobSkill($jobId);
        $this->agencyInfo = $this->agencyController->agencyInfo;
        $this->agencyEmail = $this->agencyController->agencyEmail[count($this->agencyController->agencyEmail) - 1];
        include "Views/Candidate/Job-details.php";
    }
    function ViewApplication() {
        $this->selectCandidateInfo();
        $candidateId = $this->candidateInfo["cID"];
        $jobId = $_GET["job-id"];
        $jobInfo = $this->jobController->selectJobInfo($jobId);
        $agencyId = $jobInfo["aID"];
        $this->agencyController->selectAgencyInfoById($agencyId);
        $this->agencyController->selectAgencyEmail();
        $this->agencyController->selectAgencyPhone();
        $this->jobInfo = $this->jobController->selectJobInfo($jobId);
        $this->applicationInfo = $this->applicationController->selectApplicationInfo($candidateId, $jobId);
        $this->agencyInfo = $this->agencyController->agencyInfo;
        $this->agencyEmail = $this->agencyController->agencyEmail[count($this->agencyController->agencyEmail) - 1];
        $this->agencyPhone = $this->agencyController->agencyPhone[count($this->agencyController->agencyPhone) - 1];
        include "Views/Candidate/Application-details.php";
    }
    function CreateApplication() {
        $this->selectCandidateInfo();
        $candidateId = $this->candidateInfo["cID"];
        $jobId = $_GET["job-id"];
        $jobInfo = $this->jobController->selectJobInfo($jobId);
        $agencyId = $jobInfo["aID"];
        $this->agencyController->selectAgencyInfoById($agencyId);
        $this->agencyController->selectAgencyEmail();
        $this->agencyController->selectAgencyPhone();
        $this->jobInfo = $this->jobController->selectJobInfo($jobId);
        $this->agencyInfo = $this->agencyController->agencyInfo;
        $this->agencyEmail = $this->agencyController->agencyEmail[count($this->agencyController->agencyEmail) - 1];
        $this->agencyPhone = $this->agencyController->agencyPhone[count($this->agencyController->agencyPhone) - 1];
        include "Views/Candidate/Application-create.php";
    }
    function EditApplication() {
        $this->selectCandidateInfo();
        $candidateId = $this->candidateInfo["cID"];
        $jobId = $_GET["job-id"];
        $jobInfo = $this->jobController->selectJobInfo($jobId);
        $agencyId = $jobInfo["aID"];
        $this->agencyController->selectAgencyInfoById($agencyId);
        $this->agencyController->selectAgencyEmail();
        $this->agencyController->selectAgencyPhone();
        $this->jobInfo = $this->jobController->selectJobInfo($jobId);
        $this->applicationInfo = $this->applicationController->selectApplicationInfo($candidateId, $jobId);
        $this->agencyInfo = $this->agencyController->agencyInfo;
        $this->agencyEmail = $this->agencyController->agencyEmail[count($this->agencyController->agencyEmail) - 1];
        $this->agencyPhone = $this->agencyController->agencyPhone[count($this->agencyController->agencyPhone) - 1];
        include "Views/Candidate/Application-edit.php";
    }
    function ViewAgency() {
        $agencyId = $_GET["agency-id"];
        $this->agencyController->selectAgencyInfoById($agencyId);
        $this->agencyController->selectAgencyEmail();
        $this->agencyController->selectAgencyPhone();
        $this->agencyController->selectAgencyType();
        $this->agencyInfo = $this->agencyController->agencyInfo;
        $this->agencyEmail = $this->agencyController->agencyEmail[count($this->agencyController->agencyEmail) - 1];
        $this->agencyPhone = $this->agencyController->agencyPhone[count($this->agencyController->agencyPhone) - 1];
        $this->agencyType = $this->agencyController->agencyType;
        include "Views/Candidate/Agency-profile.php";
    }
    function Logout() {
        session_destroy();
        include "Views/Shared/Login.php";
    }
}
