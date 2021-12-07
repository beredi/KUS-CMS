<?php

if (isset($_GET['edit'])) {
    $user_id = $_GET['edit'];

    try {

        include "includes/db.php";

        $query = "SELECT * FROM users WHERE user_id = $user_id ";

        $send_info = $connection->prepare($query);

        $send_info->execute();

        while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
            $user_password = $row['user_password'];
            $user_email = $row['user_email'];
            $user_name = $row['user_name'];
            $user_lastname = $row['user_lastname'];
            $user_titul = $row['user_titul'];
            $user_function = $row['user_function'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];


        }
    }
    catch (Exception $e){
        echo $e;
    }
}



if (isset($_SESSION['user_id']) && isset($_SESSION['user_role'])){
    //UPDATE USER GENERALY (IF YOU ARE ADMIN)
    if (strpos($_SESSION['user_role'], 'admin') || ($_SESSION['user_id'] == $user_id)){
        if (isset($_POST['edit_user'])){

            $user_password = $_POST['user_password'];
            $user_password_confirm =  $_POST['user_password_confirm'];

            //IF USER ENTERED PASSWORDS THAT MATCH
            if (!empty($user_password) && ($user_password == $user_password_confirm)) {
                $user_password = $_POST['user_password'];
                $user_email = $_POST['user_email'];
                $user_name = $_POST['user_name'];
                $user_lastname = $_POST['user_lastname'];
                $user_titul = $_POST['user_titul'];

                if (!strpos($_SESSION['user_role'],'uzivatel')){
                    $user_role_array = $_POST['user_role'];
                    $user_role = '';
                    foreach ($user_role_array as $array=>$value) {
                        $user_role .= " $value,";
                    }
                    $user_role = substr($user_role, 0, -1);
                }
                else {
                    $user_role = ' uzivatel';
                }

                if (strpos($user_role, 'admin')&&strpos($_SESSION['user_role'],'moderator')){

                    echo "<h4  class='text-danger'>Nemáte oprávnenie pridať administrátora!</h4>";
                }
                else{

                    if (!strpos($_SESSION['user_role'],'uzivatel')) {
                        $user_function = $_POST['user_function'];
                    }
                    $user_image = $_FILES['user_image']['name'];
                    $user_image_temp = $_FILES['user_image']['tmp_name'];

                    move_uploaded_file($user_image_temp, "../images/ludia/$user_image");
                    if(empty($user_image)){

                        try{
                            include 'includes/db.php';
                            $query = "SELECT * FROM users WHERE user_id = $user_id ";


                            $send_info = $connection->prepare($query);

                            $send_info->execute();

                            while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                                $user_image = $row['user_image'];
                            }

                        }catch (Exception $e){
                            echo $e;
                        }


                    }


                    try{
                        include "includes/db.php";


                        $query = "UPDATE users SET ";

                        $query .= "user_email = :user_email, ";
                        $query .= "user_name = :user_name, ";
                        $query .= "user_lastname = :user_lastname, ";
                        $query .= "user_titul = :user_titul, ";
                        $query .= "user_role = :user_role, ";
                        if (!strpos($_SESSION['user_role'],'uzivatel')) {
                            $query .= "user_function = :user_function, ";
                        }
                        $query .= "user_password = AES_ENCRYPT(:password, :key), ";
                        $query .= "user_image = :user_image ";
                        $query .= "WHERE user_id=$user_id ";

                        $send_info = $connection->prepare($query);

                        $send_info->bindParam(':user_email', $user_email);
                        $send_info->bindParam(':user_name', $user_name);
                        $send_info->bindParam(':password', $user_password);
                        $send_info->bindParam(':key', $key);
                        $send_info->bindParam(':user_role', $user_role);

                        if (!strpos($_SESSION['user_role'],'uzivatel')) {
                            $send_info->bindParam(':user_function', $user_function);
                        }
                        $send_info->bindParam(':user_image', $user_image);
                        $send_info->bindParam(':user_titul', $user_titul);
                        $send_info->bindParam(':user_lastname', $user_lastname);

                        $send_info->execute();
                        echo "<h3 class='text-success'>Užívateľ $user_name bol aktualizovaný!</h3>";

                        // LOG
                        include "includes/add_log.php";
                        $logAction = "Aktualizoval používateľa " . $user_name;
                        createLog($connection, $logAction, "používatelia");


                        header('Location: profile.php?edit='.$user_id);
                    }
                    catch (Exception $e){
                        echo $e;
                    }



                }
            }
            //IF USER DIDNT ENTER PASSWORD IN EDIT FORMULAR
            else if(empty($user_password_confirm) && empty($user_password)){
                try{
                    include 'includes/db.php';
                    $query = "SELECT * FROM users WHERE user_id = $user_id ";


                    $send_info = $connection->prepare($query);

                    $send_info->execute();

                    while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                        $user_password = $row['user_password'];
                    }

                }catch (Exception $e){
                    echo $e;
                }

                $user_email = $_POST['user_email'];
                $user_name = $_POST['user_name'];
                $user_lastname = $_POST['user_lastname'];
                $user_titul = $_POST['user_titul'];


                if (!strpos($_SESSION['user_role'],'uzivatel')){
                    $user_role_array = $_POST['user_role'];

                    $user_role = '';
                    foreach ($user_role_array as $array=>$value) {
                        $user_role .= " $value,";
                    }
                    $user_role = substr($user_role, 0, -1);
                }
                else {
                    $user_role = ' uzivatel';
                }

                if (strpos($user_role, 'admin')&&strpos($_SESSION['user_role'],'moderator')){

                    echo "<h4  class='text-danger'>Nemáte oprávnenie pridať administrátora!</h4>";
                }
                else{


                    if (!strpos($_SESSION['user_role'],'uzivatel')) {
                        $user_function = $_POST['user_function'];
                    }
                    $user_image = $_FILES['user_image']['name'];
                    $user_image_temp = $_FILES['user_image']['tmp_name'];

                    move_uploaded_file($user_image_temp, "../images/ludia/$user_image");
                    if(empty($user_image)){

                        try{
                            include 'includes/db.php';
                            $query = "SELECT * FROM users WHERE user_id = $user_id ";


                            $send_info = $connection->prepare($query);

                            $send_info->execute();

                            while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                                $user_image = $row['user_image'];
                            }

                        }catch (Exception $e){
                            echo $e;
                        }


                    }





                    try{
                        include "includes/db.php";


                        $query = "UPDATE users SET ";

                        $query .= "user_email = :user_email, ";
                        $query .= "user_name = :user_name, ";
                        $query .= "user_lastname = :user_lastname, ";
                        $query .= "user_titul = :user_titul, ";
                        $query .= "user_role = :user_role, ";

                        if (!strpos($_SESSION['user_role'],'uzivatel')) {
                            $query .= "user_function = :user_function, ";
                        }
                        $query .= "user_password = :user_password, ";
                        $query .= "user_image = :user_image ";
                        $query .= "WHERE user_id=$user_id ";

                        $send_info = $connection->prepare($query);

                        $send_info->bindParam(':user_email', $user_email);
                        $send_info->bindParam(':user_name', $user_name);
                        $send_info->bindParam(':user_password', $user_password);
                        $send_info->bindParam(':user_role', $user_role);

                        if (!strpos($_SESSION['user_role'],'uzivatel')) {
                            $send_info->bindParam(':user_function', $user_function);
                        }
                        $send_info->bindParam(':user_image', $user_image);
                        $send_info->bindParam(':user_titul', $user_titul);
                        $send_info->bindParam(':user_lastname', $user_lastname);

                        $send_info->execute();
                        echo "<h3 class='text-success'>Užívateľ $user_name bol aktualizovaný!</h3>";

                        // LOG
                        include "includes/add_log.php";
                        $logAction = "Aktualizoval používateľa " . $user_name;
                        createLog($connection, $logAction, "používatelia");
                    }
                    catch (Exception $e){
                        echo $e;
                    }


                    if($_SESSION['user_id'] == $user_id){

                        $_SESSION['user_email'] = $user_email;
                        $_SESSION['user_name'] = $user_name;
                        $_SESSION['user_lastname'] = $user_lastname;
                        $_SESSION['user_role'] = $user_role;
                        if (!strpos($_SESSION['user_role'],'uzivatel')) {
                            $_SESSION['user_function'] = $user_function;
                        }
                        $_SESSION['user_image'] = $user_image;

                        header('Location: profile.php?edit='.$user_id);
                    }

                }

            } // END OF 'IF USER DIDNT ENTER PASSWORD IN EDIT FORMULAR'

            //IF PASSWORDS DONT MATCH
            else {
                echo "<h3 class='text-danger'>Heslá sa nezhodujú</h3>";
            }



        }
    }
    else{
        header('Location: index.php');
    }
}

