<?PHP
/*
Date: 06.10.2008 17:26:24
Filename: clsHTTPDownload.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

class HTTPDownload{
  var $m_strFile = "";
  var $m_strMime = "";

  function HTTPDownload($file, $mime){
    $this->m_strFile = $file;
    $this->m_strMime = $mime;
  }
  function __construct($file, $mime){
    $this->HTTPDownload($file, $mime);
  }

  function Destroy(){
    unset($this->m_strFile);
    unset($this->m_strMime);
  }

  function __destruct(){
    $this->Destroy();
  }
  
  function Start(){
    header("Content-Type: ". $this->m_strMime ."; charset=utf-8");
    header("Content-Disposition: attachment; filename=vCard.vcf");
    header("Content-Transfer-Encoding: base64; charset=utf-8");
    header(chunk_split(base64_encode(readfile($this->m_strFile))));

  }
}
?>