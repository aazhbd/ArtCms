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

/* creating the project object for tp and db variable access */
require_once('config/project.class.php');
$al = new Project();

/*
* variables initialization.
*/
$rep = "";
$title = "";
$subtitle = "";
$body = "";
$islogin = false;

/*
* switching to the case according to the url parameter.
*/

$params = getParams();

if(isset($_SESSION['login'] ) === true && isset($_SESSION) === true)
{
    $l = $_SESSION['login'];
    $islogin = true;
    $email = $l->getEmail();
    $utype = $l->utype;
}

setLoginInfo();

$al->tp->assign('islogin',$islogin);
$al->tp->assign('email',$email);

switch($params[0])
{
    case 'a':    
        $data = getArticleByURL($params[1], $al->db);
        
        if($data === false)
            $data = null;
        
        if(is_string($data))
        {
            $al->tp->assign('rep', $data);
            $data = null;
        }
        
        $data['body'] = html_entity_decode (stripslashes($data['body']) );
        
        $al->tp->assign('remarks', stripslashes($data['remarks']));
        $al->tp->assign('meta_tags', stripslashes($data['meta_tags']));
        $al->tp->assign('title', stripslashes($data['title'])); 
        $al->tp->assign('subtitle', stripslashes($data['subtitle']));
        $al->tp->assign('body', $data['body']);
        
        if($utype == 1)
            $al->tp->display('admin.tpl');
        else
            $al->tp->display('main.tpl');
        
    break;
    
    case 'home':
        
        $data = getArticleByURL('home', $al->db);
        
        if(is_string($data)) {
            $al->tp->assign('rep', $data);
            $data = null;
        }

        if($data === false)
            $data = null;
        
        $al->tp->assign('title', $data['title']);
        $al->tp->assign('subtitle', $data['subtitle']);
        $al->tp->assign('body', html_entity_decode (stripslashes($data['body']) ));
        $al->tp->display('main.tpl');
    break;
    
    case 'uhome':
        if(!$islogin) {
            Errors::report('The page is invalid. Cannot show the requested page.');
            $al->tp->assign('title', 'Invalid page.');
            $al->tp->assign('subtitle', 'Invalid request for page.');
            $al->tp->display('main.tpl');
            break;
        }
        
        getUserHomeByUserType($l->utype, $email, $al);
    break;
    
    case 'login':
        $al->tp->assign('title', 'Login');
        $al->tp->assign('subtitle', 'Login to have your member accessibility.');
        
        if(!$al->tp->template_exists('frm_login.tpl')) {
            Errors::report("Template file: frm_login.tpl is missing.");
            break;
        }
        
        $al->tp->assign('body', $al->tp->fetch('frm_login.tpl'));
        $al->tp->display('main.tpl');
    break;
    
    case 'logout':    
        if($islogin == true) {
            $l = $_SESSION['login']; 
            $l->logout();
            unset($_SESSION['login']);
            unset($_COOKIE['ZakirCookie']);
        }
        
        $al->tp->assign('islogin',false);
        $al->tp->assign('rep', "You have been logged out");
        $al->tp->display('main.tpl');        
    break;
    
    case 'signup':
        $al->tp->assign('title', 'Signup');
        $al->tp->assign('subtitle', 'Signup and become a part of the system.');
        
        if(!$al->tp->template_exists('frm_signup.tpl'))
        {
            Errors::report("Template file: frm_signup.tpl is missing.");
            break;
        }
        
        $body = $al->tp->fetch('frm_signup.tpl');
        
        $al->tp->assign('body', $body);
        $al->tp->display('main.tpl');
    break;
    
    case 'manage':
        if($params[1] == ""){
            Errors::report("Second parameter of URL is missing in 'manage' case of index.php.");
            break;
        }
        
        if($utype != 1){
            Errors::report("You do not have permission to view this page.");
            break;
        }
        
        if($params[1] == "articles" )
        {
            $al->tp->assign('title', 'List of articles');
            $al->tp->assign('selMenu','article');
            $table = "articles";
            $tpl = "view_arttable.tpl";
            
            $catList = getTableData('categories', $al->db);
            
            if(is_string($catList)) {
                $al->tp->assign('rep', $catList);
                $catList = null;
            }
            
            if($catList === false)
                $catList = null;
                
            $al->tp->assign('catList',$catList);
        }
        else if($params[1] == "users")
        {
            $al->tp->assign('title', 'List of users');
            $al->tp->assign('selMenu','user');
            $table = "users";
            $tpl = "view_usertbl.tpl";
        }
        else if($params[1] == "categories")
        {
            $al->tp->assign('title', 'List of users');
            $al->tp->assign('selMenu','category');
            $table = "categories";
            $tpl = "view_cattbl.tpl";
        }
        else
        {
            Errors::report("Second parameter of url: ".$params[1]." is not valid.");
            break;
        }
        
        if(!$al->tp->template_exists($tpl)){
            Errors::report("Template file: $tpl is missing.");
            break;
        }
        
        $data = getTableData($table, $al->db);
        
        if(is_string($data)) {
            $al->tp->assign('rep', $data);
            $data = null;
        }
        
        if($data === false)
            $data = null;
            
        $al->tp->assign('data',$data);
        
        $body = $al->tp->fetch('admin_menu.tpl');
        $body .= $al->tp->fetch($tpl);
        
        $al->tp->assign('body', $body);
        $al->tp->display('admin.tpl');
    break;

    case 'add':
        if($params[1] == ""){
            Errors::report("Second parameter of URL is missing in 'add' case of index.php.");
            break;
        }
        
        if($utype != 1){
            Errors::report("You do not have permission to view this page.");
            break;
        }
        
        if($params[1] == "article" )
        {
            $al->tp->assign('title', 'Add article');
            $al->tp->assign('selMenu','article');
            $table = "articles";
            $tpl = "frm_article.tpl";
            unset($_SESSION['article']);
            
            $coneditor_js = "subtpl/editor_js.tpl";
            $al->tp->assign('coneditor_js', $coneditor_js);
            
            $catList = getCategoryByMediaType(1, $al->db);
            
            if(is_string($catList)) {
                $al->tp->assign('rep', $catList);
                $catList = null;
            }
            
            if($catList === false)
                $catList = null;
                
            $al->tp->assign('catList',$catList);
        }
        else if($params[1] == "user")
        {
            $al->tp->assign('title', 'Add users');
            $al->tp->assign('selMenu','user');
            $table = "users";
            $tpl = "frm_user.tpl";
        }
        else if($params[1] == "category")
        {
            $al->tp->assign('title', 'Add users');
            $al->tp->assign('selMenu','category');
            $table = "categories";
            $tpl = "frm_category.tpl";
        }
        else
        {
            Errors::report("Second parameter of url: ".$params[1]." is not valid.");
            break;
        }
            
        if(!$al->tp->template_exists($tpl)){
            Errors::report("Template file: $tpl is missing.");
            break;
        }
        
        $al->tp->assign('action', "add");
        $body = $al->tp->fetch('admin_menu.tpl');
        $body .= $al->tp->fetch($tpl);
        
        $al->tp->assign('body', $body);
        $al->tp->display('admin.tpl');        
    break;
    
    case 'edit':
        if($params[1] == ""){
            Errors::report("Second parameter of URL is missing in 'edit' case of index.php.");
            break;
        }
        
        if($utype != 1){
            Errors::report("You do not have permission to view this page.");
            break;
        }
        
        if($params[1] == "articles" )
        {
            $al->tp->assign('title', 'Edit article');
            $al->tp->assign('selMenu','article');
            $tpl = "frm_article.tpl";
            
            if($params[2] == ""){
                Errors::report("Third parameter: article id in the URL is missing in 'edit' case of index.php.");
                break;
            }
            
            $data = getRowById("articles", $params[2], $al->db);
        
            if(is_string($data)) {
                $al->tp->assign('rep', $data);
                $data = null;
            }

            if($data === false)
                $data = null;
            
            $data['body'] = html_entity_decode (stripslashes($data['body']) );
            $data['remarks'] = (stripslashes($data['remarks']) );
            $data['meta_tags'] = (stripslashes($data['meta_tags']) );
            $data['title'] = (stripslashes($data['title']) );
            $data['subtitle'] = (stripslashes($data['subtitle']) );
            $data['url'] = (stripslashes($data['url']) );
                
            $al->tp->assign('data',$data);
            
            $al->tp->assign('fckEditor', configFckEditMode($data['body']));

            if(!$al->tp->template_exists('subtpl/editor_js.tpl')){
                Errors::report("Template file: subtpl/editor_js.tpl is missing.");
                break;
            }
                        
            $al->tp->assign('coneditor_js', 'subtpl/editor_js.tpl');
            
            $catList = getCategoryByMediaType(1, $al->db);
            
            if(is_string($catList)) {
                $al->tp->assign('rep', $catList);
                $catList = null;
            }
            
            if($catList === false)
                $catList = null;
                
            $al->tp->assign('catList',$catList);
        }
        else if($params[1] == "user")
        {
            $al->tp->assign('title', 'Edit user');
            $al->tp->assign('selMenu','user');
            $tpl = "frm_user.tpl";
            
            if($params[2] == ""){
                Errors::report("Third parameter: user id in the URL is missing in 'edit' case of index.php.");
                break;
            }
            
            $data = getRowById("users", $params[2], $al->db);
        
            if(is_string($data)) {
                $al->tp->assign('rep', $data);
                $data = null;
            }

            if($data === false)
                $data = null;
            
            $data['firstname'] = (stripslashes($data['firstname']) );
            $data['lastname'] = (stripslashes($data['lastname']) );
                
            $al->tp->assign('data',$data);         
        }
        else if($params[1] == "category")
        {
            $al->tp->assign('title', 'Edit category');
            $al->tp->assign('selMenu','category');
            $tpl = "frm_category.tpl";
            
            if($params[2] == ""){
                Errors::report("Third parameter: category id in the URL is missing in 'edit' case of index.php.");
                break;
            }
            
            $data = getRowById("categories", $params[2], $al->db);
        
            if(is_string($data)) {
                $al->tp->assign('rep', $data);
                $data = null;
            }

            if($data === false)
                $data = null;
            
            $data['catname'] = (stripslashes($data['catname']) );
                
            $al->tp->assign('data',$data);
        }
        else if($params[1] == "account")
        {
            $al->tp->assign('title', 'Edit Account');
            $al->tp->assign('selMenu','account');
            $tpl = "frm_user.tpl";
            
            $data = getRowById("users", $l->getId(), $al->db);
        
            if(is_string($data)) {
                $al->tp->assign('rep', $data);
                $data = null;
            }

            if($data === false)
                $data = null;
            
            $data['firstname'] = (stripslashes($data['firstname']) );
            $data['lastname'] = (stripslashes($data['lastname']) );
                
            $al->tp->assign('data',$data);
        }        
        else
        {
            Errors::report("Second parameter of url: ".$params[1]." is not valid.");
            break;
        }
        
        if(!$al->tp->template_exists($tpl)){
            Errors::report("Template file: $tpl is missing.");
            break;
        }        
        
        $al->tp->assign('action', 'edit');
        $body = $al->tp->fetch('admin_menu.tpl');
        $body .= $al->tp->fetch($tpl);
        
        $al->tp->assign('body', $body);
        $al->tp->display('admin.tpl');
    break;
    
    case 'delete':
        if($params[1] == ""){
            Errors::report("Second parameter of URL is missing in 'delete' case of index.php.");
            break;
        }
        
        if($params[2] == ""){
            Errors::report("Third parameter : content id in the URL is missing in 'delete' case of index.php.");
            break;
        }
        if($utype != 1){
            Errors::report("You do not have permission to view this page.");
            break;
        }
        
        if($params[1] == "article" )
        {
            $al->tp->assign('title', 'List of articles');
            $al->tp->assign('selMenu','article');
            $table = "articles";
            $tpl = "view_arttable.tpl";
            
            $catList = getTableData('categories', $al->db);
            
            if(is_string($catList)) {
                $al->tp->assign('rep', $catList);
                $catList = null;
            }
            
            if($catList === false)
                $catList = null;
                
            $al->tp->assign('catList',$catList);
            
            $isDeleted = deleteRow($table, $params[2], $al->db);
            
            if($isDeleted === false)
                break;
            
            $al->tp->assign('rep', "The article with id = ".$params[2]." has been deleted.");            
        }
        else if($params[1] == "user")
        {
            $al->tp->assign('title', 'List of users');
            $al->tp->assign('selMenu','user');
            $table = "users";
            $tpl = "view_usertbl.tpl";
            
            $isDeleted = deleteRow($table, $params[2], $al->db);
            
            if($isDeleted === false)
                break;
            
            $al->tp->assign('rep', "The user with id = ".$params[2]." has been deleted.");
        }
        else if($params[1] == "category")
        {
            $al->tp->assign('title', 'List of users');
            $al->tp->assign('selMenu','category');
            $table = "categories";
            $tpl = "view_cattbl.tpl";
            
            $isDeleted = deleteRow($table, $params[2], $al->db);
            
            if($isDeleted === false)
                break;
            
            $al->tp->assign('rep', "The category with id = ".$params[2]." has been deleted.");
        }
        else
        {
            Errors::report("Second parameter of url: ".$params[1]." is not valid.");
            break;
        }
                
        if(!$al->tp->template_exists($tpl)){
            Errors::report("Template file: $tpl is missing.");
            break;
        }
        
        $data = getTableData($table, $al->db);
        
        if(is_string($data)) {
            $al->tp->assign('rep', $data);
            $data = null;
        }
        
        if($data === false)
            $data = null;
            
        $al->tp->assign('data',$data);
        
        $body = $al->tp->fetch('admin_menu.tpl');
        $body .= $al->tp->fetch($tpl);
        
        $al->tp->assign('body', $body);
        $al->tp->display('admin.tpl');
    break;
 
    case 'toggle':
        if($params[1] == "" || $params[2] == "" || $params[3] == ""){
            Errors::report("Parameter(s) of URL is/are missing:  in 'toggle' case of index.php. param 1: ". $params[1] . ", param 2: ".$params[2] . ", param 3: " . $params[3]);
            break;
        }
        
        if($utype != 1){
            Errors::report("You do not have permission to view this page.");
            break;
        }
        
        if($params[1] == "article" )
        {
            $al->tp->assign('title', 'List of articles');
            $al->tp->assign('selMenu','article');
            $table = "articles";
            $tpl = "view_arttable.tpl";
            
            $catList = getTableData('categories', $al->db);
            
            if(is_string($catList)) {
                $al->tp->assign('rep', $catList);
                $catList = null;
            }
            
            if($catList === false)
                $catList = null;
                
            $al->tp->assign('catList',$catList);
            
            if($params[2] == "permission")
            {
                $data = getRowById('articles', $params[3], $al->db);
                $state = $data['state'] == 1 ? 0: 1;
                $fields = array('state');
                $values = array($state);
                
                $isupdated = setRow('articles', $fields, $values, 'update', $al->db, $params[3]);
                
                if(setRow('articles', $fields, $values, 'update', $al->db, $params[3]) === false)
                    break;
                $al->tp->assign('rep', "The article permission for id = ".$params[3]." has been updated.");
            }
            else
            {
                Errors::report("Parameter 3: ". $params[2] ." is invalid for article toggle operation.");
                break;
            }
        }
        else if($params[1] == "user")
        {
            $al->tp->assign('title', 'List of users');
            $al->tp->assign('selMenu','user');
            $table = "users";
            $tpl = "view_usertbl.tpl";
            
            if($params[2] == "permission")
            {
                $data = getRowById('users', $params[3], $al->db);
                
                if($data === false)
                    break;
                
                $state = $data['state'] == 1 ? 0: 1;
                $fields = array('state');
                $values = array($state);
                
                if(setRow('users', $fields, $values, 'update', $al->db, $params[3]) === false)
                    break;
                $al->tp->assign('rep', "The user permission for id = ".$params[3]." has been updated.");
            }
            else if($params[2] == "type")
            {
                $data = getRowById('users', $params[3], $al->db);
                
                if($data === false)
                    break;                
                
                $ut = $data['utype'] == 1 ? 0: 1;
                
                $fields = array('utype');
                $values = array($ut);
                
                if(setRow('users', $fields, $values, 'update', $al->db, $params[3]) === false)
                    break;
                $al->tp->assign('rep', "The user type for id = ".$params[3]." has been updated.");
            }
            else if($params[2] == "status")
            {
                $data = getRowById('users', $params[3], $al->db);
                
                if($data === false)
                    break;                
                
                $ut = $data['ustatus'] == 1 ? 0: 1;
                
                $fields = array('ustatus');
                $values = array($ut);
                
                if(setRow('users', $fields, $values, 'update', $al->db, $params[3]) === false) 
                    break;
                $al->tp->assign('rep', "The user status for id = ".$params[3]." has been updated.");
            }
            else
            {
                Errors::report("Parameter 3: ". $params[2] ." is invalid for user toggle operation.");
                break;
            }
        }
        else if($params[1] == "category")
        {
            $al->tp->assign('title', 'List of users');
            $al->tp->assign('selMenu','category');
            $table = "categories";
            $tpl = "view_cattbl.tpl";
            
            if($params[2] == "permission"){
                $data = getRowById('categories', $params[3], $al->db);
                $state = $data['state'] == 1 ? 0: 1;
                $fields = array('state');
                $values = array($state);
                
                if(setRow('categories', $fields, $values, 'update', $al->db, $params[3]) === false)
                    break;
                $al->tp->assign('rep', "The category permission for id = ".$params[3]." has been updated.");
            }
            else{
                Errors::report("Parameter 3: ". $params[2] ." is invalid for category toggle operation.");
                break;
            }            
        }
        else{
            Errors::report("Second parameter of url: ".$params[1]." is not valid.");
            break;
        }
        
        if(!$al->tp->template_exists($tpl)){
            Errors::report("Template file: $tpl is missing.");
            break;
        }
        
        $data = getTableData($table, $al->db);
        
        if(is_string($data)) {
            $al->tp->assign('rep', $data);
            $data = null;
        }
        
        if($data === false)
            $data = null;
            
        $al->tp->assign('data',$data);
        
        $body = $al->tp->fetch('admin_menu.tpl');
        $body .= $al->tp->fetch($tpl);
        
        $al->tp->assign('body', $body);
        $al->tp->display('admin.tpl');
    break;
        
    default:
        $al->tp->assign('title', 'Invalid request for page.');
        $al->tp->assign('subtitle', 'The page is still Underconstruction.');
        $errmsg[] = 'The page is still Underconstruction, cannot file the requested page.';
        $al->tp->assign('errmsg', $errmsg);        
        $al->tp->display('error.tpl');
}


?>
