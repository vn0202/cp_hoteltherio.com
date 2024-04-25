<?php
header("Content-Type: image/png");
// Get the code parameter (if available)
$code = isset($_GET['scode']) ? $_GET['scode'] : null;

// Define image dimensions
$width = 99;
$height = 26;

// Create a new true color image
$image = imagecreatetruecolor($width, $height);

// Allocate background color (white in this case)
$background = imagecolorallocate($image, 0, 0, 0);

// Fill the image with background color
imagefill($image, 0, 0, $background);

// Check if code is provided and create text if so
if ($code) {
    // Allocate text color (black in this case)
    $text_color = imagecolorallocate($image, 247, 247, 244);

    // Set font (replace with your desired font path if needed)

    // Write text on the image with some positioning adjustments
    imagestring($image, 18, 16, 5,  $code, $text_color);
}
$line_color = imagecolorallocate($image, 250, 250, 246);

$start_x1 = 16;
$start_y1 = 5;
$end_x1 = $width-16;
$end_y1 = $height -5;

$start_x2 = $width-16;
$start_y2 = 5;
$end_x2 = 16;
$end_y2 = $height-5;

// Draw diagonal lines
imageline($image, $start_x1, $start_y1, $end_x1, $end_y1, $line_color);
imageline($image, $start_x2, $start_y2, $end_x2, $end_y2, $line_color);
// Output the image as PNG
echo imagepng($image);

// Destroy the image resource
imagedestroy($image);

?>