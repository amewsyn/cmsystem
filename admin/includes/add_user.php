<?php

if (isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_user = $_POST['post_user'];
    $post_category = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts (post_title, post_user, post_author, post_category_id,  post_status, post_image, post_tags, post_content, post_date/* post_comments_count*/) 
    VALUES ('{$post_title}', '{$post_user}', '{$post_author}', '{$post_category}', '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', now()/*'{$post_comments_count}'*/)";
    header("Location: posts.php");


    $create_post_query = mysqli_query($dbconn, $query);

    confirm_query($create_post_query);
}
?>


<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="title">Post User</label>
        <input type="text" class="form-control" name="post_user">
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>

    <?php
    $query = 'SELECT * FROM `categories` ORDER BY `ID` ASC';
    $selCategory = mysqli_query($dbconn, $query);
    confirm_query($selCategory);
    ?>

    <div class="form-group">
        <label for="post_category">Post Category ID</label><br>
        <select name="post_category_id" id="post_cat">
            <?php
            while ($row = mysqli_fetch_assoc($selCategory)) {
                $cat_ID = $row['ID'];
                $cat_title = $row['cat_title'];

                // Corrected echo statement
                echo "<option value='{$cat_ID}'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>


</form>