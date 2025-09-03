<?php
 
$errors = [];
$success = false;
 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST['roll'])) $errors[] = "Roll number is required";
    if (empty($_POST['fname']) || empty($_POST['lname'])) $errors[] = "Full name is required";
    if (empty($_POST['father'])) $errors[] = "Father's name is required";
    if (empty($_POST['day']) || empty($_POST['month']) || empty($_POST['year'])) $errors[] = "Date of birth is required";
    if (empty($_POST['phone'])) $errors[] = "Mobile number is required";
    if (empty($_POST['email'])) {
        $errors[] = "Email is required";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (empty($_POST['password'])) $errors[] = "Password is required";
    if (empty($_POST['gender'])) $errors[] = "Gender is required";
    if (empty($_POST['dept'])) $errors[] = "Select at least one department";
    if (empty($_POST['course'])) $errors[] = "Select a course";
    if (empty($_POST['city'])) $errors[] = "City is required";
    if (empty($_POST['address'])) $errors[] = "Address is required";
 

    if (empty($errors)) {
        $success = true;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Student Registration Form</title>
<style>
    body {background:#fcd5d5; font-family:Arial, sans-serif;}
    h1 {text-align:center;}
    form {width:600px; margin:0 auto; background:#fff2f2; padding:20px; border-radius:8px;}
    .row {margin-bottom:12px;}
    label {display:inline-block; width:150px;}
    input, select, textarea {padding:6px; width:60%;}
    .error {color:red; margin-bottom:10px;}
    .success {color:green; font-weight:bold; margin-bottom:10px;}
</style>
</head>
<body>
    <h1>Student Registration Form</h1>
    
    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach($errors as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php elseif ($success): ?>
        <div class="success">Form submitted successfully!</div>
    <?php endif; ?>
 
    <form method="post" enctype="multipart/form-data">
        
        <div class="row">
            <label>Roll no. :</label>
            <input type="text" name="roll" value="<?= $_POST['roll'] ?? '' ?>" placeholder="Please Enter your roll">
        </div>
        
        <div class="row">
            <label>Student name :</label>
            <input type="text" name="fname" placeholder="First Name" value="<?= $_POST['fname'] ?? '' ?>" style="width: 50%;"> -
            <input type="text" name="lname" placeholder="Last Name" value="<?= $_POST['lname'] ?? '' ?>" style="width: 50%; margin-top: 10px; margin-left: 154px ;">
        </div>
        
        <div class="row">
            <label>Father's name :</label>
            <input type="text" name="father" value="<?= $_POST['father'] ?? '' ?>" placeholder="father name">
        </div>
 
        
 
        <div class="row">
            <label>Date of birth :</label>
            <input type="text" name="day" placeholder="Day" value="<?= $_POST['day'] ?? '' ?>" style="width: 50%;"> -
            <input type="text" name="month" placeholder="Month" value="<?= $_POST['month'] ?? '' ?>" style="width: 50%; margin-top: 10px; margin-left: 154px ;"> -
            <input type="text" name="year" placeholder="Year" value="<?= $_POST['year'] ?? '' ?>" style="width: 50%; margin-top: 10px; margin-left: 154px ;">
            (DD-MM-YYYY)
        </div>
 
        
        <div class="row">
            <label>Mobile no. :</label>
            +880 <input type="text" name="phone" value="<?= $_POST['phone'] ?? '' ?>" placeholder="phone number" style="width: 50%;">
        </div>
    
        <div class="row">
            <label>Email id :</label>
            <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>" placeholder="email">
        </div>
        
        <div class="row">
            <label>Password :</label>
            <input type="password" name="password">
        </div>
        
        <div class="row">
            <label>Gender :</label> <br>
            <input type="radio" name="gender" value="Male" <?= (($_POST['gender'] ?? '')=="Male")?"checked":"" ?>>Male
            <input type="radio" name="gender" value="Female" <?= (($_POST['gender'] ?? '')=="Female")?"checked":""?>>Female
        </div>
        
        <div class="row">
            <label>Department :</label> <br>
            <input type="checkbox" name="dept[]" value="CSE" <?= (isset($_POST['dept']) && in_array("CSE",$_POST['dept']))?"checked":"" ?>> CSE
            <input type="checkbox" name="dept[]" value="IT" <?= (isset($_POST['dept']) && in_array("IT",$_POST['dept']))?"checked":"" ?>> IT
            <input type="checkbox" name="dept[]" value="ECE" <?= (isset($_POST['dept']) && in_array("ECE",$_POST['dept']))?"checked":"" ?>> ECE
            <input type="checkbox" name="dept[]" value="Civil" <?= (isset($_POST['dept']) && in_array("Civil",$_POST['dept']))?"checked":"" ?>> Civil
            <input type="checkbox" name="dept[]" value="Mech" <?= (isset($_POST['dept']) && in_array("Mech",$_POST['dept']))?"checked":"" ?>> Mech
        </div>
        
 
        <div class="row">
            <label>Course :</label>
            <select name="course">
                <option value="">-- Select Current Course --</option>
                <?php
                $courses = ["B.Tech","B.Sc","M.Tech","MCA","MBA"];
                foreach($courses as $c) {
                    $sel = (($_POST['course'] ?? '')==$c)?"selected":"";
                    echo "<option value='$c' $sel>$c</option>";
                }
                ?>
            </select>
        </div>
        
        <div class="row">
            <label>Student photo :</label>
            <input type="file" name="photo">
        </div>

        <div class="row">
            <label>City :</label>
            <input type="text" name="city" value="<?= $_POST['city'] ?? '' ?>">
        </div>
        
        <div class="row">
            <label>Address :</label>
            <textarea name="address"><?= $_POST['address'] ?? '' ?></textarea>
        </div>
        
        <div class="row" style="text-align:center;">
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>
 
 