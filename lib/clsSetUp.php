<?PHP
/*
Date: 24.09.2008 14:22:45
Filename: clsSetUp.php
Type: Class
Author: rp
Copyright: (C) 2008 by Richard Pulch (www.ripucom.de)
*/

class SetUp{
  var $m_arFilters = array();
  var $m_arAdminMenuPages = array();
  var $m_arAdminMenuSubPages = array();

  var $m_strPrefix = "";
  function SetUp($prefix){
    $this->m_strPrefix = $prefix;
  }

  function __construct($prefix){
    $this->SetUp($prefix);
  }

  function Destroy(){
    unset($m_arFilters);
    unset($m_arAdminMenuPages);
    unset($m_arAdminMenuSubPages);
    unset($m_strPrefix);
  }

  function __destruct(){
    $this->Destroy();
  }
  
  function AddFilter($tag,  $function,  $priority = 10,  $accepted_args = 1){
    $arNewFilter['tag'] = $tag;
    $arNewFilter['function'] = $function;
    $arNewFilter['priority'] = $priority;
    $arNewFilter['accepted_args'] = $accepted_args;
    array_push($this->m_arFilters, $arNewFilter);
  }
  
  function AddOption($name, $value = '', $deprecated = '', $autoload = 'yes'){
    add_option($name, $value, $deprecated, $autoload);
  }
  
  function AddAdminMenuPage($page_title, $menu_title, $access_level, $file, $function = NULL){
    $arNewAdminMenuPage['page_title'] = $page_title;
    $arNewAdminMenuPage['menu_title'] = $menu_title;
    $arNewAdminMenuPage['access_level'] = $access_level;
    $arNewAdminMenuPage['file'] = $file;
    $arNewAdminMenuPage['function'] = $function;
    array_push($this->m_arAdminMenuPages, $arNewAdminMenuPage);
  }
  
  function AddAdminMenuSubPage($parent, $page_title, $menu_title, $access_level, $file, $function = NULL){
    $arNewAdminMenuSubPage['parent'] = $parent;
    $arNewAdminMenuSubPage['page_title'] = $page_title;
    $arNewAdminMenuSubPage['menu_title'] = $menu_title;
    $arNewAdminMenuSubPage['access_level'] = $access_level;
    $arNewAdminMenuSubPage['file'] = $file;
    $arNewAdminMenuSubPage['function'] = $function;
    array_push($this->m_arAdminMenuSubPages, $arNewAdminMenuSubPage);
  }

  function InitFilters(){
    foreach($this->m_arFilters as $key => $element){
      add_filter($element['tag'], $element['function'], $element['priority'], $element['accepted_args']);
    }
  }

  function InitAdminMenuInterface(){
    foreach($this->m_arAdminMenuPages as $key => $element){
      add_menu_page($element['page_title'], $element['menu_title'], $element['access_level'], $element['file'], $element['function']);
    }
    foreach($this->m_arAdminMenuSubPages as $key => $element){
      add_submenu_page($element['parent'], $element['page_title'], $element['menu_title'], $element['access_level'], $element['file'], $element['function']);
    }
  }
  
  function InitAdminMenu(){
    add_action('admin_menu', $this->m_strPrefix.'_admin_menu_callback');
  }

  function Init(){
    $this->InitAdminMenu();
    $this->InitFilters();
  }

}
?>