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

/**
*   Gets a row from articles table by it url
*/

function getArticleByURL($url, $db)
{
    if($url == ""){
        Errors::report("URL is missing.");
        return false;
    }

    $q = "select articles.id as id, title, subtitle, body, category_id, catname, articles.uid as uid, email, remarks, meta_tags, articles.date_inserted as date_inserted, articles.date_updated as date_updated, articles.state as state from articles, categories, users where users.id = articles.uid and category_id = categories.id and url = '$url'";
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    if(count($qr) == 0)
        return "Article with url keyword, $url is not found.";
    
    if( $qr[0]['state'] == 1)
        return "The requested article is disabled.";
    if($qr[0]['state'] == 2)
        return "The requested article has been deleted.";
    if($qr[0]['state'] == 3)
        return "The requested article has not been published.";
    
    return $qr[0];
}

/**
*   Gets a row from category table by its media type id (integer type)
*   E.g. Categories table has media type: 1 for Articles
*/

function getCategoryByMediaType($mediaType, $db)
{
    if($mediaType == ""){
        Errors::report("Media type of category is missing.");
        return false;
    }
        
    $q = "select * from categories where mtype = $mediaType";
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "Category list with media type, $mediaType is not found.";
    
    return $qr;    
}

/**
*   Gets a row from users table by its email address
*/
function getUserByEmail($email, $db )
{
    if($email == "") {
        Errors::report("Email of user is missing.");
        return false;
    }

    $q = "select * from users where email = '$email'";
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "User with email, $email is not found.";
    
    if($qr[0]['state'] == 1)
        return "The requested user with email, $email is disabled.";
    if($qr[0]['state'] == 2)
        return "The requested user with email = $email has been deleted.";
    
    return $qr[0];
}

/**
*   Gets a row from any table by its id
*/
function getRowById($tableName, $id,  $db)
{
    if($tableName == "" || $id == "") {
        Errors::report("Values are missing: Table name: $tableName, id: $id.");
        return false;
    }
    
    $q = "select * from $tableName where id = $id";
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "Row with table name, $tableName and id = $id is not found.";
    
    return $qr[0];
}

/**
* Gets all data from any table
*/
function getTableData($tableName, $db)
{
    if($tableName == ""){
        Errors::report("Table name is missing.");
        return false;
    }
            
    $q = "select * from $tableName";
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "Table, $tableName is empty.";
    
    return $qr; 
}

/**
*   Gets a row from any table by its category id
*/
function getRowByCategoryId($tableName, $catId, $db)
{
    if($tableName == "" || $catId == "") {
        Errors::report("Values are missing: Table name: $tableName, category id: $catId.");
        return false;
    }

    $q = "select * from $tableName where category_id = $catId";
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "Row with table name, $tableName and category id = $catId is not found.";
    
    return $qr;

}
/**
*   Gets a row from any table which has a field called 'uid' that keeps the id of the user table, e.g. articles table
*/

function getRowByUserId($tableName, $uid, $db)
{
    if($tableName == "" || $uid == "") {
        Errors::report("Values are missing: Table name: $tableName, user id: $uid.");
        return false;
    }        

    $q = "select * from $tableName where uid = $uid";
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "Row with table name, $tableName and user id = $uid is not found.";
    
    return $qr;    
}

/**
*   Gets a row of data by its privacy field setting (integer value)
*/
function getRowByPrivacy($tableName, $privacy, $db)
{
    if($tableName == "" || $privacy == ""){
        Errors::report("Values are missing: Table name: $tableName, privacy: $privacy.");
        return false;
    }

    $q = "select * from $tableName where privacy = $privacy";
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "Row with table name, $tableName and privacy = $privacy is not found.";
    
    return $qr;    
}
/**
*   Gets a row by its type field called 'atype' from any table
*/
function getRowByType($tableName, $type, $db)
{
    if($tableName == "" || $type == "")
    {
        Errors::report("Values are missing: Table name: $tableName, media_type: $type.");
        return false;
    }      

    $q = "select * from $tableName where atype = $type";
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "Row with table name, $tableName and atype = $type is not found.";
    
    return $qr;
}

