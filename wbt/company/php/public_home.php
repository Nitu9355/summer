<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Home - XCompany</title>
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
                <li><a href="edit-profile.php">Edit Profile</a></li>
                <li><a href="">Change Profile Picture</a></li>
                <li><a href="">Change Password</a></li>
                <li><a href="">Logout</a></li>
            </ul>
        </div>
        <div>
            <h1>Welcome Nitu</h1>
 
        </div>
    </main>
    <hr>
 
    <footer>
        <p>Copyright © 2017</p>
    </footer>
</body>
</html>
 
 
 