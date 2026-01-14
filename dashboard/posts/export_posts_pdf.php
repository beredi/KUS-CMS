<?php
// Set UTF-8 encoding for the entire script
ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');

session_start();

// Check if user is logged in and has permission
if (!isset($_SESSION['user_role'])) {
    header('Location: ../login.php');
    exit();
}

require_once('../includes/db.php');

// Set UTF-8 for database connection (match server collation)
$connection->exec("SET NAMES utf8");
$connection->exec("SET CHARACTER SET utf8");

// Get date range from request
$dateFrom = isset($_POST['date_from']) ? $_POST['date_from'] : '';
$dateTo = isset($_POST['date_to']) ? $_POST['date_to'] : '';

// Build query with date filter
$query = "SELECT posts.*, users.user_name, users.user_lastname 
          FROM posts 
          INNER JOIN users ON posts.post_author = users.user_id 
          WHERE 1=1";

$params = [];

if (!empty($dateFrom)) {
    $query .= " AND DATE(post_date) >= :date_from";
    $params[':date_from'] = $dateFrom;
}

if (!empty($dateTo)) {
    $query .= " AND DATE(post_date) <= :date_to";
    $params[':date_to'] = $dateTo;
}

$query .= " ORDER BY post_date DESC";

try {
    $send_info = $connection->prepare($query);
    
    foreach ($params as $key => $value) {
        $send_info->bindValue($key, $value);
    }
    
    $send_info->execute();
    $posts = $send_info->fetchAll(PDO::FETCH_ASSOC);
    
} catch (Exception $e) {
    die("Error fetching posts: " . $e->getMessage());
}

// Function to convert images in HTML to base64 and add descriptions
function embedImagesInContent($html_content) {
    // Match all img tags - look for them in paragraphs or divs like the JavaScript does
    preg_match_all('/<img[^>]+>/i', $html_content, $img_matches);
    
    if (!empty($img_matches[0])) {
        foreach ($img_matches[0] as $original_tag) {
            // Extract src attribute
            $src_match = null;
            if (preg_match('/src\s*=\s*"([^"]+)"/', $original_tag, $match)) {
                $src_match = $match;
            } elseif (preg_match('/src\s*=\s*\'([^\']+)\'/', $original_tag, $match)) {
                $src_match = $match;
            }
            
            // Extract alt attribute - this is the description
            $alt_text = '';
            if (preg_match('/alt\s*=\s*"([^"]*)"/', $original_tag, $match)) {
                $alt_text = trim($match[1]);
            } elseif (preg_match('/alt\s*=\s*\'([^\']*)\'/', $original_tag, $match)) {
                $alt_text = trim($match[1]);
            }
            
            if (empty($src_match[1])) continue;
            
            $img_src = $src_match[1];
            
            // Convert relative paths to absolute
            $image_path = $img_src;
            
            // Handle different path formats
            if (strpos($image_path, 'http') === false) {
                // Remove leading slashes and ../ 
                $image_path = preg_replace('/^(\.\.\/)+/', '', $image_path);
                $image_path = ltrim($image_path, '/');
                
                // Build absolute path
                $absolute_path = '../../' . $image_path;
                
                if (file_exists($absolute_path)) {
                    try {
                        $image_data = base64_encode(file_get_contents($absolute_path));
                        $image_info = @getimagesize($absolute_path);
                        
                        if ($image_info) {
                            $image_mime = $image_info['mime'];
                            $base64_src = 'data:' . $image_mime . ';base64,' . $image_data;
                            
                            // Create figure with centered image and description below (like link.js does)
                            $new_tag = '<div class="img-container">';
                            $new_tag .= '<img src="' . $base64_src . '" alt="' . htmlspecialchars($alt_text) . '" />';
                            
                            // Add description below image if alt text exists (matching link.js behavior)
                            if (!empty($alt_text)) {
                                $new_tag .= '<p class="img-description">' . htmlspecialchars($alt_text) . '</p>';
                            }
                            
                            $new_tag .= '</div>';
                            
                            $html_content = str_replace($original_tag, $new_tag, $html_content);
                        }
                    } catch (Exception $e) {
                        // Skip image if error
                        continue;
                    }
                }
            }
        }
    }
    
    return $html_content;
}

