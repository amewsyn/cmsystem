<table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Tags</th>
                            <th>Content</th>
                            <th>Post Comments count</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    <tbody>
                        
                        <?php
                            $query = "SELECT * FROM posts";
                            $selPosts = mysqli_query($dbconn, $query);
                        
                            while ($row = mysqli_fetch_assoc($selPosts)) {
                                $post_ID            = $row['post_id'];
                                $post_user          = $row['post_user'];
                                $post_title         = $row['post_title'];
                                $post_author        = $row['post_author'];
                                $post_category      = $row['post_category_id'];
                                $post_image         = $row['post_image'];
                                $post_status        = $row['post_status'];
                                $post_tags          = $row['post_tags'];
                                $post_content       = $row['post_content'];
                                $post_comments_count= $row['post_comments_count'];
                                $post_date          = $row['post_date'];
                            
                        
                                    echo "<tr>";
                                    echo "<td>$post_ID</td>";
                                    echo "<td>$post_user</td>";
                                    echo "<td>$post_title</td>";
                                    echo "<td>$post_author</td>";

                                    $query = "SELECT * FROM categories WHERE ID = {$post_category}";
                                    $editCategory = mysqli_query($dbconn, $query);

                                        while ($row = mysqli_fetch_assoc($editCategory)) {
                                            $cat_ID = $row['ID'];
                                            $cat_title = $row['cat_title'];
                                        }
                                    
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><img width ='100' src='../images/$post_image'></td>";
                                    echo "<td>$post_status</td>";
                                    echo "<td>$post_tags</td>";
                                    echo "<td>$post_content</td>";
                                    echo "<td>$post_comments_count</td>";
                                    echo "<td>$post_date</td>";
                                    echo "<td><a href = 'posts.php?source=edit_post&p_id={$post_ID}'>Edit</a></td>";
                                    echo "<td><a href = 'posts.php?delete=$post_ID'>Delete</a></td>";
                                    echo "</tr>";


                            }

                            if(isset($_GET['delete'])){
                                $del_post_id = $_GET['delete'];
                                
                                $query = "DELETE FROM posts WHERE post_id = {$del_post_id}";
                                $delete_query = mysqli_query($dbconn,$query);

                                confirm_query($delete_query);
                            }

                        ?>
                    </tbody>