<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>e-izsole</title>
        <LINK REL=StyleSheet HREF="../../../application/views/main.css" TYPE="text/css"/>
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
        <div id="forRegisteredUser">
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
        </div>
        <button style="float:right;">lang</button>
        <button style="float:right;">curr</button>
	</div>
    
        
	<div id="Kategorijas">
            <ul>
                <?php foreach ($categories as $cat): ?>
                <li><a href="#"><?php echo $cat->title ?></a></li>
                <?php endforeach;?>
            </ul>
	</div>
        
    <div id="comixzone">
        
        <h1><?php echo $item->title ?></h1>
        <div id="leftzone">
            <img 
                src="<?php if ($item->photo==null) echo 'images/nope.jpg'; else echo $item->photo; ?>" 
                />
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