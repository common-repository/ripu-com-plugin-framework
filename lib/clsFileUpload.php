<?PHP
/*
Date: 05.10.2008 18:33:35
Filename: clsFileUpload.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

class FileUpload{
  var $m_arFile = array();
  var $m_strPath = "";
  var $m_strFileName = "";

  function FileUpload($name, $path, $filename = ""){
    if(isset($_FILES[$name])) $this->m_arFile = $_FILES[$name];
    $this->m_strPath = $path;
    $this->m_strFileName = $filename;
  }

  function __construct($name, $path, $filename = ""){
    $this->FileUpload($name, $path, $filename);
  }

  function Destroy(){
    unset($this->m_arFile);
    unset($this->m_strFileName);
    unset($this->m_strPath);
  }

  function __destruct(){
    $this->Destroy();
  }

  function SetFileName($Filename){
    $this->m_strFileName = $Filename;
  }
  
  function Upload(){
    if(!empty($this->m_arFile)){
      if($this->m_arFile["error"] == UPLOAD_ERR_OK) {
        $filename = $this->m_arFile['name'];
        if(!empty($this->m_strFileName)) $filename = $this->m_strFileName;
        if(@move_uploaded_file($this->m_arFile['tmp_name'],$this->m_strPath.$filename)) return true;
        return false;
      }
    }else{
      return false;
    }
  }
  
  function File($key){
    return $this->m_arFile[$key];
  }
}
?>