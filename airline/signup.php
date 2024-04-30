<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    <style>
        .navbar-custom .navbar-nav-first > li > a:hover,
        .navbar-custom .navbar-nav-first > li.active > a {
            color: #fff !important; 
            background-color: #000 !important; 
        }
        .navbar-custom {
            border-color: #000 !important; border: none !important; 
        }
    </style>
    
    <section class="navbar custom-navbar navbar-fixed-top navbar-custom" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
            </div>
    
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-nav-first">
                    <li><a href="home.php">Home</a></li>
                    <li class="active"><a href="divider.php">Sign Up</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </section>

    <div class="container">
        <section id="section1">
            <div class="title text-center" style="font-weight: bold; font-size: 24px; margin-bottom: 20px;"> Sign Up </div>

            <div class="signup-form">
                <form action="signup_process.php" method="post">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="passport">Passport No:</label>
                        <input type="text" name="passport" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="nid">NID:</label>
                        <input type="text" name="nid" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" name="date_of_birth" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="country">Country:</label>
                        <input type="text" name="country" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="phone_no">Phone No:</label>
                        <input type="number" name="phone_no" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
            </div>
        </section>
    </div>

    <script src="js/custom.js"></script>

</body>
</html>