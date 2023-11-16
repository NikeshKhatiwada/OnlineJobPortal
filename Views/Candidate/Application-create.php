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
    <title>Application Creation Page</title>
</head>
<body>
<div class="job-post-company pt-10 pb-10">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-7 col-lg-8">
                <form action="<?php
                echo 'Candidate/InsertApplication?job-id='. $this->jobInfo['jID']
                ?>" method="post">
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <img src="<?php echo $this->agencyInfo["aImage"]?>"
                                     alt="<?php echo $this->agencyInfo["aName"]. " Logo"?>"
                                     width="100">
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
                            <button type="submit" value="submit" class="btn">Submit Application</button>
                        </div>
                    </div>
                    <div class="job-post-details">
                        <div class="post-details2 mb-50">
                            <label for="appLetter" class="small-section-title form-label fs-4 fw-bold">Application For Job</label>
                            <textarea id="appLetter" class="form-control" rows="6" maxlength="400" name="appLetter" autofocus></textarea>
                        </div>
                    </div>
                </form>
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