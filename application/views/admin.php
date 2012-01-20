<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>e-izsole</title>
        <link REL=StyleSheet HREF= <?php echo base_url('application/views/main.css');?> />
<body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <div id="whole_page">
    <div id="top_bar">
        <div id="top_bar_left">
            <?php if ($this->session->userdata("eizsoleuser")!=null) { ?>
            <ul>
		<li>
                    <form method="POST" action="javascript:location.href=document.getElementById('profileDestination').value" id="profile">
                        <select id="profileDestination" onchange="document.forms['profile'].submit();">
                            <option selected="selected" value=<?php echo current_url(); ?>> <?php echo $menu['profile']; ?></option>
                            <?php if ($verificationStatus != 'a') { ?>
                            <option value=<?php echo base_url('formval/inputVerCode') ?>>Enter Verification codes</option>
                            <?php } ?>
                            <option value=<?php echo base_url('user/editUser'); ?>><?php echo $menu['editmyprofile']; ?></option>
                            <option value=<?php echo base_url('main/newItem'); ?>><?php echo $menu['addproduct']; ?></option>
                            <?php if ($userType =='a') { ?>
                            <option value=<?php echo base_url('admin'); ?>><?php echo $menu['admin']; ?></option>
                            <?php }?>
                            <option value=<?php echo base_url('main/myProductForSail'); ?>><?php echo $menu['myproducts']; ?></option>
                            <option value=<?php echo base_url('main/lastTwenyViewed'); ?>><?php echo $menu['lastviewed']; ?></option>
                            <option value=<?php echo base_url('main/logout'); ?>><?php echo $menu['logout']; ?></option>
                        </select>
                    </form>
                    </form>
                
                </li>
            <?php
            echo ("<li id=\"top_username\">Logged in as : "); 
                echo $this->session->userdata("eizsoleusername"); 
                echo ("</li>");
             ?>
                </ul>
                <?php } ?>
        </div>
        <div id="top_bar_right">
            <ul>
                <li>
                  <form method="POST" action=<?php echo base_url('main/upadteLanguage');  ?> id="lang">
                    <select name="languagechoise" id='languagechoise' onchange="document.forms['lang'].submit();">
                        <?php foreach ($languages as $language): ?>
                        <option value=<?php echo $language->title . " "; ?> <?php if ($language->title == $this->session->userdata("language")) { ?>selected='selected'<?php }?> >  <?php  echo $language->title;?> </option>
                        <?php endforeach; ?>
                    </select>
                </form>
                </li>
            </ul>
        </div>
        <div id="clear">
            
        </div>
	</div>
    
        <div id="logo">
            <a  href="<?php echo base_url('main'); ?>"><image src="<?php echo base_url('./application/views/images/newlogo.jpg'); ?>"/></a>
        </div>
        
    <div id="comixzone">
        <p>
            Count of users: <?php echo $usersCount ?>
        </p>
        <p>
            Count of items: <?php echo $itemsCount ?>
        </p>
        <p>
            Change user's type:
        </p>
        <p>
            <?php echo form_open('admin/changeUserType');?>
            username: <input name="username" id="username"/> 
            <select name="type">
                <option value="r">Registered</option>
                <option value="m">Moderator</option>
                <option value="a">Administrator</option>
            </select>
            <input value="Change" type="submit"/>
            </form>
        </p>
        <?php echo form_fieldset();?>
        <p>Send message to all users:</p>
        <?php echo form_open('admin/sendall') ?>
        <p id="subjectBox">
            Subject: <input name="subject" type="text"/>
                
        </p>
        <p id="messageBox">
            Message: <input name="message" type="text" />
        </p>
        <input value="Send" type="submit"/>
        <?php echo form_fieldset_close(); ?>
        </div>
    </div>
</body>
</html>