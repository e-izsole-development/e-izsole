<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>e-izsole</title>
        <link REL=StyleSheet HREF="/e-izsole-development/application/views/main.css"/>
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
                            <option value=<?php echo base_url(); ?>>Last Seen</option>
                            <option value=<?php echo base_url('main/logout'); ?>>logout</option>
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
    
        
	<div id="Kategorijas">
            <ul>
                <li><a href=<?php echo site_url('main/'); ?> >All</a></li>
                <?php foreach ($categories as $cat): ?>
                <li><a href=<?php echo site_url('main/category/' . $cat->id); ?> ><?php echo $cat->title ?></a></li>
                <?php endforeach;?>
            </ul>
	</div>
        
    <div id="comixzone">
        
        
        <div id="leftzone">
            
                <?php if ($item->photo==null) echo "<img src=\"" . base_url('images/nope.jpg') . ' "/>'; 
                else echo '<a href="' . base_url('application/views/images/Uploads/' . $item->photo . '.jpg') . '" >' .
                        '<img src="' . base_url('application/views/images/Uploads/' . $item->photo . '_thumb.jpg') . '" /></a>'; ?> 
                
            <h1><?php echo $item->title ?></h1>
            <div class="fb-like" data-href="http://localhost/eizsole" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-action="recommend" data-font="lucida grande"></div>
        </div>
        <div id="rightzone">
            <p><?php echo $item->description ?></p>
            <table>
            <?php foreach ($item->parameters as $parameter): ?>
                <tr>
                    <td>
                        <?php echo $parameter->title ?>
                    </td>
                    <td>
                        <?php echo $parameter->value ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
        </div>
    </div>
    </div>
</body>
</html>