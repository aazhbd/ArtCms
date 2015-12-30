<?php /* Smarty version 2.6.26, created on 2010-02-22 05:42:37
         compiled from main.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ArticulateCMS by ArticulateLogic.com</title>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "subtpl/mlinks.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "subtpl/js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>

<body>
    <div id="contentheader">
        <div id="banner">
            <img src="<?php echo @URL; ?>
/interface/images/logo.GIF" id="logo" />
        </div>
        <div id="topright">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "subtpl/menu_top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        <div id="navigatemenu">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "subtpl/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>
    
    <div id="contentbody">
        <?php if ($this->_tpl_vars['rep'] != null): ?>
            <div id="reports"><?php echo $this->_tpl_vars['rep']; ?>
</div>
        <?php endif; ?>        
        
        <?php if ($this->_tpl_vars['title'] != null): ?>
            <h2 class="title"><?php echo $this->_tpl_vars['title']; ?>
</h2>
        <?php endif; ?>
        
        <?php if ($this->_tpl_vars['subtitle'] != null): ?>
            <div class="subtitle"><?php echo $this->_tpl_vars['subtitle']; ?>
</div>
        <?php endif; ?>
        
        <?php if ($this->_tpl_vars['body'] != null): ?>
            <div class="body"><?php echo $this->_tpl_vars['body']; ?>
</div>
        <?php endif; ?>
    </div>
    
    <div id="footer">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "subtpl/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</body>
</html>