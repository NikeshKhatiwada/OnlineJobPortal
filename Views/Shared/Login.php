<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Libraries/Bootstrap/Css/bootstrap.css">
    <script src="/Libraries/Bootstrap/Javascript/bootstrap.js"></script>
    <link rel="stylesheet" href="/Libraries/Css/My-login.css">
    <script src="/Libraries/Javascript/My-login.js"></script>
    <title>Login Page</title>
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
                                Login
                                <select id="user" class="form-select" name="user" onchange="changeRegistrationLink()">
                                    <option value="agency">Agency</option>
                                    <option value="candidate">Candidate</option>
                                </select>
                            </h4>
                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input type="email" id="email" class="form-control" name="email" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <!--
                                <a href="" class="float-end">
                                    Forgot Password?
                                </a>
                                -->
                                <input type="password" id="password" class="form-control" name="password" required data-eye>
                            </div>
                            <div class="form-group m-0">
                                <button type="submit" id="submit" class="btn btn-primary btn-block btn-lg">
                                    Login
                                </button>
                            </div>
                            <div class="mt-4 text-center">
                                Don't have account?
                                <a class="register-agency" id="register-agency" href="Agency/CreateProfile">
                                    Create
                                </a>
                                <a class="register-candidate" id="register-candidate" href="Candidate/CreateProfile">
                                    Create
                                </a>
                                <script>showAgencyRegistrationLink()</script>
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