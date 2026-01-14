<?php
function generateArticleCard($post_id, $post_image, $post_title, $post_content){
    $temp_post_content = strip_tags($post_content);
    $final_post_content = (substr($temp_post_content, 0, 190) . "...");

    echo "
        <div class=\"article-card\">
            <div class=\"article-card-image\">
                <a href=\"clanok.php?p_id=$post_id\">
                    <img 
                        src=\"images/articles/$post_image\" 
                        alt=\"$post_title\">
                </a>
                <div class=\"article-card-overlay\">
                    <span class=\"article-card-badge\">Podujatie</span>
                </div>
            </div>
            <div class=\"article-card-content\">
                <h3 class=\"article-card-title\">
                    <a href=\"clanok.php?p_id=$post_id\">$post_title</a>
                </h3>
                <p class='article-card-excerpt'>$final_post_content</p>
                <a href=\"clanok.php?p_id=$post_id\" class=\"article-card-btn\"> 
                    Čítaj viac <span class=\"arrow\">→</span>
                </a>
            </div>
        </div>
    ";
}

?>