<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
    <div class="sidebar" style="background: #f8f9fa; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="border-bottom: 3px solid #007bff; padding-bottom: 10px; margin-bottom: 20px;">
            <h3 style="color: #333; font-weight: 600; margin: 0;">Posledné články</h3>
        </div>
        
        <?php
        try {
            include 'dashboard/includes/db.php';

            $query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_date DESC LIMIT 5";
            $send_info = $connection->prepare($query);
            $send_info->execute();

            while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_image = $row['post_image'];
                $temp_post_content = strip_tags($row['post_content']);
                $post_excerpt = substr($temp_post_content, 0, 80) . '...';
                $post_date = date('d.m.Y', strtotime($row['post_date']));
                
                echo '
                <div style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #dee2e6;">
                    <a href="clanok.php?p_id='.$post_id.'" style="text-decoration: none; color: inherit;">
                        <div style="position: relative; overflow: hidden; border-radius: 6px; margin-bottom: 10px;">
                            <img src="images/articles/'.$post_image.'" 
                                 alt="'.$post_title.'" 
                                 style="width: 100%; height: 150px; object-fit: cover; transition: transform 0.3s ease;"
                                 onmouseover="this.style.transform=\'scale(1.05)\'" 
                                 onmouseout="this.style.transform=\'scale(1)\'">
                        </div>
                        <h5 style="color: #333; font-weight: 600; margin: 0 0 10px 0; font-size: 1.15rem; line-height: 1.4;">
                            '.$post_title.'
                        </h5>
                        <p style="color: #6c757d; font-size: 0.95rem; margin: 0 0 8px 0; line-height: 1.5;">
                            '.$post_excerpt.'
                        </p>
                        <small style="color: #007bff; font-size: 0.9rem;">
                            <i class="far fa-calendar-alt"></i> '.$post_date.'
                        </small>
                    </a>
                </div>';
            }

        } catch (Exception $e) {
            echo '<p style="color: #dc3545;">Chyba pri načítaní článkov.</p>';
        }
        ?>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="predchadzajuce-podujatia.php" 
               style="display: inline-block; padding: 10px 20px; background: #007bff; color: white; 
                      text-decoration: none; border-radius: 5px; font-weight: 500; transition: background 0.3s ease;"
               onmouseover="this.style.background='#0056b3'" 
               onmouseout="this.style.background='#007bff'">
                Všetky články →
            </a>
        </div>
    </div>
</div>
