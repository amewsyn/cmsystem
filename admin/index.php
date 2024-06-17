<?php include ("includes/admin_header.php"); ?>

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
                        Welcome, to admin
                        <small><?php echo $_SESSION['user_uname'] ?></small>
                    </h1>



                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM posts";
                                    $count_posts = mysqli_query($dbconn, $query);
                                    $post_count = mysqli_num_rows($count_posts);


                                    echo "<div class='huge'>{$post_count}</div>"; ?>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php
                                    $query = "SELECT * FROM comments";
                                    $count_comm = mysqli_query($dbconn, $query);
                                    $comm_count = mysqli_num_rows($count_comm);


                                    echo "<div class='huge'>{$comm_count}</div>"; ?>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM users";
                                    $count_users = mysqli_query($dbconn, $query);
                                    $user_count = mysqli_num_rows($count_users);


                                    echo "<div class='huge'>{$user_count}</div>"; ?>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $count_cat = mysqli_query($dbconn, $query);
                                    $cat_count = mysqli_num_rows($count_cat);


                                    echo "<div class='huge'>{$cat_count}</div>"; ?>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <?php 
                $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                $draft_posts = mysqli_query($dbconn, $query);
                $draft_count = mysqli_num_rows($draft_posts);

                $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                $unapp_comm = mysqli_query($dbconn, $query);
                $ucomm_count = mysqli_num_rows($unapp_comm);

                $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                $subs_acc = mysqli_query($dbconn, $query);
                $subs_count = mysqli_num_rows($subs_acc);

            ?>

            <div class="row">
                <script type="text/javascript">
                    google.charts.load('current', { 'packages': ['bar'] });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],
                            
                            <?php 
                            $elements_label = ['Active Posts', 'Draft Posts', 'Comments', 'Pending Comments', 'Categories', 'Users', 'Subscribers'];
                            $elements_count = [$post_count, $draft_count, $comm_count, $ucomm_count, $cat_count, $user_count, $subs_count];
                            for($i = 0; $i < count($elements_label); $i++){
                                echo "['{$elements_label[$i]}', {$elements_count[$i]}],";
                            }
                            ?>

                            //['Posts', 1000]
                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                    <div id="columnchart_material" style="width: 1600px; height: 500px;"></div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include ("includes/admin_footer.php"); ?>