/**
*   Gets a list of rows within a certain date range or a set of records if start and end dates are equal for a particular date 
*/
function getRowByDateRange($tableName, $startDate, $endDate, $db, $datetype = 'insert')
{
    if($tableName == "" || $startDate == "" || $endDate == "" || $datetype == "") {
        Errors::report("Values are missing: Table name: $tableName, start date: $startDate, end date: $endDate, date type: $datetype.");
        return false;
    }
    
    if($datetype != 'insert' && $datetype != 'update') {
        Errors::report("Date type is not valid. It should either be, 'insert' or 'update'");
        return false;        
    }
    
    if($datetype == 'insert')
    {
        if($startDate == $endDate)
            $q = "select * from $tableName where date_inserted = '$startDate'  ";
        else
        {
            $t1 = strtotime($startDate);
            $t2 = strtotime($endDate);
            if($t1 < $t2)            
                $q = "select * from $tableName where ( date_inserted > '$startDate' and date_inserted < '$endDate' ) ";
            else
                $q = "select * from $tableName where ( date_inserted < '$startDate' and date_inserted > '$endDate' ) ";
        }
    }
    
    if($datetype == 'update')
    {
        if($startDate == $endDate)
            $q = "select * from $tableName where date_updated = '$startDate'  ";
        else
        {        
            $t1 = strtotime($startDate);
            $t2 = strtotime($endDate);
            
            if($t1 < $t2)
                $q = "select * from $tableName where ( date_updated > '$startDate' and date_updated < '$endDate' ) ";
            else
                $q = "select * from $tableName where ( date_updated < '$startDate' and date_updated > '$endDate' ) ";
        }
    }    
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "Row with table name, $tableName and start date = $startDate and end date = $endDate is not found.";
    
    return $qr;
}

/**
*   Gets a list of rows from any table by its state
*/
function getRowByState($tableName, $state ,$db)
{
    if($tableName == "" || $state === "") {
        Errors::report("Values are misssing : Table name: $tableName, State: $state.");
        return false;
    }    
    
    $q = "select * from $tableName where state = $state ";
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "Row with table name, $tableName and state = $state is not found.";
    
    return $qr;
}

/**
*   Searches all the fields of any table for a keyword by matching any text or number within a value
*/
function searchRows($tableName, $keyword, $db)
{
    if($tableName == "" || $keyword == "") {
        Errors::report("Values are missing: Table name: $tableName, keyword: $keyword.");
        return false;
    }
    
    $fieldinfo = getFieldInfo($tableName, $db);
    
    if($fieldinfo === false)
        return false;
    
    if(is_string($fieldinfo))
        return $fieldinfo;
    
    $i = 0;
    $q = "select * from $tableName where ";
    
    foreach($fieldinfo as $f) {
        if($i > 0) $q .= " or ";
        $field = $f['Field'];
        $q .= $field ." LIKE '%". $keyword . "%' ";
        $i++;
    }

    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "No results were found for search keyword = $keyword in table $tableName.";
    
    return $qr;
}

/**
*   It checks if a field is active or inactive
*/
function isActive($tableName, $id, $db)
{
    if($tableName == "" || $id == ""){
        Errors::report("Values are missing: Table name: $tableName, id : $id.");
        return false;
    }
    
    $q = "select $tableName.state from $tableName where id = $id ";
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "Row with table name, $tableName and id = $id is not found.";
    
    if($qr[$tableName.state] == 0)
        return true;
    
    return false;
}

/**
*   Gets an array of all the fields' attributes from a table
*/
function getFieldInfo($tableName, $db)
{
    if($tableName == ""){
        Errors::report("Table name is missing. Failed to get field list.");
        return false;
    }
    
    $q = "show columns from $tableName ";
    
    $qr = $db->selectData($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0)
        return "Fields for table name, $tableName are not found.";
    
    foreach($qr as $d)
        $fields[] = $d;
    
    return $fields;
}

