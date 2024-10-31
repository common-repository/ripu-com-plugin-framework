<?PHP
/*
Date: 25.09.2008 16:21:33
Filename: clsUpdateFade.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

class UpdateFade{
  function UpdateFade(){
  }

  function __construct(){
  }

  function Destroy(){
  }

  function __destruct(){
  }

  function toString($String = ""){
    return '<div id="message" class="updated fade" style="padding:10px;"><strong>'. $String .'</strong></div><br/>';
  }
}
?>