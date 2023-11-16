<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Libraries/Bootstrap/Css/bootstrap.css">
    <script src="/Libraries/Bootstrap/Javascript/bootstrap.js"></script>
    <link rel="stylesheet" href="/Libraries/Css/My-login.css">
    <script src="/Libraries/Javascript/My-login.js"></script>
    <title>Password Reset Page</title>
</head>
<body class="my-login-page">
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="brand">
                    <img src="/Images/OnlineJobPortal/Logo.jpg" alt="logo">
                </div>
                <div class="card fat">
                    <div class="card-body">
                        <form class="my-login-validation" action="Login/CheckLogin" method="post">
                            <h4 class="card-title">
                                Password Reset
                                <select aria-label="userType" id="user" class="form-select" name="user">
                                    <option value="agency">Agency</option>
                                    <option value="candidate">Candidate</option>
                                </select>
                            </h4>
                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input type="email" id="email" class="form-control" name="email" required autofocus>
                            </div>
                            <div class="form-group m-0">
                                <button type="submit" id="submit" class="btn btn-primary btn-block btn-lg">
                                    Receive Code
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>