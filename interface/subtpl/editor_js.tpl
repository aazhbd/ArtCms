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
<script type="text/javascript" src="{$smarty.const.URL}/scripts/fckeditor/fckeditor.js"></script>

{literal}
<script type="text/javascript">
window.onload = function()
{
    var ed = new FCKeditor( 'bodytxt' ) ;
    ed.BasePath = "{/literal}{$smarty.const.URL}{literal}/scripts/fckeditor/" ;
    ed.Config["CustomConfigurationsPath"] = "edconfig.js?" + ( new Date() * 1 ) ;
    ed.ToolbarSet = 'ArticleToolbar' ;
    ed.Config['SkinPath'] = "skins/silver/" ;
    ed.Width = 720;
    ed.Height = 500;
    ed.ReplaceTextarea() ;
}
</script>
{/literal}