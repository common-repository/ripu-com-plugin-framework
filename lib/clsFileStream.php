<?PHP
/*
Date: 06.10.2008 17:26:24
Filename: clsFileStream.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

class FileStream{
  var $m_strFile = "";
  var $m_strMode = "";
  var $m_objHandler = NULL;
  
  function FileStream($file, $mode){
    $this->m_strFile = $file;
    $this->m_strMode = $mode;
    $this->m_objHandler = fopen($file, $mode);
  }
  function __construct($file, $mode){
    $this->FileStream($file, $mode);
  }

  function Destroy(){
    unset($this->m_strFile);
    unset($this->m_strMode);
    $this->Close();
    unset($this->m_objHandler);
  }

  function __destruct(){
    $this->Destroy();
  }

  function Close(){
    @fclose($this->m_objHandler);
  }

  function Write($String){
    fwrite($this->m_objHandler, $String);
  }
}
?>