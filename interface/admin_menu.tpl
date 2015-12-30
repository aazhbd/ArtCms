{*
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
*}
<div class="topmenu" style="width: 98%;">
    <div style="float: left; width: 48%;">
        <a href="{$smarty.const.URL}/uhome" {if $selMenu == "home" } id="selMenu"{/if}>
            <img src="{$smarty.const.URL}/interface/images/home.png" alt="Users" style="width: 20px;  border:none;"/>
            Home
        </a>
        
        <a href="{$smarty.const.URL}/manage/users" {if $selMenu == "user" } id="selMenu"{/if}>
            <img src="{$smarty.const.URL}/interface/images/users.png" alt="Users" style="width: 20px;  border:none;"/>
            User
        </a>        
        <a href="{$smarty.const.URL}/manage/categories" {if $selMenu == "category" } id="selMenu"{/if}>
            <img src="{$smarty.const.URL}/interface/images/category.png" alt="Article" style="width: 20px;  border:none;"/>
            Category
        </a>
        <a href="{$smarty.const.URL}/manage/articles" {if $selMenu == "article" } id="selMenu"{/if}>
            <img src="{$smarty.const.URL}/interface/images/article.png" alt="Category" style="width: 20px;  border:none;"/>
            Article
        </a>        
    </div>
    <div style="float: right; width: 48%;" align="right">
        <a href="{$smarty.const.URL}/edit/account" >
            <img src="{$smarty.const.URL}/interface/images/editacc.png" alt="Users" style="width: 20px; border:none; "/>
            Edit Account
        </a>
    </div>
</div>
