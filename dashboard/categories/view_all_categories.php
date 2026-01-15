<div class="row">
    <div class="col-md-6">
        <h2>Pridať novú kategóriu</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="cat_name">
                    <i class="fas fa-tag"></i> Názov kategórie
                </label>
                <input type="text" class="form-control" name="cat_name" id="cat_name" required>
            </div>
            
            <div class="form-group">
                <label for="cat_slug">
                    <i class="fas fa-link"></i> URL adresa (slug)
                </label>
                <input type="text" class="form-control" name="cat_slug" id="cat_slug" required>
                <small class="text-muted">Použite malé písmená a pomlčky. Napr: festivaly, podujatia-2025</small>
            </div>
            
            <div class="form-group">
                <label for="cat_description">
                    <i class="fas fa-align-left"></i> Popis kategórie
                </label>
                <textarea class="form-control" name="cat_description" id="cat_description" rows="3"></textarea>
            </div>
            
            <button type="submit" name="add_category" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Pridať kategóriu
            </button>
        </form>
    </div>
</div>

<hr>

<?php
// Handle add category
if (isset($_POST['add_category'])) {
    $cat_name = $_POST['cat_name'];
    $cat_slug = $_POST['cat_slug'];
    $cat_description = $_POST['cat_description'];
    
    try {
        include 'includes/db.php';
        
        // Check if slug already exists
        $checkQuery = "SELECT id FROM categories WHERE slug = :slug";
        $checkStmt = $connection->prepare($checkQuery);
        $checkStmt->bindParam(':slug', $cat_slug);
        $checkStmt->execute();
        
        if ($checkStmt->rowCount() > 0) {
            echo '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Kategória s touto URL adresou už existuje!</div>';
        } else {
            $query = "INSERT INTO categories (name, slug, description) VALUES (:name, :slug, :description)";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(':name', $cat_name);
            $stmt->bindParam(':slug', $cat_slug);
            $stmt->bindParam(':description', $cat_description);
            $stmt->execute();
            
            echo '<div class="alert alert-success"><i class="fas fa-check-circle"></i> Kategória bola úspešne pridaná!</div>';
            echo '<script>setTimeout(function(){ window.location.href = "categories.php"; }, 1500);</script>';
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Chyba: ' . $e->getMessage() . '</div>';
    }
}

// Handle delete category
if (isset($_GET['delete'])) {
    $cat_id = $_GET['delete'];
    
    try {
        include 'includes/db.php';
        
        // First delete all associations in post_categories
        $deleteAssocQuery = "DELETE FROM post_categories WHERE category_id = :id";
        $deleteAssocStmt = $connection->prepare($deleteAssocQuery);
        $deleteAssocStmt->bindParam(':id', $cat_id);
        $deleteAssocStmt->execute();
        
        // Then delete the category
        $query = "DELETE FROM categories WHERE id = :id";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':id', $cat_id);
        $stmt->execute();
        
        echo '<div class="alert alert-success"><i class="fas fa-check-circle"></i> Kategória bola úspešne vymazaná!</div>';
        echo '<script>setTimeout(function(){ window.location.href = "categories.php"; }, 1500);</script>';
    } catch (Exception $e) {
        echo '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Chyba: ' . $e->getMessage() . '</div>';
    }
}
?>

<h2>Všetky kategórie</h2>

<table class="table table-hover table-striped" id="categories">
    <thead>
    <tr>
        <th>ID</th>
        <th>Názov</th>
        <th>URL (Slug)</th>
        <th>Popis</th>
        <th>Počet článkov</th>
        <th>Vytvorené</th>
        <th>Upraviť</th>
        <th>Vymazať</th>
    </tr>
    </thead>
    <tbody>

	<?php
	try {
		include 'includes/db.php';

		$query = "SELECT c.*, COUNT(pc.post_id) as post_count 
                  FROM categories c 
                  LEFT JOIN post_categories pc ON c.id = pc.category_id 
                  GROUP BY c.id 
                  ORDER BY c.name ASC";
		$send_info = $connection->prepare($query);
		$send_info->execute();

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$id = $row['id'];
			$name = $row['name'];
			$slug = $row['slug'];
			$description = $row['description'];
			$post_count = $row['post_count'];
			$created_at = date('d.m.Y H:i', strtotime($row['created_at']));

			echo "<tr>";
			echo "<td>$id</td>";
			echo "<td><strong>$name</strong></td>";
			echo "<td><code>$slug</code></td>";
			echo "<td>" . substr($description, 0, 50) . (strlen($description) > 50 ? '...' : '') . "</td>";
			echo "<td><span class='badge badge-primary'>$post_count</span></td>";
			echo "<td>$created_at</td>";
			echo "<td><a href='categories.php?source=edit_category&id=$id' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i> Upraviť</a></td>";
			echo "<td><a href='javascript:void(0);' onclick='deleteCategory($id, \"$name\")' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Vymazať</a></td>";
			echo "</tr>";
		}

	} catch (Exception $e) {
		echo "<tr><td colspan='8' class='text-danger'>Chyba: " . $e->getMessage() . "</td></tr>";
	}
	?>

    </tbody>
</table>

<script>
function deleteCategory(id, name) {
    if (confirm('Naozaj chcete vymazať kategóriu "' + name + '"?\n\nToto vymaže aj všetky priradenia tejto kategórie k článkom.')) {
        window.location.href = 'categories.php?delete=' + id;
    }
}

// Auto-generate slug from name
document.getElementById('cat_name').addEventListener('input', function(e) {
    const name = e.target.value;
    const slug = name
        .toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .replace(/[ľĺ]/g, 'l')
        .replace(/[ťŧ]/g, 't')
        .replace(/[ďđ]/g, 'd')
        .replace(/[ňñ]/g, 'n')
        .replace(/[šş]/g, 's')
        .replace(/[čç]/g, 'c')
        .replace(/[žź]/g, 'z')
        .replace(/[ýÿ]/g, 'y')
        .replace(/[áä]/g, 'a')
        .replace(/[éë]/g, 'e')
        .replace(/[íï]/g, 'i')
        .replace(/[óö]/g, 'o')
        .replace(/[úü]/g, 'u')
        .replace(/[ŕř]/g, 'r')
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');
    document.getElementById('cat_slug').value = slug;
});
</script>

<script>
$(document).ready(function () {
    $('#categories').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Slovak.json"
        }
    });
});
</script>
