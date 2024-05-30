<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php
        if (isset($_GET['edit'])) {
            $cat_edit = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE ID = {$cat_edit}";
            $editCategory = mysqli_query($dbconn, $query);

            while ($row = mysqli_fetch_assoc($editCategory)) {
                $cat_ID = $row['ID'];
                $cat_title = $row['cat_title'];
            } ?>
            <input value="<?php if (isset($cat_title)) {echo $cat_title;}?>" type="text" class="form-control" name="cat_title">
        <?php } ?>

        <?php
        if (isset($_POST['updateCat'])) {
            $cat_update = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$cat_update}' WHERE ID = {$cat_ID}";
            $update_query = mysqli_query($dbconn, $query);

            if (!$update_query) {
                die("Query failed " . mysqli_error($dbconn));
            }
        }
        ?>

    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="updateCat" value="Update Category">
    </div>
</form>