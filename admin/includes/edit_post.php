<?php
if (isset($_GET['p_id'])) {
    $post_edit_id = $_GET['p_id'];
}
//Retry original code
$query = "SELECT * FROM posts WHERE post_ID = " . $post_edit_id;
$selPosts_by_id = mysqli_query($dbconn, $query);
$post = mysqli_fetch_assoc($selPosts_by_id);
$post_ID            = $post['post_id'];
$post_user          = $post['post_user'];
$post_title         = $post['post_title'];
$post_author        = $post['post_author'];
$post_category      = $post['post_category_id'];
$post_image         = $post['post_image'];
$post_status        = $post['post_status'];
$post_tags          = $post['post_tags'];
$post_content       = $post['post_content'];
$post_comments_count = $post['post_comments_count'];
$post_date          = $post['post_date'];

if (isset($_POST['edit_post'])) {
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
    $post_comments_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image)){
        $query = "SELECT post_image FROM posts WHERE post_ID = $post_ID";
        $select_image = mysqli_query($dbconn, $query);
        confirm_query($select_image);

        while($row = mysqli_fetch_assoc($select_image)){
            $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET 
    post_title          = '{$post_title}', 
    post_category_id    = '{$post_category}', 
    post_author         = '{$post_author}', 
    post_user         = '{$post_user}', 
    post_date           = now(), 
    post_image          = '{$post_image}', 
    post_content        = '{$post_content}', 
    post_tags        = '{$post_tags}', 
    post_status         = '{$post_status}' 
    WHERE post_ID       = '{$post_ID}'";

    $update_post = mysqli_query($dbconn, $query);
    if(confirm_query($update_post)){
        header("Location: https://localhost/cmsystem/admin/posts.php");
    }
}
?>



<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Post ID</label>
        <input value="<?php echo $post_ID; ?>" type="text" class="form-control" name="post_title" disabled>
    </div>

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="title">Post User</label>
        <input value="<?php echo $post_user; ?>" type="text" class="form-control" name="post_user">
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
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
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label><br>
        <img width="100" src="../images/<?php echo $post_image ?>">
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_post" value="Update Post">
    </div>


</form>