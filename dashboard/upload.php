<?php
header('Content-Type: application/json');

$targetDir = __DIR__ . '/uploads/';
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

if (!isset($_FILES['file'])) {
    http_response_code(400);
    echo json_encode(['error' => 'No file uploaded']);
    exit;
}

$orig = basename($_FILES['file']['name']);
$safe = preg_replace('/[^A-Za-z0-9_.-]/', '_', $orig);
$fileName = time() . '_' . $safe;
$targetFile = $targetDir . $fileName;

if (!move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
    http_response_code(400);
    echo json_encode(['error' => 'Upload failed']);
    exit;
}

// Absolútna URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$publicPath = $protocol . "://" . $host . "/dashboard/uploads/" . $fileName;

echo json_encode(['location' => $publicPath]);
