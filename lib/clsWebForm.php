<?PHP
/*
Date: 24.09.2008 15:45:04
Filename: clsWebForm.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

include("../wp-content/plugins/ripu-com-plugin-framework/lib/clsWebFormInput.php");
include("../wp-content/plugins/ripu-com-plugin-framework/lib/clsWebFormSelect.php");
include("../wp-content/plugins/ripu-com-plugin-framework/lib/clsWebFormTextbox.php");
include("../wp-content/plugins/ripu-com-plugin-framework/lib/clsWebFormBreak.php");
include("../wp-content/plugins/ripu-com-plugin-framework/lib/clsWebFormHTML.php");

class WebForm{
  var $m_strMethod = "";
  var $m_strAction = "";
  var $m_strEnctype = "";
  var $m_strName = "";
  var $m_strTitle = "";
  
  var $m_arItems = array();

  function WebForm($method, $action, $name, $title = "", $enctype = "application/x-www-form-urlencoded"){
    $this->m_strMethod = $method;
    $this->m_strAction = $action;
    $this->m_strName = $name;
    $this->m_strEnctype = $enctype;
    $this->m_strTitle = $title;
  }

  function __construct($method, $action, $name, $title = "", $enctype = "application/x-www-form-urlencoded"){
    $this->WebForm($method, $action, $name, $title, $enctype);
  }

  function Destroy(){
    if(count($this->m_arItems) != 0){
    foreach($this->m_arItems as $key => $object){
      $object->Destroy();
    }
    unset($this->m_strAction);
    unset($this->m_arItems);
    unset($this->m_strEnctype);
    unset($this->m_strMethod);
    unset($this->m_Name);
    unset($this->m_strTitle);
    }
  }

  function __destruct(){
    $this->Destroy();
  }

  function AddItems($arObjects){
    foreach($arObjects as $key => $object){
      array_push($this->m_arItems, $object);
    }
  }

  function GetItems(){
    $return = "";
    foreach($this->m_arItems as $key => $object){
      $return .= str_replace("<b></b>", "", str_replace("<i></i>", "", $object->toString()));
    }
    return $return;
  }
  
  function toString(){
    $strTitle = "";
    if(!empty($this->m_strTitle)) $strTitle = "<h2>". $this->m_strTitle ."</h2><br/>";
    $strForm = "<form". $strID ." action='". $this->m_strAction ."' method='". $this->m_strMethod ."' name='". $this->m_strName ."' enctype='". $this->m_strEnctype ."'><table class='webform'>%SEP%</table></form>";
    $arForm = split("%SEP%", $strForm);
    return $strTitle.$arForm[0].$this->GetItems().$arForm[1];
  }
}
?>