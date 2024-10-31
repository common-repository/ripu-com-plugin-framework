<?PHP
/*
Date: 24.09.2008 16:42:33
Filename: clsWebFormSelect.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

class WebFormSelect extends WebFormInput{
  var $m_arOptions = array();
  
  function WebFormSelect($name, $title = "", $description = "", $id = NULL){
    $this->m_strName = $name;
    $this->m_strTitle = $title;
    $this->m_strDescription = nl2br($description);
    $this->m_intID = $id;
  }

  function __construct($name, $title = "", $description = "", $id = NULL){
    $this->WebFormSelect($name, $title, $description, $id);
  }

  function AddOption($name, $value){
    $this->m_arOptions[$name] = $value;
  }
  
  function GetOptions(){
    foreach($this->m_arOptions as $name => $value){
      $return .= "<option value='$value'>$name</option>";
    }
    return $return;
  }
  
  function toString(){
    $strAttributes = "";
    foreach($this->m_arAttributes as $name => $value){
      $strAttributes .= " ". $name ."='". $value ."'";
    }
    return "<tr><td valign='top'><b>". $this->m_strTitle ."</b></td><td valign='top'><select name='". $this->m_strName ."'". $strAttributes .">". $this->GetOptions() ."</select><br/><i>". $this->m_strDescription ."</i></td></tr>";
  }

}
?>