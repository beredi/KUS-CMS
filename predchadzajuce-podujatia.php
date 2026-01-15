<?php
ob_start();
session_start();
	try {
		include 'dashboard/includes/db.php';

		$posts_by_page = 6;
		
		// Get selected year, search term, and category
		$selectedYear = isset($_GET['year']) ? (int)$_GET['year'] : '';
		$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
		$selectedCategory = isset($_GET['category']) ? (int)$_GET['category'] : '';
		
		$yearFilter = $selectedYear ? "AND YEAR(post_date) = $selectedYear" : "";
		$searchFilter = $searchTerm ? "AND post_title LIKE :search" : "";
		$categoryFilter = "";
		$categoryJoin = "";
		
		// Add category filter if selected
		if ($selectedCategory) {
			$categoryJoin = "INNER JOIN post_categories pc ON posts.post_id = pc.post_id";
			$categoryFilter = "AND pc.category_id = :category";
		}
		
		// POSTS COUNTER
		$queryCounter = "SELECT posts.* FROM posts $categoryJoin WHERE post_status = 'published' $yearFilter $searchFilter $categoryFilter ORDER BY post_date DESC";
		$send_info = $connection->prepare($queryCounter);
		if ($searchTerm) {
			$send_info->bindValue(':search', '%' . $searchTerm . '%', PDO::PARAM_STR);
		}
		if ($selectedCategory) {
			$send_info->bindValue(':category', $selectedCategory, PDO::PARAM_INT);
		}
		$send_info->execute();
		$totalPosts = $send_info->rowCount();
		$countPages = ceil($totalPosts / $posts_by_page);

		// GET POSTS

		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = '';
		}

		if ($page == '' || $page == 1) {
			$page_1 = 0;
			$currentPage = 1;
		} else {
			$page_1 = ($page * $posts_by_page) - $posts_by_page;
			$currentPage = $page;
		}
		
		// Calculate posts on current page
		$postsOnCurrentPage = min($posts_by_page, $totalPosts - $page_1);
		
		// Get available years
		$yearsQuery = "SELECT DISTINCT YEAR(post_date) as year FROM posts WHERE post_status = 'published' ORDER BY year DESC";
		$yearsResult = $connection->prepare($yearsQuery);
		$yearsResult->execute();
		$availableYears = $yearsResult->fetchAll(PDO::FETCH_ASSOC);
		
		// Get all categories with post counts (respecting current filters)
		$categoriesQuery = "SELECT c.id, c.name, c.slug, COUNT(DISTINCT p.post_id) as post_count 
		                    FROM categories c 
		                    LEFT JOIN post_categories pc ON c.id = pc.category_id 
		                    LEFT JOIN posts p ON pc.post_id = p.post_id AND p.post_status = 'published' $yearFilter $searchFilter
		                    GROUP BY c.id, c.name, c.slug
		                    HAVING post_count > 0
		                    ORDER BY c.name ASC";
		$categoriesResult = $connection->prepare($categoriesQuery);
		if ($searchTerm) {
			$categoriesResult->bindValue(':search', '%' . $searchTerm . '%', PDO::PARAM_STR);
		}
		$categoriesResult->execute();
		$availableCategories = $categoriesResult->fetchAll(PDO::FETCH_ASSOC);


	} catch (Exception $e) {
		echo $e;
	}
