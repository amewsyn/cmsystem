<?php

function insert_cat()
{
    global $dbconn;
    if (isset($_POST["submit"])) {
        $cat_title = $_POST["cat_title"];

        if ($cat_title == "" || empty("cat_title")) {
            echo "This field cannot be empty";
        } else {
            $query = "INSERT into categories(cat_title) VALUES('{$cat_title}')";

            $create_cat_query = mysqli_query($dbconn, $query);

            if (!$create_cat_query) {
                die("Query failed" . mysqli_error($dbconn));
            }
        }
    }
}

function findAllCat()
{
    global $dbconn;
    $query = "SELECT * FROM categories";
    $selCategory = mysqli_query($dbconn, $query);

    while ($row = mysqli_fetch_assoc($selCategory)) {
        $cat_ID = $row['ID'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_ID}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href ='categories.php?delete={$cat_ID}'>Delete</a></td>";
        echo "<td><a href ='categories.php?edit={$cat_ID}'>Edit</a></td>";
        echo "</tr>";
    }
}

function delCat(){
    global $dbconn;
    if (isset($_GET['delete'])) {
        $cat_del = $_GET['delete'];

        // Ensure the variable is properly escaped to prevent SQL injection
        $cat_del = mysqli_real_escape_string($dbconn, $cat_del);
        // Adjust column name if necessary
        $query = "DELETE FROM categories WHERE ID = {$cat_del}";

        $delete_cat_query = mysqli_query($dbconn, $query);
        if (!$delete_cat_query) {
            die("Query failed: " . mysqli_error($dbconn));
        } else {
            // Redirect to categories.php to refresh the page and show the updated list
            header("Location: categories.php");
            exit; // Ensure script execution stops after redirection
        }
    }
}
