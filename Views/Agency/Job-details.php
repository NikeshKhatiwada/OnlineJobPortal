<?php
require_once '/JobPortal/Views/Shared/Menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="stylesheet" href="/Libraries/Bootstrap/Css/bootstrap.css">
    <script src="/Libraries/Bootstrap/Javascript/bootstrap.js"></script>
    <link rel="stylesheet" href="/Libraries/Css/Job-style.css">
    <title>Job Details Page</title>
</head>
<body>
<div class="job-post-company pt-10 pb-10">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-7 col-lg-8">
                <div class="single-job-items mb-50">
                    <div class="job-items">
                        <div class="company-img company-img-details">
                            <a href="Agency/Profile">
                                <img src="<?php echo $this->agencyInfo["aImage"]?>"
                                     alt="<?php echo $this->agencyInfo["aName"]. " Logo"?>"
                                     class="m-1" width="100">
                            </a>
                        </div>
                        <div class="job-title">
                            <h4>
                                <?php echo $this->jobInfo["jName"]?>
                            </h4>
                            <span>
                                <?php echo $this->agencyInfo["aName"]?>
                            </span>
                        </div>
                    </div>
                    <div class="justify-content-end">
                        <a href="<?php echo "Agency/EditJob?job-id=". $this->jobInfo["jID"] ?>"
                           class="btn">Edit Job Vacancy</a>
                    </div>
                </div>
                <div class="job-post-details">
                    <div class="post-details2 mb-50">
                        <div class="small-section-title">
                            <h4>Job Description</h4>
                        </div>
                        <p>
                            <?php echo $this->jobInfo["jDescription"]?>
                        </p>
                    </div>
                    <div class="post-details2 mb-50">
                        <div class="small-section-title">
                            <h4>Required Skills</h4>
                        </div>
                        <ul>
                            <?php
                            $i = 0;
                            while ($i < count($this->jobSkill)) {
                                echo "<li>". $this->jobSkill[$i]. "</li>";
                                ++$i;
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="post-details2 mb-50">
                        <div class="small-section-title">
                            <h4>Education and Experience</h4>
                        </div>
                        <ul>
                            <li>
                                <?php echo $this->jobInfo["jEduLevel"]. " Degree or Higher"?>
                            </li>
                            <li>
                                <?php echo $this->jobInfo["jExperienceYear"]. " years experience needed"?>
                            </li>
                        </ul>
                    </div>
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
                        <li id="jobCity1">
                            City:
                            <span id="jobCity">
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
                        <li>
                            Deadline:
                            <span>
                                <?php echo $this->jobInfo["jDeadline"]?>
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