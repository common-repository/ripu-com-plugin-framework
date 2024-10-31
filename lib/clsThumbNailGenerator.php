<?PHP
/*
Date: 05.10.2008 20:32:27
Filename: clsThumbNailGenerator.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

class ThumbNailGenerator{
  var $m_strPicture = "";
  var $m_strThumbnail = "";
  var $m_intNewWidth = -1;
  var $m_strMime = "";

  function ThumbNailGenerator($picture, $newWidth, $thumbnail = ""){
    $this->m_strPicture = $picture;
    $this->m_strThumbnail = $thumbnail;
    $this->m_intNewWidth = $newWidth;
    $arInfos = @getimagesize($picture);
    $this->m_strMime = $arInfos['mime'];
  }
  function __construct($picture, $newWidth, $thumbnail = ""){
    $this->ThumbNailGenerator($picture, $newWidth, $thumbnail);
  }

  function Destroy(){
    unset($this->m_strPicture);
    unset($this->m_strThumbnail);
    unset($this->m_intNewWidth);
    unset($this->m_strMime);
  }

  function __destruct(){
    $this->Destroy();
  }
  
  function Generate($Save = False){
    if(!$Save) header('Content-type: '.$this->Mime());
    $size = GetImageSize($this->m_strPicture);
    $width = $size[0];
    $height = $size[1];
    $newWidth = $this->m_intNewWidth;
    $newHeight= intval($height*$newWidth/$width);
    if($size[2]==1) $tmpPicture = imagecreatefromgif($this->m_strPicture);
    if($size[2]==2) $tmpPicture = imagecreatefromjpeg($this->m_strPicture);
    if($size[2]==3) $tmpPicture = imagecreatefrompng($this->m_strPicture);

    $tmpThumbnail = imagecreate($newWidth, $newHeight);
    imagecopyresized($tmpThumbnail, $tmpPicture, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    if($Save){
      if($size[2]==1) $tmpPicture = imagegif($tmpThumbnail, $this->m_strThumbnail);
      if($size[2]==2) $tmpPicture = imagejpeg($tmpThumbnail, $this->m_strThumbnail);
      if($size[2]==3) $tmpPicture = imagepng($tmpThumbnail, $this->m_strThumbnail);
      return True;
    }else{
      if($size[2]==1) $tmpPicture = imagegif($tmpThumbnail);
      if($size[2]==2) $tmpPicture = imagejpeg($tmpThumbnail);
      if($size[2]==3) $tmpPicture = imagepng($tmpThumbnail);

      return $tmpPicture;
      return True;
    }
  }
  
  function Mime(){
    return $this->m_strMime;
  }
}
?>