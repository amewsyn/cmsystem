<table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>In Response to</th>
                            <th>Date</th>
                            <th>Approved</th>
                            <th>Unapproved</th>
                            <th>Delete</th>
                        </tr>
                    <tbody>
                        
                        <?php
                            $query = "SELECT * FROM comments";
                            $selComments = mysqli_query($dbconn, $query);
                        
                            while ($row = mysqli_fetch_assoc($selComments)) {
                                $comment_ID             = $row['comment_id'];
                                $c_post_id              = $row['comment_post_id'];
                                $comment_author         = $row['comment_author'];
                                $comment_email          = $row['comment_email'];
                                $comment_content        = $row['comment_content'];
                                $comment_status         = $row['comment_status'];
                                $comment_date           = $row['comment_date'];
                            
                        
                                    echo "<tr>";
                                    echo "<td>$comment_ID</td>";
                                    echo "<td>$comment_author</td>";
                                    echo "<td>$comment_content</td>";
                                    
                                    // $query = "SELECT * FROM categories WHERE ID = {$post_category}";
                                    // $editCategory = mysqli_query($dbconn, $query);

                                    //     while ($row = mysqli_fetch_assoc($editCategory)) {
                                    //         $cat_ID = $row['ID'];
                                    //         $cat_title = $row['cat_title'];
                                    //     }
                                    
                                    echo "<td>$comment_email</td>";
                                    echo "<td>$comment_status</td>";

                                    $query = "SELECT * FROM posts WHERE post_id = $c_post_id";
                                    $select_post_id_query = mysqli_query($dbconn, $query);
                                    while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                                        $post_id = $row["post_id"];
                                        $post_title = $row["post_title"];

                                        echo "<td><a href = '../post.php?p_id=$post_id'>$post_title</a></td>";
                                    }
                                    echo "<td>$comment_date</td>";
                                    echo "<td><a href = 'comments.php?approve=$comment_ID'>Approved</a></td>";
                                    echo "<td><a href = 'comments.php?unapprove=$comment_ID'>Unapproved</a></td>";
                                    echo "<td><a href = 'comments.php?delete=$comment_ID'>Delete</a></td>";
                                    echo "</tr>";


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