<?php /* Smarty version 2.6.26, created on 2010-02-22 00:37:53
         compiled from frm_login.tpl */ ?>

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
                    Not a member yet? <a href="<?php echo @URL; ?>
/signup">Sign Up</a>
                </span>
            </div>
        </fieldset>
    </form>
</div>