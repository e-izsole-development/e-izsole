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

 <?php $this->lang->load('main', $this->session->userdata("language")); ?>

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
                            <?php var_dump($userType); if ($userType =='a') { ?>
                            <option value=<?php echo base_url('admin'); ?>><?php echo $menu['admin']; ?></option>
                            <?php }?>
                            <option value=<?php echo base_url('main/myProductForSail'); ?>><?php echo $menu['myproducts']; ?></option>
                            <option value=<?php echo base_url('main/lastTwenyViewed'); ?>><?php echo $menu['lastviewed']; ?></option>
                            <option value=<?php echo base_url('main/logout'); ?>><?php echo $menu['logout']; ?></option>
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
                    <select name="languagechoise" id='languagechoise' onchange="document.forms['lang'].submit();">
                        <?php foreach ($languages as $language): ?>
                        <option value=<?php echo $language->title . " "; ?> <?php if ($language->title == $this->session->userdata("language")) { ?>selected='selected'<?php }?> >  <?php  echo $language->title;?> </option>
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
            <a  href="<?php echo base_url('main'); ?>"><image src="<?php echo base_url('./application/views/images/newlogo.jpg'); ?>"/></a>
        </div>
        
	<div id="Kategorijas">
            <ul>
                <li><a href=<?php echo site_url('main/'); ?> > <?php echo $kategory['all']; ?></a></li>
                <?php foreach ($categories as $cat): ?>
                <li><a href=<?php echo site_url('main/category/' . $cat->id); ?> ><?php echo $kategory[$cat->title]; ?></a></li>
                <?php endforeach;?>
            </ul>
	</div>
        
   <?php if ($this->session->userdata("eizsoleuser")==null){ ?>
    <div id="LoginDiv">
        <?php echo form_open('main/login');?>
            <p> <?php echo $login['user']; ?></p>
            <p><input name="login" id="login" type="text"/></p>
            <p><?php echo $login['pasword']; ?></p>
            <p><input name="password" id="password" type="password"/></p>
            <p><input type="submit" value="<?php echo $login['login']; ?>"> </p>
            <!-- <button onClick="Location: href = <?php //echo base_url('../user/goToRegView'); ?>">Sign up</button> -->
            <a href ="<?php echo base_url('user/register') ?>"><?php echo $login['singup']; ?></a>
        </form>
    </div> 
   <?php } ?>
    </div>
</body>
</html>
