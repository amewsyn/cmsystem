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
                            <?php 
                            
                                if(isset($_GET['source'])) {
                                    switch($_GET['source']) {
                                        case 'add_post':
                                            include "includes/add_post.php";
                                            break;
                                        case 'edit_post':
                                            include "includes/edit_post.php";
                                            break;
                                    }
                                } else {
                                    include("includes/view_posts.php");
                                }
                            ?>

                            <!-- <td>10</td>
                            <td>Mew</td>
                            <td>PHP</td>
                            <td>Language</td>
                            <td>Image</td>
                            <td>Status</td>
                            <td>Tags</td>
                            <td>Comments</td>
                            <td>Date</td> -->
                        
                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include("includes/admin_footer.php"); ?>