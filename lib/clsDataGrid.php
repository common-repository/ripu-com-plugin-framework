<?PHP
/*
Date: 25.09.2008 12:19:37
Filename: clsDataGrid.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

class DataGrid{
  var $m_arCols = array();
  var $m_arRows = array();

  function DataGrid($Cols, $Rows = array()){
    $this->m_arCols = $Cols;
    $this->m_arRows = $Rows;
  }

  function __construct($Cols, $Rows = array()){
    $this->DataGrid($Cols, $Rows);
  }

  function Destroy(){
    unset($this->m_arCols);
    unset($this->m_arRows);
  }

  function __destruct(){
    $this->Destroy();
  }
  
  function AddRow($Row){
    array_push($this->m_arRows, $Row);
  }
  
  function toString(){
    $htmlReturn = '<table class="widefat"><thead><tr>{$htmlCols}</tr></thead><tbody>{$htmlRows}</tbody></table>';
    $htmlCols = "";
    foreach($this->m_arCols as $key => $element){
      $htmlCols .= '<th scope="col">'. $element .'</th>';
    }
    $htmlRows = '';
    foreach($this->m_arRows as $key => $element){
      $htmlRows .= '<tr valign="top">';
      foreach($element as $name => $value){
        $htmlRows .= "<td>". $value ."</td>";
        $htmlRows = str_replace("{". $name. "}", $element[$name], $htmlRows);
      }
      foreach($element as $name => $value){
        $htmlRows = str_replace("{". $name. "}", $element[$name], $htmlRows);
      }
      $htmlRows .= '</tr>';
    }
    $htmlReturn = str_replace('{$htmlCols}', $htmlCols, $htmlReturn);
    $htmlReturn = str_replace('{$htmlRows}', $htmlRows, $htmlReturn);
    return $htmlReturn;
  }
}
?>