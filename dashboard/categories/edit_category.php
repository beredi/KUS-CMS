<?php

if (isset($_GET['id'])) {
    $cat_id = $_GET['id'];
    
    try {
        include 'includes/db.php';
        
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':id', $cat_id);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $category = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Kategória nebola nájdená!</div>';
            echo '<a href="categories.php" class="btn btn-primary">Späť na kategórie</a>';
            exit;
        }
        
    } catch (Exception $e) {
        echo '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Chyba: ' . $e->getMessage() . '</div>';
        exit;
    }
} else {
    header('Location: categories.php');
    exit;
}

// Handle update category
if (isset($_POST['update_category'])) {
    $cat_name = $_POST['cat_name'];
    $cat_slug = $_POST['cat_slug'];
    $cat_description = $_POST['cat_description'];
    
    try {
        include 'includes/db.php';
        
        // Check if slug already exists for different category
        $checkQuery = "SELECT id FROM categories WHERE slug = :slug AND id != :id";
        $checkStmt = $connection->prepare($checkQuery);
        $checkStmt->bindParam(':slug', $cat_slug);
        $checkStmt->bindParam(':id', $cat_id);
        $checkStmt->execute();
        
        if ($checkStmt->rowCount() > 0) {
            echo '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Kategória s touto URL adresou už existuje!</div>';
        } else {
            $query = "UPDATE categories SET name = :name, slug = :slug, description = :description WHERE id = :id";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(':name', $cat_name);
            $stmt->bindParam(':slug', $cat_slug);
            $stmt->bindParam(':description', $cat_description);
            $stmt->bindParam(':id', $cat_id);
            $stmt->execute();
            
            echo '<div class="alert alert-success"><i class="fas fa-check-circle"></i> Kategória bola úspešne aktualizovaná!</div>';
            echo '<script>setTimeout(function(){ window.location.href = "categories.php"; }, 1500);</script>';
            
            // Refresh category data
            $category['name'] = $cat_name;
            $category['slug'] = $cat_slug;
            $category['description'] = $cat_description;
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Chyba: ' . $e->getMessage() . '</div>';
    }
}
?>

<div class="row">
    <div class="col-md-12">
        <a href="categories.php" class="btn btn-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Späť na kategórie
        </a>
        
        <h2>Upraviť kategóriu</h2>
        
        <form action="" method="post">
            <div class="form-group">
                <label for="cat_name">
                    <i class="fas fa-tag"></i> Názov kategórie
                </label>
                <input type="text" class="form-control" name="cat_name" id="cat_name" 
                       value="<?php echo htmlspecialchars($category['name']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="cat_slug">
                    <i class="fas fa-link"></i> URL adresa (slug)
                </label>
                <input type="text" class="form-control" name="cat_slug" id="cat_slug" 
                       value="<?php echo htmlspecialchars($category['slug']); ?>" required>
                <small class="text-muted">Použite malé písmená a pomlčky. Napr: festivaly, podujatia-2025</small>
            </div>
            
            <div class="form-group">
                <label for="cat_description">
                    <i class="fas fa-align-left"></i> Popis kategórie
                </label>
                <textarea class="form-control" name="cat_description" id="cat_description" rows="3"><?php echo htmlspecialchars($category['description']); ?></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" name="update_category" class="btn btn-primary">
                    <i class="fas fa-save"></i> Uložiť zmeny
                </button>
                <a href="categories.php" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Zrušiť
                </a>
            </div>
        </form>
        
        <hr>
        
        <h3>Články v tejto kategórii</h3>
        
        <?php
        try {
            include 'includes/db.php';
            
            $query = "SELECT p.post_id, p.post_title, p.post_date, p.post_status 
                      FROM posts p 
                      INNER JOIN post_categories pc ON p.post_id = pc.post_id 
                      WHERE pc.category_id = :id 
                      ORDER BY p.post_date DESC";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(':id', $cat_id);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                echo '<table class="table table-striped table-hover">';
                echo '<thead><tr><th>Názov článku</th><th>Dátum</th><th>Stav</th><th>Akcia</th></tr></thead>';
                echo '<tbody>';
                
                while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $statusClass = $post['post_status'] == 'published' ? 'success' : 'warning';
                    $statusText = $post['post_status'] == 'published' ? 'Publikovaný' : 'Koncept';
                    
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($post['post_title']) . '</td>';
                    echo '<td>' . date('d.m.Y', strtotime($post['post_date'])) . '</td>';
                    echo '<td><span class="badge badge-' . $statusClass . '">' . $statusText . '</span></td>';
                    echo '<td><a href="posts.php?source=edit_post&p_id=' . $post['post_id'] . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Upraviť</a></td>';
                    echo '</tr>';
                }
                
                echo '</tbody></table>';
            } else {
                echo '<div class="alert alert-info"><i class="fas fa-info-circle"></i> V tejto kategórii zatiaľ nie sú žiadne články.</div>';
            }
            
        } catch (Exception $e) {
            echo '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Chyba: ' . $e->getMessage() . '</div>';
        }
        ?>
    </div>
</div>

<script>
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
