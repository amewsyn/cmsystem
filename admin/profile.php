<?php include ("includes/admin_header.php"); ?>
<?php if (isset($_SESSION['user_uname'])) {
    $session_uname = $_SESSION['user_uname'];
    $query = "SELECT * FROM users WHERE user_uname = '{$session_uname}'";
    $select_user_profile = mysqli_query($dbconn, $query);
    while ($row = mysqli_fetch_array($select_user_profile)) {
        $user_uname = $row['user_uname'];
        $user_pword = $row['user_pword'];
        $user_fname = $row['user_fname'];
        $user_lname = $row['user_lname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
    }
} ?>

<?php
if (isset($_POST['edit_user'])) {
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_role = $_POST['user_role'];
    $user_uname = $_POST['user_uname'];
    $user_pword = $_POST['user_pword'];
    $user_email = $_POST['user_email'];



    // move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "UPDATE users SET user_uname = '{$user_uname}', user_pword = '{$user_pword}', user_fname = '{$user_fname}', 
    user_lname = '{$user_lname}', user_email = '{$user_email}', user_role = '{$user_role}' WHERE user_uname = '{$session_uname}'";
    $update_user = mysqli_query($dbconn, $query);
    confirm_query($update_user);
}

?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include ("includes/admin_navigation.php"); ?>
    <!-- Nav collapse -->

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome, Admin
                        <small><?php echo $_SESSION['user_uname'] ?></small>
                    </h1>
                    <form action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <label for="fname">Firstname</label>
                            <input type="text" value="<?php echo $user_fname; ?>" class="form-control"
                                name="user_fname">
                        </div>

                        <div class="form-group">
                            <label for="lname">Lastname</label>
                            <input type="text" value="<?php echo $user_lname; ?>" class="form-control"
                                name="user_lname">
                        </div>

                        <div class="form-group">
                            <select name="user_role" id="">
                                <option value="<?php echo $user_role; ?>"><?php echo ($user_role); ?></option>

                                <?php
                                if ($user_role == 'admin') {
                                    echo "<option value='subscriber'>subscriber</option>";
                                } else {
                                    echo "<option value='admin'>admin</option>";
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="uname">Username</label>
                            <input type="text" value="<?php echo $user_uname; ?>" class="form-control"
                                name="user_uname">
                        </div>

                        <div class="form-group">
                            <label for="pword">Password</label>
                            <input type="password" value="<?php echo $user_pword; ?>" class="form-control"
                                name="user_pword">
                        </div>

                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" value="<?php echo $user_email; ?>" class="form-control"
                                name="user_email">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                        </div>


                    </form>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include ("includes/admin_footer.php"); ?>