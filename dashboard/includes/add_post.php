<?php

if (isset($_SESSION['user_role'])){
//EVERYBODY CAN ADD THE POST
    if (isset($_POST['add_post'])){



        $post_title = $_POST['post_title'];
        $post_tags = $_POST['post_tags'];




        $post_content = $_POST['post_content'];
        $post_date = date('d-m-Y');
        if (isset($_SESSION['user_name']) && isset($_SESSION['user_lastname'])){
            $post_author = $_SESSION['user_id'];
        }
        $post_status = 'draft';
        $post_last_edited = $post_author;



        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $temp = explode(".", $_FILES['post_image']['name']);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        if(isset($post_image)){
            if(!empty($post_image)){
                $post_image = $newfilename;
                move_uploaded_file($post_image_temp, "../images/articles/$post_image");

            }
            else {
                echo 'neuspech';
            }
        }

        try{
            include "includes/db.php";


            $query = "INSERT INTO posts(post_title, post_author, post_date, post_image, post_content, post_tags, post_status, post_last_edited) VALUES (:post_title, :post_author, now(), :post_image, :post_content, :post_tags, :post_status, :post_last_edited)";

            $send_info = $connection->prepare($query);

            $send_info->bindParam(':post_title', $post_title);
            $send_info->bindParam(':post_author', $post_author);
            $send_info->bindParam(':post_image', $post_image);
            $send_info->bindParam(':post_content', $post_content);
            $send_info->bindParam(':post_tags', $post_tags);
            $send_info->bindParam(':post_status', $post_status);
            $send_info->bindParam(':post_last_edited', $post_last_edited);

            $send_info->execute();

            // LOG
            include "includes/add_log.php";
            $logAction = "Pridal článok " . $post_title;
            createLog($connection, $logAction, "články");


            echo "<h3 class='text-success'>Článok $post_title bol odoslaný a čaká na schválenie! </h3>";

            include 'send_email_admin_lector.php';
            sendEmailToAdminOrLector($connection);

        }
        catch (Exception $e){
            echo $e;
        }
        try{
            include "includes/db.php";
            $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 1";

            $send_info = $connection->prepare($query);
            $send_info->execute();

            $result = $send_info->fetch(PDO::FETCH_ASSOC);

            $post_id = $result['post_id'];
            echo "<a href=\"../clanok.php?p_id=$post_id\" class='text-info' target='_blank'><h4><i class=\"fas fa-search\"></i> Zobraziť</h4></a>";

        }catch (Exception $e){
            echo $e;
        }
    }


//IF USER IS ADMIN OR LEKTOR HE CAN PUBLISH THE POST

    if (strpos($_SESSION['user_role'], 'admin') || strpos($_SESSION['user_role'], 'lektor')){



        if (isset($_POST['publish_post'])){



            $post_title = $_POST['post_title'];
            $post_tags = $_POST['post_tags'];




            $post_content = $_POST['post_content'];
            $post_date = date('d-m-Y');
            if (isset($_SESSION['user_name']) && isset($_SESSION['user_lastname'])){
                $post_author = $_SESSION['user_id'];
            }
            $post_status = 'published';
            $post_last_edited = $post_author;



            $post_image = $_FILES['post_image']['name'];
            $post_image_temp = $_FILES['post_image']['tmp_name'];
            $temp = explode(".", $_FILES['post_image']['name']);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            if(isset($post_image)){
                if(!empty($post_image)){
                    $post_image = $newfilename;
                    move_uploaded_file($post_image_temp, "../images/articles/$post_image");

                }
                else {
                    echo 'neuspech';
                }
            }

            try{
                include "includes/db.php";


                $query = "INSERT INTO posts(post_title, post_author, post_date, post_image, post_content, post_tags, post_status, post_last_edited) VALUES (:post_title, :post_author, now(), :post_image, :post_content, :post_tags, :post_status, :post_last_edited)";

                $send_info = $connection->prepare($query);

                $send_info->bindParam(':post_title', $post_title);
                $send_info->bindParam(':post_author', $post_author);
                $send_info->bindParam(':post_image', $post_image);
                $send_info->bindParam(':post_content', $post_content);
                $send_info->bindParam(':post_tags', $post_tags);
                $send_info->bindParam(':post_status', $post_status);
                $send_info->bindParam(':post_last_edited', $post_last_edited);

                $send_info->execute();
                $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 1";

                $send_info = $connection->prepare($query);
                $send_info->execute();

                $result = $send_info->fetch(PDO::FETCH_ASSOC);

                $post_id = $result['post_id'];
                echo "<h3 class='text-success'>Článok $post_title bol publikovaný! <small><a href=\"../clanok.php?p_id=$post_id\" class='text-muted' target='_blank'>Zobraziť</a></small></h3>";
                // LOG
                include "includes/add_log.php";
                $logAction = "Publikoval článok " . $post_title;
                createLog($connection, $logAction, "články");

            }
            catch (Exception $e){
                echo $e;
            }


    }



}
}

?>

<h2>Pridať článok</h2>

<form action="" method="post" enctype="multipart/form-data" class="my-2">
    <div class="form-group">
        <label for="post_title">Názov:</label>
        <input type="text" class="form-control" id="post_title" placeholder="Zadajte názov článku" name="post_title" required autocomplete="off">
    </div>
    <div class="form-group">
        <label for="post_tags">Kľúčové slová:</label>
        <input type="text" class="form-control" id="post_title" aria-describedby="postTags" placeholder="Zadajte kľúčové slová" name="post_tags" autocomplete="off">
        <small id="postTags" class="form-text text-muted">Zadajte kľúčové slová, ktoré blízko popisujú článok. Jednotlivé slová oddeľujte čiarkou. Napríklad: <span class="text-info">Selenča, KUS, zájazd</span></small>
    </div>
    <div class="form-group mt-3">
        <label for="post_image">Obrázok: <span class="text-danger">Formát: na ležato (do 10MB!)</span></label>
        <input type="file" class="form-control-file" id="post_image" name="post_image" required>
    </div>
    <div class="form-group">
        <label for="post_content">Obsah:</label>
        <textarea class="form-control" rows="10" id="post_content" name="post_content" placeholder="Napíšte článok..." required></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="add_post" value="Odoslať">
    <?php
    if (strpos($_SESSION['user_role'], 'admin') || strpos($_SESSION['user_role'], 'lektor')){
        echo "
        
    <input type=\"submit\" class=\"btn btn-success\" name=\"publish_post\" value=\"Publikovať\">
        ";
    }
    ?>



</form>
<script>
    CKEDITOR.replace( 'post_content' );
</script>


<!--
<div class="form-group">
    <label for="post_title">Názov:</label>
    <input type="email" class="form-control" id="post_title" aria-describedby="emailHelp" placeholder="Zadajte názov článku" name="post_title">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>-->