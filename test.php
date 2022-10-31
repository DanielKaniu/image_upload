<?php
//
//Get the image content that is passed from the front-end.
echo $content = $_POST['content'];
//
$finfo = new finfo(FILEINFO_MIME_TYPE);
//
//The file type, e.g., image/png or image/jpeg etc.
$type = $finfo->buffer($content);
//
//The extension format of the file.
$ext = explode('/', $type);
echo $ext[1];
//
//These are characters that will provide names for images.
$lower_case = 'abcdefghijklmnopqrstuvwxyz';
$numeric = '1234567890';
$uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//
//Shuffle the characters above to generate image names.
$image_name = str_shuffle($lower_case.$numeric.$uppercase.$lower_case.$numeric.$uppercase). '.' .$ext[1];
//
//The path in which to save the images.
$path = './images/'.$image_name;
//
//Open the stream.
$stream = fopen($path, 'w');
//
//Write into the newly created image.
fwrite($stream, $content);
//
fclose($stream);