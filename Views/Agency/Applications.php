<?php
require_once '/JobPortal/Views/Shared/Menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Libraries/Bootstrap/Css/bootstrap.css">
    <script src="/Libraries/Bootstrap/Javascript/bootstrap.js"></script>
    <link rel="stylesheet" href="/Libraries/CssGG/all.css">
    <script src="/Libraries/Javascript/My-applications.js"></script>
    <title>Applications Page</title>
</head>
<body>
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <h3>All Applications</h3>
        <form action="" method="post">
            <label>
                <select id="appStatus" class="form-select form-select-sm" name="vacancyType" onchange="showApplicationStatus()">
                    <option value="all" selected>All</option>
                    <option value="pending">Pending</option>
                    <option value="accepted">Accepted</option>
                </select>
            </label>
        </form>
    </div>
    <div class="row mt-2 g-1">
        <?php
        $i = 0;
        while ($i < count($this->agencyApplication)) {
            echo "
            <div class='col col-md-4'>
                <div class='card p-2'>
                    <div class='text-end'>
                        <b>Deadline: </b>
                        <small>". $this->jobInfo[$i]['jDeadline']. "</small>
                    </div>
                    <div class='text-center mt-2 p-3'>
                        <img src='". $this->candidateInfo[$i]['cImage'].
                            "' alt='". $this->candidateInfo[$i]['cName']. " Photo".
                            "' width='100'>
                        <span class='d-block fw-bold'>". $this->jobInfo[$i]['jName']. "</span>
                        <hr>
                        <div class='d-flex flex-row justify-content-between'>
                            <div class='d-flex flex-column'>
                                <span>
                                    <b>From:</b>
                                </span>
                                <span>". $this->candidateInfo[$i]['cName']. "</span>
                                <div class='d-flex flex-row align-items-center justify-content-center'>
                                    <i class='gg-pin'></i>
                                    <small class='ms-1'>". $this->candidateInfo[$i]['cMunicipality']. ", ". $this->candidateInfo[$i]['cDistrict']. "</small>
                                </div>
                            </div>
                            <div class='d-flex flex-column'>
                                <span>
                                    <b>To:</b>
                                </span>
                                <span>". $this->agencyInfo['aName']. "</span>
                                <div class='d-flex flex-row align-items-center justify-content-center'>
                                    <i class='gg-pin'></i>
                                    <span class='ms-1'>". $this->agencyInfo['aCity']. ", ". $this->agencyInfo['aDistrict']. "</span>
                                </div>
                            </div>
                        </div>
                        <div class='d-flex justify-content-between mt-3'>
                            <span class='fw-bold app-status'>". $this->agencyApplication[$i]['applicationStatus']. "</span>
                            <a href='Agency/ViewApplication?candidate-id=". $this->agencyApplication[$i]['candidateId']. "&job-id=". $this->agencyApplication[$i]['jobId']. "'>
                                <button class='btn btn-sm btn-outline-dark'>Details</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            ";
            ++$i;
        }
        ?>
    </div>
</div>
</body>
</html>