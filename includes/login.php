<?php include "db.php";
session_start();

if(isset($_POST['login'])){
    $user_uname = $_POST['username'];
    $user_pword = $_POST['password'];

    $user_uname = mysqli_real_escape_string($dbconn, $user_uname);
    $user_pword = mysqli_real_escape_string($dbconn, $user_pword);

    $query = "SELECT * FROM users WHERE user_uname = '{$user_uname}' ";
    $select_user_query = mysqli_query($dbconn, $query);
    if (!$select_user_query) {
        die("Query failed " . mysqli_error($dbconn));    
    }
}

while($row = mysqli_fetch_array($select_user_query)){
    $db_uid = $row['user_id'];
    $db_uname = $row['user_uname'];
    $db_pword = $row['user_pword'];
    $db_fname = $row['user_fname'];
    $db_lname = $row['user_lname'];
    $db_email = $row['user_email'];
    $db_role = $row['user_role'];
    //echo "User ID: " . $db_id . "<br>";
}

if($user_uname === $db_uname && $user_pword === $db_pword){
    $_SESSION['user_uname'] = $db_uname;
    $_SESSION['user_fname'] = $db_fname;
    $_SESSION['user_lname'] = $db_lname;
    $_SESSION['user_role'] = $db_role;
    header("Location: ../admin");
}  else {
    header("Location: ../index.php");
}
