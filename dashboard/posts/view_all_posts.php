<h2>Všetky články</h2>

<!-- Category Filter -->
<div style="margin-bottom: 20px;">
    <label for="category_filter">
        <i class="fas fa-filter"></i> Filter podľa kategórie:
    </label>
    <select id="category_filter" class="form-control" style="width: 300px; display: inline-block;">
        <option value="">Všetky kategórie</option>
        <?php
        try {
            include 'includes/db.php';
            $catQuery = "SELECT * FROM categories ORDER BY name ASC";
            $catStmt = $connection->prepare($catQuery);
            $catStmt->execute();
            while ($cat = $catStmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $cat['id'] . '">' . htmlspecialchars($cat['name']) . '</option>';
            }
        } catch (Exception $e) {
            // Error handling
        }
        ?>
    </select>
</div>

<!-- Export Button -->
<div style="margin-bottom: 20px;">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exportModal">
        <i class="fas fa-file-pdf"></i> Export do PDF
    </button>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exportModalLabel">
                    <i class="fas fa-file-export"></i> Export článkov do PDF
                </h4>
            </div>
            <form action="posts/export_posts_pdf.php" method="POST" target="_blank">
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> 
                        Vyberte možnosti pre export článkov do PDF.
                    </div>
                    
                    <div class="form-group">
                        <label for="date_from">
                            <i class="fas fa-calendar-alt"></i> Dátum od:
                        </label>
                        <input 
                            type="date" 
                            class="form-control" 
                            id="date_from" 
                            name="date_from"
                            placeholder="Začiatok obdobia">
                        <small class="text-muted">Nechajte prázdne pre všetky články od začiatku</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="date_to">
                            <i class="fas fa-calendar-alt"></i> Dátum do:
                        </label>
                        <input 
                            type="date" 
                            class="form-control" 
                            id="date_to" 
                            name="date_to"
                            placeholder="Koniec obdobia">
                        <small class="text-muted">Nechajte prázdne pre všetky články do dnes</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="sort_order">
                            <i class="fas fa-sort"></i> Zoradiť:
                        </label>
                        <select class="form-control" id="sort_order" name="sort_order">
                            <option value="DESC">Od najnovších po najstaršie</option>
                            <option value="ASC">Od najstarších po najnovšie</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="export_categories">
                            <i class="fas fa-tags"></i> Kategórie:
                        </label>
                        <select class="form-control" id="export_categories" name="categories[]" multiple size="5">
                            <option value="" selected>Všetky kategórie</option>
                            <?php
                            try {
                                $catQuery = "SELECT * FROM categories ORDER BY name ASC";
                                $catStmt = $connection->prepare($catQuery);
                                $catStmt->execute();
                                while ($cat = $catStmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . $cat['id'] . '">' . htmlspecialchars($cat['name']) . '</option>';
                                }
                            } catch (Exception $e) {
                                // Error handling
                            }
                            ?>
                        </select>
                        <small class="text-muted">Držte Ctrl/Cmd pre výber viacerých kategórií. Nechajte "Všetky kategórie" pre export všetkých.</small>
                    </div>
                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="all_posts" name="all_posts" checked>
                            Exportovať všetky články (ignorovať dátumový filter)
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <i class="fas fa-times"></i> Zrušiť
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-file-pdf"></i> Exportovať PDF
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<table class="table table-hover table-striped" id="clanky">
    <thead>
    <tr>
        <th>Názov</th>
        <th>Autor</th>
        <th>Dátum</th>
        <th>Kategórie</th>
        <th>Posledný upravil</th>
        <th>Stav</th>
        <th>Obrázok</th>
        <th>Zobraziť</th>
        <th>Upraviť</th>
        <th>Vymazať</th>
    </tr>
    </thead>
    <tbody>

	<?php

	try {
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
			$post_status = $row['post_status'];
			$post_last_edited_id = $row['post_last_edited'];
			
			// Get categories for this post
			$catQuery = "SELECT c.id, c.name FROM categories c 
			             INNER JOIN post_categories pc ON c.id = pc.category_id 
			             WHERE pc.post_id = :post_id ORDER BY c.name ASC";
			$catStmt = $connection->prepare($catQuery);
			$catStmt->bindParam(':post_id', $post_id);
			$catStmt->execute();
			$categories = $catStmt->fetchAll(PDO::FETCH_ASSOC);
			$categoryIds = array_column($categories, 'id');
			$categoryNames = array_map(function($cat) {
				return htmlspecialchars($cat['name']);
			}, $categories);
			$categoriesDisplay = !empty($categoryNames) ? implode(', ', $categoryNames) : '<span class="text-muted">Bez kategórie</span>';
			
			foreach ($users as $user) {
				if ($user['user_id'] == $post_last_edited_id) {
					$post_last_edited = $user['user_name'] . ' ' . $user['user_lastname'];
				}
			}

			echo "
            
            <tr data-categories='" . json_encode($categoryIds) . "'>
                <td>$post_title</td>
                <td>$post_author</td>
                <td>$post_date</td>
                <td>$categoriesDisplay</td>
                <td>$post_last_edited</td>
                <td bgcolor=\"";
			if ($post_status == 'draft') {
				echo "#ffd6d6\"";

			} else {
				echo "#d6ffdc\"";
			}

			echo "\">";
			if ($post_status == "draft") {
				echo "Čaká na schválenie";
			} else {
				echo 'Publikovaný';
			}
			echo "</td>
                <td><img src=\"../images/articles/$post_image\" alt=\"placeholder\" width=\"100px\"></td>
                <td class=\"tdWidth\"><a href=\"../clanok.php?p_id=$post_id\" target='_blank'><i class=\"fas fa-search\"></i> Zobraziť</a></td>
              <td class=\"tdWidth\">
                ";

			$user = $_SESSION['user_name'] . " " . $_SESSION['user_lastname'];
			if (strpos($_SESSION['user_role'], 'lektor') || strpos($_SESSION['user_role'], 'moderator') || strpos($_SESSION['user_role'], 'admin') || $user == $post_author) {
				echo " <a href=\"posts.php?source=edit_post&edit={$post_id}\"><i class=\"far fa-edit\"></i> Upraviť</a>";
			}
			echo "</td>
            <td class=\"tdWidth\">";

			if (strpos($_SESSION['user_role'], 'admin')) {
				echo " <a href=\"posts.php?delete=$post_id\" class='delete-button'><i class=\"far fa-trash-alt\"></i> Vymazať</a>
            ";
			}

			echo "</td>
            </tr>";


		}


	} catch (Exception $e) {
		echo $e;
	}
	?>


    </tbody>
