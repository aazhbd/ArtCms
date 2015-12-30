<?php /* Smarty version 2.6.26, created on 2010-02-22 06:13:32
         compiled from frm_category.tpl */ ?>
<?php echo '
<script type="text/javascript">
    $(document).ready(function() {
        $("#reports").hide();
    });
</script>
'; ?>


<div style="width:98%;"> 
    <div id="reports"></div>
    
    <br />
    <div  style="background: #eee; padding: 5px;">
        <a href="<?php echo @URL; ?>
/manage/categories" title="Article Management"> << Back to Category Management</a> - <?php if ($this->_tpl_vars['action'] == 'add'): ?>Add Category <?php else: ?> Edit Category <?php endif; ?>
    </div>
    <br />    
    <form method="post" action="<?php echo @URL; ?>
/submitcategory.php" id="frmcategory" >
       <fieldset> 
            <?php if ($this->_tpl_vars['action'] == 'add'): ?>
                <legend>Add Category</legend>
            <?php elseif ($this->_tpl_vars['action'] == 'update'): ?>
                <legend>Update Category</legend>
            <?php endif; ?>
            <input type="hidden" value="<?php echo $this->_tpl_vars['action']; ?>
" name="action" />
            <input type="hidden" value="<?php echo $this->_tpl_vars['data']['id']; ?>
" name="id" />
            <div>
                <span>
                    <div style="float:left; width:120px;"><label for="cname">Category Name: </label></div>
                    <input type="text" name="cname" id="cname" style="width:200px;" value="<?php echo $this->_tpl_vars['data']['catname']; ?>
" />
                    <div class="subinfo" style="float: left; width: 98%;">Maximum 50 characters</div>
                </span>
            </div>
            <div>
                <span>
                    <div style="float:left; width:120px;"><label for="mtype">Media Type: </label></div>
                    <input type="text" name="mtype" id="mtype" style="width:200px;" value="<?php echo $this->_tpl_vars['data']['mtype']; ?>
" />
                    <div class="subinfo" style="float: left; width: 98%;">Digits within 0 and 100</div>
                </span>
            </div>            
            <div>
                <span>
                    <?php if ($this->_tpl_vars['action'] == 'add'): ?>
                        <input type="submit" value="Add Category" class="frmbtn" name="submit" id="submit" />
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['action'] == 'edit'): ?>
                        <input type="submit" name="submit" value="Update" class="frmbtn" id="submit"/>
                    <?php endif; ?>
                    <input type="reset" value="Reset" class="frmbtn" />
                </span>
            </div>
        </fieldset>
    </form>
</div>

<?php echo '
<script type="text/javascript">

    $(document).ready(function(){
        $("#frmcategory").validate({
            errorLabelContainer: "#reports",
            wrapper: "p",
            rules: {
                cname: { required: true, maxlength: 50 },
                mtype: { required: true, digits: true, max: 100, min: 0 }
            },
            messages: 
            {
                cname: {
                    required: "Please type the name for this channel.",
                    maxlength: "The channel should be within 50 characters."
                },
                mtype: {
                    required: "Please provide a number for media type.",
                    digits: "The media type should be digits.",
                    max: "The media type can have a maximum value of 100.",
                    min: "The media type can have a minimum value of 0."
                }
            }
        });
    });
    
</script>
'; ?>