<?php 
require 'core/init.php';
$general->logged_in_protect();

# if form is submitted
if (isset($_POST['submit'])) {
  
    if(empty($_POST['name']) ||  empty($_POST['password']) || empty($_POST['password_again']) || empty($_POST['email'])){
  
        $errors[] = 'All fields are required.';
  
    }else{
         
        #validating user's input with functions that we will create next
        if (trim($_POST['password']) != trim($_POST['password_again'])) {
            $errors[] = 'Repeated password does not match with password. ';
        }else if (strlen($_POST['password']) <6){
            $errors[] = 'Your password must be at least 6 characters';
        } else if (strlen($_POST['password']) >18){
            $errors[] = 'Your password cannot be more than 18 characters long';
        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'Please enter a valid email address';
        }else if ($users->email_exists($_POST['email']) === true) {
            $errors[] = 'That email already exists.';
        }
    }
  
    if(empty($errors) === true){
        $name   = htmlentities($_POST['name']);
        $password   = $_POST['password'];
        $email      = htmlentities($_POST['email']);
  
        $users->register($name, $password, $email);// Calling the register function
        header('Location: register.php?success');
        exit();
    }
}
$page_title = "Register";
include_once "includes/header.php";

if (isset($_GET['success']) && empty($_GET['success'])) {
    echo '<div class="alert alert-success" role="alert">
        <strong>Thank you for registering.Please <a href="login.php">Login</a>!</strong>
    </div>';
}

?>
        <form method="post" action="">
            <h4>Name:</h4>
            <input type="text" name="name" value="<?php if(isset($_POST['name'])) echo htmlentities($_POST['name']); ?>" />
            <h4>Password:</h4>
            <input type="password" name="password" />
            <h4>Repeat password:</h4>
            <input type="password" name="password_again">
            <h4>Email:</h4>
            <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo htmlentities($_POST['email']); ?>" />
            <br/><br/>
            <input type="submit" name="submit" value="Register" class="btn btn-success"/>
        </form>
  
  
        <?php 
        # if there are errors, they would be displayed here.
        if(empty($errors) === false){
            echo '<p>' . implode('</p><p>', $errors) . '</p>';
        }
  
        ?>
 <?php include_once "includes/footer.php"; ?>