</table>


<?php

if (isset($_GET['delete'])) {
	$post_id = $_GET['delete'];
	try { //ziska nazov podla ID
		include 'includes/db.php';


		$query = "SELECT * from posts WHERE post_id=:post_id";

		$send_info = $connection->prepare($query);
		$send_info->bindParam(':post_id', $post_id);
		$send_info->execute();


		$result = $send_info->fetch(PDO::FETCH_ASSOC);

		$post_title = $result['post_title'];

	} catch (Exception $e) {
		echo $e;
	}

	if (isset($_SESSION['user_role'])) {


		if (strpos($_SESSION['user_role'], 'admin')) {

			try {
				include 'includes/db.php';

				$query = "DELETE FROM posts WHERE post_id=:post_id";


				$send_info = $connection->prepare($query);
				$send_info->bindParam(':post_id', $post_id);
				$send_info->execute();

				// LOG
				include "includes/add_log.php";
				$logAction = "Vymazal článok " . $post_title;
				createLog($connection, $logAction, "články");

				header('Location: posts.php');
			} catch (Exception $e) {
				echo $e;
			}
		}
	}

}

?>

<script>
    $(document).ready(function () {
        var table = $('#clanky').DataTable({
            "order": [],
            "pageLength": 10
        });
        
        // Category filter
        $('#category_filter').on('change', function() {
            var selectedCategory = $(this).val();
            
            if (selectedCategory === '') {
                // Show all rows
                table.rows().every(function() {
                    $(this.node()).show();
                });
            } else {
                // Filter rows
                table.rows().every(function() {
                    var rowNode = this.node();
                    var categories = JSON.parse($(rowNode).attr('data-categories') || '[]');
                    
                    if (categories.includes(parseInt(selectedCategory))) {
                        $(rowNode).show();
                    } else {
                        $(rowNode).hide();
                    }
                });
            }
            
            table.draw(false);
        });
        
        // Handle "all posts" checkbox
        $('#all_posts').change(function() {
            if ($(this).is(':checked')) {
                $('#date_from').prop('disabled', true).val('');
                $('#date_to').prop('disabled', true).val('');
            } else {
                $('#date_from').prop('disabled', false);
                $('#date_to').prop('disabled', false);
            }
        });
        
        // Set today's date as default for date_to
        var today = new Date().toISOString().split('T')[0];
        $('#date_to').attr('max', today);
        
        // Validate date range
        $('#date_from, #date_to').change(function() {
            var dateFrom = $('#date_from').val();
            var dateTo = $('#date_to').val();
            
            if (dateFrom && dateTo && dateFrom > dateTo) {
                alert('Dátum "od" nemôže byť väčší ako dátum "do"!');
                $(this).val('');
            }
        });
    });
</script>
