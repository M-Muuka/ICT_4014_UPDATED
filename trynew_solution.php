<?php
    $postData = mysqli_query($conn,"SELECT * FROM wp_posts ORDER BY post_date ASC") or die(mysqli_error()); 
    $commentData = mysqli_query($conn,"SELECT * FROM wp_comments WHERE comment_approved = '1' ORDER BY comment_date ASC") or die(mysqli_error()); 
    $posts = array();     
    while($row = mysqli_fetch_assoc($postData)) {
        $posts[] = $row; 
        $commentrow = mysqli_fetch_assoc($commentData);
        $comments[] = $commentrow; 
        echo '<h3>' . $row['post_title'] . '</h3>';
        echo '<h5>' . $row['post_author'] . ', ' . $row['post_date'] . '</h5>';
        echo '<p>' . $row['post_excerpt'] . '... <a href="' . $row['permalink'] . '">read more</a></p>';
        if($row['comment_count'] > 0) {
            echo '<blockquote>';
            echo '<b>Comments</b><br />';
            foreach($comments as $comment) {
                if($row['ID']==$comment['comment_post_ID']) {
                    $comment_excerpt = substr($comment['comment_content'],0,100);
                    echo '<br>' . $comment_excerpt . ' - <b>' . $comment['comment_author'] . '</b>, ' . $comment['comment_date'] . '<br>'; 
                    }
                }            
            echo '</blockquote>';
            }
        }


?>
Table Name = wp_posts
Field1 = post_date
Field2 = comment_approved
Field3 = comment_date
Field4 = post_title
Field5 = post_author
Field6 = post_excerpt
comment_post_ID


