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
<div>
    <form action="loginpost.php" method="post" id ="frmlogin">
        <fieldset> 
        <legend>User Login</legend>
            <div>
                <span>
                    <div style="float:left; width:120px;"><label>Email:</label></div>
                    <input type="text" name="email" class="log" />
                </span>
            </div>
            <div>
                <span>
                    <div style="float:left; width:120px;"><label>Password:</label></div>
                    <input type="password" name="pass" class="log" />
                </span>
            </div>
            <div>
                <span>
                    <input type="submit" class="frmbtn" name="submit" value="Login" />
                    <label><input type="checkbox" name="remember[]" value="1"/> Remember Me.</label>
                </span>
            </div>
            <div>
                <span>
                    Not a member yet? <a href="{$smarty.const.URL}/signup">Sign Up</a>
                </span>
            </div>
        </fieldset>
    </form>
</div>
