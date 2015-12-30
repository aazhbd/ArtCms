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
<div>
    <div id="errors"></div>
    <form id="frmsignup" method="post" action="{$smarty.const.URL}/signup.php">
        <fieldset title="Signup form">
            <legend>Please Signup</legend>            
            <div>
                <span style="float:left; width: 45%;">
                    <div style="float:left; width:120px;">
                        <label for="fname">First Name:</label>
                    </div>
                    <input type="text" name="fname" id="fname" style="width:160px;" />
                </span>
                <span style="float:left; width: 45%;">
                    <label style="margin-left:50px;" for="lname">Last Name:</label>
                    <input type="text" name="lname" id="lname" style="margin-left:20px; width: 160px;" />
                </span>
                <div class="subinfo">Write your first name and last name</div>
            </div>
            <div>
                <span style="float:left; width: 98%;">
                    <div style="float:left; width:120px;"><label for="email">Email:</label></div>
                    <input type="text" name="email" id="email" style="width:160px;" />
                </span>
                <div class="subinfo">Write your email address</div>
            </div>            
            <div>
                <span style="float:left; width: 45%;">
                    <div style="float:left; width:120px;"><label for="password">Password:</label></div>
                    <input type="password" name="password" id="password" style="width:160px;" />
                </span>
                <span style="float:left; width: 45%;">
                    <label style="margin-left:50px;" for="rpass">Re-type:</label>
                    <input type="password" name="rpass" id="rpass" style="margin-left:35px;width:160px;" />
                </span>
                <div class="subinfo">Type your password</div>
            </div>
            <div>
                <span style="float:left; width: 45%;">
                    <div style="float:left; width:120px;">
                        <label for="sex">Sex: </label>
                    </div>
                    <select name="sex" id="sex" style="width:160px;">
                        <option value="">Select</option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                </span>
                
                <span style="float:left; width: 40%; margin-left: 50px;">
                    <div style="float:left; width:90px;"><label>Birth Date: </label></div>
                    <input type="text" id = "datepicker" name="birthdate" style="width:160px;" />
                </span>
                <div class="subinfo" style="float: left; width: 380px;">Select your sex</div>
                <div class="subinfo">Write your birthday</div>
            </div>
            <div>
                <span align="left">
                    <label for='agree'><input type="checkbox" name="agree" value="1" />
                    I agree with the <a href='{$smarty.const.URL}/a/privacy'>Privacy Policy</a> and <a href='{$smarty.const.URL}/a/terms'>Terms and Conditions</a>
                    </label><br/>
                </span>
            </div>
            <div>
                <span align="left">
                    <input type="submit" name="submit" id="button" value="Sign up" class="frmbtn"/>
                    <input type="reset" name="reset" id="button" value="Clear" class="frmbtn"/>
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
               fname:{ required: true , maxlength: 50 },
               lname:{ required: true , maxlength: 50 },
               email:{ required: true, email: true , maxlength: 50},
               pass:{ required: true, minlength: 5 , maxlength: 20},
               rpass:{ required: true, minlength: 5, maxlength: 20, equalTo: "#password" },
               sex:{ required: true },
               birthdate:{ required: true },
               agree: { required: true }
           },
           messages:{
               fname: "Please enter your first name.",
               lname: "Please enter your last name.",
               email: "Please enter a valid email address.",
               pass: "Please enter a minimum 5 character password",
               rpass: {
                   required: "Your re-typed password does not match the new password you entered.",
                   minlength: "Password must be at laest 5 characters long"
               },
               sex: "Please select sex",
               birthdate: "Please select your birth date",
               agree: "You must select the checkbox to agree to our terms and conditions before you signup"
           }
       });
   });
</script>
{/literal}
