<?php  

$text = $_GET['text'];
if ( !file_exists('head/'.$text.'.png'))
{	
        $font= "head/martel.ttf";

        if (!empty($_GET['font'])) 
        {
			$font = "head/second.ttf";
		}

        $image = imagecreatefrompng ('head/headline.png');
        imagettftext ($image, 18, 0, 4, 20, imagecolorallocate($image, 240, 209, 164), $font, $text);
        imagepng($image, 'head/'.$text.'.png');
}

$img= 'head/'.$text.'.png';
$pic= imagecreatefrompng($img);
header('Content-type: image/png');
imagepng($pic);
