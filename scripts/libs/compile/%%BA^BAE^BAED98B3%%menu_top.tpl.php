<?php /* Smarty version 2.6.26, created on 2010-02-22 18:03:14
         compiled from subtpl/menu_top.tpl */ ?>

<?php if ($this->_tpl_vars['islogin'] === true): ?>
    <a href="<?php echo @URL; ?>
/logout">Logout</a>
    |
    <a href="<?php echo @URL; ?>
/uhome">Member Home</a>
<?php else: ?>
    <a href="<?php echo @URL; ?>
/login">Login</a>
    |
    <a href="<?php echo @URL; ?>
/signup">Signup</a>
<?php endif; ?>