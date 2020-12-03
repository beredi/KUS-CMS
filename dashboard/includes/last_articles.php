
<table class="table table-hover table-striped collapse show" id="clanky">
    <thead>
    <tr>
        <th>Názov</th>
        <th>Autor</th>
        <th>Dátum</th>
        <th>Posledný upravil</th>
        <th>Stav</th>
        <th>Kľúčové slová</th>
        <th>Obrázok</th>
        <th>Zobraziť</th>
        <th>Upraviť</th>
        <th>Vymazať</th>
    </tr>
    </thead>
    <tbody>

    <?php

    try{
        include 'includes/db.php';


        $query = "SELECT * from posts INNER JOIN users ON posts.post_author = users.user_id  ORDER BY post_id DESC";
        $query1 = "SELECT * from users";
        $send_info = $connection->prepare($query);
        $send_info2 = $connection->prepare($query1);

        $send_info->execute();
        $send_info2->execute();
        $users = $send_info2->fetchAll();
        while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author_id = $row['post_author'];
            $post_author_name = $row['user_name'];
            $post_author_lastname = $row['user_lastname'];
            $post_author = $post_author_name . ' ' . $post_author_lastname;
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_status = $row['post_status'];
            $post_last_edited_id = $row['post_last_edited'];
            foreach ($users as $user) {
                if ($user['user_id'] == $post_last_edited_id){
                    $post_last_edited = $user['user_name'] . ' ' . $user['user_lastname'];
                }
            }

            echo "
            
            <tr>
                <td>$post_title</td>
                <td>$post_author</td>
                <td>$post_date</td>
                <td>$post_last_edited</td>
                <td bgcolor=\"";
            if ($post_status=='draft'){
                echo "#ffd6d6\"";

            }
            else{
                echo "#d6ffdc\"";
            }

            echo "\">";
            if($post_status=='draft'){
                echo 'Čaká na schválenie';
            }
            else{
                echo 'Publikovaný';
            }
            echo "</td>
                <td>$post_tags</td>
                <td><img src=\"../images/articles/$post_image\" alt=\"placeholder\" width=\"100px\"></td>
                <td class=\"tdWidth\"><a href=\"../clanok.php?p_id=$post_id\" target='_blank'><i class=\"fas fa-search\"></i> Zobraziť</a></td>
              <td class=\"tdWidth\">
                ";

            $user = $_SESSION['user_name']." ".$_SESSION['user_lastname'];
            if (strpos($_SESSION['user_role'], 'lektor')|| strpos($_SESSION['user_role'], 'moderator')|| strpos($_SESSION['user_role'], 'admin') || $user == $post_author ) {
                echo " <a href=\"posts.php?source=edit_post&edit={$post_id}\"><i class=\"far fa-edit\"></i> Upraviť</a>";
            }
            echo "</td>
            <td class=\"tdWidth\">";

            if (strpos($_SESSION['user_role'], 'admin')){
                echo  " <a href=\"posts.php?delete=$post_id\"><i class=\"far fa-trash-alt\"></i> Vymazať</a>
            ";
            }

            echo "</td>
            </tr>";

        }


    }
    catch (Exception $e){
        echo $e;
    }
    ?>


    </tbody>
</table>


<?php

if (isset($_GET['delete'])){
    $post_id = $_GET['delete'];


    try{
        include 'includes/db.php';

        $query = "DELETE FROM posts WHERE post_id=:post_id";


        $send_info = $connection->prepare($query);
        $send_info->bindParam(':post_id', $post_id);
        $send_info->execute();
        header('Location: posts.php');
    }
    catch (Exception $e){
        echo $e;
    }
}

?>