{*
/**
* An open source web application development framework for PHP 5 and above.
*
* @author        ArticulateLogic Labs
* @author        Abdullah Al Zakir Hossain, Email: aazhbd@yahoo.com 
* @author        Syeda Tasneem Rumy, Email: tasneemrumy@gmail.com
* @author        Abdullah Al Zakir Hossain, Email: aazhbd@yahoo.com
* @copyright     Copyright (c)2009-2010 ArticulateLogic Labs, creative software engineering
* @license       www.articulatelogic.com/a/privacy,  www.articulatelogic.com/a/terms
* @link          http://www.articulatelogic.com
* @since         Version 1.0
*  
*/
*}
{literal}
<script type="text/javascript">
    $(document).ready(function() {
        $("#reports").hide();
    });
</script>
{/literal}

<div style="width:98%;"> 
    <div id="reports"></div>
    
    <br />
    <div  style="background: #eee; padding: 5px;">
        <a href="{$smarty.const.URL}/manage/categories" title="Article Management"> << Back to Category Management</a> - {if $action == "add"}Add Category {else} Edit Category {/if}
    </div>
    <br />    
    <form method="post" action="{$smarty.const.URL}/submitcategory.php" id="frmcategory" >
       <fieldset> 
            {if $action == "add"}
                <legend>Add Category</legend>
            {elseif $action == "update"}
                <legend>Update Category</legend>
            {/if}
            <input type="hidden" value="{$action}" name="action" />
            <input type="hidden" value="{$data.id}" name="id" />
            <div>
                <span>
                    <div style="float:left; width:120px;"><label for="cname">Category Name: </label></div>
                    <input type="text" name="cname" id="cname" style="width:200px;" value="{$data.catname}" />
                    <div class="subinfo" style="float: left; width: 98%;">Maximum 50 characters</div>
                </span>
            </div>
            <div>
                <span>
                    <div style="float:left; width:120px;"><label for="mtype">Media Type: </label></div>
                    <input type="text" name="mtype" id="mtype" style="width:200px;" value="{$data.mtype}" />
                    <div class="subinfo" style="float: left; width: 98%;">Digits within 0 and 100</div>
                </span>
            </div>            
            <div>
                <span>
                    {if $action == 'add'}
                        <input type="submit" value="Add Category" class="frmbtn" name="submit" id="submit" />
                    {/if}
                    {if $action == 'edit'}
                        <input type="submit" name="submit" value="Update" class="frmbtn" id="submit"/>
                    {/if}
                    <input type="reset" value="Reset" class="frmbtn" />
                </span>
            </div>
        </fieldset>
    </form>
</div>

{literal}
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
{/literal}