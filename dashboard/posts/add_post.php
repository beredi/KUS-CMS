<?php

if (isset($_SESSION['user_role'])) {
//EVERYBODY CAN ADD THE POST
	if (isset($_POST['add_post'])) {


		$post_title = $_POST['post_title'];


		$post_content = $_POST['post_content'];
		
		// Get post date from input or use today
		$post_date = isset($_POST['post_date']) && !empty($_POST['post_date']) ? $_POST['post_date'] : date('Y-m-d');
		
		if (isset($_SESSION['user_name']) && isset($_SESSION['user_lastname'])) {
			$post_author = $_SESSION['user_id'];
		}
		$post_status = 'draft';
		$post_last_edited = $post_author;


		$post_image = $_FILES['post_image']['name'];
		$post_image_temp = $_FILES['post_image']['tmp_name'];
		$temp = explode(".", $_FILES['post_image']['name']);
		$newfilename = round(microtime(true)) . '.' . end($temp);
		if (isset($post_image)) {
			if (!empty($post_image)) {
				$post_image = $newfilename;
				move_uploaded_file($post_image_temp, "../images/articles/$post_image");

			} else {
				echo 'neuspech';
			}
		}

		try {
			include "includes/db.php";


			$query = "INSERT INTO posts(post_title, post_author, post_date, post_image, post_content, post_status, post_last_edited, post_tags, post_position) VALUES (:post_title, :post_author, :post_date, :post_image, :post_content, :post_status, :post_last_edited, :post_tags, :post_position)";

			$send_info = $connection->prepare($query);

			$post_tags = '';
			$post_position = 0;
			$send_info->bindParam(':post_title', $post_title);
			$send_info->bindParam(':post_author', $post_author);
			$send_info->bindParam(':post_date', $post_date);
			$send_info->bindParam(':post_image', $post_image);
			$send_info->bindParam(':post_content', $post_content);
			$send_info->bindParam(':post_status', $post_status);
			$send_info->bindParam(':post_last_edited', $post_last_edited);
			$send_info->bindParam(':post_tags', $post_tags);
			$send_info->bindParam(':post_position', $post_position);

			$send_info->execute();
			
			// Get the inserted post ID
			$post_id = $connection->lastInsertId();
			
			// Save categories
			if (isset($_POST['post_categories']) && !empty($_POST['post_categories'])) {
				$categories = array_filter($_POST['post_categories'], function($val) { return !empty($val) && is_numeric($val); });
				foreach ($categories as $category_id) {
					$catQuery = "INSERT INTO post_categories (post_id, category_id) VALUES (:post_id, :category_id)";
					$catStmt = $connection->prepare($catQuery);
					$catStmt->bindParam(':post_id', $post_id);
					$catStmt->bindParam(':category_id', $category_id);
					$catStmt->execute();
				}
			}

			// LOG
			include "includes/add_log.php";
			$logAction = "Pridal článok " . $post_title;
			createLog($connection, $logAction, "články");


			echo "<h3 class='text-success'>Článok $post_title bol odoslaný a čaká na schválenie! </h3>";

			include 'includes/send_email_admin_lector.php';
			sendEmailToAdminOrLector($connection);

		} catch (Exception $e) {
			echo $e;
		}
		try {
			include "includes/db.php";
			$query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 1";

			$send_info = $connection->prepare($query);
			$send_info->execute();

			$result = $send_info->fetch(PDO::FETCH_ASSOC);

			$post_id = $result['post_id'];
			echo "<a href=\"../clanok.php?p_id=$post_id\" class='text-info' target='_blank'><h4><i class=\"fas fa-search\"></i> Zobraziť</h4></a>";

		} catch (Exception $e) {
			echo $e;
		}
	}


//IF USER IS ADMIN OR LEKTOR HE CAN PUBLISH THE POST

	if (strpos($_SESSION['user_role'], 'admin') || strpos($_SESSION['user_role'], 'lektor')) {


		if (isset($_POST['publish_post'])) {


			$post_title = $_POST['post_title'];


			$post_content = $_POST['post_content'];
			
			// Get post date from input or use today
			$post_date = isset($_POST['post_date']) && !empty($_POST['post_date']) ? $_POST['post_date'] : date('Y-m-d');
			
			if (isset($_SESSION['user_name']) && isset($_SESSION['user_lastname'])) {
				$post_author = $_SESSION['user_id'];
			}
			$post_status = 'published';
			$post_last_edited = $post_author;


			$post_image = $_FILES['post_image']['name'];
			$post_image_temp = $_FILES['post_image']['tmp_name'];
			$temp = explode(".", $_FILES['post_image']['name']);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			if (isset($post_image)) {
				if (!empty($post_image)) {
					$post_image = $newfilename;
					move_uploaded_file($post_image_temp, "../images/articles/$post_image");

				} else {
					echo 'neuspech';
				}
			}

			try {
				include "includes/db.php";


				$query = "INSERT INTO posts(post_title, post_author, post_date, post_image, post_content, post_status, post_last_edited, post_tags, post_position) VALUES (:post_title, :post_author, :post_date, :post_image, :post_content, :post_status, :post_last_edited, :post_tags, :post_position)";

				$send_info = $connection->prepare($query);

				$post_tags = '';
				$post_position = 0;
				$send_info->bindParam(':post_title', $post_title);
				$send_info->bindParam(':post_author', $post_author);
				$send_info->bindParam(':post_date', $post_date);
				$send_info->bindParam(':post_image', $post_image);
				$send_info->bindParam(':post_content', $post_content);
				$send_info->bindParam(':post_status', $post_status);
				$send_info->bindParam(':post_last_edited', $post_last_edited);
				$send_info->bindParam(':post_tags', $post_tags);
				$send_info->bindParam(':post_position', $post_position);

				$send_info->execute();
				
				// Get the inserted post ID
				$post_id = $connection->lastInsertId();
				
				// Save categories
				if (isset($_POST['post_categories']) && !empty($_POST['post_categories'])) {
					$categories = array_filter($_POST['post_categories'], function($val) { return !empty($val) && is_numeric($val); });
					foreach ($categories as $category_id) {
						$catQuery = "INSERT INTO post_categories (post_id, category_id) VALUES (:post_id, :category_id)";
						$catStmt = $connection->prepare($catQuery);
						$catStmt->bindParam(':post_id', $post_id);
						$catStmt->bindParam(':category_id', $category_id);
						$catStmt->execute();
					}
				}
				echo "<h3 class='text-success'>Článok $post_title bol publikovaný! <small><a href=\"../clanok.php?p_id=$post_id\" class='text-muted' target='_blank'>Zobraziť</a></small></h3>";
				// LOG
				include "includes/add_log.php";
				$logAction = "Publikoval článok " . $post_title;
				createLog($connection, $logAction, "články");

			} catch (Exception $e) {
				echo $e;
			}


		}


	}
}

