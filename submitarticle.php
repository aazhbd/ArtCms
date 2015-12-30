<?php
/**
* An open source web application development framework for PHP 5 and above.
*
* @author        ArticulateLogic Labs
* @author        Abdullah Al Zakir Hossain, Email: aazhbd@yahoo.com 
* @author        Syeda Tasneem Rumy, Email: tasneemrumy@gmail.com
* @author        Abdullah Al Zakir Hossain, Email: aazhbd@yahoo.com
* @copyright     Copyright (c)2009-2010 ArticulateLogic Labs, creative software engineering
* @license       www.articulatelogic.com/a/privacy,  www.articulatelogic.com/a/terms
* @link          http://www.articulatelogic.com
* @since         Version 1.0
*  
*/

if(!isset($_POST['submit'])){ echo "You can not access this page directly."; return; }

require_once('config/project.class.php');
$al = new Project();

$islogin = false;

if(isset($_SESSION['login'] ) == true && isset($_SESSION))
{
    $l = $_SESSION['login'];
    $islogin = true;
    $email = $l->getEmail();
    $utype = $l->utype;
}

$al->tp->assign('islogin',$islogin);
$al->tp->assign('email',$email);

if($utype != 1)
{
    Errors::report("You do not have permission to view this page.");
    return;
}

extract($_POST);

if($action == "add")
{
    $id = getNewId("articles", $al->db);

    if($id == false)
        return;
    
    $fieldinfo = getFieldInfo('articles', $al->db);
    
    if(is_string($fieldinfo))
        $rep .= $fieldinfo;
    
    if($fieldinfo === false)
        return;
    
    $i = 0;
    foreach($fieldinfo as $f)
    {
        if($i > 0) $q .= " or ";
        $fields[] = $f['Field'];
        $i++;
    }
    
    $values = array($id, $l->getId(), $cat, addslashes($arturl), addslashes($arttitle), addslashes($subtitle), addslashes(htmlentities($bodytxt)), addslashes($remarks), addslashes($keywords), 0, 0, date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), 0);
    
    $isinserted = setRow('articles', $fields, $values, 'insert', $al->db);

    if($isinserted)
        $rep .= "Your article has been added.";
    else
        $err .= "We are sorry. Your article was not added. Please try again.";
}
else if($action == "edit")
{
    $fields = array( "title", "subtitle", "body", "remarks", "date_updated", "category_id","meta_tags", "url");
    $values = array( addslashes($arttitle), addslashes($subtitle), addslashes($bodytxt), addslashes($remarks), date("Y-m-d H:i:s"), $cat, addslashes($keywords), $arturl);
    
    $isUpdated = setRow('articles', $fields, $values, 'update', $al->db, $art_id);

    if($isUpdated)
        $rep .= "Article has been updated.";
    else
        $err .= "Your article was not updated. Please try again.";
}
else
{
    Errors::report("Invalid value for action varriable.");
    return;
}

$al->tp->assign('rep', $rep);
$al->tp->assign('err', $err);

$al->tp->assign('title', 'List of articles');
$al->tp->assign('selMenu','article');

$catList = getTableData('categories', $al->db);

if(is_string($catList)) {
    $al->tp->assign('rep', $catList);
    $catList = null;
}

if($catList === false)
    $catList = null;
    
$al->tp->assign('catList',$catList);

$data = getTableData("articles", $al->db);

if(is_string($data)) {
    $al->tp->assign('rep', $data);
    $data = null;
}

if($data === false)
    $data = null;
    
$al->tp->assign('data',$data);

$body = $al->tp->fetch('admin_menu.tpl');
$body .= $al->tp->fetch("view_arttable.tpl");
$al->tp->assign('body', $body);

$al->tp->display('admin.tpl');

?>