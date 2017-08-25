<?php
require 'core/init.php';
$general->logged_out_protect();
$members        =$users->get_users();
$member_count   = count($members);

$page_title = "All Users";
include_once "includes/header.php";
?>
<h3>Welcome, <?=$user['name']?></h3>
        <p>We have <strong><?php echo $member_count; ?></strong> registered users. </p>
  
        <?php
        $i=1;
        foreach ($members as $member) {
            $email = $member['email'];
            $name = $member['name'];
            ?>

            <p><?php echo $i.') <strong>Name:</strong>'.$name.' <strong>Email:</strong>'.$email; ?></p>
            <?php
            $i++;
        }
        ?>
<?php include_once "includes/footer.php"; ?>
