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
    <title>Jobs Page</title>
</head>
<body>
<div class="container-fluid">
    <div class="d-flex justify-content-start">
        <h3>Available Jobs</h3>
    </div>
    <div class="row mt-2 g-1">
        <?php
        $i = 0;
        while ($i < count($this->candidateJob)) {
            echo "
            <div class='col col-md-3'>
                <div class='card p-2'>
                    <div class='text-end'>
                        <b>Deadline: </b>
                        <small>". $this->candidateJob[$i]['jobDeadline']. "</small>
                    </div>
                    <div class='text-center mt-2 p-3'>
                        <img src='". $this->candidateJob[$i]['agencyImage'].
                            "' alt='". $this->candidateJob[$i]['agencyName']. "Logo".
                            "' width='100'>
                        <span class='d-block fw-bold'>". $this->candidateJob[$i]['jobName']. "</span>
                        <hr>
                        <span>'". $this->candidateJob[$i]['agencyName']. "</span>
                        <div class='d-flex flex-row align-items-center justify-content-center'>
                            <i class='gg-pin'></i>
                            <small class='ms-1'>". $this->candidateJob[$i]['jobCity'] .", ". $this->candidateJob[$i]['jobDistrict']. "</small>
                        </div>
                        <div class='d-flex justify-content-between mt-3'>
                            <span>Rs.". $this->candidateJob[$i]['jobSalary']. "/m</span>
                            <a href='Candidate/ViewJob?job-id=". $this->candidateJob[$i]['jobId']. "&agency-id=". $this->candidateJob[$i]['agencyId']. "'>
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