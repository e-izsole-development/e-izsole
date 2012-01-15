<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>e-izsole</title>
        <link REL=StyleSheet HREF="application/views/main.css"/>
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
		<button>
                My home
                </button>
                <button>
                Add product
                </button>
                <button>
                Last seen
                </button>
                <p id="top_username">Registered as : <?php echo $this->session->userdata("eizsoleuser"); ?></p>
        </div>
        <div id="top_bar_right">
        <button>lang</button>
        <button>curr</button>
        </div>
	</div>
    
        
	<div id="Kategorijas">
            <ul>
                <?php foreach ($categories as $cat): ?>
                <li><a href="#"><?php echo $cat->title ?></a></li>
                <?php endforeach;?>
            </ul>
	</div>
        
   <?php if (TRUE){ ?>
    <div id="LoginDiv">
        <form method="post" accept-charset="utf-8" action="login" id="LogInToSystem">
            <p>Login:</p>
            <p><input name="login" id="login" type="text"/></p>
            <p>Pasword:</p>
            <p><input name="pasword" id="pasword" type="text"/></p>
            <p><input type="submit" value="Login"></p>
        </form>
    </div> 
   <?php } ?>
        
    <div id="comixzone">
        
        <?php foreach ($items as $item): ?>
        <div class="item">
            <img 
                src="<?php if ($item->photo==null) echo 'images/nope.jpg'; else echo $item->photo; ?>" 
                />
            <div class="description">
                <h3><?php echo anchor('main/item/' . $item->id, $item->title);?></h3>
                <div class="fb-like" data-href="http://localhost/eizsole" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-action="recommend" data-font="lucida grande"></div>
                <h4><?php echo $item->description ?></h4>
                <p><?php echo $item->price; ?> Eur  </p>
            </div>
        </div>
        <?php endforeach;?>
        </div>
    </div>
</body>
</html>