<?php

if (isset($_POST['create_user'])) {
    $user_fname              = $_POST['user_fname'];
    $user_lname             = $_POST['user_lname'];
    $user_role              = $_POST['user_role'];
    $user_uname             = $_POST['user_uname'];
    $user_pword              =$_POST['user_pword'];
    $user_email          = $_POST['user_email'];
    
    

    // move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO users (user_fname, user_lname, user_role,  user_uname, user_pword, user_email) 
    VALUES ('{$user_fname}', '{$user_lname}', '{$user_role}', '{$user_uname}', '{$user_pword}', '{$user_email}')";
    //header("Location: users.php");


    $add_user_query = mysqli_query($dbconn, $query);

    confirm_query($add_user_query);
    echo "User has been created!" . "<a href='users.php'>View users</a>"; 
}
?>


<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="fname">Firstname</label>
        <input type="text" class="form-control" name="user_fname">
    </div>

    <div class="form-group">
        <label for="lname">Lastname</label>
        <input type="text" class="form-control" name="user_lname">
    </div>

    <div class="form-group">
    <label for="user_role">Role</label><br>
    <select name="user_role" id="" required>
                <option value="">Please select</option>
                <option value="admin">Admin</option>
                <option value="subscriber">Subscriber</option> 

    </select>
    </div>


    <div class="form-group">
        <label for="uname">Username</label>
        <input type="text" class="form-control" name="user_uname">
    </div>

    <div class="form-group">
        <label for="pword">Password</label>
        <input type="text" class="form-control" name="user_pword">
    </div>

    <div class="form-group">
        <label for="email">E-Mail</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <!-- <div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" name="user_image">
    </div> -->

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
    </div>


</form>