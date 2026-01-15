<?php
function generateArticleCard($post_id, $post_image, $post_title, $post_content, $post_date = '', $categories = []){
    $temp_post_content = strip_tags($post_content);
    $final_post_content = (substr($temp_post_content, 0, 190) . "...");

    echo "
        <div class=\"article-card\">
            <div class=\"article-card-image\">
                <a href=\"clanok.php?p_id=$post_id\" style=\"display: block; height: 100%;\">
                    <img 
                        src=\"images/articles/$post_image\" 
                        alt=\"$post_title\" 
                        style=\"cursor: pointer; transition: transform 0.3s ease;\" 
                        onmouseover=\"this.style.transform='scale(1.05)'\" 
                        onmouseout=\"this.style.transform='scale(1)'\">
                </a>
                <div class=\"article-card-overlay\">
                    <span class=\"article-card-badge\">Podujatie</span>
                </div>
            </div>
            <div class=\"article-card-content\">";
    
    if ($post_date) {
        echo "<div style=\"color: #007bff; font-size: 1.1rem; margin-bottom: 10px; font-weight: 600; line-height: 1.6;\">";
        echo "<div><i class=\"far fa-calendar-alt\"></i> $post_date</div>";
        
        if (!empty($categories) && is_array($categories)) {
            echo "<div style=\"margin-top: 8px;\">";
            echo "<i class=\"fas fa-tags\" style=\"color: #007bff;\"></i> ";
            foreach ($categories as $cat) {
                echo "<span style=\"background: #e3f2fd; color: #007bff; padding: 4px 12px; border-radius: 15px; font-weight: 500; display: inline-block; margin: 2px 4px 2px 0; font-size: 0.9rem;\">" . htmlspecialchars($cat) . "</span>";
            }
            echo "</div>";
        }
        
        echo "</div>";
    }
    
    echo "
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