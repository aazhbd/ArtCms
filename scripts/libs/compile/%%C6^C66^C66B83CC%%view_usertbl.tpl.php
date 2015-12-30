<?php /* Smarty version 2.6.26, created on 2010-02-22 00:39:14
         compiled from view_usertbl.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'view_usertbl.tpl', 28, false),)), $this); ?>
<h2 align="center">Users List</h2>
<div style="float:left;width:100%;background:#eee;">
    <span style="float:left;width:80%;" ><a href="<?php echo @URL; ?>
/uhome" class="sidelinks">Home</a> >> User Management </span>
    <span style="float:left;width:20%;" ><a href="<?php echo @URL; ?>
/add/user" class="sidelinks" >Add User</a></span>
</div>
<div style="float:left;width:100%;">
<?php if ($this->_tpl_vars['data'] != null): ?> 
    <table class="innertbl" style="width:100%;float:left;border:1px solid #ddd;" >
        <tr style="width:100%;float:left; text-align:left; " class="tblhead" >
            <th style="width:20px;" class="tblfield" >Id</th>
            <th style="width:130px;" class="tblfield" >Email</th>
            <th style="width:80px;" class="tblfield" >Create Date</th>
            <th style="width:80px;" class="tblfield" >Update Date</th>
            <th style="width:60px;" class="tblfield">Permission</th>
            <th style="width:100px;" class="tblfield">Type</th>
            <th style="width:60px;" class="tblfield">Status</th>            
            <th style="width:50px;" class="tblfield">Edit</th>
            <th style="width:50px;" class="tblfield">Delete</th>
        </tr>
        <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['artname'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artname']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['artname']['iteration']++;
?>
            <?php if (!(1 & $this->_foreach['artname']['iteration'])): ?>
            <tr style="width:100%; float:left;" bgcolor="#FFFFFF">
            <?php else: ?>
            <tr style="width:100%; float:left;" bgcolor="#D5E4EA">
            <?php endif; ?>
                <td class="tblfield" style="width:20px;"><?php echo $this->_tpl_vars['user']['id']; ?>
</td>
                <td class="tblfield" style="width:130px;"><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
                <td class="tblfield" style="width:80px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['date_inserted'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
                <td class="tblfield" style="width:80px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['date_updated'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
                <td class="tblfield" style="width:60px;">
                    <?php if ($this->_tpl_vars['user']['email'] != $this->_tpl_vars['email']): ?>
                        <?php if ($this->_tpl_vars['user']['state'] == 0): ?><a href="<?php echo @URL; ?>
/toggle/user/permission/<?php echo $this->_tpl_vars['user']['id']; ?>
">Block</a><?php elseif ($this->_tpl_vars['user']['state'] == 1): ?> <a href="<?php echo @URL; ?>
/toggle/user/permission/<?php echo $this->_tpl_vars['user']['id']; ?>
">Allow</a> <?php endif; ?>
                    <?php else: ?>
                        0 = Yes
                    <?php endif; ?>    
                </td>
                <td class="tblfield" style="width:100px;">
                    <?php if ($this->_tpl_vars['user']['email'] != $this->_tpl_vars['email']): ?>
                        <?php if ($this->_tpl_vars['user']['utype'] == 0): ?><a href="<?php echo @URL; ?>
/toggle/user/type/<?php echo $this->_tpl_vars['user']['id']; ?>
">Make Admin</a><?php elseif ($this->_tpl_vars['user']['utype'] == 1): ?> <a href="<?php echo @URL; ?>
/toggle/user/type/<?php echo $this->_tpl_vars['user']['id']; ?>
">Make General</a> <?php endif; ?>
                    <?php else: ?>
                        <?php echo $this->_tpl_vars['user']['utype']; ?>
 = Admin
                    <?php endif; ?>
                </td>
                <td class="tblfield" style="width:60px;">
                    <?php if ($this->_tpl_vars['user']['email'] != $this->_tpl_vars['email']): ?>
                        <?php if ($this->_tpl_vars['user']['ustatus'] == 0): ?> <a href="<?php echo @URL; ?>
/toggle/user/status/<?php echo $this->_tpl_vars['user']['id']; ?>
">Activate</a><?php elseif ($this->_tpl_vars['user']['ustatus'] == 1): ?> <a href="<?php echo @URL; ?>
/toggle/user/status/<?php echo $this->_tpl_vars['user']['id']; ?>
">Deactivate</a> <?php endif; ?>
                    <?php else: ?>
                        <?php echo $this->_tpl_vars['user']['ustatus']; ?>
 = Active
                    <?php endif; ?>
                </td>
                <td class="tblfield" style="width:50px;">
                    <?php if ($this->_tpl_vars['user']['email'] != $this->_tpl_vars['email']): ?>
                        <a href="<?php echo @URL; ?>
/edit/user/<?php echo $this->_tpl_vars['user']['id']; ?>
">Edit</a>
                    <?php else: ?>
                        <a href="<?php echo @URL; ?>
/edit/account">Edit</a>
                    <?php endif; ?>
                </td>
                <td class="tblfield" style="width:50px;">
                    <?php if ($this->_tpl_vars['user']['email'] != $this->_tpl_vars['email']): ?>
                        <a href="<?php echo @URL; ?>
/delete/user/<?php echo $this->_tpl_vars['user']['id']; ?>
" class="contdel">Delete
                    <?php else: ?>
                        (Not Applicable)
                    <?php endif; ?>
                </td>
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
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $(\'a.contdel\').click(function(){
       var link = $(this).attr(\'href\');
        jConfirm(\'Are you sure you want to delete this user?\', \'Confirmation Dialog\', function(r) {
            if(r == true){
                window.location.href = link;
            }
            else{
                return false;
            }
        });
        return false;
    });
});
</script>
'; ?>
