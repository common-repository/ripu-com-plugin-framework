<?PHP
/*
Date: 24.09.2008 16:42:33
Filename: clsWebFormTextbox.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

class WebFormTextbox extends WebFormInput{
  var $m_strValue = "";

  function WebFormTextbox($name, $title = "", $description = "", $value = "", $id = NULL){
    $this->m_strName = $name;
    $this->m_strValue = $value;
    $this->m_strTitle = $title;
    $this->m_strDescription = nl2br($description);
    $this->m_intID = $id;
  }

  function __construct($name, $title = "", $description = "", $value = "", $id = NULL){
    $this->WebFormTextbox($name, $title, $description, $value, $id);
  }

  function toString(){
    $strAttributes = "";
    foreach($this->m_arAttributes as $name => $value){
      $strAttributes .= " ". $name ."='". $value ."'";
    }
    return "<tr><td valign='top'><b>". $this->m_strTitle ."</b></td><td valign='top'><textarea name='". $this->m_strName ."'". $strAttributes .">". $this->m_strValue ."</textarea><br/><i>". $this->m_strDescription ."</i></td></tr>";
  }

}
?>