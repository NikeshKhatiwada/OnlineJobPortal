<?php
session_start();
class LoginController {
    private $user;
    function __construct() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST["user"] == "agency") {
                require_once "/JobPortal/Models/Agency.php";
                $this->user = new Agency();
            }
            else if($_POST["user"] == "candidate") {
                require_once "/JobPortal/Models/Candidate.php";
                $this->user = new Candidate();
            }
        }
    }
    function Login() {
        include "Views/Shared/Login.php";
    }
    function CheckLogin() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $userType = $_POST["user"];
            if(empty($email) || empty($password))
                die("Email or password is empty.");
            else {
                $rowCount = 0;
                $result = "";
                if($userType == "agency") {
                    $this->user->setAgencyEmail($email);
                    $this->user->setAgencyPassword($password);
                    $result = $this->user->checkAgency();
                    $rowCount = mysqli_num_rows($result);
                }
                if($userType == "candidate") {
                    $this->user->setCandidateEmail($email);
                    $this->user->setCandidatePassword($password);
                    $result = $this->user->checkCandidate();
                    $rowCount = mysqli_num_rows($result);
                }
                if($rowCount == 0) {
                    header("Refresh: 6; /Views/Shared/Login.php");
                    echo "Invalid email or password. Login failed";
                }
                else {
                    $userId = mysqli_fetch_array($result, MYSQLI_NUM)[0];
                    $_SESSION["user_type"] = $userType;
                    $_SESSION["user_id"] = $userId;
                    if($userType == "agency")
                        header("Location: /Views/Agency/Home.php");
                    if($userType == "candidate")
                        header("Location: /Views/Candidate/Home.php");
                }
            }
        }
    }
}