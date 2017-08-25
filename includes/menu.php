<div class="row">
    <?php
    if($general->logged_in()){?>
    <div class="alert alert-success" role="alert">
        <strong>Welcome,</strong> <?=$user['name']?>! Now you can view or search users!
    </div>
        <?php
    }else{?>
        <div class="alert alert-danger" role="alert">
            <strong>Welcome,</strong> guest! Please login or register to continue!
        </div>
    <?php
    }
    ?>
<div class = "col-md-8">
    <ul class="nav nav-tabs">
    <?php 
  
    if($general->logged_in()){?>
        <li><a href="members.php">Users</a></li>
        <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
    <?php
    }else{?>
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>

    <?php
    }
    ?>
</ul>
</div>
<div class = "col-md-4">
    <?php
    echo "<form role='search' action='search.php'>";
    echo "<div class='input-group'>";
    $search_value=isset($search_term) ? "value='{$search_term}'" : "";
    echo "<input type='text' class='form-control' placeholder='Type  name or email...' name='s' id='srch-term' required {$search_value} />";
    echo "<div class='input-group-btn'>";
    echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
    echo "</div>";
    echo "</div>";
    echo "</form>";
    ?>
</div>
</div>    