?>
<!DOCTYPE html>
<html lang="sk">
<!--HTML5 Document by Jaroslav Beredi-->
<head>
		<meta charset="UTF-8">
		<title>Články o našej činnosti - KUS Jána Kollára Selenča</title>
		<meta name="description"
			content="Prečítajte si a pozrite si fotografie v článkach o činnosti kultúrno-umeleckého spolku Jána Kollára zo Selenče.Každoročne sa zúčastňujeme na rôznych podujatiach.">
		<meta name="author" content="Jaroslav Beredi">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='canonical' href="https://kusjanakollara.org/predchadzajuce-podujatia" />

		<!-- pagination -->
		<?php
		if ($currentPage && $currentPage > 1){
			echo '<meta name="robots" content="noindex,follow" />';

			$pageAddition = $currentPage == 2 ? '' : '?page='.$currentPage-1; 
			echo '<link rel="prev" href="https://kusjanakollara.org/predchadzajuce-podujatia'.$pageAddition.'" />';
		}
		?>
		<link rel="next" href="https://kusjanakollara.org/predchadzajuce-podujatia?page=<?=$currentPage ? $currentPage+1 : "2"?>" />


		<meta property="og:title" content="Články o našej činnosti - KUS Jána Kollára Selenča">
		<meta property="og:description" content="Prečítajte si a pozrite si fotografie v článkach o činnosti kultúrno-umeleckého spolku Jána Kollára zo Selenče.Každoročne sa zúčastňujeme na rôznych podujatiach.">
		<meta property="og:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
		<meta property="og:url" content="https://www.kusjanakollara.org/predchadzajuce-podujatia">
		<meta property="og:type" content="website">

		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="Články o našej činnosti - KUS Jána Kollára Selenča">
		<meta name="twitter:description" content="Prečítajte si a pozrite si fotografie v článkach o činnosti kultúrno-umeleckého spolku Jána Kollára zo Selenče.Každoročne sa zúčastňujeme na rôznych podujatiach.">
		<meta name="twitter:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
		<meta name="twitter:url" content="https://www.kusjanakollara.org/predchadzajuce-podujatia">

		<?php include 'includes/headerInclude.php'; ?>
    
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container content">
	
    <div class="row">
        <div class="col-lg-12">
            <h1>Predchádzajúce podujatia</h1>
        	<p class="text-muted">Prečítajte si o tom, kde sme vystúpili a čo sme všetko organizovali.</p>
        </div>
    </div>
    
    <!-- Modern Filters Section -->
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-lg-12">
            <div style="background: #f8f9fa; border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden;">
                <div style="padding: 20px; display: flex; justify-content: space-between; align-items: center; cursor: pointer; transition: all 0.3s; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);" id="filterToggle" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <i class="fas fa-filter" style="color: white; font-size: 1.3rem;"></i>
                        <label style="font-weight: 600; font-size: 1.2rem; color: white; margin: 0; cursor: pointer;">
                            Filtre a vyhľadávanie
                        </label>
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span style="color: white; font-size: 0.9rem; opacity: 0.9;">Kliknite pre zobrazenie</span>
                        <button style="background: rgba(255,255,255,0.2); border: 2px solid white; color: white; font-size: 1.4rem; cursor: pointer; padding: 8px 16px; border-radius: 8px; transition: all 0.3s;" id="filterToggleBtn" onmouseover="this.style.background='rgba(255,255,255,0.3)'" onmouseout="this.style.background='rgba(255,255,255,0.2)'">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                </div>
                
                <div id="filterContent" style="max-height: 0; overflow: hidden; transition: max-height 0.4s ease-in-out, padding 0.4s ease-in-out; padding: 0 20px;">
                    <div style="padding-top: 20px; padding-bottom: 20px;">
                        <!-- Text Search Filter -->
                        <div style="margin-bottom: 15px;">
                            <label style="font-weight: 500; color: #555; margin-bottom: 8px; display: block;">
                                <i class="fas fa-search"></i> Vyhľadávanie:
                            </label>
                            <div style="display: flex; gap: 10px; max-width: 500px;">
                                <input type="text" id="searchFilter" class="form-control" placeholder="Hľadať v článkoch..." value="<?= htmlspecialchars($searchTerm) ?>" style="flex: 1; border-radius: 8px; border: 2px solid #dee2e6; padding: 10px 15px;">
                                <button id="searchBtn" style="padding: 10px 20px; background: #667eea; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; transition: all 0.3s;" onmouseover="this.style.background='#5568d3'" onmouseout="this.style.background='#667eea'">
                                    <i class="fas fa-search"></i> Hľadať
                                </button>
                                <?php if ($searchTerm): ?>
                                <button id="clearSearchBtn" style="padding: 10px 20px; background: #dc3545; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; transition: all 0.3s;" onmouseover="this.style.background='#c82333'" onmouseout="this.style.background='#dc3545'">
                                    <i class="fas fa-times"></i> Zrušiť
                                </button>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!-- Year Filter -->
                        <div style="margin-bottom: 15px;">
                            <label style="font-weight: 500; color: #555; margin-bottom: 8px; display: block;">
                                <i class="far fa-calendar-alt"></i> Rok:
                            </label>
                            <select id="yearFilter" class="form-control" style="max-width: 200px; border-radius: 8px; border: 2px solid #dee2e6;">
                                <option value="">Všetky roky</option>
                                <?php foreach ($availableYears as $yearRow): ?>
                                    <option value="<?= $yearRow['year'] ?>" <?= $selectedYear == $yearRow['year'] ? 'selected' : '' ?>>
                                        <?= $yearRow['year'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <!-- Category Filter -->
                        <div>
                            <label style="font-weight: 500; color: #555; margin-bottom: 10px; display: block;">
                                <i class="fas fa-tags"></i> Kategórie:
                            </label>
                            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                                <button class="category-filter-btn <?= !$selectedCategory ? 'active' : '' ?>" data-category="all" style="padding: 8px 18px; border: 2px solid <?= !$selectedCategory ? '#667eea' : '#dee2e6' ?>; background: <?= !$selectedCategory ? '#667eea' : 'white' ?>; color: <?= !$selectedCategory ? 'white' : '#555' ?>; border-radius: 25px; font-weight: 500; cursor: pointer; transition: all 0.3s; font-size: 0.95rem;">
                                    <i class="fas fa-th"></i> Všetky
                                </button>
                                <?php foreach ($availableCategories as $cat): ?>
                                    <button class="category-filter-btn <?= $selectedCategory == $cat['id'] ? 'active' : '' ?>" data-category="<?= $cat['id'] ?>" style="padding: 8px 18px; border: 2px solid <?= $selectedCategory == $cat['id'] ? '#667eea' : '#dee2e6' ?>; background: <?= $selectedCategory == $cat['id'] ? '#667eea' : 'white' ?>; color: <?= $selectedCategory == $cat['id'] ? 'white' : '#555' ?>; border-radius: 25px; font-weight: 500; cursor: pointer; transition: all 0.3s; font-size: 0.95rem;">
                                        <?= htmlspecialchars($cat['name']) ?> <span style="background: <?= $selectedCategory == $cat['id'] ? 'rgba(255,255,255,0.3)' : '#e9ecef' ?>; padding: 2px 8px; border-radius: 12px; font-size: 0.85rem; margin-left: 5px;"><?= $cat['post_count'] ?></span>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12">
            <p class="text-right text-muted" style="margin-top: 8px;">
                <span id="resultCount">Zobrazených: <span id="visibleCount"><?= $postsOnCurrentPage ?></span> z <span id="totalCount"><?= $totalPosts ?></span> článkov</span> | 
                Strana <?= $currentPage ?> z <?= $countPages ?>
            </p>
        </div>
    </div>
    
    <div class="row">
		<?php
		try {
			include 'dashboard/includes/db.php';

			$posts_by_page = 6;
			
			$selectedYear = isset($_GET['year']) ? (int)$_GET['year'] : '';
			$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
			$selectedCategory = isset($_GET['category']) ? (int)$_GET['category'] : '';
			
			$yearFilter = $selectedYear ? "AND YEAR(post_date) = $selectedYear" : "";
			$searchFilter = $searchTerm ? "AND post_title LIKE :search" : "";
			$categoryFilter = "";
			$categoryJoin = "";
			
			if ($selectedCategory) {
				$categoryJoin = "INNER JOIN post_categories pc ON posts.post_id = pc.post_id";
				$categoryFilter = "AND pc.category_id = :category";
			}
			
			// POSTS COUNTER
			$queryCounter = "SELECT posts.* FROM posts $categoryJoin WHERE post_status = 'published' $yearFilter $searchFilter $categoryFilter";
			$send_info = $connection->prepare($queryCounter);
			if ($searchTerm) {
				$send_info->bindValue(':search', '%' . $searchTerm . '%', PDO::PARAM_STR);
			}
			if ($selectedCategory) {
				$send_info->bindValue(':category', $selectedCategory, PDO::PARAM_INT);
			}
			$send_info->execute();
			$countPosts = $send_info->rowCount();
			$countPosts = ceil($countPosts / $posts_by_page);

			// GET POSTS

			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			} else {
				$page = '';
			}

			if ($page == '' || $page == 1) {
				$page_1 = 0;
			} else {
				$page_1 = ($page * $posts_by_page) - $posts_by_page;
			}

		$query = "SELECT posts.* FROM posts $categoryJoin WHERE post_status = 'published' $yearFilter $searchFilter $categoryFilter ORDER BY post_date DESC LIMIT " . $page_1 . ", " . $posts_by_page;

		$send_info = $connection->prepare($query);
		if ($searchTerm) {
			$send_info->bindValue(':search', '%' . $searchTerm . '%', PDO::PARAM_STR);
		}
		if ($selectedCategory) {
			$send_info->bindValue(':category', $selectedCategory, PDO::PARAM_INT);
		}
		$send_info->execute();

		$count = $send_info->rowCount();

		if ($count == 0) {
			echo "<h3>Žiadne články na zobrazenie.</h3>";
		}
		
		include 'includes/article.php';

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
				$post_id = $row['post_id'];
				$post_title = $row['post_title'];
				$post_image = $row['post_image'];
				$post_date = date('d.m.Y', strtotime($row['post_date']));
				$temp_post_content = strip_tags($row['post_content']);

				$post_content = (substr($temp_post_content, 0, 190) . "...");
				
				// Get categories for this post (both IDs and names)
				$catQuery = "SELECT c.id, c.name FROM categories c 
				             INNER JOIN post_categories pc ON c.id = pc.category_id 
				             WHERE pc.post_id = :post_id ORDER BY c.name ASC";
				$catStmt = $connection->prepare($catQuery);
				$catStmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
				$catStmt->execute();
				$categoryResults = $catStmt->fetchAll(PDO::FETCH_ASSOC);
				
				$postCategories = array_column($categoryResults, 'id');
				$categoryNames = array_column($categoryResults, 'name');
				$categoryIds = !empty($postCategories) ? implode(',', $postCategories) : '';
				
				echo "<div class=\"col-lg-4 col-md-6 col-sm-12 col-xs-12 article-card-wrapper\" data-categories=\"$categoryIds\" data-title=\"" . htmlspecialchars($post_title, ENT_QUOTES, 'UTF-8') . "\">";
				generateArticleCard($post_id, $post_image, $post_title, $post_content, $post_date, $categoryNames);
				echo "</div>";
				/*echo "
                
            <div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12 \" style='margin: 2px auto; height: 450px;'>
                <div class=\"media clanokMedia \">
                    <div class=\"media-top\">
                        <a href=\"clanok.php?p_id=$post_id\"><img src=\"images/articles/$post_image\" class=\"media-object\" style=\"width:100%;\" alt=\"$post_title\"></a>
                    </div>
                    <div class=\"media-body\">
                        <h3 class=\"media-heading\"><a href=\"clanok.php?p_id=$post_id\">$post_title</a></h3>
                        <p class='text-justify'>$post_content<a href=\"clanok.php?p_id=$post_id\"> Čítaj viac!</a></p>
                    </div>
                </div>
            </div>
                "*/;

			}

		} catch (Exception $e) {
			echo $e;
		}
		?>
    </div>
    <!-- End of articles row -->
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-lg-12">
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center">
                    <?php
                    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $totalPages = $countPages;
                    $range = 2; // Number of pages to show on each side of current page
                    
                    // Previous button
                    if ($currentPage > 1) {
                        echo '<li class="page-item">';
                        $prevLink = 'predchadzajuce-podujatia?page=' . ($currentPage - 1);
                        if ($selectedYear) $prevLink .= '&year=' . $selectedYear;
                        echo '<a class="page-link" href="' . $prevLink . '" aria-label="Previous">';
                        echo '<span aria-hidden="true">&laquo;</span>';
                        echo '</a></li>';
                    } else {
                        echo '<li class="page-item disabled">';
                        echo '<span class="page-link">&laquo;</span>';
                        echo '</li>';
                    }
                    
                    // First page
                    if ($currentPage > $range + 2) {
                        echo '<li class="page-item">';
                        $firstLink = 'predchadzajuce-podujatia?page=1';
                        if ($selectedYear) $firstLink .= '&year=' . $selectedYear;
                        echo '<a class="page-link" href="' . $firstLink . '">1</a>';
                        echo '</li>';
                        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                    }
                    
                    // Page numbers around current page
                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i == 1 && $currentPage > $range + 2) {
                            continue; // Already shown above
                        }
                        
                        if ($i == $totalPages && $currentPage < $totalPages - $range - 1) {
                            continue; // Will be shown below
                        }
                        
                        if ($i >= $currentPage - $range && $i <= $currentPage + $range) {
                            if ($i == $currentPage) {
                                echo '<li class="page-item active">';
                                echo '<span class="page-link">' . $i . '</span>';
                                echo '</li>';
                            } else {
                                echo '<li class="page-item">';
                                $pageLink = 'predchadzajuce-podujatia?page=' . $i;
                                if ($selectedYear) $pageLink .= '&year=' . $selectedYear;
                                echo '<a class="page-link" href="' . $pageLink . '">' . $i . '</a>';
                                echo '</li>';
                            }
                        }
                    }
                    
                    // Last page
                    if ($currentPage < $totalPages - $range - 1) {
                        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                        echo '<li class="page-item">';
                        $lastLink = 'predchadzajuce-podujatia?page=' . $totalPages;
                        if ($selectedYear) $lastLink .= '&year=' . $selectedYear;
                        echo '<a class="page-link" href="' . $lastLink . '">' . $totalPages . '</a>';
                        echo '</li>';
                    }
                    
                    // Next button
                    if ($currentPage < $totalPages) {
                        echo '<li class="page-item">';
                        $nextLink = 'predchadzajuce-podujatia?page=' . ($currentPage + 1);
                        if ($selectedYear) $nextLink .= '&year=' . $selectedYear;
                        echo '<a class="page-link" href="' . $nextLink . '" aria-label="Next">';
                        echo '<span aria-hidden="true">&raquo;</span>';
                        echo '</a></li>';
                    } else {
                        echo '<li class="page-item disabled">';
                        echo '<span class="page-link">&raquo;</span>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>
<!--FOOTER-->
<?php
footer("other");
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="links/link.js"></script>

<script>
// Store original server-side values
const originalTotalPosts = <?= $totalPosts ?>;
const originalPostsOnPage = <?= $postsOnCurrentPage ?>;
const originalTotalPages = <?= $countPages ?>;
const originalCurrentPage = <?= $currentPage ?>;
const selectedYear = '<?= $selectedYear ?>';
const currentSearch = '<?= htmlspecialchars($searchTerm, ENT_QUOTES) ?>';
const selectedCategory = '<?= $selectedCategory ?>';

const categoryButtons = document.querySelectorAll('.category-filter-btn');
let isFilterOpen = false;

// Search functionality - reload page with search parameter
document.getElementById('searchBtn').addEventListener('click', function() {
    performSearch();
});

document.getElementById('searchFilter').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        performSearch();
    }
});

