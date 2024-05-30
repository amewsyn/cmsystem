<?php

if (isset($_POST['create_post'])) {
    $post_title = $_POST['p_title'];
    $post_author = $_POST['p_author'];
    $post_category = $_POST['p_category_id'];
    $post_status = $_POST['p_status'];
    $post_image = $_FILES['p_image']['name'];
    $post_image_temp = $_FILES['p_image']['tmp_name'];
    $post_tags = $_POST['p_tags'];
    $post_content = $_POST['p_content'];
    $post_date = date('d-m-y');
    $post_comments_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_title, post_author, post_category,  post_status, post_image, post_tags, post_content, post_date, post_comments_count) 
    VALUES ('{$post_title}', '{$post_author}', '{$post_category}, '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', now() , '{$post_comments_count}')";

    $add_post_query = mysqli_query($dbconn, $query);
}
?>


<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Post title</label>
        <input type="text" class="form-control" name="p_title">
    </div>


    <div class="form-group">
        <label for="post_category">Post Category ID</label>
        <input type="text" class="form-control" name="p_category_id">
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="p_author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="p_status">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="p_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="p_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="p_content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>


</form>