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
    <link rel="stylesheet" href="/Libraries/CssGG/all.css">
    <script src="/Libraries/Javascript/My-jobs.js"></script>
    <title>Jobs Page</title>
</head>
<body>
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <h3>All Job Vacancies</h3>
        <form action="" method="post">
            <label>
                <select id="vacancyType" class="form-select form-select-sm" name="vacancyType" onchange="showJobAvailability()">
                    <option value="all" selected>All</option>
                    <option value="available">Available</option>
                    <option value="expired">Expired</option>
                </select>
            </label>
            <a href="Agency/CreateJob" class="btn btn-sm btn-outline-dark">Add Job</a>
        </form>
    </div>
    <div class="row mt-2 g-1">
        <?php
        $i = 0;
        while ($i < count($this->agencyJob)) {
            echo "
            <div class='col col-md-3'>
                <div class='card p-2'>
                    <div class='text-end'>
                        <b>Status: </b>
                        <span class='job-status'>". $this->agencyJob[$i]['jobAvailability']. "</span>
                    </div>
                    <div class='text-end'>
                        <b>Deadline: </b>
                        <small class='job-deadline'>". $this->agencyJob[$i]['jobDeadline']. "</small>
                    </div>
                    <div class='text-center mt-2 p-3'>
                        <img src='". $this->agencyInfo['aImage'].
                            "' alt='". $this->agencyInfo['aName']. " Logo".
                            "' class='m-1' width='100'>
                        <span class='d-block fw-bold'>". $this->agencyJob[$i]['jobName']. "</span>
                        <hr>
                        <span>". $this->agencyInfo['aName']. "</span>
                        <div class='d-flex flex-row align-items-center justify-content-center'>
                               <i class='gg-pin'></i>
                               <small class='ms-1'>". $this->agencyJob[$i]['jobCity']. ", ". $this->agencyJob[$i]['jobDistrict']. "</small>
                        </div>
                        <div class='d-flex justify-content-end mt-3'>
                            <a href='Agency/ViewJob?job-id=". $this->agencyJob[$i]['jobId']. "'>
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