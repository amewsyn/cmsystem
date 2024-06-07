<table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Date</th>
                        </tr>
                    <tbody>
                        
                        <?php
                            $query = "SELECT * FROM users";
                            $showUsers = mysqli_query($dbconn, $query);
                        
                            while ($row = mysqli_fetch_assoc($showUsers)) {
                                $user_id             = $row['user_id'];
                                $user_uname             = $row['user_uname'];
                                $user_fname              = $row['user_fname'];
                                $user_lname         = $row['user_lname'];
                                $user_email          = $row['user_email'];
                                $user_role        = $row['user_role'];
                                $user_dateadd         = $row['user_dateadd'];
                            
                        
                                    echo "<tr>";
                                    echo "<td>$user_id</td>";
                                    echo "<td>$user_uname</td>";
                                    echo "<td>$user_fname</td>";
                                    echo "<td>$user_lname</td>";
                                    
                                    // $query = "SELECT * FROM categories WHERE ID = {$post_category}";
                                    // $editCategory = mysqli_query($dbconn, $query);

                                    //     while ($row = mysqli_fetch_assoc($editCategory)) {
                                    //         $cat_ID = $row['ID'];
                                    //         $cat_title = $row['cat_title'];
                                    //     }
                                    
                                    echo "<td>$user_email</td>";
                                    echo "<td>$user_role</td>";

                                    // $query = "SELECT * FROM posts WHERE post_id = $c_post_id";
                                    // $select_post_id_query = mysqli_query($dbconn, $query);
                                    // while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                                    //     $post_id = $row["post_id"];
                                    //     $post_title = $row["post_title"];

                                    //     echo "<td><a href = '../post.php?p_id=$post_id'>$post_title</a></td>";
                                    // }
                                    echo "<td>$user_dateadd</td>";
                                    // echo "<td><a href = 'comments.php?approve=$comment_ID'>Approved</a></td>";
                                    // echo "<td><a href = 'comments.php?unapprove=$comment_ID'>Unapproved</a></td>";
                                    // echo "<td><a href = 'comments.php?delete=$comment_ID'>Delete</a></td>";
                                    // echo "</tr>";


                            }

                            if(isset($_GET['approve'])){
                                $ap_comment_id = $_GET['approve'];
                                
                                $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_ID = $ap_comment_id";
                                $ap_query = mysqli_query($dbconn,$query);
                                header("Location: comments.php");

                                confirm_query($ap_query);
                            }

                            if(isset($_GET['unapprove'])){
                                $un_comment_id = $_GET['unapprove'];
                                
                                $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_ID = $un_comment_id";
                                $un_query = mysqli_query($dbconn,$query);
                                header("Location: comments.php");

                                confirm_query($un_query);
                            }


                            if(isset($_GET['delete'])){
                                $del_comment_id = $_GET['delete'];
                                
                                $query = "DELETE FROM comments WHERE comment_id = {$del_comment_id}";
                                $delete_query = mysqli_query($dbconn,$query);
                                header("Location: comments.php");

                                confirm_query($delete_query);
                            }

                        ?>
                    </tbody>