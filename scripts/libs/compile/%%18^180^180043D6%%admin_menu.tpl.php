<?php /* Smarty version 2.6.26, created on 2010-02-22 00:37:58
         compiled from admin_menu.tpl */ ?>
<div class="topmenu" style="width: 98%;">
    <div style="float: left; width: 48%;">
        <a href="<?php echo @URL; ?>
/uhome" <?php if ($this->_tpl_vars['selMenu'] == 'home'): ?> id="selMenu"<?php endif; ?>>
            <img src="<?php echo @URL; ?>
/interface/images/home.png" alt="Users" style="width: 20px;  border:none;"/>
            Home
        </a>
        
        <a href="<?php echo @URL; ?>
/manage/users" <?php if ($this->_tpl_vars['selMenu'] == 'user'): ?> id="selMenu"<?php endif; ?>>
            <img src="<?php echo @URL; ?>
/interface/images/users.png" alt="Users" style="width: 20px;  border:none;"/>
            User
        </a>        
        <a href="<?php echo @URL; ?>
/manage/categories" <?php if ($this->_tpl_vars['selMenu'] == 'category'): ?> id="selMenu"<?php endif; ?>>
            <img src="<?php echo @URL; ?>
/interface/images/category.png" alt="Article" style="width: 20px;  border:none;"/>
            Category
        </a>
        <a href="<?php echo @URL; ?>
/manage/articles" <?php if ($this->_tpl_vars['selMenu'] == 'article'): ?> id="selMenu"<?php endif; ?>>
            <img src="<?php echo @URL; ?>
/interface/images/article.png" alt="Category" style="width: 20px;  border:none;"/>
            Article
        </a>        
    </div>
    <div style="float: right; width: 48%;" align="right">
        <a href="<?php echo @URL; ?>
/edit/account" >
            <img src="<?php echo @URL; ?>
/interface/images/editacc.png" alt="Users" style="width: 20px; border:none; "/>
            Edit Account
        </a>
    </div>
</div>