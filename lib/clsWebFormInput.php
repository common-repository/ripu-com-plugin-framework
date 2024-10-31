<?PHP
/*
Date: 24.09.2008 15:53:47
Filename: clsWebFormInput.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

class WebFormInput{
  var $m_intID = -1;
  var $m_strType = "";
  var $m_strName = "";
  var $m_strTitle = "";
  var $m_strDescription = "";

  var $m_arAttributes = array();
  
  function WebFormInput($type, $name, $title = "", $description = "", $id = NULL){
    $this->m_strType = $type;
    $this->m_strName = $name;
    $this->m_strTitle = $title;
    $this->m_strDescription = nl2br($description);
    $this->m_intID = $id;
  }

  function __construct($type, $name, $title = "", $description = "", $id = NULL){
    $this->WebFormInput($type, $name, $title, $description, $id);
  }

  function Destroy(){
    unset($this->m_intID);
    unset($this->m_strType);
    unset($this->m_strName);
    unset($this->m_arAttributes);
    unset($this->m_strTitle);
    unset($this->m_strDescription);
  }

  function __destruct(){
    $this->Destroy();
  }
  
  function AddAttribute($name, $value){
    $this->m_arAttributes[$name] = $value;
  }
  
  function toString(){
    $strAttributes = "";
    foreach($this->m_arAttributes as $name => $value){
      $strAttributes .= " ". $name ."='". $value ."'";
    }
    return "<tr><td valign='top'><b>". $this->m_strTitle ."</b></td><td valign='top'><input type='". $this->m_strType ."' name='". $this->m_strName ."'". $strAttributes ."/><br/><i>". $this->m_strDescription ."</i></td></tr>";
  }

}
?>