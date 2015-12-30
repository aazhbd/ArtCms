<?php /* Smarty version 2.6.26, created on 2010-02-22 16:37:54
         compiled from frm_article.tpl */ ?>
<?php echo '
<script type="text/javascript">
   $(document).ready(function(){
       $("#errors").hide();
   });
</script>
'; ?>

<div style="width:98%;" > 
    
    <div id="errors"></div>
    
    <br />
    <div  style="background: #eee; padding: 5px;">
        <a href="<?php echo @URL; ?>
/manage/articles" title="Article Management"> << Back to Article Management</a> - <?php if ($this->_tpl_vars['action'] == 'add'): ?>Add Article <?php else: ?> Edit Article <?php endif; ?>
    </div>
    <br />
    
        <form method="post" action="<?php echo @URL; ?>
/submitarticle.php" id="frmart" >
        <fieldset>
            <?php if ($this->_tpl_vars['action'] == 'add'): ?>
                <legend>Add New Article</legend>
            <?php else: ?>
                <legend>Edit Article</legend>
            <?php endif; ?>
            
            <input type="hidden" name="art_id" id="art_id" value="<?php echo $this->_tpl_vars['data']['id']; ?>
"/>
            <input type="hidden" name="action" id="action" value="<?php echo $this->_tpl_vars['action']; ?>
"/>
            
            <div>
                <span>
                    <div style="float:left; width:100px;">
                        <label for="cat">Category:</label>
                    </div>
                    <select name='cat' id='cat'>
                        <option value=''> Select </option>
                        <?php $_from = $this->_tpl_vars['catList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
                            <?php if ($this->_tpl_vars['data']['category_id'] == $this->_tpl_vars['cat']['id']): ?>
                                <option value='<?php echo $this->_tpl_vars['cat']['id']; ?>
' selected="selected"><?php echo $this->_tpl_vars['cat']['catname']; ?>
</option>
                            <?php else: ?>
                                <option value='<?php echo $this->_tpl_vars['cat']['id']; ?>
'> <?php echo $this->_tpl_vars['cat']['catname']; ?>
 </option>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </span>
            </div>

            <div>
                <span>
                    <div style="float:left; width:100px;">
                        <label for="arttitle">Title:</label>
                    </div>
                    <input type="text" name="arttitle" id="arttitle" value="<?php echo $this->_tpl_vars['data']['title']; ?>
" style="width:45em;" />
                    <div class="subinfo">Maximum 100 characters</div>
                </span>
            </div>
            
            <div>
                <span>
                    <div style="float:left; width:100px;">
                        <label for="subtitle">Sub-title:</label>
                    </div>
                    <input type="text" name="subtitle" id="sub_title" value="<?php echo $this->_tpl_vars['data']['subtitle']; ?>
" style="width:45em;"/>
                    <div class="subinfo">Maximum 200 characters</div> 
                </span>
            </div>
            
            <div>
                <div style="float:left; width:98%;"><label for="bodytxt">Body:</label></div>
                
                <?php if ($this->_tpl_vars['fckEditor'] != null): ?>
                    <div style="padding:1px; width: 100%;">
                        <?php echo $this->_tpl_vars['fckEditor']; ?>

                    </div>
                    <div class="subinfo">Maximum 16777216 characters</div>
                <?php else: ?>
                    <span>
                        <textarea id="bodytxt" name="bodytxt" style="width:100%;padding:10px;" ></textarea>
                        <div class="subinfo">Maximum 16777216 characters</div>
                    </span>
                <?php endif; ?>
                
            </div>
            
            <div>
                <span style="float:left; width:90%;">
                    <input name="submit" id="submit" type="submit" value="Submit" class="frmbtn" />
                    <input name="reset" id="reset" type="reset" value="Reset" class="frmbtn" />
                    <a href="<?php echo @URL; ?>
/home">Cancel</a>
                </span>
            </div>

            <div>
                <span>
                    <div><label  style="float:left; width:100px;" for="arturl">Article URL:</label></div>
                    http://YourSiteName.com/a/<input type="text" name="arturl" id="arturl" value="<?php echo $this->_tpl_vars['data']['url']; ?>
" style="width:410px;" />&nbsp;<strong><a href="#" id="checkavail" >Check Availability</a></strong>
                    <div class="subinfo">Maximum 250 characters</div>
                    <div style="width:500px;color:#F93; font-size:larger; font-stretch:semi-expanded; font-weight:bolder;" id ="availresponse"></div><br/>
                </span>
            </div>
            <div>
                <span style="float:left; width: 50%;" >
                    <label for="keywords">Keywords: </label><br />
                    <textarea id="keywords" name="keywords" style="width:28em;" rows="8" ><?php echo $this->_tpl_vars['data']['meta_tags']; ?>
</textarea>
                    <div class="subinfo">Maximum 200 characters. Seperate your keywords with comma (,) to make it available to the search engines</div>
                </span>
                <span style="float:left; width: 40%;">
                    <label for="remarks">Remarks: </label><br />
                    <textarea id="remarks" name="remarks" style="width:28em;" rows="8" ><?php echo $this->_tpl_vars['data']['remarks']; ?>
</textarea>
                    <div class="subinfo">Maximum 500 characters</div>
                </span>
            </div>
        </fieldset>
    </form>
</div>
<?php echo '
<script type="text/javascript">
   $(document).ready(function(){
        $(\'input#arturl\').keyup(function () {
          var n = $(this).val();
          var murl = n.replace(/[\\s/\\:*?"><|%()$#;\',+=@^!&`]/g, \'_\');
          $(\'input#arturl\').val(murl);
        }); 
        
       $("#errors").hide();
        $("#availresponse").hide();

        $(\'#checkavail\').click(function(){
            var url = $(\'#arturl\').val();
            var typ = \'art\';
            var dataString = \'name=\'+ url + \'type=\'+typ;
            var aurl = site.url + "/zproc.php";
            
            if(url.length > 0)
            {
                $.ajax({
                    type: "POST",
                    url: aurl,
                    data: dataString,
                    cache: false,
                    dataType: "html",
                    success: function(response){
                        $("#availresponse").show();
                        $("#availresponse").fadeIn(400).html(\'Your selected url is \' + response);
                    }
                });
            }
            return false;
        });
        
       $("#frmart").validate({
           errorLabelContainer: "#errors",
           wrapper: "h4",
           rules:{
               bodytxt: { required: true, maxlength: 16777216},
               cat: { required: true },
               arttitle: { required: true, maxlength: 100, minlength: 1 },
               sub_title: { maxlength: 200 },
               remarks: { maxlength: 200 },
               keywords: { maxlength: 200},
               arturl: { maxlength: 250}
           },
           messages:{
               bodytxt: {
                   required: "You can not publish blank article. Please enter your text.",
                   maxlength: "The text of your article is too big and has exceeded 16777216 characters. Please shorten your article."
               },
               cat: { required: "Select a category for this article" },
               arttitle: { 
                        required: "Please write the title for this article",
                        maxlength: "The title should be within 100 characters",
                        minlength: "Please write the title for this article"
               },
               sub_title: { 
                        maxlength: "The subtitle should be within 100 characters"
               },
               remarks: {
                        maxlength: "The remarks should be within 200 characters"
               },
               keywords: { 
                        maxlength: "The keywords should be within 200 characters" 
               },
               arturl: {
                        maxlength: "The url should be within 250 characters"
               }
           }
       });
   });
</script>
'; ?>
