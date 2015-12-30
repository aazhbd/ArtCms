<?php /* Smarty version 2.6.26, created on 2010-02-22 00:40:28
         compiled from view_cattbl.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'view_cattbl.tpl', 28, false),)), $this); ?>
<h2 align="center">Category List</h2>
<div style="float:left;width:100%;background:#eee;">
    <span style="float:left;width:80%;" ><a href="<?php echo @URL; ?>
/uhome" class="sidelinks">Home</a> >> Category Management </span>
    <span style="float:left;width:20%;" ><a href="<?php echo @URL; ?>
/add/category" class="sidelinks" >Add Category</a></span>
</div>
<div style="float:left;width:100%;">
<?php if ($this->_tpl_vars['data'] != null): ?> 
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
        <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['artname'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artname']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['artname']['iteration']++;
?>
            <?php if (!(1 & $this->_foreach['artname']['iteration'])): ?>
            <tr style="width:100%; float:left;" bgcolor="#FFFFFF">
            <?php else: ?>
            <tr style="width:100%; float:left;" bgcolor="#D5E4EA">
            <?php endif; ?>
                <td class="tblfield" style="width:20px;"><?php echo $this->_tpl_vars['cat']['id']; ?>
</td>
                <td class="tblfield" style="width:200px;"><?php echo $this->_tpl_vars['cat']['catname']; ?>
</td>
                <td class="tblfield" style="width:40px;"><?php echo $this->_tpl_vars['cat']['mtype']; ?>
</td>
                <td class="tblfield" style="width:80px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['date_inserted'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
                <td class="tblfield" style="width:80px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['date_updated'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
                
                <td class="tblfield" style="width:70px;"><?php if ($this->_tpl_vars['cat']['state'] == 0): ?> <a href="<?php echo @URL; ?>
/toggle/category/permission/<?php echo $this->_tpl_vars['cat']['id']; ?>
">Disable</a><?php elseif ($this->_tpl_vars['cat']['state'] == 1): ?> <a href="<?php echo @URL; ?>
/toggle/category/permission/<?php echo $this->_tpl_vars['cat']['id']; ?>
">Enable</a> <?php endif; ?></td>
                <td class="tblfield" style="width:50px;"><a href="<?php echo @URL; ?>
/edit/category/<?php echo $this->_tpl_vars['cat']['id']; ?>
">Edit</a></td>
                <td class="tblfield" style="width:50px;"><a href="<?php echo @URL; ?>
/delete/category/<?php echo $this->_tpl_vars['cat']['id']; ?>
" class="del_art">Delete</td>
            </tr>
        <?php endforeach; endif; unset($_from); ?>
    </table>
<?php else: ?>
    <table class="innertbl" style="width:100%;background:#fff;">
        <tr style="width:100%; float:left;background:#684574;" class="tblhead">
            <th class="spanlist" style="width:100%;padding:5px;">No article has been added</th>
        </tr>
    </table>
<?php endif; ?>
</div>