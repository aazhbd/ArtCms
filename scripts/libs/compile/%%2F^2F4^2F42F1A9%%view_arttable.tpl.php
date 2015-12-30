<?php /* Smarty version 2.6.26, created on 2010-02-22 00:38:03
         compiled from view_arttable.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wordwrap', 'view_arttable.tpl', 32, false),array('modifier', 'date_format', 'view_arttable.tpl', 38, false),)), $this); ?>
<h2 align="center">Articles List</h2>
<div style="float:left;width:100%;background:#eee;">
    <span style="float:left;width:80%;" ><a href="<?php echo @URL; ?>
/uhome" class="sidelinks">Home</a> >> Article Management</span>
    <span style="float:left;width:20%;" ><a href="<?php echo @URL; ?>
/add/article" class="sidelinks" >Add Article</a></span>
</div>
<div style="float:left;width:100%;">
<?php if ($this->_tpl_vars['data'] != null): ?> 
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
        <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['artname'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artname']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['art']):
        $this->_foreach['artname']['iteration']++;
?>
            <?php if (!(1 & $this->_foreach['artname']['iteration'])): ?>
            <tr style="width:100%; float:left;" bgcolor="#FFFFFF">
            <?php else: ?>
            <tr style="width:100%; float:left;" bgcolor="#D5E4EA">
            <?php endif; ?>
                <td class="tblfield" style="width:20px;"><?php echo $this->_tpl_vars['art']['id']; ?>
</td>
                <?php if ($this->_tpl_vars['art']['url'] != ""): ?>
                    <td class="tblfield" style="width:100px;"><a href="<?php echo @URL; ?>
/a/<?php echo $this->_tpl_vars['art']['url']; ?>
" class="sidelinks"><?php echo $this->_tpl_vars['art']['title']; ?>
</a></td>
                <?php else: ?>
                    <td class="tblfield" style="width:100px;"><a href="<?php echo @URL; ?>
/a/<?php echo $this->_tpl_vars['art']['id']; ?>
" class="sidelinks"><?php echo $this->_tpl_vars['art']['title']; ?>
</a></td>
                <?php endif; ?>
                <td class="tblfield" style="width:170px;"><?php if ($this->_tpl_vars['art']['url'] != null): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['art']['url'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 26, "\n", true) : smarty_modifier_wordwrap($_tmp, 26, "\n", true)); ?>
 <?php endif; ?></td>
                <?php $_from = $this->_tpl_vars['catList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                    <?php if ($this->_tpl_vars['c']['id'] == $this->_tpl_vars['art']['category_id']): ?>
                        <td class="tblfield" style="width:50px;"><?php echo $this->_tpl_vars['c']['catname']; ?>
</td>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                <td class="tblfield" style="width:80px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['art']['date_inserted'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
                <td class="tblfield" style="width:80px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['art']['date_updated'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
                <td class="tblfield" style="width:60px;"><?php if ($this->_tpl_vars['art']['state'] == 0): ?> <a href="<?php echo @URL; ?>
/toggle/article/permission/<?php echo $this->_tpl_vars['art']['id']; ?>
">Disable</a><?php elseif ($this->_tpl_vars['art']['state'] == 1): ?> <a href="<?php echo @URL; ?>
/toggle/article/permission/<?php echo $this->_tpl_vars['art']['id']; ?>
">Enable</a><?php endif; ?></td>
                <td class="tblfield" style="width:30px;"><a href="<?php echo @URL; ?>
/edit/articles/<?php echo $this->_tpl_vars['art']['id']; ?>
">Edit</a></td>
                <td class="tblfield" style="width:30px;"><a href="<?php echo @URL; ?>
/delete/article/<?php echo $this->_tpl_vars['art']['id']; ?>
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