?>

<h2>Pridať článok</h2>

<form action="" method="post" enctype="multipart/form-data" class="my-2">
    <div class="form-group">
        <label for="post_title" class="required">
			Názov:
			<span class="text-danger">Minimálne 20 - maximálne 70 znakov</span>
		</label>
        <input
			type="text"
			class="form-control"
			id="post_title"
			placeholder="Zadajte názov článku"
			name="post_title"
			required
			autocomplete="off"
			maxlength="70"
			minlength="20"
		>
    </div>
    <div class="form-group mt-3">
        <label for="post_image" class="required">Obrázok: <span class="text-danger">Formát: na ležato (do 10MB!)</span></label>
        <input type="file" class="form-control-file" id="post_image" name="post_image" required>
    </div>
    <div class="form-group mt-3">
        <label for="post_date" class="required">Dátum publikovania:</label>
        <input type="date" class="form-control" id="post_date" name="post_date" value="<?php echo date('Y-m-d'); ?>" required>
    </div>
    <div class="form-group mt-3">
        <label for="category_search">
            <i class="fas fa-tags"></i> Kategórie:
        </label>
        <input type="text" class="form-control" id="category_search" placeholder="Vyhľadajte a vyberte kategóriu..." autocomplete="off">
        <div id="category_dropdown" style="display:none; position:absolute; z-index:1000; background:white; border:1px solid #ccc; max-height:200px; overflow-y:auto; width:100%; max-width:500px;"></div>
        <div id="selected_categories" style="margin-top:10px;"></div>
        <input type="hidden" id="post_categories_hidden" name="post_categories[]" value="">
    </div>
    <div class="form-group">
        <label for="post_content" class="required">Obsah:</label>
        <textarea class="form-control" rows="10" id="post_content" name="post_content" placeholder="Napíšte článok..."></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="add_post" value="Odoslať">
	<?php
	if (strpos($_SESSION['user_role'], 'admin') || strpos($_SESSION['user_role'], 'lektor')) {
		echo "
        
    <input type=\"submit\" class=\"btn btn-success\" name=\"publish_post\" value=\"Publikovať\">
        ";
	}
	?>


