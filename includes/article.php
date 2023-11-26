<?php
function generateArticleCard($post_id, $post_image, $post_title, $post_content){
    $temp_post_content = strip_tags($post_content);
    $final_post_content = (substr($temp_post_content, 0, 190) . "...");

    echo "
        <div class=\"media clanokMedia \">
            <div class=\"media-top\">
                <a href=\"clanok.php?p_id=$post_id\">
                    <img 
                        src=\"images/articles/$post_image\" 
                        class=\"media-object\" 
                        width=\"100%\"
                        height=\"auto\" 
                        alt=\"$post_title\">
                </a>
            </div>
            <div class=\"media-body\">
                <h3 class=\"media-heading\"><a href=\"clanok.php?p_id=$post_id\">$post_title</a></h3>
                <p class='text-justify'>$final_post_content<a href=\"clanok.php?p_id=$post_id\"> Čítaj viac!</a></p>
            </div>
        </div>
    ";
}

?>