// Generate HTML for PDF
$html = '<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @page {
            margin: 20mm;
            orphans: 3;
            widows: 3;
        }
        
        body {
            font-family: "DejaVu Sans", Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        
        h1, h2, h3, h4, h5, h6 {
            page-break-after: avoid;
            page-break-inside: avoid;
        }
        
        p {
            orphans: 3;
            widows: 3;
        }
        
        figure, img {
            page-break-inside: avoid;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #2c327f;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #2c327f;
            font-size: 28px;
            margin: 0 0 10px 0;
        }
        
        .header .subtitle {
            color: #666;
            font-size: 14px;
        }
        
        .date-range {
            background: #f5f7fa;
            padding: 12px;
            margin-bottom: 30px;
            border-left: 4px solid #2c327f;
            font-size: 13px;
        }
        
        .post {
            margin-bottom: 40px;
            page-break-inside: avoid;
            page-break-after: auto;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
        }
        
        .post-header {
            background: linear-gradient(135deg, #2c327f 0%, #1a1d4d 100%);
            color: white;
            padding: 20px;
            page-break-inside: avoid;
            page-break-after: avoid;
        }
        
        .post-title {
            font-size: 20px;
            font-weight: bold;
            margin: 0 0 10px 0;
            page-break-after: avoid;
        }
        
        .post-meta {
            font-size: 12px;
            opacity: 0.9;
        }
        
        .post-meta-item {
            display: inline-block;
            margin-right: 20px;
        }
        
        .post-meta-label {
            font-weight: bold;
            margin-right: 5px;
        }
        
        .post-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            display: block;
            page-break-inside: avoid;
        }
        
        .post-content {
            padding: 20px;
        }
        
        .post-content p {
            margin: 0 0 15px 0;
            text-align: justify;
            orphans: 3;
            widows: 3;
        }
        
        .post-body {
            line-height: 1.8;
        }
        
        .post-body img {
            max-width: 60%;
            height: auto;
            display: block;
            margin: 15px auto;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            page-break-inside: avoid;
            page-break-before: auto;
            page-break-after: auto;
        }
        
        .img-container {
            text-align: center;
            margin: 20px 0;
            page-break-inside: avoid;
        }
        
        .img-container img {
            max-width: 60%;
            height: auto;
            display: block;
            margin: 0 auto 5px auto;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .img-description {
            font-size: 12px;
            color: #666;
            font-style: italic;
            text-align: center;
            margin: 8px auto 0 auto;
            padding: 0;
            line-height: 1.4;
        }
        
        .img-with-caption {
            text-align: center;
            margin: 20px 0;
            page-break-inside: avoid;
        }
        
        .img-with-caption img {
            max-width: 60%;
            height: auto;
            display: block;
            margin: 0 auto 10px auto;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .img-with-caption figcaption {
            font-size: 12px;
            color: #666;
            font-style: italic;
            margin-top: 8px;
            padding: 0 15%;
            line-height: 1.4;
        }
        
        .post-body p {
            margin: 0 0 15px 0;
            text-align: justify;
            orphans: 3;
            widows: 3;
        }
        
        .post-body h1, .post-body h2, .post-body h3 {
            color: #2c327f;
            margin: 20px 0 10px 0;
            page-break-after: avoid;
            page-break-inside: avoid;
        }
        
        .post-body ul, .post-body ol {
            margin: 10px 0 15px 20px;
        }
        
        .post-body a {
            color: #2c327f;
            text-decoration: underline;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        
        .status-published {
            background: #d6ffdc;
            color: #1a7f2d;
        }
        
        .status-draft {
            background: #ffd6d6;
            color: #7f1a1a;
        }
        
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #999;
            padding: 10px;
            border-top: 1px solid #e0e0e0;
            background: white;
        }
        
        .no-posts {
            text-align: center;
            padding: 60px 20px;
            color: #999;
            font-size: 16px;
        }
        
        hr {
            border: none;
            border-top: 1px solid #e0e0e0;
            margin: 30px 0;
        }
        
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎭 KUS Jána Kollára - Výpis článkov</h1>
        <div class="subtitle">Kultúrno-umelecký spolok Jána Kollára zo Selenče</div>
    </div>
';

if (!empty($dateFrom) || !empty($dateTo)) {
    $html .= '<div class="date-range">';
    $html .= '<strong>Obdobie:</strong> ';
    if (!empty($dateFrom)) {
        $html .= 'od ' . date('d.m.Y', strtotime($dateFrom));
    }
    if (!empty($dateTo)) {
        if (!empty($dateFrom)) {
            $html .= ' ';
        }
        $html .= 'do ' . date('d.m.Y', strtotime($dateTo));
    }
    $html .= ' | <strong>Počet článkov:</strong> ' . count($posts);
    $html .= '</div>';
} else {
    $html .= '<div class="date-range">';
    $html .= '<strong>Všetky články</strong> | <strong>Počet článkov:</strong> ' . count($posts);
    $html .= '</div>';
}

if (empty($posts)) {
    $html .= '<div class="no-posts">Žiadne články neboli nájdené pre zadané obdobie.</div>';
} else {
    foreach ($posts as $index => $post) {
        $post_title = htmlspecialchars($post['post_title'], ENT_QUOTES, 'UTF-8');
        $post_author = htmlspecialchars($post['user_name'] . ' ' . $post['user_lastname'], ENT_QUOTES, 'UTF-8');
        $post_date = date('d.m.Y H:i', strtotime($post['post_date']));
        $post_status = $post['post_status'];
        $post_image = $post['post_image'];
        
        // Get full content with images embedded
        $post_content_html = $post['post_content'];
        $post_content_with_images = embedImagesInContent($post_content_html);
        
        $status_class = $post_status == 'draft' ? 'status-draft' : 'status-published';
        $status_text = $post_status == 'draft' ? 'Čaká na schválenie' : 'Publikovaný';
        
        $html .= '<div class="post">';
        $html .= '  <div class="post-header">';
        $html .= '    <div class="post-title">' . $post_title . '</div>';
        $html .= '    <div class="post-meta">';
        $html .= '      <span class="post-meta-item">';
        $html .= '        <span class="post-meta-label">👤 Autor:</span>' . $post_author;
        $html .= '      </span>';
        $html .= '      <span class="post-meta-item">';
        $html .= '        <span class="post-meta-label">📅 Dátum:</span>' . $post_date;
        $html .= '      </span>';
        $html .= '    </div>';
        $html .= '  </div>';
        
        // Add featured image if exists
        if (!empty($post_image)) {
            $image_path = '../../images/articles/' . $post_image;
            if (file_exists($image_path)) {
                // Convert image to base64 for PDF
                $image_data = base64_encode(file_get_contents($image_path));
                $image_info = getimagesize($image_path);
                $image_mime = $image_info['mime'];
                
                $html .= '  <img src="data:' . $image_mime . ';base64,' . $image_data . '" class="post-image" alt="' . htmlspecialchars($post_title, ENT_QUOTES, 'UTF-8') . '">';
            }
        }
        
        $html .= '  <div class="post-content">';
        $html .= '    <span class="status-badge ' . $status_class . '">' . $status_text . '</span>';
        // Output full HTML content with embedded images
        $html .= '    <div class="post-body">' . $post_content_with_images . '</div>';
        $html .= '  </div>';
        $html .= '</div>';
        
        // Add separator between posts (except last one)
        if ($index < count($posts) - 1) {
            $html .= '<hr>';
        }
    }
}

$html .= '
    <div class="footer">
        <div>Vygenerované: ' . date('d.m.Y H:i') . ' | KUS Jána Kollára Selenča</div>
    </div>
</body>
</html>
';

// Try to use mPDF if available, otherwise fall back to browser print
if (file_exists('../vendor/autoload.php')) {
    require_once '../vendor/autoload.php';
    
    try {
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 20,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
        
        $mpdf->SetTitle('KUS Jána Kollára - Výpis článkov');
        $mpdf->SetAuthor('KUS Jána Kollára');
        $mpdf->WriteHTML($html);
        
        $filename = 'KUS_clanky_' . date('Y-m-d_H-i') . '.pdf';
        $mpdf->Output($filename, 'D'); // D = download
        exit;
        
    } catch (Exception $e) {
        // Fall back to browser print if mPDF fails
    }
}

// Fallback: Output HTML and use browser print-to-PDF
header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

// Output with proper UTF-8 encoding
echo $html;

// Add JavaScript to trigger print dialog
echo '
<script>
    window.onload = function() {
        // Add print button for manual control
        var printBtn = document.createElement("button");
        printBtn.innerHTML = "🖨️ Tlačiť / Uložiť ako PDF";
        printBtn.className = "no-print";
        printBtn.style.cssText = "position: fixed; top: 20px; right: 20px; padding: 12px 24px; background: #2c327f; color: white; border: none; border-radius: 8px; cursor: pointer; font-size: 16px; font-weight: bold; box-shadow: 0 4px 12px rgba(0,0,0,0.2); z-index: 9999;";
        printBtn.onclick = function() { window.print(); };
        document.body.appendChild(printBtn);
        
        // Auto-print after images load
        setTimeout(function() {
            window.print();
        }, 1000);
    };
</script>
';
?>
