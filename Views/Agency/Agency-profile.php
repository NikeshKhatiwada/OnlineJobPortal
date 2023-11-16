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
    <title>Agency Details Page</title>
</head>
<body>
<div class="job-post-company pt-10 pb-10">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-7 col-lg-8">
                <div class="single-job-items mb-50">
                    <div class="job-items">
                        <div class="company-img company-img-details">
                            <img src="<?php echo $this->agencyInfo["aImage"]?>"
                                 alt="<?php echo $this->agencyInfo["aName"]. " Logo"?>"
                                 class="m-1" width="100">
                        </div>
                        <div class="job-title2">
                            <h4>
                                <?php echo $this->agencyInfo["aName"]?>
                            </h4>
                        </div>
                    </div>
                    <div class="justify-content-end">
                        <a href="Agency/EditProfile" class="btn">Edit Profile</a>
                    </div>
                </div>
                <div class="job-post-details">
                    <div class="post-details2 mb-50">
                        <div class="small-section-title2">
                            <h4>Agency Description</h4>
                        </div>
                        <p>
                            <?php echo $this->agencyInfo["aDescription"]?>
                        </p>
                    </div>
                    <div class="post-details2 mb-50">
                        <div class="small-section-title2">
                            <h4>Agency Type</h4>
                        </div>
                        <ul>
                            <?php
                            $i = 0;
                            while ($i < count($this->agencyType)) {
                                echo "<li>". $this->agencyType[$i]. "</li>";
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
                            City:
                            <span>
                                <?php echo $this->agencyInfo["aCity"]?>
                            </span>
                        </li>
                        <li>
                            District:
                            <span>
                                <?php echo $this->agencyInfo["aDistrict"]?>
                            </span>
                        </li>
                        <li>
                            Established Date:
                            <span>
                                <?php echo $this->agencyInfo["aEstablishmentDate"]?>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="post-details4 mb-50">
                    <div class="small-section-title2">
                        <h4>Agency Phones</h4>
                    </div>
                    <ul>
                        <?php
                        $i = 0;
                        while ($i < count($this->agencyPhone)) {
                            echo "<li>". $this->agencyPhone[$i]. "</li>";
                            ++$i;
                        }
                        ?>
                    </ul>
                </div>
                <div class="post-details4 mb-50">
                    <div class="small-section-title2">
                        <h4>Agency Emails</h4>
                    </div>
                    <ul>
                        <?php
                        $i = 0;
                        while ($i < count($this->agencyEmail)) {
                            echo "<li>". $this->agencyEmail[$i]. "</li>";
                            ++$i;
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>