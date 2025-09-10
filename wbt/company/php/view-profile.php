<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Home - XCompany</title>
    <!-- font awasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .navigation-container{
            display: flex;
            justify-content: space-between;
        }
        header div nav ul li{
            list-style: none;
        }
        footer{
            text-align: center;
        }
       
        .title{
            margin-bottom: 20px;
            height: 100px;
        }
        .company-name{
            display: flex;
        }
        .name-container{
            display: flex;
            gap: 20px;

        }
        .navbar{
            display: flex;
            gap: 10px;
        }
        .profile-div{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

    </style>
</head>
<body>
    <header>
        <div class="navigation-container">
        <div class="company-name">
            <img src="icons8-x-50.png" alt="">
        <h1 class="name"><span style="color: green;"></span>Company</h1>
        </div>
        <nav>
            <ul class="navbar">
                <li><a href="public_home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Registration</a></li>
            </ul>
        </nav>
        </div>
    </header>
    <hr>

    <main class="name-container">
        <div style="width: 30%; border-right: 1px solid black;">
            <h1>Account</h1>
            <hr>

            <ul>
                <li><a href="">DashBoard</a></li>
                <li><a href="view-profile.php">View Profile</a></li>
                <li><a href="">Edit Profile</a></li>
                <li><a href="">Change Profile Picture</a></li>
                <li><a href="">Change Password</a></li>
                <li><a href="">Logout</a></li>
            </ul>
        </div>
        <div style="width: 50%;">
            <fieldset>
                <legend>PROFILE</legend>
                <div class="profile-div">
                    <div style="width: 50%;">
                    <label> Name:  Nitu</label> <br> <br>
                    <hr>
                    <label> Email:  nitu@gmail.com</label> <br> <br>
                    <hr>
                    <label>Gender: Female</label> <br> <br>
                    <hr>
                    <label>Date of Birth: 18/02/2004</label>

                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>

                    <a href="change.php">Change</a>
                </div>

                </div>
                <hr>
                <a href="edit-profile.php">Edit Profile</a>
            </fieldset>

        </div>
    </main>
    <hr>

    <footer>
        <p>Copyright © 2017</p>
    </footer>
</body>
</html>

