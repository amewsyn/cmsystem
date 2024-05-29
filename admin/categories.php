<?php include("includes/admin_header.php"); ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include("includes/admin_navigation.php"); ?>
    <!-- Nav collapse -->

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome, Admin
                        <small>Author</small>
                    </h1>
                    <div class="col-xs-6">
                        <?php
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
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-6">
                        <?php $query = "SELECT * FROM categories";
                        $selCategory = mysqli_query($dbconn, $query);
                        ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($selCategory)) {
                                    $cat_ID = $row['ID'];
                                    $cat_title = $row['cat_title'];
                                    echo "<tr>";
                                    echo "<td>{$cat_ID}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "</tr>";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include("includes/admin_footer.php"); ?>