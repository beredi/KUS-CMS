<h2>Všetci užívatelia</h2>

<table class="table table-hover table-striped" id="uzivatelia">
    <thead>
    <tr>
        <th>Titul</th>
        <th>Meno</th>
        <th>Priezvisko</th>
        <th>Email</th>
        <th>Funkcia</th>
        <th>Rola</th>
        <th>Obrázok</th>
        <th>Upraviť</th>
        <th>Vymazať</th>
    </tr>
    </thead>
    <tbody>

    <?php

    try{
        include 'includes/db.php';


        $query = "SELECT * from users ORDER BY user_id DESC";

        $send_info = $connection->prepare($query);

        $send_info->execute();

        while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
            $user_id = $row['user_id'];
            $user_titul = $row['user_titul'];
            $user_name = $row['user_name'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $user_function = $row['user_function'];
            $user_image = $row['user_image'];

            echo "
            
            <tr>
                <td>$user_titul</td>
                <td>$user_name</td>
                <td>$user_lastname</td>
                <td>$user_email</td>
                <td>$user_function</td>
                <td>$user_role</td>
                <td><img src=\"../images/ludia/$user_image\" alt=\"placeholder\" height=\"50px\"></td>
                <td class=\"text-right tdWidth\">";

            if (strpos($_SESSION['user_role'],'admin')||$user_id==$_SESSION['user_id']){
                echo "<a href=\"users.php?source=edit_user&edit={$user_id}\"><i class=\"far fa-edit\"></i> Upraviť</a>
                ";
            }

               echo " </td>
                <td class=\"text-right tdWidth\">";
            if (strpos($_SESSION['user_role'],'admin')){
               echo "<a href=\"users.php?delete=$user_id\" class='delete-button'><i class=\"far fa-trash-alt\"></i> Vymazať</a>";
                }
            echo    "</td>
            </tr>
            ";

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
    $user_id = $_GET['delete'];
    try{ //ziska nazov podla ID
        include 'includes/db.php';


        $query = "SELECT * from users WHERE user_id=:user_id";

        $send_info = $connection->prepare($query);
        $send_info->bindParam(':user_id', $user_id);
        $send_info->execute();


        $result = $send_info->fetch(PDO::FETCH_ASSOC);

        $user_name = $result['user_name'].' '.$result['user_lastname'];

    }
    catch (Exception $e){
        echo $e;
    }

    if (isset($_SESSION['user_role'])){
        if (strpos($_SESSION['user_role'], 'admin')){

            try{
                include 'includes/db.php';

                $query = "DELETE FROM users WHERE user_id=:user_id";


                $send_info = $connection->prepare($query);
                $send_info->bindParam(':user_id', $user_id);
                $send_info->execute();
                // LOG
                include "includes/add_log.php";
                $logAction = "Vymazal používateľa " . $user_name;
                createLog($connection, $logAction, "používatelia");
                header('Location: users.php');
            }
            catch (Exception $e){
                echo $e;
            }
        }
    }
}

?>

