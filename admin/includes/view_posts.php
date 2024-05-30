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
                            <th>Date</th>
                        </tr>
                    <tbody>
                        
                        <?php
                            $query = "SELECT * FROM posts";
                            $selPosts = mysqli_query($dbconn, $query);
                        
                            while ($row = mysqli_fetch_assoc($selPosts)) {
                                $post_ID        = $row['post_id'];
                                $post_user      = $row['post_user'];
                                $post_title     = $row['post_title'];
                                $post_author    = $row['post_author'];
                                $post_category  = $row['post_category_id'];
                                $post_image     = $row['post_image'];
                                $post_status    = $row['post_status'];
                                $post_tags      = $row['post_tags'];
                                $post_content   = $row['post_content'];
                                $post_date      = $row['post_date'];
                            
                        
                                    echo "<tr>";
                                    echo "<td>$post_ID</td>";
                                    echo "<td>$post_user</td>";
                                    echo "<td>$post_title</td>";
                                    echo "<td>$post_author</td>";
                                    echo "<td>$post_category</td>";
                                    echo "<td><img width ='100' src='../images/$post_image'></td>";
                                    echo "<td>$post_status</td>";
                                    echo "<td>$post_tags</td>";
                                    echo "<td>$post_content</td>";
                                    echo "<td>$post_date</td>";
                                    echo "</tr>";


                            }
                        ?>