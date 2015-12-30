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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ArticulateCMS by ArticulateLogic.com</title>
    {include file="subtpl/mlinks.tpl"}
    {include file="subtpl/js.tpl"}
</head>

<body>
    <div id="contentheader">
        <div id="banner">
            <img src="{$smarty.const.URL}/interface/images/logo.GIF" id="logo" />
        </div>
        <div id="topright">
            {include file="subtpl/menu_top.tpl"}
        </div>
        <div id="navigatemenu">
            {include file="subtpl/menu.tpl"}
        </div>
    </div>
    
    <div id="contentbody">
        {if $rep != null}
            <div id="reports">{$rep}</div>
        {/if}        
        
        {if $title!= null}
            <h2 class="title">{$title}</h2>
        {/if}
        
        {if $subtitle != null}
            <div class="subtitle">{$subtitle}</div>
        {/if}
        
        {if $body != null}
            <div class="body">{$body}</div>
        {/if}
    </div>
    
    <div id="footer">
        {include file="subtpl/footer.tpl"}
    </div>
</body>
</html>