<?php
require_once '/JobPortal/Views/Shared/Menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Libraries/Bootstrap/Css/bootstrap.css">
    <script src="/Libraries/Bootstrap/Javascript/bootstrap.js"></script>
    <link rel="stylesheet" href="/Libraries/Css/Job-style.css">
    <title>Application Details Page</title>
</head>
<body>
<div class="job-post-company pt-10 pb-10">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-7 col-lg-8">
                <div class="single-job-items mb-50">
                    <div class="job-items">
                        <div class="company-img company-img-details">
                            <a href="<?php echo "Candidate/ViewAgency?agency-id=". $this->agencyInfo["aID"]?>">
                                <img src="<?php echo $this->agencyInfo["aImage"]?>"
                                     alt="<?php echo $this->agencyInfo["aName"]. " Logo"?>"
                                     width="100">
                            </a>
                        </div>
                        <div class="job-title">
                            <a href="<?php echo "Candidate/ViewJob?job-id=". $this->jobInfo["jID"]. "&agency-id=". $this->agencyInfo["aID"]?>">
                                <h4>
                                    <?php echo $this->jobInfo["jName"]?>
                                </h4>
                            </a>
                            <ul>
                                <li>
                                    <?php echo $this->agencyInfo["aName"]?>
                                </li>
                                <li>
                                    <span class="fw-bold">Status: </span>
                                    <span>
                                        <?php
                                        if($this->applicationInfo["appStatus"] == "P")
                                            echo "Pending";
                                        else if($this->applicationInfo["appStatus"] == "A")
                                            echo "Accepted";
                                        else if($this->applicationInfo["appStatus"] == "R")
                                            echo "Rejected";
                                        ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="justify-content-end">
                        <a href="<?php echo "Candidate/EditApplication?job-id=". $this->jobInfo["jID"]?>"
                           class="btn">Edit Application</a>
                    </div>
                </div>
                <div class="job-post-details">
                    <div class="post-details2 mb-50">
                        <div class="small-section-title">
                            <h4>Application For Job</h4>
                        </div>
                        <p>
                            <?php echo $this->applicationInfo["appLetter"]?>
                        </p>
                    </div>
                    <?php
                    if($this->applicationInfo["replyLetter"] != null && $this->applicationInfo["replyLetter"] != "") {
                        echo "
                        <div class='post-details2 mb-50'>
                            <div class='small-section-title'>
                                <h4>Reply To Application</h4>
                            </div>
                            <p>". $this->applicationInfo['replyLetter']. "</p>
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="post-details3 mb-50">
                    <div class="small-section-title">
                        <h4>Job Overview</h4>
                    </div>
                    <ul>
                        <li>
                            Type:
                            <span>
                                <?php echo $this->jobInfo["jType"]?>
                            </span>
                        </li>
                        <li>
                            City:
                            <span>
                                <?php echo $this->jobInfo["jCity"]?>
                            </span>
                        </li>
                        <li>
                            District:
                            <span>
                                <?php echo $this->jobInfo["jDistrict"]?>
                            </span>
                        </li>
                        <li>
                            Salary:
                            <span>
                                <?php echo "Rs.". $this->jobInfo["jSalary"]. " monthly"?>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="post-details4 mb-50">
                    <div class="small-section-title">
                        <h4>Agency Information</h4>
                    </div>
                    <ul>
                        <li>
                            Name:
                            <span>
                                <?php echo $this->agencyInfo["aName"]?>
                            </span>
                        </li>
                        <li>
                            Phone:
                            <span>
                                <?php echo $this->agencyPhone?>
                            </span>
                        </li>
                        <li>
                            Email:
                            <span>
                                <?php echo $this->agencyEmail?>
                            </span>
                        </li>
                        <li>
                            Address:
                            <span>
                                <?php echo $this->agencyInfo["aCity"]. ", ". $this->agencyInfo["aDistrict"]?>
                            </span>
                        </li>
                        <li>
                            Established:
                            <span>
                                <?php echo $this->agencyInfo["aEstablishmentDate"]?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>