function performSearch() {
    const searchValue = document.getElementById('searchFilter').value.trim();
    const currentUrl = new URL(window.location.href);
    
    if (searchValue) {
        currentUrl.searchParams.set('search', searchValue);
    } else {
        currentUrl.searchParams.delete('search');
    }
    currentUrl.searchParams.delete('page');
    
    window.location.href = currentUrl.toString();
}

// Clear search
const clearSearchBtn = document.getElementById('clearSearchBtn');
if (clearSearchBtn) {
    clearSearchBtn.addEventListener('click', function() {
        const currentUrl = new URL(window.location.href);
        currentUrl.searchParams.delete('search');
        currentUrl.searchParams.delete('page');
        window.location.href = currentUrl.toString();
    });
}

// Filter toggle functionality
const filterToggle = document.getElementById('filterToggle');
const filterToggleBtn = document.getElementById('filterToggleBtn');
const filterContent = document.getElementById('filterContent');

filterToggle.addEventListener('click', function(e) {
    e.preventDefault();
    isFilterOpen = !isFilterOpen;
    
    if (isFilterOpen) {
        filterContent.style.maxHeight = filterContent.scrollHeight + 'px';
        filterToggleBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
    } else {
        filterContent.style.maxHeight = '0';
        filterToggleBtn.innerHTML = '<i class="fas fa-chevron-down"></i>';
    }
});

