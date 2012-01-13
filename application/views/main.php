<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>e-izsole</title>
        <LINK REL=StyleSheet HREF="application/views/main.css" TYPE="text/css"></link>
<body>
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
                <li>dot at list</li>
                <li>second item</li>
                <li>this is SPARTAAAAAA!!!</li>
                <li>it's over NINE THOUSAAAAAAAAAAND persians</li>
            </ul>
	</div>
        
    <div id="comixzone">
            
        <h1>Don't worry it's just a test !!!</h1>
        <h2>If you think, that this is h2, than you better know- it's a lie!! You can check it</h2>
        <h3>But this sure iss h3 !</h3>
        
        <p>paragraph tag is here with purpose</p>
        <pre>as well as pre
        second line of pre
        third line of pre</pre>
            
        </div>
</body>
</html>