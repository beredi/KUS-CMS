<?php ob_start();
include "includes/header.php"; //INCLUDE HEADER

if (isset($_SESSION['user_role'])){
    if (strpos($_SESSION['user_role'], 'admin')){

        if(isset($_GET['pagepseu'])){
            $page_pseu = $_GET['pagepseu'];
        }


        if (isset($_POST['submit_page'])){
            $description = $_POST['description'];
            $content = $_POST['content'];
	        $title = $_POST['title'];

            try{
                include "includes/db.php";

                $query = "UPDATE pages SET ";
                $query .= "page_description = :description, ";
                $query .= "page_content = :content, ";
	            $query .= "page_title = :title ";
                $query .= "WHERE page_pseu = \"$page_pseu\" ";

                $send_info = $connection->prepare($query);

                $send_info->bindParam(':description', $description);
                $send_info->bindParam(':content', $content);
	            $send_info->bindParam(':title', $title);
                $send_info->execute();


                $message = "<h3 class='text-success'>Stránka bola aktualizovaná!</h3>";

                // LOG
                include "includes/add_log.php";
                $logAction = "Aktualizoval stránku so pseudonymom " . $page_pseu;
                createLog($connection, $logAction, "stránky");
            }
            catch (Exception $e){
                echo $e;
                error_log($e);
            }
        }


	    if (isset($_POST['add_page'])){
		    $title = $_POST['title'];
		    $description = $_POST['description'];
		    $content = $_POST['content'];
		    $newpseu = '';
		    $newpseu = strtolower(trim($title, ' ')) . rand(0,999);
		    $newpseu = preg_replace('/[^\x20-\x7E]/','', $newpseu);;
		    try{
			    include "includes/db.php";

			    $query = "INSERT INTO pages (page_title, page_pseu, page_description, page_content) VALUES (";
			    $query .= ":page_title, :page_pseu, :page_description, :page_content)";

			    $send_info = $connection->prepare($query);

			    $send_info->bindParam(':page_description', $description);
			    $send_info->bindParam(':page_content', $content);
			    $send_info->bindParam(':page_title', $title);
			    $send_info->bindParam(':page_pseu', $newpseu);
			    $send_info->execute();


			    $message = "<h3 class='text-success'>Stránka bola aktualizovaná!</h3>";

			    // LOG
			    include "includes/add_log.php";
			    $logAction = "Pridal stránku " . $title;
			    createLog($connection, $logAction, "stránky");
		    }
		    catch (Exception $e){
			    echo $e;
			    error_log($e);
		    }
	    }

    }
    else {
        header('Location: index.php');
    }
}
//  MOBILE NAVBAR

include "includes/mobile-navigation.php"; //INCLUDE NAVIGATION FOR MOBILE
?>


<!--LG SCREEN NAVBAR-->
<div class="col-md-10 col-sm-12 d-none d-md-inline">
    <a class="float-left text-light mt-2" href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i> Zobraziť stránku</a>
    <!--        USER INFO-->

    <?php
    include 'includes/profile_dropdown.php';
    ?>
</div><!--//LG SCREEN NAVBAR-->
</nav>
<div class="container-fluid">
        <?php
        include "includes/navigation.php";  //INCLUDE NAVIGATION


        include 'includes/db.php';
        if ($page_pseu != 'addpage'){
            $query = "SELECT * from pages WHERE page_pseu = \"".$page_pseu."\"";

            $send_info = $connection->prepare($query);

            $send_info->execute();
            while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                $title = $row['page_title'];
                $description = $row['page_description'];
                $content = $row['page_content'];
            ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <?php
                    if(isset($message)){
                        echo $message;
                    }
                    ?>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h2 class="float-left"><?=$title?></h2>
                            <div class="float-right">
                                <a href="about.php?delete=<?=$id?>" class="btn btn-lg btn-danger"><i class="far fa-trash-alt"></i> Vymazať túto sekciu</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="" method="post" enctype="multipart/form-data" class="my-2">
                                <div class="form-group">
                                    <label for="title">Názov sekcie:</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Názov sekcie" name="title" autocomplete="off" value="<?=$title?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Popis:</label>
                                    <input type="text" class="form-control" id="description" aria-describedby="description" placeholder="Popis stránky" name="description" autocomplete="off" value="<?=$description?>">
                                </div>
                                <div class="form-group">
                                    <label for="content">Obsah:</label>
                                    <textarea class="form-control" rows="10" id="content" name="content" placeholder="Obsah" required><?=$content?></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary" name="submit_page" value="Aktualizovať">
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        <?php

        }
    }
        else{
            ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
			        <?php
			        if(isset($message)){
				        echo $message;
			        }
			        ?>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h2>Pridať sekciu</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="" method="post" enctype="multipart/form-data" class="my-2">
                                <div class="form-group">
                                    <label for="title">Názov sekcie:</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Názov sekcie" name="title" autocomplete="off" value="">
                                </div>
                                <div class="form-group">
                                    <label for="description">Popis:</label>
                                    <input type="text" class="form-control" id="description" aria-describedby="description" placeholder="Popis stránky" name="description" autocomplete="off" value="">
                                </div>
                                <div class="form-group">
                                    <label for="content">Obsah:</label>
                                    <textarea class="form-control" rows="10" id="content" name="content" placeholder="Obsah" required></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary" name="add_page" value="Pridať">
                            </form>
                        </div>
                    </div>
                </div>
            </main>


    <?php
        }?>
</div>

<script>
    CKEDITOR.replace( 'content' );
</script>
<?php

include 'includes/footer.php';

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	try{ //ziska nazov podla ID
		include 'includes/db.php';


		$query = "SELECT * from pages WHERE id=:id";

		$send_info = $connection->prepare($query);
		$send_info->bindParam(':id', $id);
		$send_info->execute();


		$result = $send_info->fetch(PDO::FETCH_ASSOC);

		$title = $result['page_title'];
		$page_pseu = $result['page_pseu'];

	}
	catch (Exception $e){
		echo $e;
	}

	if (isset($_SESSION['user_role'])){


		if (strpos($_SESSION['user_role'], 'admin')){

			try{
				include 'includes/db.php';

				$query = "DELETE FROM pages WHERE id=:id";


				$send_info = $connection->prepare($query);
				$send_info->bindParam(':id', $id);
				$send_info->execute();

				// LOG
				include "includes/add_log.php";
				$logAction = "Vymazal stránku " . $title;
				createLog($connection, $logAction, "stránky");

				header('Location: index.php');
			}
			catch (Exception $e){
				echo $e;
			}
		}
	}

}

?>

