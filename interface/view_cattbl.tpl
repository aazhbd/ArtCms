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
<h2 align="center">Category List</h2>
<div style="float:left;width:100%;background:#eee;">
    <span style="float:left;width:80%;" ><a href="{$smarty.const.URL}/uhome" class="sidelinks">Home</a> >> Category Management </span>
    <span style="float:left;width:20%;" ><a href="{$smarty.const.URL}/add/category" class="sidelinks" >Add Category</a></span>
</div>
<div style="float:left;width:100%;">
{if $data!= null} 
    <table class="innertbl" style="width:100%;float:left;border:1px solid #ddd;" >
        <tr style="width:100%;float:left; text-align:left; " class="tblhead" >
            <th style="width:20px;" class="tblfield" >Id</th>
            <th style="width:200px;" class="tblfield" >Name</th>
            <th style="width:40px;" class="tblfield">Type</th>
            <th style="width:80px;" class="tblfield" >Insert Date</th>
            <th style="width:80px;" class="tblfield" >Update Date</th>
            <th style="width:70px;" class="tblfield">Permission</th>
            <th style="width:50px;" class="tblfield">Edit</th>
            <th style="width:50px;" class="tblfield">Delete</th>
        </tr>
        {foreach from=$data item=cat name=artname}
            {if $smarty.foreach.artname.iteration is even}
            <tr style="width:100%; float:left;" bgcolor="#FFFFFF">
            {else}
            <tr style="width:100%; float:left;" bgcolor="#D5E4EA">
            {/if}
                <td class="tblfield" style="width:20px;">{$cat.id}</td>
                <td class="tblfield" style="width:200px;">{$cat.catname}</td>
                <td class="tblfield" style="width:40px;">{$cat.mtype}</td>
                <td class="tblfield" style="width:80px;">{$cat.date_inserted|date_format}</td>
                <td class="tblfield" style="width:80px;">{$cat.date_updated|date_format}</td>
                
                <td class="tblfield" style="width:70px;">{if $cat.state == 0 } <a href="{$smarty.const.URL}/toggle/category/permission/{$cat.id}">Disable</a>{elseif $cat.state == 1 } <a href="{$smarty.const.URL}/toggle/category/permission/{$cat.id}">Enable</a> {/if}</td>
                <td class="tblfield" style="width:50px;"><a href="{$smarty.const.URL}/edit/category/{$cat.id}">Edit</a></td>
                <td class="tblfield" style="width:50px;"><a href="{$smarty.const.URL}/delete/category/{$cat.id}" class="del_art">Delete</td>
            </tr>
        {/foreach}
    </table>
{else}
    <table class="innertbl" style="width:100%;background:#fff;">
        <tr style="width:100%; float:left;background:#684574;" class="tblhead">
            <th class="spanlist" style="width:100%;padding:5px;">No article has been added</th>
        </tr>
    </table>
{/if}
</div>
