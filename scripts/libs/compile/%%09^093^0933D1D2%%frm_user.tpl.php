<?php /* Smarty version 2.6.26, created on 2010-02-22 17:31:27
         compiled from frm_user.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'frm_user.tpl', 81, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
   $(document).ready(function(){
       $("#errors").hide();
        $(\'#datepicker\').datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: \'1900:2010\'
        });       
   });
</script>
'; ?>


<div style="width: 98%;">
    <div id="errors"></div>
    <br />
    <div style="background: #eee; padding: 5px; height: ;">
        <?php if ($this->_tpl_vars['action'] == 'add'): ?>
            <span ><a href="<?php echo @URL; ?>
/manage/users"><< Back to User Management</a> >> Add User </span>
        <?php elseif ($this->_tpl_vars['action'] == 'edit'): ?>
            <span ><a href="<?php echo @URL; ?>
/manage/users"><< Back to User Management</a> >> Edit User </span></div>
        <?php endif; ?>
    </div>
    <br />
         
    <form id="frmsignup" method="post" action="<?php echo @URL; ?>
/submituser.php">
        <fieldset>
        <?php if ($this->_tpl_vars['action'] == 'add'): ?>
            <legend>Add User</legend>
        <?php elseif ($this->_tpl_vars['action'] == 'edit'): ?>
            <legend>Edit User</legend>
        <?php endif; ?>
        <div>
            <span>
                <div style="float:left; width:80px;"><label for="fname">First Name </label></div>
                <input name="fname" id="fname" type="text" style="width:200px;" value="<?php echo $this->_tpl_vars['data']['firstname']; ?>
" />
                <div class="subtpl">Maximum 50 characters</div>
            </span>
            <span>
                <label style="float:left; margin-left:60px;" for="lname">Last Name *</label>
                <input name="lname" id="lname" type="text" style="width:200px; margin-left:60px;" value="<?php echo $this->_tpl_vars['data']['lastname']; ?>
" />
            </span>
        </div>
        <div>
            <span>
                <div style="float:left; width:80px;"><label for="email">Email *</label></div>
                <input name="email" id="email" type="text" style="width:200px;" value="<?php echo $this->_tpl_vars['data']['email']; ?>
" />
                <div class="subtpl">Maximum 50 characters</div>
            </span>
        </div>
        <div>
            <span>
                <div style="float:left; width:80px;"><label for="password">Password *</label></div>
                <input name="password" id="password" type="password" style="width:200px;" value="<?php echo $this->_tpl_vars['data']['pass']; ?>
"/>
                <div class="subtpl">Maximum 20 characters</div>
            </span>
            <span>
                <label style="margin-left:60px;" for="rpass" >Retype Password *</label>
                <input name="rpass" id="rpass" type="password" style="margin-left:15px; width: 200px;" value="<?php echo $this->_tpl_vars['data']['pass']; ?>
"/>
            </span>
        </div>
        <div>
            <span>
                <div style="float:left; width:80px;"><label for="sex">Sex: </label></div>
                <select name="sex" id="sex" style="width:200px;">
                    <option value="">Select</option>
                    <?php if ($this->_tpl_vars['data']['gender'] == 'm'): ?>
                        <option value="m" selected="selected">Male</option>
                        <option value="f">Female</option>
                    <?php elseif ($this->_tpl_vars['data']['gender'] == 'f'): ?>
                        <option value="m">Male</option>
                        <option value="f" selected="selected">Female</option>
                    <?php else: ?>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    <?php endif; ?>
                </select>
            </span>
            <span>
                <label style="margin-left:60px;" for="birthdate">Birth Date: </label>
                <input type="text" id = "datepicker" name="birthdate" style="margin-left:60px; width: 200px;" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['date_ofbirth'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%Y") : smarty_modifier_date_format($_tmp, "%m/%d/%Y")); ?>
"/>
            </span>
        </div>
        <div>
            <span>
                <div style="float:left; width:80px;"><label for="utype">User Type </label></div>
                <select name="utype" id="utype" style="width:200px;">
                    <?php if ($this->_tpl_vars['data']['utype'] == 0): ?>
                        <option value="0" selected="selected">General User</option>
                        <option value="1">Admin User</option>
                    <?php elseif ($this->_tpl_vars['data']['utype'] == 1): ?>
                        <option value="0">General User</option>
                        <option value="1" selected="selected">Admin User</option>
                    <?php endif; ?>
                </select>
            </span>
            <span>
                <label style="margin-left:60px;" for="ustatus">User Status </label>
                <select name="ustatus" id="ustatus" style="margin-left:60px; width:200px;">
                    <?php if ($this->_tpl_vars['data']['ustatus'] == 0): ?>
                        <option value="0" selected="selected">Email Not Validated</option>
                        <option value="1">Email Validated</option>
                    <?php elseif ($this->_tpl_vars['data']['ustatus'] == 1): ?>
                        <option value="0">Email Not Validated</option>
                        <option value="1" selected="selected">Email Validated</option>
                    <?php endif; ?>
                </select>
            </span>
        </div>
        <br />
        <div>
            <span>
                <div style="float:left; width:80px;"><input  name="submit" value="Submit" type="submit" class="frmbtn" /></div>
            </span>
            <span>
                <input  name="reset" value="Reset" type="reset" class="frmbtn" />
                <input  name="action" value="<?php echo $this->_tpl_vars['action']; ?>
" type="hidden"  />
                <input  name="old_email" value="<?php echo $this->_tpl_vars['data']['email']; ?>
" type="hidden"  />
                <input  name="uid" value="<?php echo $this->_tpl_vars['data']['id']; ?>
" type="hidden"  />
            </span>
        </div>
        </fieldset>
    </form>
</div>


<?php echo '
<script type="text/javascript">
   
   $(document).ready(function(){
       $("#frmsignup").validate({
       errorLabelContainer: "#errors",
       wrapper: "p",
           rules:{
               fname:{ required: true, maxlength: 50 },
               lname:{ required: true, maxlength: 50 },
               email:{ required: true, email: true, maxlength: 50},
               password:{ required: true, minlength: 5 , maxlength: 20},
               rpass:{ required: true, equalTo: "#password" },
               sex:{ required: true },
               birthdate:{ required: true },               
               utype: { required: true},
               ustatus: { required:true }
           },
           messages:{
               fname: {
                        required: "Please enter your first name.",
                        maxlength: "You can not enter a first name having more than 50 characters"
               },
               lname: {
                        required:"Please enter your last name.",
                        maxlength: "You can not enter a last name having more than 50 characters"
               },
               email:   "Please enter a valid email address.",
               password: {
                        required: "Please enter your password",
                        minlength:"Please enter a minimum 5 character password",
                        maxlength:"Please enter a maximum 20 character password"
               },
               sex: "Please select sex",
               birthdate: "Please select the birth date",               
               rpass: "Please re-type your password in the Confirm Password field",
               utype: { required: "Please select an user type" },
               ustatus: { required: "Please select an user status" }
           }
       });
   });
</script>
'; ?>