// Apply category filters (client-side only)
function applyFilters() {
    let visibleCards = [];
    
    articleCards.forEach(card => {
        const cardCategories = card.getAttribute('data-categories');
        
        // Check category filter
        const matchesCategory = currentFilters.category === 'all' || 
            (cardCategories && cardCategories.split(',').includes(currentFilters.category));
        
        if (matchesCategory) {
            visibleCards.push(card);
            card.style.display = ''; // Show matched cards
        } else {
            card.style.display = 'none';
        }
    });
    
    // Check if we're actually filtering (not showing all)
    isFiltering = currentFilters.category !== 'all';
    
    if (isFiltering) {
        // Client-side filtering active - show filtered count
        document.getElementById('visibleCount').textContent = visibleCards.length;
        document.getElementById('totalCount').textContent = visibleCards.length;
        
        // Hide server pagination when filtering
        const paginationContainer = document.querySelector('.pagination');
        if (paginationContainer) {
            if (visibleCards.length > 0) {
                paginationContainer.innerHTML = '<li class="page-item active"><span class="page-link">1</span></li>';
            } else {
                paginationContainer.innerHTML = '<li class="page-item disabled"><span class="page-link">Žiadne výsledky</span></li>';
            }
        }
    } else {
        // No filters active - restore original server-side values
        document.getElementById('visibleCount').textContent = originalPostsOnPage;
        document.getElementById('totalCount').textContent = originalTotalPosts;
        
        // Restore server-side pagination
        restoreServerPagination();
    }
}

