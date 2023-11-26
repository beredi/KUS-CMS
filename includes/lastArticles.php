<div class="container articles">
    <div class="row">
        <h2 style="margin-left: 2px;">Posledné články:</h2>
        <div class="last-articles">
            <?php

            try {
                include 'dashboard/includes/db.php';


                $query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id DESC LIMIT 3";

                $send_info = $connection->prepare($query);

                $send_info->execute();
                
                include 'includes/article.php';

                while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

                    echo "<div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12\">";
                    generateArticleCard($post_id, $post_image, $post_title, $post_content);
                    echo "</div>";

                }

            } catch (Exception $e) {
                echo $e;
            }
            ?>
            
        </div>
    </div>
    <div class="row text-center action-button">
        <a href="predchadzajuce-podujatia"  class="btn btn-lg btn-secondary">Všetky články</a>
    </div>
</div>