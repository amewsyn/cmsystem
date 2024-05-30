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
                        <!-- ADD CATEGORY -->
                        <?php
                            insert_cat();
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

                        <!-- EDIT CATEGORY -->
                        <?php 
                            if (isset($_GET['edit'])) {
                                $cat_edit = $_GET['edit'];
                                include("includes/update_categories.php");
                            }
                        ?>

                    </div>
                    <div class="col-xs-6">
                        <!--See all of cateories to Add, Edit, and Delete records.-->
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //SHOW ALL CATEGORIES FUNCTION
                                findAllCat();
                                //DELETE CATEGORY FUNCTION
                                delCat();
                                ?>
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