// Restore original server-side pagination HTML
function restoreServerPagination() {
    const paginationContainer = document.querySelector('.pagination');
    if (!paginationContainer) return;
    
    let html = '';
    const current = originalCurrentPage;
    const total = originalTotalPages;
    const range = 2;
    
    // Previous button
    if (current > 1) {
        let prevLink = 'predchadzajuce-podujatia?page=' + (current - 1);
        if (selectedYear) prevLink += '&year=' + selectedYear;
        html += '<li class="page-item"><a class="page-link" href="' + prevLink + '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
    } else {
        html += '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
    }
    
    // First page
    if (current > range + 2) {
        let firstLink = 'predchadzajuce-podujatia?page=1';
        if (selectedYear) firstLink += '&year=' + selectedYear;
        html += '<li class="page-item"><a class="page-link" href="' + firstLink + '">1</a></li>';
        html += '<li class="page-item disabled"><span class="page-link">...</span></li>';
    }
    
    // Page numbers
    for (let i = 1; i <= total; i++) {
        if (i === 1 && current > range + 2) continue;
        if (i === total && current < total - range - 1) continue;
        
        if (i >= current - range && i <= current + range) {
            if (i === current) {
                html += '<li class="page-item active"><span class="page-link">' + i + '</span></li>';
            } else {
                let pageLink = 'predchadzajuce-podujatia?page=' + i;
                if (selectedYear) pageLink += '&year=' + selectedYear;
                html += '<li class="page-item"><a class="page-link" href="' + pageLink + '">' + i + '</a></li>';
            }
        }
    }
    
    // Last page
    if (current < total - range - 1) {
        html += '<li class="page-item disabled"><span class="page-link">...</span></li>';
        let lastLink = 'predchadzajuce-podujatia?page=' + total;
        if (selectedYear) lastLink += '&year=' + selectedYear;
        html += '<li class="page-item"><a class="page-link" href="' + lastLink + '">' + total + '</a></li>';
    }
    
    // Next button
    if (current < total) {
        let nextLink = 'predchadzajuce-podujatia?page=' + (current + 1);
        if (selectedYear) nextLink += '&year=' + selectedYear;
        html += '<li class="page-item"><a class="page-link" href="' + nextLink + '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
    } else {
        html += '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
    }
    
    paginationContainer.innerHTML = html;
}

