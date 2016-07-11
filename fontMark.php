<?php
header( "Content-Type:text/html; charset=UTF-8 ");
/*打开图片*/
//1：配置图片路径
$src = "source/001.jpg";
//2:获取图片信息(gd库函数 getimagesize)
$info = getimagesize($src);
// echo "<pre>";
// print_r($info);
// echo "</pre>";
//3:通过gd库获得图像类型
$type = image_type_to_extension($info[2],false);
// echo $type;
//4:内存中创建一个和我们类型一致的图片
$fun ="imagecreatefrom{$type}";
// echo $fun;
//5:复制图片到内存中
$image =  $fun($src);

/*操作图片*/
//1:设置字体路径
$font = "source/msyh.ttf";
//2:设置水印内容
$content = "雯哥好帅";
$text = iconv("GB2312", "UTF-8", $content);
//3:设置颜色rgb和透明度
$col = imagecolorallocatealpha($image, 255, 0, 0, 50);
//4:写入文字
imagettftext($image, 20, 0, 50, 140, $col, $font, $text);
/*输出图片*/
//1:浏览器输出
header("Content-type:".$info['mime']);
$func = "image{$type}";//
 $func($image);
 //2:保存图片到本地
 $func($image,'newimage'.$type);
/*销毁图片*/
 imagedestroy($image);
