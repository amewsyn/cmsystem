<table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Role</th>
                            
                        </tr>
                    <tbody>
                        
                        <?php
                            $query = "SELECT * FROM users";
                            $showUsers = mysqli_query($dbconn, $query);
                        
                            while ($row = mysqli_fetch_assoc($showUsers)) {
                                $user_id             = $row['user_id'];
                                $user_password              =$row['user_pword'];
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
                                    
                                    echo "<td><a href = 'users.php?toAdmin=$user_id'>Admin</a></td>";
                                    echo "<td><a href = 'users.php?toSubs=$user_id'>Subscriber</a></td>";
                                    echo "<td><a href = 'users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
                                    echo "<td><a href = 'users.php?delete=$user_id'>Delete</a></td>";
                                    // echo "</tr>";


                            }

                            if(isset($_GET['toAdmin'])){
                                $toAdmin_id = $_GET['toAdmin'];
                                
                                $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $toAdmin_id";
                                $ta_query = mysqli_query($dbconn,$query);
                                header("Location: users.php");

                                confirm_query($ta_query);
                            }

                            if(isset($_GET['toSubs'])){
                                $toSubs_id = $_GET['toSubs'];
                                
                                $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $toSubs_id";
                                $ts_query = mysqli_query($dbconn,$query);
                                header("Location: users.php");

                                confirm_query($ts_query);
                            }


                            if(isset($_GET['delete'])){
                                $del_user_id = $_GET['delete'];
                                
                                $query = "DELETE FROM users WHERE user_id = {$del_user_id}";
                                $delete_query = mysqli_query($dbconn,$query);
                                header("Location: users.php");

                                confirm_query($delete_query);
                            }

                        ?>
                    </tbody>