// Year filter
document.getElementById('yearFilter').addEventListener('change', function() {
    const selectedYear = this.value;
    const currentUrl = new URL(window.location.href);
    
    if (selectedYear) {
        currentUrl.searchParams.set('year', selectedYear);
    } else {
        currentUrl.searchParams.delete('year');
    }
    currentUrl.searchParams.delete('page');
    
    window.location.href = currentUrl.toString();
});

// Category filter buttons - reload page with category parameter
categoryButtons.forEach(button => {
    button.addEventListener('click', function() {
        const categoryId = this.getAttribute('data-category');
        const currentUrl = new URL(window.location.href);
        
        if (categoryId === 'all') {
            currentUrl.searchParams.delete('category');
        } else {
            currentUrl.searchParams.set('category', categoryId);
        }
        currentUrl.searchParams.delete('page');
        
        window.location.href = currentUrl.toString();
    });
});

// Add hover effect to category buttons
categoryButtons.forEach(button => {
    button.addEventListener('mouseenter', function() {
        if (!this.classList.contains('active')) {
            this.style.background = '#f0f4ff';
            this.style.borderColor = '#667eea';
        }
    });
    
    button.addEventListener('mouseleave', function() {
        if (!this.classList.contains('active')) {
            const isActive = this.classList.contains('active');
            if (!isActive) {
                this.style.background = 'white';
                this.style.borderColor = '#dee2e6';
            }
        }
    });
});
</script>

</body>
<!--   font-family: 'Istok Web', sans-serif;   -->
</html>