/**
*   Generates a new id for any table
*/
function getNewId($tableName, $db)
{
    if($tableName == ""){
        Errors::report("Table name is missing.");
        return false;
    }
        
    $q = "select max(id) as max from $tableName";
    
    $qr = $db->executeQuery($q);
    
    if($qr === false){
        Errors::report($db->err);
        return false;
    }
    
    if(count($qr) == 0){
        Errors::report("The new id for table, $tableName is not found.");
        return false;
    }
    
    foreach($qr as $t)
        $max = $t["max"];
    
    return $max + 1;
}

/**
*   Inserts or updates a row of any table 
*/

function setRow($tableName, $fieldArray, $valueArray, $opType, $db, $updateId = 0)
{
    if($tableName == "" || $opType == "")
    {
        Errors::report("Values are missing: Table name: $tableName, operation type: $opType.");
        return false;
    }
        
    if(count($fieldArray) == 0)
    {
        Errors::report("Array of fields is missing.");
        return false;
    }
    
    if(count($valueArray) == 0)
    {
        Errors::report("Array of values is missing.");
        return false;
    }
    
    if(count($fieldArray) != count($valueArray) )
    {
        Errors::report("The array items in the array of fields and values are not equal.");
        return false;        
    }
    
    if($opType != 'update' && $opType != 'insert')
    {
        Errors::report("Operation type: $opType is invalid. Operation type must be 'insert' or 'update'");
        return false;
    }
    
    if($updateId == 0 && $opType == 'update')
    {
        Errors::report("Update id is missing.");
        return false;
    }
    
    foreach($valueArray as $v)
    {
        $val = "'".addslashes($v)."'";
        $t[] = $val; 
    }
    $valueArray = $t;
    
    $f = implode(",", $fieldArray);
    $v = implode(",", $valueArray);
    
    if($opType == 'insert')
    {         
        $q = "insert into $tableName ( $f ) values ( $v )";
        $qr = $db->insertData($q);
    }
    
    if($opType == 'update')
    {
        $i = 0;
        $q = "update $tableName set ";

        foreach($fieldArray as $f)
        {
            if($i > 0) $q .= " , ";
            $q .= "".$f." = ".$valueArray[$i]."";
            $i++;
        }

        $q .= " where id = $updateId";
        $qr = $db->updateData($q);
    }
    
    if($qr === false)
    {
        Errors::report($db->err);
        return false;
    }
    
    return $qr;
}

/**
*   Delates a single row of any table by its id
*/

function deleteRow($tableName,$id, $db)
{
    if($tableName == "" || $id == ""){
        Errors::report("Values are missing: Table name: $tableName, id : $id.");
        return false;
    }
    
    if($id == "")
    {
        Errors::report("Id to delete is missing.");
        return false;
    }
    
    $q = "delete from $tableName where id = $id";
    $qr = $db->deleteData($q);
    
    if($qr === false)
    {
        Errors::report($db->err);
        return false;
    }
    
    return $qr;
}

/**
*   Sets the login information of a user from cookie 
*/
function setLoginInfo()
{
    $islogin = false;
    
    if (!isset($_COOKIE[$ckname])) 
        return;
       
    $qr = $con->db->selectData("select email, validator, ustatus, utype, pass from users where validator = '$val'");
    
    if($qr === false) {
       Errors::report($db->err);
       return $islogin;
    }

    if(count($qr) == 0)
       return $islogin;

    if($qr[0]['validator'] != $_COOKIE['ZakirCookie']) 
       return $islogin;
    
    if(!class_exists('Users')) {
        Errors::report("'Users' class do not exist");
        return false;
    }
    
    $l = new Users(trim($qr[0]['utype']), trim($qr[0]['pass']), $con->db);
    
    if($l->isLoged() && is_object($l) ) {
       $_SESSION['login'] = $l;
       $islogin = true;
    }
    
    return $islogin;
}
?>
