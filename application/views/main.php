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
                            <option selected="selected" value=<?php echo current_url(); ?>>Profile</option>
                            <option value=<?php echo base_url('user/editUser'); ?>>Edit my profile</option>
                            <option value=<?php echo base_url('main/newItem'); ?>>Add Product</option>
                            <?php var_dump($userType); if ($userType =='a') { ?>
                            <option value=<?php echo base_url('admin'); ?>>Admin</option>
                            <?php }?>
                            <option value=<?php echo base_url(); ?>>Last Seen</option>
                            <option value=<?php echo base_url('main/logout'); ?>>Logout</option>
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
                    <select name="language" onchange="document.forms['lang'].submit();">
                        <option value="1">LV</option>
                        <option value="2">EN</option>
                        <option value="3">RU</option>
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
        
	<div id="Kategorijas">
            <ul>
                <li><a href=<?php echo site_url('main/'); ?> >All</a></li>
                <?php foreach ($categories as $cat): ?>
                <li><a href=<?php echo site_url('main/category/' . $cat->id); ?> ><?php echo $cat->title ?></a></li>
                <?php endforeach;?>
            </ul>
	</div>
        
   <?php if ($this->session->userdata("eizsoleuser")==null){ ?>
    <div id="LoginDiv">
        <?php echo form_open('main/login');?>
            <p>Login:</p>
            <p><input name="login" id="login" type="text"/></p>
            <p>Pasword:</p>
            <p><input name="password" id="password" type="password"/></p>
            <p><input type="submit" value="Login"> </p>
            <!-- <button onClick="Location: href = <?php //echo base_url('../user/goToRegView'); ?>">Sign up</button> -->
            <a href ="<?php echo base_url('user/register') ?>">Sign up</a>
        </form>
    </div> 
   <?php } ?>

        
    <div id="comixzone">
        <?php echo form_open('main/search');?>
        <input name="parameters" id="searchinput" type="text"/>
        <input value="Find" type="submit"/>
        </form>
        <?php foreach ($items as $item): ?>
        <div class="item">
            <img 
                src="<?php if ($item->photo==null) echo base_url('images/nope.jpg'); else echo $item->photo; ?>" 
                />
            <div class="description">
                <h3><?php echo anchor('main/item/' . $item->id, $item->title);?></h3>
                <div class="fb-like" data-href="http://localhost/eizsole" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-action="recommend" data-font="lucida grande"></div>
                <h4><?php echo $item->short_description ?></h4>
                <p><?php echo ($item->price * $currencyIndex[$this->session->userdata("eizsolecurr")]); echo " " . $this->session->userdata("eizsolecurr");?> </p>
            </div>
        </div>
        <?php endforeach;?>
        </div>
    </div>
</body>
</html>