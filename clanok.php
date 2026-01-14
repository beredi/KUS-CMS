<?php
session_start();
include 'includes/articleHeader.php';

if (isset($_GET['p_id'])) {
	$post_id = $_GET['p_id'];
}

try {

	include 'dashboard/includes/db.php';
	$query = "SELECT * FROM posts WHERE post_id = $post_id ";

	$send_info = $connection->prepare($query);

	$send_info->execute();

	while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
		$id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_image = $row['post_image'];
		$post_tags = $row['post_tags'];
		$post_status = $row['post_status'];
		$temp_post_content = strip_tags($row['post_content']);
	}
	if (!isset($_SESSION['user_role']) && $post_status == 'draft') {

		header('Location: index.php');
	}


} catch (Exception $e) {
	echo $e;
}

articleHeader($post_title, $post_image, $temp_post_content, $post_tags, $id);


?>
<body>
<?php include 'includes/navbar.php'; ?>

<style>
.article-container {
    background: #fff;
    padding: 0;
    margin-top: 20px;
}
.article-header {
    position: relative;
    margin-bottom: 30px;
}
.article-featured-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}
.article-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1a1a1a;
    margin: 30px 0 20px 0;
    line-height: 1.3;
}
.article-meta {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 15px 0;
    border-top: 2px solid #f0f0f0;
    border-bottom: 2px solid #f0f0f0;
    margin-bottom: 30px;
    flex-wrap: wrap;
}
.meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #666;
    font-size: 0.95rem;
}
.meta-item i {
    color: #007bff;
    font-size: 1.1rem;
}
.draft-badge {
    display: inline-block;
    background: #dc3545;
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 600;
    margin-bottom: 20px;
    font-size: 0.9rem;
}
.article-content {
    font-size: 1.4rem;
    line-height: 2;
    color: #333;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
}
.article-content p {
    margin-bottom: 1.5rem;
    font-size: 1.4rem;
}
.article-content img {
    max-width: 100%;
    height: auto;
    border-radius: 6px;
    margin: 20px 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
.article-content h2, .article-content h3 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: #1a1a1a;
    font-size: 1.5rem;
    font-weight: 600;
}
.share-buttons {
    display: flex;
    gap: 10px;
    align-items: center;
}
.share-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: #1877f2;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-weight: 500;
    transition: all 0.3s ease;
    font-size: 0.9rem;
}
.share-btn:hover {
    background: #145dbf;
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}
.share-btn i {
    font-size: 1.1rem;
}
.article-body-wrapper {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}
@media (max-width: 768px) {
    .article-title {
        font-size: 1.8rem;
    }
    .article-featured-image {
        height: 250px;
    }
    .article-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
}
</style>

<div class="container content article-container">
	<?php
	if (isset($_GET['p_id'])) {
		$post_id = $_GET['p_id'];
	}

	try {
		include 'dashboard/includes/db.php';
		$query = "SELECT * FROM posts INNER JOIN users ON posts.post_author = users.user_id WHERE post_id = $post_id";

		$send_info = $connection->prepare($query);
		$send_info->execute();

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$post_title = $row['post_title'];
			$post_author_id = $row['post_author'];
			$post_author_name = $row['user_name'];
			$post_author_lastname = $row['user_lastname'];
			$post_author = $post_author_name . ' ' . $post_author_lastname;

			$post_date1 = strtotime($row['post_date']);
			$post_date = date('d. M. Y', $post_date1);
			$post_content = $row['post_content'];
			$post_image = $row['post_image'];
			$post_status = $row['post_status'];
			$post_tags = $row['post_tags'];
		}

	} catch (Exception $e) {
		echo $e;
	}
	?>

    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
            <div class="article-body-wrapper">
                <!-- Draft Status -->
				<?php if ($post_status == 'draft'): ?>
                    <div class="draft-badge">
                        <i class="fas fa-exclamation-circle"></i> Tento článok nie je publikovaný
                    </div>
				<?php endif; ?>

                <!-- Article Header -->
                <div class="article-header">
					<?php if ($post_image): ?>
                        <img src="images/articles/<?php echo $post_image; ?>" 
                             alt="<?php echo htmlspecialchars($post_title); ?>" 
                             class="article-featured-image">
					<?php endif; ?>
                    
                    <h1 class="article-title"><?php echo $post_title; ?></h1>
                    
                    <!-- Article Meta -->
                    <div class="article-meta">
                        <div class="meta-item">
                            <i class="far fa-calendar-alt"></i>
                            <span><?php echo $post_date; ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="far fa-user"></i>
                            <span><?php echo $post_author; ?></span>
                        </div>
                        
                        <!-- Share Buttons -->
						<?php if ($post_status !== 'draft'): ?>
                            <div class="share-buttons" style="margin-left: auto;">
                                <a class="share-btn" 
                                   href="https://www.facebook.com/sharer/sharer.php?u=https://kusjanakollara.org/clanok.php?p_id=<?= $post_id ?>"
                                   target="_blank"
                                   rel="noopener noreferrer">
                                    <i class="fab fa-facebook-f"></i> Zdieľať
                                </a>
                            </div>
						<?php endif; ?>
                    </div>
                </div>

                <!-- Article Content -->
                <div class="article-content text-justify contentPageBody">
					<?php echo $post_content; ?>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
		<?php include 'includes/sidebar.php'; ?>
    </div>
</div>

<!--FOOTER-->
<?php include 'includes/footer.php'; ?>
<?php
footer("other");
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="links/link.js"></script>
</body>
<!--   font-family: 'Istok Web', sans-serif;   -->
</html>
