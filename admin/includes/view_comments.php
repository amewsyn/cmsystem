<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>Date</th>
        <th>In response to</th>
        <th>Approved</th>
        <th>Unapproved</th>
        <th>Delete</th>
    </tr>
    <tbody>

        <?php
        $query = "SELECT * FROM comments";
        $selPosts = mysqli_query($dbconn, $query);

        while ($row = mysqli_fetch_assoc($selPosts)) {
            $comment_ID            = $row['comment_id'];
            $c_post_id             = $row['comment_post_id'];
            $comment_author        = $row['comment_author'];
            $comment_email         = $row['comment_email'];
            $comment_content       = $row['comment_content'];
            $comment_status        = $row['comment_status'];
            $comment_date          = $row['comment_date'];


            echo "<tr>";
            echo "<td>$comment_ID</td>";
            echo "<td>$comment_author</td>";
            echo "<td>$comment_content</td>";

           /*  $query = "SELECT * FROM comments";
            $selComments = mysqli_query($dbconn, $query);

            while ($row = mysqli_fetch_assoc($selComments)) {
                $comment_ID            = $row['comment_id'];
                $c_post_id             = $row['comment_post_id'];
                $comment_author        = $row['comment_author'];
                $comment_email         = $row['comment_email'];
                $comment_content       = $row['comment_content'];
                $comment_status        = $row['comment_status'];
                $comment_date          = $row['comment_date'];
            } */

            echo "<td>$comment_email</td>";
            echo "<td>$comment_status</td>";
            echo "<td>$comment_date</td>";

            $query = "SELECT * FROM posts WHERE post_id = $c_post_id";
            $sel_post_id_q = mysqli_query($dbconn, $query);
            while($row = mysqli_fetch_assoc($sel_post_id_q)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];

                echo "<td><a href = '../post.php?p_id=$post_id'>$post_title</td>";
            }

            echo "<td><a href = 'comments.php?approve={$comment_ID}'>Approve</a></td>";
            echo "<td><a href = 'comments.php?unapprove=$comment_ID'>Unapprove</a></td>";
            echo "<td><a href = 'comments.php?delete=$comment_ID'>Delete</a></td>";
            echo "</tr>";
        }

        if (isset($_GET['approve'])) {
            $approve_comm_id = $_GET['approve'];

            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$approve_comm_id}";
            $approve_query = mysqli_query($dbconn, $query);
            header("Location: comments.php");

            confirm_query($delete_query);
        }

        if (isset($_GET['unapprove'])) {
            $unapprove_comm_id = $_GET['unapprove'];

            $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$unapprove_comm_id}";
            $unapprove_query = mysqli_query($dbconn, $query);
            header("Location: comments.php");

            confirm_query($delete_query);
        }

        if (isset($_GET['delete'])) {
            $del_comm_id = $_GET['delete'];

            $query = "DELETE FROM comments WHERE comment_id = {$del_comm_id}";
            $delete_query = mysqli_query($dbconn, $query);
            header("Location: comments.php");

            confirm_query($delete_query);
        }

        ?>
    </tbody>