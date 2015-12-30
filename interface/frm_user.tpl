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
   $(document).ready(function(){
       $("#errors").hide();
        $('#datepicker').datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1900:2010'
        });       
   });
</script>
{/literal}

<div style="width: 98%;">
    <div id="errors"></div>
    <br />
    <div style="background: #eee; padding: 5px; height: ;">
        {if $action == "add"}
            <span ><a href="{$smarty.const.URL}/manage/users"><< Back to User Management</a> >> Add User </span>
        {elseif $action == "edit"}
            <span ><a href="{$smarty.const.URL}/manage/users"><< Back to User Management</a> >> Edit User </span></div>
        {/if}
    </div>
    <br />
         
    <form id="frmsignup" method="post" action="{$smarty.const.URL}/submituser.php">
        <fieldset>
        {if $action == "add"}
            <legend>Add User</legend>
        {elseif $action == "edit"}
            <legend>Edit User</legend>
        {/if}
        <div>
            <span>
                <div style="float:left; width:80px;"><label for="fname">First Name </label></div>
                <input name="fname" id="fname" type="text" style="width:200px;" value="{$data.firstname}" />
                <div class="subtpl">Maximum 50 characters</div>
            </span>
            <span>
                <label style="float:left; margin-left:60px;" for="lname">Last Name *</label>
                <input name="lname" id="lname" type="text" style="width:200px; margin-left:60px;" value="{$data.lastname}" />
            </span>
        </div>
        <div>
            <span>
                <div style="float:left; width:80px;"><label for="email">Email *</label></div>
                <input name="email" id="email" type="text" style="width:200px;" value="{$data.email}" />
                <div class="subtpl">Maximum 50 characters</div>
            </span>
        </div>
        <div>
            <span>
                <div style="float:left; width:80px;"><label for="password">Password *</label></div>
                <input name="password" id="password" type="password" style="width:200px;" value="{$data.pass}"/>
                <div class="subtpl">Maximum 20 characters</div>
            </span>
            <span>
                <label style="margin-left:60px;" for="rpass" >Retype Password *</label>
                <input name="rpass" id="rpass" type="password" style="margin-left:15px; width: 200px;" value="{$data.pass}"/>
            </span>
        </div>
        <div>
            <span>
                <div style="float:left; width:80px;"><label for="sex">Sex: </label></div>
                <select name="sex" id="sex" style="width:200px;">
                    <option value="">Select</option>
                    {if $data.gender == 'm'}
                        <option value="m" selected="selected">Male</option>
                        <option value="f">Female</option>
                    {elseif $data.gender == 'f'}
                        <option value="m">Male</option>
                        <option value="f" selected="selected">Female</option>
                    {else}
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    {/if}
                </select>
            </span>
            <span>
                <label style="margin-left:60px;" for="birthdate">Birth Date: </label>
                <input type="text" id = "datepicker" name="birthdate" style="margin-left:60px; width: 200px;" value="{$data.date_ofbirth|date_format:"%m/%d/%Y"}"/>
            </span>
        </div>
        <div>
            <span>
                <div style="float:left; width:80px;"><label for="utype">User Type </label></div>
                <select name="utype" id="utype" style="width:200px;">
                    {if $data.utype == 0}
                        <option value="0" selected="selected">General User</option>
                        <option value="1">Admin User</option>
                    {elseif $data.utype == 1}
                        <option value="0">General User</option>
                        <option value="1" selected="selected">Admin User</option>
                    {/if}
                </select>
            </span>
            <span>
                <label style="margin-left:60px;" for="ustatus">User Status </label>
                <select name="ustatus" id="ustatus" style="margin-left:60px; width:200px;">
                    {if $data.ustatus == 0}
                        <option value="0" selected="selected">Email Not Validated</option>
                        <option value="1">Email Validated</option>
                    {elseif $data.ustatus == 1}
                        <option value="0">Email Not Validated</option>
                        <option value="1" selected="selected">Email Validated</option>
                    {/if}
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
                <input  name="action" value="{$action}" type="hidden"  />
                <input  name="old_email" value="{$data.email}" type="hidden"  />
                <input  name="uid" value="{$data.id}" type="hidden"  />
            </span>
        </div>
        </fieldset>
    </form>
</div>


{literal}
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
{/literal}