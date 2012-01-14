<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>e-izsole</title>
        <LINK REL=StyleSheet HREF="application/views/main.css" TYPE="text/css"></link>
<body>
    

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
        
        </div>
    </div>
</body>
</html>