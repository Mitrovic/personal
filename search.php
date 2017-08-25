<?php
require 'core/init.php';
$general->logged_out_protect();

// get search term
$search_term=isset($_GET['s']) ? $_GET['s'] : '';
$members =$users->search($search_term);

$page_title = "Search results for <strong>".$search_term."</strong>";
include_once "includes/header.php";
?>
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
