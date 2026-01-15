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


			$post_image = $row['post_image'];


			$post_content = $row['post_content'];
			$post_date = $row['post_date'];
			$post_author = $row['post_author'];
			$post_status = $row['post_status'];
			$post_last_edited = $row['post_last_edited'];


		}
		
		// Load existing categories for this post
		$catQuery = "SELECT c.id, c.name FROM categories c INNER JOIN post_categories pc ON c.id = pc.category_id WHERE pc.post_id = :post_id";
		$catStmt = $connection->prepare($catQuery);
		$catStmt->bindParam(':post_id', $post_id);
		$catStmt->execute();
		$existingCategoriesData = $catStmt->fetchAll(PDO::FETCH_ASSOC);
		$existingCategories = array_column($existingCategoriesData, 'id');
	} catch (Exception $e) {
		echo $e;
	}
} else {
	$existingCategoriesData = [];
	$existingCategories = [];
}


$userId = $_SESSION['user_id'];

if (isUser('lektor') || isUser('moderator') || isUser('admin') || $userId == $post_author) {


	if (isset($_POST['edit_post'])) {
		$post_title = $_POST['post_title'];


		$post_image = $_FILES['post_image']['name'];
		$post_image_temp = $_FILES['post_image']['tmp_name'];
		$temp = explode(".", $_FILES['post_image']['name']);
		$newfilename = round(microtime(true)) . '.' . end($temp);

		move_uploaded_file($post_image_temp, "../images/articles/" . $newfilename);


		if (empty($post_image)) {

			try {
				include 'includes/db.php';
				$query = "SELECT * FROM posts WHERE post_id = $post_id ";


				$send_info = $connection->prepare($query);

				$send_info->execute();

				while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
					$newfilename = $row['post_image'];
				}

			} catch (Exception $e) {
				echo $e;
			}


		}


		try {
			include 'includes/db.php';

			$query = "SELECT * FROM posts WHERE post_id = $post_id ";


			$send_info = $connection->prepare($query);

			$send_info->execute();

			while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
				$post_date = $row['post_date'];
			}

		} catch (Exception $e) {
			echo $e;
		}

		// Override with POST data if provided
		if (isset($_POST['post_date']) && !empty($_POST['post_date'])) {
			$post_date = $_POST['post_date'];
		}

		$post_content = $_POST['post_content'];
		$post_author = $_POST['post_author'];
		$post_status = 'draft';
		if (isset($_SESSION['user_name']) && isset($_SESSION['user_lastname'])) {
			$post_last_edited = $_SESSION['user_id'];
		}

		try {
			include "includes/db.php";


			$query = "UPDATE posts SET ";

			$query .= "post_title = :post_title, ";
			$query .= "post_author = :post_author, ";
			$query .= "post_date = :post_date, ";
			$query .= "post_image = :post_image, ";
			$query .= "post_content = :post_content, ";
			$query .= "post_status = :post_status, ";
			$query .= "post_last_edited = :post_last_edited ";
			$query .= "WHERE post_id=$post_id ";

			$send_info = $connection->prepare($query);

			$send_info->bindParam(':post_title', $post_title);
			$send_info->bindParam(':post_author', $post_author);
			$send_info->bindParam(':post_image', $newfilename);
			$send_info->bindParam(':post_content', $post_content);
			$send_info->bindParam(':post_status', $post_status);
			$send_info->bindParam(':post_date', $post_date);
			$send_info->bindParam(':post_last_edited', $post_last_edited);

			$send_info->execute();
			
			// Update categories
			// First, delete existing categories
			$delCatQuery = "DELETE FROM post_categories WHERE post_id = :post_id";
			$delCatStmt = $connection->prepare($delCatQuery);
			$delCatStmt->bindParam(':post_id', $post_id);
			$delCatStmt->execute();
			
			// Then insert new categories
			if (isset($_POST['post_categories']) && !empty($_POST['post_categories'])) {
				$categories = array_unique(array_filter($_POST['post_categories'], function($val) { return !empty($val) && is_numeric($val); }));
				foreach ($categories as $category_id) {
					$catQuery = "INSERT INTO post_categories (post_id, category_id) VALUES (:post_id, :category_id)";
					$catStmt = $connection->prepare($catQuery);
					$catStmt->bindParam(':post_id', $post_id);
					$catStmt->bindParam(':category_id', $category_id);
					$catStmt->execute();
				}
			}
			
			echo "<h3 class='text-success'>Článok $post_title bol upravený a čaká na schválenie! <small><a href=\"../clanok.php?p_id=$post_id\" class='text-muted' target='_blank'>Zobraziť</a></small></h3>";
			// LOG
			include "includes/add_log.php";
			$logAction = "Upravil článok " . $post_title;
			createLog($connection, $logAction, "články");
			include 'includes/send_email_admin_lector.php';
			sendEmailToAdminOrLector($connection, true);
		} catch (Exception $e) {
			echo $e;
		}
	}


	if (isset($_POST['publish_post'])) {
		$post_title = $_POST['post_title'];


		$post_image = $_FILES['post_image']['name'];
		$post_image_temp = $_FILES['post_image']['tmp_name'];
		$temp = explode(".", $_FILES['post_image']['name']);
		$newfilename = round(microtime(true)) . '.' . end($temp);

		move_uploaded_file($post_image_temp, "../images/articles/" . $newfilename);


		if (empty($post_image)) {

			try {
				include 'includes/db.php';
				$query = "SELECT * FROM posts WHERE post_id = $post_id ";


				$send_info = $connection->prepare($query);

				$send_info->execute();

				while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
					$newfilename = $row['post_image'];
				}

			} catch (Exception $e) {
				echo $e;
			}


		}


		try {
			include 'includes/db.php';

			$query = "SELECT * FROM posts WHERE post_id = $post_id ";


			$send_info = $connection->prepare($query);

			$send_info->execute();

			while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
				$post_date = $row['post_date'];
			}

		} catch (Exception $e) {
			echo $e;
		}

		// Override with POST data if provided
		if (isset($_POST['post_date']) && !empty($_POST['post_date'])) {
			$post_date = $_POST['post_date'];
		}

		$post_content = $_POST['post_content'];
		$post_author = $_POST['post_author'];
		$post_status = 'published';
		if (isset($_SESSION['user_name']) && isset($_SESSION['user_lastname'])) {
			$post_last_edited = $_SESSION['user_id'];
		}


		try {
			include "includes/db.php";


			$query = "UPDATE posts SET ";

			$query .= "post_title = :post_title, ";
			$query .= "post_author = :post_author, ";
			$query .= "post_date = :post_date, ";
			$query .= "post_image = :post_image, ";
			$query .= "post_content = :post_content, ";
			$query .= "post_status = :post_status, ";
			$query .= "post_last_edited = :post_last_edited ";
			$query .= "WHERE post_id=$post_id ";

			$send_info = $connection->prepare($query);

			$send_info->bindParam(':post_title', $post_title);
			$send_info->bindParam(':post_author', $post_author);
			$send_info->bindParam(':post_image', $newfilename);
			$send_info->bindParam(':post_content', $post_content);
			$send_info->bindParam(':post_status', $post_status);
			$send_info->bindParam(':post_date', $post_date);
			$send_info->bindParam(':post_last_edited', $post_last_edited);

			$send_info->execute();
			
			// Update categories
			// First, delete existing categories
			$delCatQuery = "DELETE FROM post_categories WHERE post_id = :post_id";
			$delCatStmt = $connection->prepare($delCatQuery);
			$delCatStmt->bindParam(':post_id', $post_id);
			$delCatStmt->execute();
			
			// Then insert new categories
			if (isset($_POST['post_categories']) && !empty($_POST['post_categories'])) {
				$categories = array_unique(array_filter($_POST['post_categories'], function($val) { return !empty($val) && is_numeric($val); }));
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


} else {
	header('Location: index.php');
}
?>


<h2>Upraviť článok</h2>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title" class="required">
			Názov:
			<span class="text-danger">Minimálne 20 - maximálne 70 znakov</span>
		</label>
        <input
			type="text"
			class="form-control"
			id="post_title"
			value='<?php echo $post_title; ?>'
			name="post_title"
			required
			autocomplete="off"
			maxlength="70"
			minlength="20"
		>
        <input type="text" name="post_author" value="<?php echo $post_author; ?>" hidden>
    </div>
    <div class="form-group mt-3">
        <label for="post_image">Obrázok: <span class="text-danger">(do 10MB!)</span></label>
        <input type="file" class="form-control-file" id="post_image" name="post_image" value='$post_image'>
        <img src='../images/articles/<?php echo $post_image; ?>' alt='image' width="100px">
    </div>
    <div class="form-group mt-3">
        <label for="post_date" class="required">Dátum publikovania:</label>
        <input type="date" class="form-control" id="post_date" name="post_date" value="<?php echo date('Y-m-d', strtotime($post_date)); ?>" required>
    </div>
    <div class="form-group mt-3">
        <label for="category_search">
            <i class="fas fa-tags"></i> Kategórie:
        </label>
        <input type="text" class="form-control" id="category_search" placeholder="Vyhľadajte a vyberte kategóriu..." autocomplete="off">
        <div id="category_dropdown" style="display:none; position:absolute; z-index:1000; background:white; border:1px solid #ccc; max-height:200px; overflow-y:auto; width:100%; max-width:500px;"></div>
        <div id="selected_categories" style="margin-top:10px;">
            <?php
            // Display existing categories as pills
            foreach ($existingCategoriesData as $cat) {
                echo '<span class="badge badge-primary" style="margin:5px; padding:8px 12px; font-size:14px;" data-id="' . $cat['id'] . '">';
                echo htmlspecialchars($cat['name']);
                echo ' <i class="fas fa-times" style="cursor:pointer; margin-left:5px;" onclick="removeCategory(' . $cat['id'] . ')"></i>';
                echo '</span>';
            }
            ?>
        </div>
        <input type="hidden" id="post_categories_hidden" name="post_categories[]" value="">
    </div>
    <div class="form-group">
        <label for="post_content" class="required">Obsah:</label>
        <textarea class="form-control" rows="10" id="post_content" name="post_content"><?php echo $post_content; ?></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="edit_post" value="Upraviť">
	<?php
	if (strpos($_SESSION['user_role'], 'admin') || strpos($_SESSION['user_role'], 'lektor')) {
		echo "
        
    <input type=\"submit\" class=\"btn btn-success\" name=\"publish_post\" value=\"Publikovať\">
        ";
	}
	?>


</form>
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
/*    tinymce.init({
        selector: '#post_content',
        plugins: 'image link media code lists table',
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | bullist numlist | link image media | code',

        images_upload_url: '/dashboard/upload.php',
        automatic_uploads: true,
        images_file_types: 'jpg,jpeg,png,gif,webp',

        images_upload_handler: function (blobInfo, success, failure) {
            let xhr = new XMLHttpRequest();
            xhr.open('POST', '../dashboard/upload.php'); // corrected path
            xhr.onload = function() {
                if (xhr.status !== 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                let json = {};
                try { json = JSON.parse(xhr.responseText); } catch (e) { failure('Invalid JSON'); return; }
                if (!json || typeof json.location !== 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            let formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        }
    });*/
</script>

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

let selectedCategories = <?php echo json_encode($existingCategoriesData); ?>;

const categorySearch = document.getElementById('category_search');
const categoryDropdown = document.getElementById('category_dropdown');
const selectedCategoriesDiv = document.getElementById('selected_categories');
const categoriesHidden = document.getElementById('post_categories_hidden');

// Initialize
updateCategoriesDisplay();

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
