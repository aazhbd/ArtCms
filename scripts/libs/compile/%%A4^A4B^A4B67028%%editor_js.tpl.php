<?php /* Smarty version 2.6.26, created on 2010-02-22 16:08:27
         compiled from subtpl/editor_js.tpl */ ?>
<script type="text/javascript" src="<?php echo @URL; ?>
/scripts/fckeditor/fckeditor.js"></script>

<?php echo '
<script type="text/javascript">
window.onload = function()
{
    var ed = new FCKeditor( \'bodytxt\' ) ;
    ed.BasePath = "'; ?>
<?php echo @URL; ?>
<?php echo '/scripts/fckeditor/" ;
    ed.Config["CustomConfigurationsPath"] = "edconfig.js?" + ( new Date() * 1 ) ;
    ed.ToolbarSet = \'ArticleToolbar\' ;
    ed.Config[\'SkinPath\'] = "skins/silver/" ;
    ed.Width = 720;
    ed.Height = 500;
    ed.ReplaceTextarea() ;
}
</script>
'; ?>