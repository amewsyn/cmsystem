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
                                    $source = $_GET['source'];
                                } else {
                                    $source = '';
                                }

                                switch($source) {

                                    case 'add_post':
                                        include "includes/add_post.php";
                                        break;
                                    case '4':
                                        echo 'NICE';
                                        break;
                                    case '5':
                                        echo 'NCE';
                                        break;
                                    default:
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