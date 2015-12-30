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
    $id = getNewId("users", $al->db);

    if($id == false)
        return;
    
    list($month, $day, $year) = explode("/", $_POST['birthdate']);

    $fieldinfo = getFieldInfo('users', $al->db);
    
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

    $values = array($id, trim($email), trim($password), trim($fname), trim($lname), $sex, $year."-".$month."-".$day, sha1(rand(10, 100)), 0, 0, 0, date("Y-m-d G:i:s"), date("Y-m-d G:i:s"), 0 );

    $isinserted = setRow('users', $fields, $values, 'insert', $al->db);    

    if($isinserted)
        $rep .= "Your user has been added.";
    else
        $err .= "We are sorry. Your user was not added. Please try again.";
}
else if($action == "edit")
{    
    list($month, $day, $year) = explode("/", $_POST['birthdate']);
    
    $fields = array("email", "pass", "firstname", "lastname", "gender", "date_ofbirth", "utype", "ustatus", "date_updated");
    $values = array(addslashes(trim($email)), addslashes(trim($password)), addslashes( trim($fname) ),addslashes( trim($lname) ), $sex, $year."-".$month."-".$day, $utype, $ustatus, date("Y-m-d G:i:s"));
    
    $isUpdated = setRow('users', $fields, $values, 'update', $al->db, $uid);

    if($isUpdated)
        $rep .= "User has been updated.";
    else
        $err .= "Your user was not updated. Please try again.";
}
else
{
    Errors::report("Invalid value for action varriable.");
    return;
}

$al->tp->assign('rep', $rep);
$al->tp->assign('err', $err);

$al->tp->assign('title', 'List of users');
$al->tp->assign('selMenu','category');

$data = getTableData("users", $al->db);

if(is_string($data)) {
    $al->tp->assign('rep', $data);
    $data = null;
}

if($data === false)
    $data = null;
    
$al->tp->assign('data',$data);

$body = $al->tp->fetch('admin_menu.tpl');
$body .= $al->tp->fetch("view_usertbl.tpl");
$al->tp->assign('body', $body);

$al->tp->display('admin.tpl');

?>