<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-izsole</title>
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
            <ul>
		<li>
                My home
                </li>
                <li>
                Add product
                </li>
                <li>
                Last seen
                </li>
            <?php if ($this->session->userdata("eizsoleuser")!=null) { 
            echo ("<li id=\"top_username\">Logged in as : "); 
                echo $this->session->userdata("eizsoleusername"); 
                echo anchor('main/logout','   logout'); 
                echo ("</li>");
             } ?>
                </ul>
        </div>
        <div id="top_bar_right">
            <ul>
            <li>lang</li>
            <li>curr</li>
            </ul>
        </div>
        <div id="clear">
            
        </div>
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
        
        <?php foreach ($items as $item): ?>
        <div class="item">
            <img 
                src="<?php if ($item->photo==null) echo base_url('images/nope.jpg'); else echo $item->photo; ?>" 
                />
            <div class="description">
                <h3><?php echo anchor('main/item/' . $item->id, $item->title);?></h3>
                <div class="fb-like" data-href="http://localhost/e-izsole-development" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-action="recommend" data-font="lucida grande"></div>
                <h4><?php echo $item->description ?></h4>
                <p><?php echo $item->price; ?> Eur  </p>
            </div>
        </div>
        <?php endforeach;?>
        </div>
    </div>
</body>
</html>