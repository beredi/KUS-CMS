<?php

if (isset($_GET['edit'])) {
    $post_id = $_GET['edit'];

    try {

        include "includes/db.php";

        $query = "SELECT * FROM posts WHERE post_id = $post_id ";

        $send_info = $connection->prepare($query);

        $send_info->execute();

        while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
            $post_title = $row['post_title'];
            $post_tags = $row['post_tags'];


            $post_image = $row['post_image'];


            $post_content = $row['post_content'];
            $post_date = $row['post_date'];
            $post_author = $row['post_author'];
            $post_status = $row['post_status'];
            $post_last_edited = $row['post_last_edited'];


        }
    }
    catch (Exception $e){
        echo $e;
    }
}


$user = $_SESSION['user_name']." ".$_SESSION['user_lastname'];
if (strpos($_SESSION['user_role'], 'lektor')|| strpos($_SESSION['user_role'], 'moderator')|| strpos($_SESSION['user_role'], 'admin') || $user == $post_author ){


    if (isset($_POST['edit_post'])){
        $post_title = $_POST['post_title'];
        $post_tags = $_POST['post_tags'];


        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        move_uploaded_file($post_image_temp, "../images/articles/$post_image");


        if(empty($post_image)){

            try{
                include 'includes/db.php';
                $query = "SELECT * FROM posts WHERE post_id = $post_id ";


                $send_info = $connection->prepare($query);

                $send_info->execute();

                while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                    $post_image = $row['post_image'];
                }

            }catch (Exception $e){
                echo $e;
            }


        }


        try{
            include 'includes/db.php';

            $query = "SELECT * FROM posts WHERE post_id = $post_id ";


            $send_info = $connection->prepare($query);

            $send_info->execute();

            while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                $post_date = $row['post_date'];
            }

        }catch (Exception $e){
            echo $e;
        }






        $post_content = $_POST['post_content'];
        $post_author = $_POST['post_author'];
        $post_status = 'draft';
        if (isset($_SESSION['user_name']) && isset($_SESSION['user_lastname'])){
            $post_last_edited = $_SESSION['user_name'] . " " .$_SESSION['user_lastname'];
        }

        try{
            include "includes/db.php";


            $query = "UPDATE posts SET ";

            $query .= "post_title = :post_title, ";
            $query .= "post_author = :post_author, ";
            $query .= "post_date = :post_date, ";
            $query .= "post_image = :post_image, ";
            $query .= "post_content = :post_content, ";
            $query .= "post_tags = :post_tags, ";
            $query .= "post_status = :post_status, ";
            $query .= "post_last_edited = :post_last_edited ";
            $query .= "WHERE post_id=$post_id ";

            $send_info = $connection->prepare($query);

            $send_info->bindParam(':post_title', $post_title);
            $send_info->bindParam(':post_author', $post_author);
            $send_info->bindParam(':post_image', $post_image);
            $send_info->bindParam(':post_content', $post_content);
            $send_info->bindParam(':post_tags', $post_tags);
            $send_info->bindParam(':post_status', $post_status);
            $send_info->bindParam(':post_date', $post_date);
            $send_info->bindParam(':post_last_edited', $post_last_edited);

            $send_info->execute();
            echo "<h3 class='text-success'>Článok $post_title bol upravený a čaká na schválenie! <small><a href=\"../clanok.php?p_id=$post_id\" class='text-muted' target='_blank'>Zobraziť</a></small></h3>";
        }
        catch (Exception $e){
            echo $e;
        }
    }


    if (isset($_POST['publish_post'])){
        $post_title = $_POST['post_title'];
        $post_tags = $_POST['post_tags'];


        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        move_uploaded_file($post_image_temp, "../images/articles/$post_image");


        if(empty($post_image)){

            try{
                include 'includes/db.php';
                $query = "SELECT * FROM posts WHERE post_id = $post_id ";


                $send_info = $connection->prepare($query);

                $send_info->execute();

                while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                    $post_image = $row['post_image'];
                }

            }catch (Exception $e){
                echo $e;
            }


        }


        try{
            include 'includes/db.php';

            $query = "SELECT * FROM posts WHERE post_id = $post_id ";


            $send_info = $connection->prepare($query);

            $send_info->execute();

            while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                $post_date = $row['post_date'];
            }

        }catch (Exception $e){
            echo $e;
        }






        $post_content = $_POST['post_content'];
        $post_author = $_POST['post_author'];
        $post_status = 'published';
        if (isset($_SESSION['user_name']) && isset($_SESSION['user_lastname'])){
            $post_last_edited = $_SESSION['user_name'] . " " .$_SESSION['user_lastname'];
        }


        try{
            include "includes/db.php";


            $query = "UPDATE posts SET ";

            $query .= "post_title = :post_title, ";
            $query .= "post_author = :post_author, ";
            $query .= "post_date = :post_date, ";
            $query .= "post_image = :post_image, ";
            $query .= "post_content = :post_content, ";
            $query .= "post_tags = :post_tags, ";
            $query .= "post_status = :post_status, ";
            $query .= "post_last_edited = :post_last_edited ";
            $query .= "WHERE post_id=$post_id ";

            $send_info = $connection->prepare($query);

            $send_info->bindParam(':post_title', $post_title);
            $send_info->bindParam(':post_author', $post_author);
            $send_info->bindParam(':post_image', $post_image);
            $send_info->bindParam(':post_content', $post_content);
            $send_info->bindParam(':post_tags', $post_tags);
            $send_info->bindParam(':post_status', $post_status);
            $send_info->bindParam(':post_date', $post_date);
            $send_info->bindParam(':post_last_edited', $post_last_edited);

            $send_info->execute();
            echo "<h3 class='text-success'>Článok $post_title bol publikovaný! <small><a href=\"../clanok.php?p_id=$post_id\" class='text-muted' target='_blank'>Zobraziť</a></small></h3>";
        }
        catch (Exception $e){
            echo $e;
        }
    }


}
else {
    header('Location: index.php');
}
?>





<h2>Upraviť článok</h2>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Názov:</label>
        <input type="text" class="form-control" id="post_title" value='<?php echo $post_title;?>' name="post_title" required autocomplete="off">
        <input type="text" name="post_author" value="<?php echo $post_author;?>" hidden>
    </div>
    <div class="form-group">
        <label for="post_tags">Kľúčové slová:</label>
        <input type="text" class="form-control" id="post_title" aria-describedby="postTags"  value='<?php echo $post_tags;?>' name="post_tags" autocomplete="off">
        <small id="postTags" class="form-text text-muted">Zadajte kľúčové slová, ktoré blízko popisujú článok. Jednotlivé slová oddeľujte čiarkou. Napríklad: <span class="text-info">Selenča, KUS, zájazd</span></small>
    </div>
    <div class="form-group mt-3">
    <label for="post_image">Obrázok: <span class="text-danger">(do 10MB!)</span></label>
    <input type="file" class="form-control-file" id="post_image" name="post_image"  value='$post_image'>
    <img src='../images/articles/<?php echo $post_image;?>' alt='image' width="100px">
    </div>
    <div class="form-group">
        <label for="post_content">Obsah:</label>
        <textarea class="form-control" rows="10" id="post_content" name="post_content" required><?php echo $post_content;?></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="edit_post" value="Upraviť">
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