</form>

<script>
// Category selection with pills
const allCategories = <?php
try {
    include "includes/db.php";
    $catQuery = "SELECT id, name FROM categories ORDER BY name ASC";
    $catStmt = $connection->prepare($catQuery);
    $catStmt->execute();
    echo json_encode($catStmt->fetchAll(PDO::FETCH_ASSOC));
} catch (Exception $e) {
    echo '[]';
}
?>;

let selectedCategories = [];

const categorySearch = document.getElementById('category_search');
const categoryDropdown = document.getElementById('category_dropdown');
const selectedCategoriesDiv = document.getElementById('selected_categories');
const categoriesHidden = document.getElementById('post_categories_hidden');

categorySearch.addEventListener('focus', function() {
    showCategoryDropdown(this.value);
});

categorySearch.addEventListener('input', function() {
    showCategoryDropdown(this.value);
});

function showCategoryDropdown(searchTerm) {
    searchTerm = searchTerm.toLowerCase();
    
    const filtered = allCategories.filter(cat => 
        cat.name.toLowerCase().includes(searchTerm) && 
        !selectedCategories.some(sc => sc.id === cat.id)
    );
    
    if (filtered.length === 0) {
        categoryDropdown.style.display = 'none';
        return;
    }
    
    categoryDropdown.innerHTML = filtered.map(cat => 
        `<div style="padding:10px; cursor:pointer; border-bottom:1px solid #eee;" 
              onmouseover="this.style.backgroundColor='#f0f0f0'" 
              onmouseout="this.style.backgroundColor='white'" 
              onclick="addCategory(${cat.id}, '${cat.name.replace(/'/g, "\\'")}')">${cat.name}</div>`
    ).join('');
    
    categoryDropdown.style.display = 'block';
}

function addCategory(id, name) {
    if (selectedCategories.some(sc => sc.id === id)) return;
    
    selectedCategories.push({id, name});
    updateCategoriesDisplay();
    categorySearch.value = '';
    categoryDropdown.style.display = 'none';
}

function removeCategory(id) {
    selectedCategories = selectedCategories.filter(sc => sc.id !== id);
    updateCategoriesDisplay();
}

function updateCategoriesDisplay() {
    selectedCategoriesDiv.innerHTML = selectedCategories.map(cat => 
        `<span class="badge badge-primary" style="margin:5px; padding:8px 12px; font-size:14px;" data-id="${cat.id}">
            ${cat.name} <i class="fas fa-times" style="cursor:pointer; margin-left:5px;" onclick="removeCategory(${cat.id})"></i>
        </span>`
    ).join('');
    
    // Update hidden input
    categoriesHidden.value = selectedCategories.map(c => c.id).join(',');
    
    // Create multiple hidden inputs for array submission
    const form = categoriesHidden.closest('form');
    form.querySelectorAll('input[name="post_categories[]"]:not(#post_categories_hidden)').forEach(el => el.remove());
    selectedCategories.forEach(cat => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'post_categories[]';
        input.value = cat.id;
        form.appendChild(input);
    });
}

// Close dropdown when clicking outside
document.addEventListener('click', function(e) {
    if (!categorySearch.contains(e.target) && !categoryDropdown.contains(e.target)) {
        categoryDropdown.style.display = 'none';
    }
});
</script>

<script src="https://cdn.tiny.cloud/1/y9vbcdqhduv79dkxujqyn61xkjuig7qe6y4wj879ayddd98a/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#post_content',
        plugins: 'image link media code lists table',
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | bullist numlist | link image media | code',
        images_upload_url: window.location.origin + '/dashboard/upload.php',
        automatic_uploads: true,
        images_file_types: 'jpg,jpeg,png,gif,webp',

        // Dôležité nastavenia pre obrázky
        relative_urls: false,      // vypne ../../
        remove_script_host: false, // ponechá celý host (http://...)
        convert_urls: true         // pre istotu nech konvertuje na absolútne
    });
</script>
