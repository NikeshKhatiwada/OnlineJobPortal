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
    <title>Candidate Details Page</title>
</head>
<body>
<div class="job-post-company pt-10 pb-10">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-7 col-lg-8">
                <div class="single-job-items mb-50">
                    <div class="job-items">
                        <div class="company-img company-img-details">
                            <img src="<?php echo $this->candidateInfo["cImage"]?>"
                                 alt="<?php echo $this->candidateInfo["cName"]. " Picture"?>"
                                 class="m-1" width="100">
                        </div>
                        <div class="job-title2">
                            <h4>
                                <?php echo $this->candidateInfo["cName"]?>
                            </h4>
                            <span>
                                <?php
                                if($this->candidateInfo["cGender"] == "M")
                                    echo "Male";
                                else if($this->candidateInfo["cGender"] == "F")
                                    echo "Female";
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="job-post-details">
                    <div class="post-details2 mb-50">
                        <div class="small-section-title2">
                            <h4>Candidate Skills</h4>
                        </div>
                        <ul>
                            <?php
                            $i = 0;
                            while ($i < count($this->candidateSkill)) {
                                echo "<li>". $this->candidateSkill[$i]. "</li>";
                                ++$i;
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="post-details2 mb-50">
                        <div class="small-section-title2">
                            <h4>Candidate Education Level</h4>
                        </div>
                        <ul>
                            <li>
                                <?php echo $this->candidateInfo["cEduLevel"]. " Degree"?>
                            </li>
                        </ul>
                    </div>
                    <div class="post-details2 mb-50">
                        <div class="small-section-title2">
                            <h4>Candidate Experience</h4>
                        </div>
                        <ul>
                            <?php
                            $i = 0;
                            while ($i < count($this->candidateExperience)) {
                                echo "<li>". $this->candidateExperience[$i]["candidateExperienceYear"]. " years experience in ". $this->candidateExperience[$i]["candidateExperience"]. "</li>";
                                ++$i;
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="post-details3 mb-50">
                    <div class="small-section-title2">
                        <h4>Basic Info</h4>
                    </div>
                    <ul>
                        <li>
                            Municipality:
                            <span>
                                <?php echo $this->candidateInfo["cMunicipality"]?>
                            </span>
                        </li>
                        <li>
                            District:
                            <span>
                                <?php echo $this->candidateInfo["cDistrict"]?>
                            </span>
                        </li>
                        <li>
                            Birth Date:
                            <span>
                                <?php echo $this->candidateInfo["cBirthDate"]?>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="post-details4 mb-50">
                    <div class="small-section-title2">
                        <h4>Candidate Contact</h4>
                    </div>
                    <ul>
                        <?php echo $this->candidatePhone?>
                    </ul>
                    <ul>
                        <?php echo $this->candidateEmail?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>