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
    <div style="float:none;">
        {$article.body}
    </div>

    <div style="float:none;margin-top:20px;">
        {if $article.remarks != ""}
            <div>
                <span style="font-weight:bold;">Remarks: </span>
                <span>{$article.remarks}</span>
            </div>
        {/if}
        {if $article.meta_tags != ""}
            <div>
                <span style="font-weight:bold;">Keywords:</span>
                <span>{$article.meta_tags}</span>
            </div>
        {/if}
    </div>
</div>
{literal}
<script type="text/javascript">
    $(document).ready(function(){
        $('a.artdel').click(function(){
           var link = $(this).attr('href');
            jConfirm('Are you sure you want to delete this article?', 'Confirmation Dialog', function(r) {
                if(r == true){
                    window.location.href = link;
                }
                else{
                    return false;
                }
            });
            return false;
        });
        
        $('#cmtpost').click(function(){
            var cmt = $('#comment').val();
            var aid = $('#artid').val();
            var mt = $('#mtype').val();
            var ue = $('#uemail').val();
            var ins = 'insert';
            var dataString = 'cmt='+cmt+'&aid='+aid+'&mt='+mt+'&ue='+ue+'&ins='+ins;
            if(cmt.length == 0)
            {
                alert("You can not post blank comment. Please type your comment.");
                return false;
            }
            if(cmt.length > 2499)
            {
                alert("You can not put more than 2499 characters for comment. Please shorten your comment.");
                return false;
            }
            var aurl = site.url + "/cmtprocess.php";
            
            $.ajax({
                type: "POST",
                url: aurl,
                data: dataString,
                cache: false,
                dataType: "html",
                success: function(response){
                    $("#comlist").fadeIn(400).html(response);
                    $('#comment').val("");
                }
            });
            return false;
        });
        
        $('a#removecmt').click(function(){
            var link = $(this).attr("href");
            var qpos = link.indexOf('?');
            var param = link.substring(qpos + 1);
            var rem = "remove";
            
            var mid = $('#artid').val();
            var mt = $('#mtype').val();
            
            var dataString = param +'&rem='+rem+'&mid='+mid+'&mt='+mt;
            
            var aurl = site.url + "/cmtprocess.php";
            
            $.ajax({
                type: "POST",
                url: aurl,
                data: dataString,
                cache: false,
                dataType: "html",
                success: function(response){
                    $("#comlist").fadeIn(400).html(response);
                }
            });
            return false;
        });
    });
</script>
{/literal}