?>



<h2>Upraviť užívateľa</h2>
<div class="col-md-6 col-sm-12">
    <form action="" method="post" enctype="multipart/form-data" class="my-2">
        <div class="form-group">
            <label for="user_titul">Titul: </label>
            <input type="text" class="form-control text-right" id="user_titul" placeholder="Zadajte titul" name="user_titul" style="width:20%;" value="<?php echo $user_titul;?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="user_name" class="required">Meno:</label>
            <input type="text" class="form-control" id="user_name" placeholder="Zadajte meno užívateľa" name="user_name" value="<?php echo $user_name;?>" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="user_lastname" class="required">Priezvisko:</label>
            <input type="text" class="form-control" id="user_lastname" placeholder="Zadajte priezvisko užívateľa" name="user_lastname" value="<?php echo $user_lastname;?>" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="user_email" class="required">Email:</label>
            <input type="email" class="form-control" id="user_email" placeholder="Zadajte email užívateľa" name="user_email" value="<?php echo $user_email;?>" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="user_password" class="required">Heslo: <span class="text-danger">min. 5 znakov</span></label>
            <input type="password" class="form-control" id="user_password" placeholder="Zadajte heslo užívateľa" name="user_password" minlength="5">
        </div>
        <div class="form-group">
            <label for="user_password_confirm" class="required">Zopakovať heslo:</label>
            <input type="password" class="form-control" id="user_password_confirm" placeholder="Zopakujte heslo užívateľa" name="user_password_confirm">
        </div>
        <div class="form-group mt-3">
            <label for="user_image">Obrázok: <span class="text-danger">(do 10MB!)</span></label>
            <input type="file" class="form-control-file" id="user_image" name="user_image">
            <img src='../images/ludia/<?php echo $user_image;?>' alt='image' width="100px">
        </div>
        <div class="form-group mt-3">
            <label for="user_function">Funkcia:</label>
            <input type="text" class="form-control" id="user_function" placeholder="Zadajte funkciu užívateľa" name="user_function" aria-describedby="user_function" value="<?php echo $user_function;?>"  autocomplete="off"                 <?php
            if(strpos($_SESSION['user_role'], 'uzivatel')){
                echo 'disabled';
            }
            ?>>
            <small id="user_function" class="form-text text-muted">Napríklad: <span class="text-info">Predsedníčka spolku, Tajomník, Umelecký vedúci a pod.</span></small>
        </div>

        <span class="required">Rola</span>
        <div class="form-check">

            <input type="checkbox" class="form-check-input" name="user_role[]" value="admin" id="admin"  tabIndex="1" onClick="ckChange(this)"
                <?php
                if(strpos($user_role, 'admin')){
                    echo ' checked';
                }
                else {
                    echo ' disabled ';
                }
                ?>
            >
            <label class="form-check-label" for="admin">Admin</label>

        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="user_role[]" value="moderator" id="moderator" tabIndex="1" onClick="ckChange(this)"
                <?php
                if(strpos($user_role, 'moderator')){
                    echo ' checked';
                }
                else if (strpos($user_role, 'admin') || strpos($user_role, 'uzivatel')) {
                    echo ' disabled ';
                }
                ?>
            >
            <label class="form-check-label" for="moderator">Moderátor</label>

        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="user_role[]" value="lektor" id="lektor" tabIndex="1" onClick="ckChange(this)"
                <?php
                if(strpos($user_role, 'lektor')){
                    echo ' checked';
                }
                else if (strpos($user_role, 'admin') || strpos($user_role, 'uzivatel')) {
                    echo ' disabled ';
                }
                ?>
            >
            <label class="form-check-label" for="lektor">Lektor</label>

        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="user_role[]" value="uzivatel" id="uzivatel" tabIndex="1" onClick="ckChange(this)"
                <?php
                if(strpos($user_role, 'uzivatel')){
                    echo ' checked ';
                    if (strpos($_SESSION['user_role'], 'uzivatel')){
                        echo 'disabled';
                    }
                }
                else {
                    echo ' disabled ';
                }
                ?>
            >
            <label class="form-check-label" for="uzivatel">Užívateľ</label>


        </div>

        <input type="submit" class="btn btn-primary my-1 float-right" style="width: 50%;" name="edit_user" value="Upraviť">



    </form>
</div>

<script>
    function ckChange(ckType){
        var ckName = document.getElementsByName(ckType.name);
        var checked = document.getElementById(ckType.id);



        if (document.getElementById("admin").checked) {
            for(var i=0; i < ckName.length; i++){

                if(!ckName[i].checked){
                    ckName[i].disabled = true;
                }else{
                    ckName[i].disabled = false;
                }
            }
        }

        else if (document.getElementById("moderator").checked) {
            document.getElementById("admin").disabled = true
            document.getElementById("uzivatel").disabled = true
        }

        else if (document.getElementById("lektor").checked) {
            document.getElementById("admin").disabled = true
            document.getElementById("uzivatel").disabled = true
        }

        else if (document.getElementById("uzivatel").checked) {
            for(var i=0; i < ckName.length; i++){

                if(!ckName[i].checked){
                    ckName[i].disabled = true;
                }else{
                    ckName[i].disabled = false;
                }
            }
        }

        else {
            for(var i=0; i < ckName.length; i++){
                ckName[i].disabled = false;
            }
        }

    }
</script>