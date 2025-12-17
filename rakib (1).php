<?php
session_start();
 
$data = [
    "fname"=>"","lname"=>"","gender"=>"","father"=>"","mother"=>"",
    "blood"=>"","religion"=>"","email"=>"","phone"=>"","website"=>"",
    "country"=>"","city"=>"","address"=>"","postcode"=>"",
    "username"=>"","password"=>"","confirm"=>""
];
 
if(isset($_SESSION["draft"])) {
    $data = $_SESSION["draft"];
}
 
if($_SERVER["REQUEST_METHOD"]=="POST") {
    foreach($data as $k=>$v) {
        $data[$k] = $_POST[$k] ?? "";
    }
 
    if(isset($_POST["draft"])) {
        $_SESSION["draft"] = $data;
    }
 
    if(isset($_POST["register"])) {
        $_SESSION["final"] = $data;
        unset($_SESSION["draft"]);
        echo "<h3>Registration Successful</h3>";
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
 
<style>
.container{
    display:flex;
    gap:20px;
}
fieldset{
    width:33%;
}
</style>
 
</head>
<body>
 
<h2>Registration</h2>
 
<form method="post">
 
<div class="container">
 
<fieldset>
<legend>General Information</legend>
 
First Name:<br>
<input type="text" name="fname" value="<?= $data["fname"] ?>"><br><br>
 
Last Name:<br>
<input type="text" name="lname" value="<?= $data["lname"] ?>"><br><br>
 
Gender:<br>
<input type="radio" name="gender" value="Male" <?= $data["gender"]=="Male"?"checked":"" ?>>Male
<input type="radio" name="gender" value="Female" <?= $data["gender"]=="Female"?"checked":"" ?>>Female<br><br>
 
Father Name:<br>
<input type="text" name="father" value="<?= $data["father"] ?>"><br><br>
 
Mother Name:<br>
<input type="text" name="mother" value="<?= $data["mother"] ?>"><br><br>
 
Blood Group:<br>
<select name="blood">
<option value="">Select</option>
<option <?= $data["blood"]=="A+"?"selected":"" ?>>A+</option>
<option <?= $data["blood"]=="B+"?"selected":"" ?>>B+</option>
<option <?= $data["blood"]=="O+"?"selected":"" ?>>O+</option>
</select><br><br>
 
Religion:<br>
<select name="religion">
<option value="">Select</option>
<option <?= $data["religion"]=="Islam"?"selected":"" ?>>Islam</option>
<option <?= $data["religion"]=="Hindu"?"selected":"" ?>>Hindu</option>
</select>
 
</fieldset>
 
 
<fieldset>
<legend>Contact Information</legend>
 
Email:<br>
<input type="text" name="email" value="<?= $data["email"] ?>"><br><br>
 
Phone:<br>
<input type="text" name="phone" value="<?= $data["phone"] ?>"><br><br>
 
Website:<br>
<input type="text" name="website" value="<?= $data["website"] ?>"><br><br>
 
Country:<br>
<select name="country">
<option <?= $data["country"]=="Bangladesh"?"selected":"" ?>>Bangladesh</option>
</select><br><br>
 
City:<br>
<select name="city">
<option <?= $data["city"]=="Dhaka"?"selected":"" ?>>Dhaka</option>
</select><br><br>
 
Address:<br>
<textarea name="address"><?= $data["address"] ?></textarea><br><br>
 
Post Code:<br>
<input type="text" name="postcode" value="<?= $data["postcode"] ?>">
 
</fieldset>
 
 
<fieldset>
<legend>Account Information</legend>
 
Username:<br>
<input type="text" name="username" value="<?= $data["username"] ?>"><br><br>
 
Password:<br>
<input type="password" name="password" value="<?= $data["password"] ?>"><br><br>
 
Confirm Password:<br>
<input type="password" name="confirm" value="<?= $data["confirm"] ?>">
 
</fieldset>
 
</div>
 
<br>
 
<input type="submit" name="register" value="Register">
<input type="submit" name="draft" value="Save as Draft">
 
</form>
 
</body>
</html>
 