<?PHP
/*
Date: 01.10.2008 21:18:06
Filename: clsHTTPRequestCollection.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

class HTTPRequestCollection{
  var $m_arRequests = array();
  function HTTPRequestCollection(){
    $this->m_arRequests = $_REQUEST;
  }

  function __construct(){
    $this->HTTPRequestCollection();
  }

  function Destroy(){
    unset($this->m_arRequests);
  }

  function __destruct(){
  }

  function toString($Key, $Type = "str"){
    if($Type == "str"){
      return $this->m_arRequests[$Key];
    }elseif($Type == "int"){
      return (int)$this->m_arRequests[$Key];
    }else{
      echo "Unkown Type!";
      return "";
    }
  }
}
?>