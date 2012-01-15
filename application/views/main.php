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
    <div id="TopBar" style="display: block; background: grey; ">
        <span id="forRegisteredUser">
		<button>
                My home
                </button>
                <button>
                Add product
                </button>
                <button>
                Last seen
                </button>
                <p style="display:inline">
                    Registered as :
                    <?php echo $this->session->userdata("eizsoleuser"); ?>
                </p>
        </span>
        <button style="float:right;">lang</button>
        <button style="float:right;">curr</button>
	</div>
    
        
	<div id="Kategorijas">
            <ul>
                <?php foreach ($categories as $cat): ?>
                <li><a href="#"><?php echo $cat ?></a></li>
                <?php endforeach;?>
            </ul>
	</div>
        
    <div id="comixzone">
        <?php foreach ($items as $item): ?>
        <div class="item">
            <img 
                src="<?php if ($item['pic']=='none') echo 'images/nope.jpg'; else echo $item['pic']; ?>" 
                />
        <h3><?php echo $item["title"] ?></h3>
        <div class="fb-like" data-href="http://localhost/eizsole" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-action="recommend" data-font="lucida grande"></div>
        <h4><?php echo $item["description"] ?></h4>
        <p><?php echo $item["price"]; ?> Eur  </p>
        <button>apskatīt</button>
        </div>
        <?php endforeach;?>
        </div>
    </div>
</body>
</html>