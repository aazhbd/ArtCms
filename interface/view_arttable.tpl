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
<h2 align="center">Articles List</h2>
<div style="float:left;width:100%;background:#eee;">
    <span style="float:left;width:80%;" ><a href="{$smarty.const.URL}/uhome" class="sidelinks">Home</a> >> Article Management</span>
    <span style="float:left;width:20%;" ><a href="{$smarty.const.URL}/add/article" class="sidelinks" >Add Article</a></span>
</div>
<div style="float:left;width:100%;">
{if $data!= null} 
    <table class="innertbl" style="width:100%;float:left;border:1px solid #ddd;" >
        <tr style="width:100%;float:left; text-align:left; " class="tblhead" >
            <th style="width:20px;" class="tblfield" >Id</th>
            <th style="width:100px;" class="tblfield" >Name</th>
            <th style="width:170px;" class="tblfield" >URL</th>
            <th style="width:50px;" class="tblfield">Category</th>
            <th style="width:80px;" class="tblfield" >Insert Date</th>
            <th style="width:80px;" class="tblfield" >Update Date</th>
            <th style="width:60px;" class="tblfield" >Permission</th>
            <th style="width:30px;" class="tblfield">Edit</th>
            <th style="width:30px;" class="tblfield">Delete</th>
        </tr>
        {foreach from=$data item=art name=artname}
            {if $smarty.foreach.artname.iteration is even}
            <tr style="width:100%; float:left;" bgcolor="#FFFFFF">
            {else}
            <tr style="width:100%; float:left;" bgcolor="#D5E4EA">
            {/if}
                <td class="tblfield" style="width:20px;">{$art.id}</td>
                {if $art.url != ""}
                    <td class="tblfield" style="width:100px;"><a href="{$smarty.const.URL}/a/{$art.url}" class="sidelinks">{$art.title}</a></td>
                {else}
                    <td class="tblfield" style="width:100px;"><a href="{$smarty.const.URL}/a/{$art.id}" class="sidelinks">{$art.title}</a></td>
                {/if}
                <td class="tblfield" style="width:170px;">{if $art.url != null}{$art.url|wordwrap:26:"\n":true} {/if}</td>
                {foreach item=c from=$catList}
                    {if $c.id == $art.category_id}
                        <td class="tblfield" style="width:50px;">{$c.catname}</td>
                    {/if}
                {/foreach}
                <td class="tblfield" style="width:80px;">{$art.date_inserted|date_format}</td>
                <td class="tblfield" style="width:80px;">{$art.date_updated|date_format}</td>
                <td class="tblfield" style="width:60px;">{if $art.state == 0} <a href="{$smarty.const.URL}/toggle/article/permission/{$art.id}">Disable</a>{elseif $art.state == 1} <a href="{$smarty.const.URL}/toggle/article/permission/{$art.id}">Enable</a>{/if}</td>
                <td class="tblfield" style="width:30px;"><a href="{$smarty.const.URL}/edit/articles/{$art.id}">Edit</a></td>
                <td class="tblfield" style="width:30px;"><a href="{$smarty.const.URL}/delete/article/{$art.id}" class="del_art">Delete</td>
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
