<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Libraries/Bootstrap/Css/bootstrap.css">
    <script src="/Libraries/Bootstrap/Javascript/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="/Libraries/Css/My-menu.css">
</head>
<?php
session_start();
$userType = "";
if($_SESSION["user_type"] == "agency")
    $userType = "Agency";
else if($_SESSION["user_type"] == "candidate")
    $userType = "Candidate";
?>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
   <div class="container-fluid">
        <img src="/Images/OnlineJobPortal/HorizontalLogo.png" alt="My Job Portal" class="img-fluid navbar-brand">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
       <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
           <div class="navbar-nav">
               <a href="<?php echo $userType. "/Home"?>"
                  class="nav-link">Home</a>
               <a href="<?php echo $userType. "/Jobs"?>"
                  class="nav-link">Jobs</a>
               <a href="<?php echo $userType. "/Applications"?>"
                  class="nav-link">Applications</a>
               <a href="<?php echo $userType. "/Profile"?>"
                  class="nav-link">Profile</a>
               <a href="<?php echo $userType. "/About"?>"
                  class="nav-link">About</a>
               <a href="<?php echo $userType. "/Logout"?>"
                  class="nav-link">Logout</a>
           </div>
       </div>
   </div>
</nav>
</body>
</html>