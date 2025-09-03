<?php

$errors = [];
$success = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $company = trim($_POST["company"]);
    $address1 = trim($_POST["address1"]);
    $address2 = trim($_POST["address2"]);
    $city = trim($_POST["city"]);
    $state = trim($_POST["state"]);
    $zip = trim($_POST["zip"]);
    $country = trim($_POST["country"]);
    $phone = trim($_POST["phone"]);
    $fax = trim($_POST["fax"]);
    $email = trim($_POST["email"]);
    $otherAmount = trim($_POST["otherAmount"]);
    $monthlyAmount = trim($_POST["monthlyAmount"]);
    $honoreeName = trim($_POST["honoreeName"]);
    $acknowledgeName = trim($_POST["acknowledgeName"]);
    $acknowledgeAddress = trim($_POST["acknowledgeAddress"]);
    $acknowledgeCity = trim($_POST["acknowledgeCity"]);
    $acknowledgeZip = trim($_POST["acknowledgeZip"]);
    $addName = trim($_POST["addName"]);
    $comments = trim($_POST["comments"]);
 
    
    function onlyLetters($str) {
        for ($i = 0; $i < strlen($str); $i++) {
            $ascii = ord($str[$i]);
            if (!(($ascii >= 65 && $ascii <= 90) || ($ascii >= 97 && $ascii <= 122) || $ascii == 32)) {
                return false;
            }
        }
        return true;
    }
 
    function onlyDigits($str) {
        for ($i = 0; $i < strlen($str); $i++) {
            $ascii = ord($str[$i]);
            if ($ascii < 48 || $ascii > 57) {
                return false;
            }
        }
        return true;
    }
 
    
    if (!onlyLetters($firstName)) {
        $errors[] = "First Name must contain only letters.";
    }
    if (!onlyLetters($lastName)) {
        $errors[] = "Last Name must contain only letters.";
    }
    if (!onlyDigits($phone) || strlen($phone) != 11) {
        $errors[] = "Phone must be exactly 11 digits.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }
    if (!empty($otherAmount) && !onlyDigits($otherAmount)) {
        $errors[] = "Other Amount must be a number.";
    }
    if (!empty($monthlyAmount) && !onlyDigits($monthlyAmount)) {
        $errors[] = "Monthly Amount must be a number.";
    }
    if (!empty($addName) && !onlyLetters($addName)) {
        $errors[] = "Additional Info Name must contain only letters.";
    }
    if (!empty($zip) && !onlyDigits($zip)) {
        $errors[] = "Zip Code must contain only digits.";
    }
    if (!empty($acknowledgeZip) && !onlyDigits($acknowledgeZip)) {
        $errors[] = "Acknowledge Zip Code must contain only digits.";
    }
 
    if (empty($errors)) {
        $success = "Form submitted successfully!";
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Form</title>
    <link rel="stylesheet" href="from.css">
</head>
<body>
<?php if (!empty($errors)): ?>
<script>
    alert("<?php echo implode('\n', $errors); ?>");
</script>
<?php endif; ?>
 
<?php if ($success): ?>
<script>
    alert("<?php echo $success; ?>");
</script>
<?php endif; ?>
 
<h2 style="color: red;" class="head">Donation Form</h2>
<form method="POST" class="donation-from">
    <label class="required font-from">First Name:</label>
    <input type="text" id="firstName" name="firstName" required><br><br>
 
    <label for="lastName" class="required font-from">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required><br><br>
 
    <label for="company" class="font-from">Company:</label>
    <input type="text" id="company" name="company"><br><br>
 
    <label for="address1" class="required font-from">Address 1:</label>
    <input type="text" id="address1" name="address1" required><br><br>
 
    <label for="address2" class="font-from">Address 2:</label>
    <input type="text" id="address2" name="address2"><br><br>
 
    <label for="city" class="required font-from">City:</label>
    <input type="text" id="city" name="city" required><br><br>
 
    <label for="state" class="required font-from">State:</label>
    <select id="state" name="state" required>
        <option value="">Select a State</option>
        <option value="Dhaka">Dhaka</option>
        <option value="cumilla">cumilla</option>
        <option value="rangpur">rangpur</option>
        <option value="chittagong">chittagong</option>
    </select><br><br>
 
    <label for="zip" class="required font-from">Zip Code:</label>
    <input type="text" id="zip" name="zip" required><br><br>
 
    <label for="country" class="required font-from">Country:</label>
    <select id="country" name="country" required>
        <option value="">Select a Country</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="pakistan">pakistan</option>
        <option value="canada">canada</option>
        <option value="india">india</option>
    </select><br><br>
 
    <label for="phone" class="font-from">Phone:</label>
    <input type="tel" id="phone" name="phone" required><br><br>
 
    <label for="fax" class="font-from">Fax:</label>
    <input type="text" id="fax" name="fax"><br><br>
 
    <label for="email" class="required font-from">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
 
    
    <label for="donationAmount" class="font-from">Donation Amount:</label>
    <input type="radio" id="none" name="donationAmount" value="none"> <label for="none">None</label>
    <input type="radio" id="50" name="donationAmount" value="50"> <label for="50">$50</label>
    <input type="radio" id="75" name="donationAmount" value="75"> <label for="75">$75</label>
    <input type="radio" id="100" name="donationAmount" value="100"> <label for="100">$100</label>
    <input type="radio" id="250" name="donationAmount" value="250"> <label for="250">$250</label>
    <input type="radio" id="other" name="donationAmount" value="other"> <label for="other">Other</label><br>

    <p>Check a button or type in your amount</p>
    <label for="other" class="font-from">Other Amount $</label>
    <input type="text" id="otherAmount" name="otherAmount"><br><br>
 
    <label for="recurringDonation" class="font-from">Recurring Donation:</label>
    <input type="checkbox" id="recurringDonation" name="recurringDonation" value="yes">
    <label for="recurringDonation">I am interested in giving on a regular basis.</label><br><br>
 
    <label for="monthlyAmount" class="font-from">Monthly Credit Card Amount:</label>
    <input type="text" id="monthlyAmount" name="monthlyAmount"><br><br>
 
    
    <h1 style="color: red;" class="head">Honorarium and Memorial Donations Information</h1>
    <label class="font-from">I would like to make this donation:</label>
    <input type="radio" name="honorType" value="honor"> <label>To Honor</label><br>
    <input type="radio" name="honorType" value="memory" style="margin-left: 330px;"> <label>In Memory of</label><br><br>
 
    <div class="h-div">
        <label class="font-from">Name:</label>
        <input type="text" id="honoreeName" name="honoreeName"><br><br>
 
        <label class="font-from">Acknowledge Donation to:</label>
        <input type="text" id="acknowledgeName" name="acknowledgeName"><br><br>
 
        <label for="acknowledgeAddress" class="font-from">Address:</label>
        <input type="text" id="acknowledgeAddress" name="acknowledgeAddress"><br><br>
 
        <label for="acknowledgeCity" class="font-from">City:</label>
        <input type="text" id="acknowledgeCity" name="acknowledgeCity"><br><br>
 
        <label for="acknowledgeState" class="font-from">State:</label>
        <select id="country" name="states">
            <option value="">Select a state</option>
            <option value="Dhaka">Dhaka</option>
            <option value="rangpur">rangpur</option>
            <option value="chittagong">chittagong</option>
            <option value="cumilla">cumilla</option>
        </select><br><br>
 
        <label for="acknowledgeZip" class="font-from">Zip Code:</label>
        <input type="text" id="acknowledgeZip" name="acknowledgeZip"><br><br>
    </div>
 
    
    <h1 style="color: red;" class="head">Additional Information</h1>
    <p>Please enter your name, company or organization as you would like it to appear in our publications:</p>
    <div class="h-div">
        <label for="addName" class="font-from">Name</label>
        <input type="text" name="addName"><br>
    </div>
 
    <input type="checkbox" id="anon" name="anon" value="yes"> 
    <label for="anon">I would like my gift to remain anonymous</label><br><br>
 
    <input type="checkbox" id="matchingGift" name="matchingGift" value="yes">
    <label for="matchingGift">My employer offers a matching gift program. I will mail the matching gift form</label><br><br>
 
    <input type="checkbox" id="matchingGift2" name="matchingGift2" value="yes">
    <label for="matchingGift2">Please save the cost of acknowledging this gift by not mailing a thank you later.</label><br><br>
 
    <div class="h-div">
        <label for="comments" class="font-from" style="text-align: center;">Comments:</label>
        <textarea cols="40" rows="4" style="margin-top: 20px;" name="comments"></textarea><br><br>
    </div>
 
    <div class="h-div">
        <label class="font-from">How may we contact you?</label>
        <div>
            <input type="checkbox" id="emailContact" name="contactMethod" value="email"> <label for="emailContact">E-mail</label><br>
            <input type="checkbox" id="mailContact" name="contactMethod" value="mail"> <label for="mailContact">Postal Mail</label><br>
            <input type="checkbox" id="phoneContact" name="contactMethod" value="phone"> <label for="phoneContact">Telephone</label><br>
            <input type="checkbox" name="faxContact" value="fax"> <label>Fax</label> <br><br>
        </div>
    </div>
 
    <p>I would like to receive newsletters and Information about special events by</p>
    <input type="checkbox" name="newsletterEmail" value="email"> <label>E-mail</label><br>
    <input type="checkbox" name="newsletterMail" value="mail"> <label>Postal Mail</label><br>
    <input type="checkbox" name="volunteering" value="yes"> <label>I would like Information about volunteering with the</label><br>
 
    <button type="reset">Reset</button>
    <button type="submit">Continue</button><br>
</form>
</body>
</html>
 