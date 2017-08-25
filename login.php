<?php
require 'core/init.php';
$general->logged_in_protect();
if (empty($_POST) === false) {
  
    //$username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
  
    if (empty($email) === true || empty($password) === true) {
        $errors[] = 'Sorry, but we need your email and password.';
    } else if ($users->email_exists($email) === false) {
        $errors[] = 'Sorry that email doesn\'t exists.';
    }  else {
  
        $login = $users->login($email, $password);
        if ($login === false) {
            $errors[] = 'Sorry, that email/password is invalid';
        }else {
            session_regenerate_id(true);// destroying the old session id and creating a new one
            $_SESSION['id'] =  $login; // The user's id is now set into the user's session  in the form of $_SESSION['id'] 
             
            #Redirect the user to members.php.
            header('Location: members.php');
            exit();
        }
    }
}

$page_title = "Login";
include_once "includes/header.php";
?>
  
        <?php if(empty($errors) === false){
  
            echo '<p>' . implode('</p><p>', $errors) . '</p>';            
  
        } 
        ?>
        <form method="post" action="">
            <h4>Email:</h4>
            <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo htmlentities($_POST['email']); ?>" >
            <h4>Password:</h4>
            <input type="password" name="password">
            <br><br/>
            <input type="submit" name="submit" value="Login" class="btn btn-success">
        </form>
<?php include_once "includes/footer.php"; ?>