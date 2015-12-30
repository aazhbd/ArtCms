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

/* creating the project object for tp and db variable access */
require_once('config/project.class.php');
$al = new Project();

$rep = "";
$title = "";
$body = "";
$islogin = true;
$isExecuted = false;

$ckname = 'ZakirCookie';

extract($_POST);

try {
    $l = new Users(trim($email), trim($pass), $al->db);
}
catch(Exception $ex) {
    Errors::report($ex->getMessage());
}

if($l === false)
    Errors::report($al->db->err);

if(!is_object($l))
    Errors::report("Login object is not set.");


if($l->isLoged() == false)
{
   if($l->msg != "")
   {
        $islogin = false;
        $title = "Login Failed";
        $body = $l->msg;
        $_SESSION['validreqest'] = "valid";
        $body .= "<a href='".URL."/resendvmail/".$l->getEmail()."'>Resend Validation Email</a>";
        $al->tp->assign('body', $body);
        $al->tp->assign('title', $title);
        $al->tp->assign('rep', $rep);
   }
   else
   {
        $islogin = false;
        $title = "Login Failed";
        $body = "Please try to login again. <p>If you had forgotten your password please go to <a href='".URL."/forgot'>Forget Password</a> link in the home page to get your password after we send it to your email or you can <a href='".URL."/signup'>Signup</a> for a new account.";
        $rep = "Invalid Email or Password!";
        $al->tp->assign('body', $body);
        $al->tp->assign('title', $title);
        $al->tp->assign('rep', $rep);        
   } 
}

$al->tp->assign('islogin',$islogin);

if($l->isLoged() == true)
{
    $_SESSION['login'] = $l;
            
    /* Setting Remember Me cookie */
    $rem = $remember[0];

    if($rem == 1)
    {
        $exptime = mktime(). time()+60*60*24*4;//4days
        $val= $l->getValidator();
        setcookie($ckname, $val, $exptime);
    }
    
    /* Update Last login date */
    
    $fields = array('date_lastlogin');
    $values = array(date("Y-m-d G:i:s"));
    $isUpdated = setRow('users', $fields, $values, 'update', $al->db, $l->getId());


    if(!$isUpdated)
    {
        Errors::report("Last login date was not updated.");
    }    

    /*
        Loading user home after login
    */
    $isExecuted = getUserHomeByUserType($l->utype, $email, $al);
}

if($isExecuted === false)
{
    $al->tp->assign('body',$body);
    $al->tp->assign('title', $title);
    $al->tp->display('main.tpl');
}
?>
