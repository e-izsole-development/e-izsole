<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>e-izsole</title>
        <link REL=StyleSheet HREF= <?php echo base_url('application/views/main.css'); ?> />
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
                            <option selected="selected" value=<?php echo current_url(); ?>> <?php echo $this->lang->line('profile'); ?></option>
                            <option value=<?php echo base_url('user/editUser'); ?>><?php echo $this->lang->line('editmyprofile'); ?></option>
                            <option value=<?php echo base_url('main/newItem'); ?>><?php echo $this->lang->line('addproduct'); ?></option>
                            <?php var_dump($userType); if ($userType =='a') { ?>
                            <option value=<?php echo base_url('admin'); ?>><?php echo $this->lang->line('admin'); ?></option>
                            <?php }?>
                            <option value=<?php echo base_url('main/myProductForSail'); ?>><?php echo $this->lang->line('myproducts'); ?></option>
                            <option value=<?php echo base_url('main/lastTwenyViewed'); ?>><?php echo $this->lang->line('lastviewed'); ?></option>
                            <option value=<?php echo base_url('main/logout'); ?>><?php echo $this->lang->line('logout'); ?></option>
                        </select>
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
                <form method="POST" action=<?php echo current_url(); ?> id="lang">
                    <select name="currency" onchange="document.forms['curr'].submit();">
                        <?php foreach ($languages as $language): ?>
                        <option value=<?php echo $language->id . " "; ?> <?php if ($language->title == $this->session->userdata("language")) { ?>selected='selected'<?php }?> > <?php echo $language->title;?> </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </li>
            <li>
                <form method="POST" action=<?php echo current_url(); ?> id="curr">
                    <select name="currency" onchange="document.forms['curr'].submit();">
                        <?php foreach ($currency as $curr): ?>
                        <option value=<?php echo $curr->id . " "; ?> <?php if ($curr->id == $this->session->userdata("eizsolecurr")) { ?>selected='selected'<?php }?> > <?php echo $curr->id;?> </option>
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
            <a  href="<?php echo base_url('main'); ?>"><image src="<?php echo base_url('images/logo.jpg'); ?>"/></a>
        </div>
    </div>
</body>
</html>
