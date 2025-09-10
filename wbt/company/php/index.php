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
 
        ul{
            display: flex;
            gap: 10px;
 
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
            <ul>
                <li><a href="public_home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Registration</a></li>
            </ul>
        </nav>
        </div>
    </header>
    <hr>
 
    <main class="title">
        <h2>Welcome to XCompany</h2>
    </main>
    <hr>
 
    <footer>
        <p>Copyright © 2017</p>
    </footer>
</body>
</html>
 
 