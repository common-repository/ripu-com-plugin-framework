<?PHP
/*
Date: 05.10.2008 19:15:15
Filename: clsWebFormHTML.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

class WebFormHTML{
  var $m_strHTML = "";
  var $m_strTitle = "";
  function WebFormHTML($html, $title = "&nbsp;"){
    $this->m_strHTML = $html;
    $this->m_strTitle = $title;
  }

  function __construct($html, $title = "&nbsp;"){
    $this->WebFormHTML($html, $title);
  }

  function Destroy(){
    unset($this->m_strHTML);
    unset($this->m_strTitle);
  }

  function __destruct(){
    $this->Destroy();
  }

  function toString(){
    return "<tr><td valign='top'><b>". $this->m_strTitle ."</b></td><td valign='top'>". $this->m_strHTML ."</td></tr>";
  }
}
?>