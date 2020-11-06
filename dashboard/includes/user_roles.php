<h2 class="mb-0">Roly užívateľov</h2>
<small class="text-info m-3">Každá rola má pridelené určité práva.</small>
<div class="row my-3">
    <h5>Práva</h5>
    <table class="table table-bordered table-hover mb-3">
        <thead>
            <th>Príkaz</th>
            <th>admin</th>
            <th>moderator</th>
            <th>lektor</th>
            <th>uzivatel</th>
        </thead>
        <tbody>

       <!-- ARTICLES-->
            <tr>
                <td colspan="5" class="bg-info text-white">Články <small>(každý užívateľ má právo upraviť svoj článok)</small></td>
            </tr>
            <tr>
                <td>Pridať článok</td>
                <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
                <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
                <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
                <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
            </tr>
            <tr>
                <td>Upraviť článok</td>
                <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
                <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
                <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
                <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
            </tr>
            <tr>
                <td>Publikovať článok</td>
                <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
                <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
                <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
                <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
            </tr>
            <tr>
                <td>Vymazať článok</td>
                <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
                <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
                <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
                <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
            </tr>
       <!-- //// ARTICLES-->

       <!-- EVENTS-->
       <tr>
           <td colspan="5" class="bg-info text-white">Podujatia</td>
       </tr>
       <tr>
           <td>Pridať podujatie</td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
       </tr>
       <tr>
           <td>Upraviť podujatie</td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
       </tr>
       <tr>
           <td>Vymazať podujatie</td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
           <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
           <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
       </tr>
       <!-- //// EVENTS-->

       <!-- USERS-->
       <tr>
           <td colspan="5" class="bg-info text-white">Užívatelia <small>(každý užívateľ môže upraviť svoj profil)</small></td>
       </tr>
       <tr>
           <td>Pridať užívateľa</td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
           <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
       </tr>
       <tr>
           <td>Upraviť užívateľa</td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
           <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
           <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
       </tr>
       <tr>
           <td>Vymazať užívateľa</td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
           <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
           <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
       </tr>
       <!-- //// USERS-->

       <!-- NEWS-->
       <tr>
           <td colspan="5" class="bg-info text-white">Novinky</td>
       </tr>
       <tr>
           <td>Upraviť novinky</td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-success text-center text-white"><i class="fas fa-check"></i></td>
           <td class="bg-danger text-center text-white"><i class="fas fa-times"></i></i></td>
       </tr>
       <!-- //// NEWS-->
        </tbody>
    </table>


</div>

<!--ADMIN-->
<hr>
    <h5>Zoznam užívateľov v jednotlivých rolách</h5>
    <h6 class="font-weight-bold">admin:</h6>
<div class="row my-3">
    <ul class="list-group ml-5">

        <?php

        try{

            include "includes/db.php";

            $query = "SELECT * FROM users WHERE user_role LIKE '%admin%'";

            $send_info = $connection->prepare($query);

            $send_info->execute();

            while ($row = $send_info->fetch(PDO::FETCH_ASSOC)){
                $user_name = $row['user_name'];
                $user_lastname = $row['user_lastname'];


                echo "
                
        <li class=\"list-group-item\">
            <span class=\"float-right\">$user_name $user_lastname</span>
        </li>
                ";
            }

        }catch (Exception $e){
            echo $e;
        }

        ?>
    </ul>

</div>

<!--MODERATOR-->
<h6 class="font-weight-bold">moderator:</h6>
<div class="row my-3">
    <ul class="list-group ml-5">

        <?php

        try{

            include "includes/db.php";

            $query = "SELECT * FROM users WHERE user_role LIKE '%moderator%'";

            $send_info = $connection->prepare($query);

            $send_info->execute();

            while ($row = $send_info->fetch(PDO::FETCH_ASSOC)){
                $user_name = $row['user_name'];
                $user_lastname = $row['user_lastname'];


                echo "
                
        <li class=\"list-group-item\">
            <span class=\"float-right\">$user_name $user_lastname</span>
        </li>
                ";
            }

        }catch (Exception $e){
            echo $e;
        }

        ?>
    </ul>

</div>

<!--LEKTOR-->


<h6 class="font-weight-bold">lektor:</h6>
<div class="row my-3">
    <ul class="list-group ml-5">

        <?php

        try{

            include "includes/db.php";

            $query = "SELECT * FROM users WHERE user_role LIKE '%lektor%'";

            $send_info = $connection->prepare($query);

            $send_info->execute();

            while ($row = $send_info->fetch(PDO::FETCH_ASSOC)){
                $user_name = $row['user_name'];
                $user_lastname = $row['user_lastname'];


                echo "
                
        <li class=\"list-group-item\">
            <span class=\"float-right\">$user_name $user_lastname</span>
        </li>
                ";
            }

        }catch (Exception $e){
            echo $e;
        }

        ?>
    </ul>

</div>


<!--uzivtel-->


<h6 class="font-weight-bold">uzivatel:</h6>
<div class="row my-3">
    <ul class="list-group ml-5">

        <?php

        try{

            include "includes/db.php";

            $query = "SELECT * FROM users WHERE user_role LIKE '%uzivatel%'";

            $send_info = $connection->prepare($query);

            $send_info->execute();

            while ($row = $send_info->fetch(PDO::FETCH_ASSOC)){
                $user_name = $row['user_name'];
                $user_lastname = $row['user_lastname'];


                echo "
                
        <li class=\"list-group-item\">
            <span class=\"float-right\">$user_name $user_lastname</span>
        </li>
                ";
            }

        }catch (Exception $e){
            echo $e;
        }

        ?>
    </ul>

</div>