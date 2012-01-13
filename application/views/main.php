<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>e-izsole</title>
        <LINK REL=StyleSheet HREF="main.css" TYPE="text/css"></link>
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
                    <?php echo $_SESSION["eizsoleuser"]; ?>
                </p>
        </span>
        <button style="float:right;">lang</button>
        <button style="float:right;">curr</button>
	</div>
    <span style="width:auto; background:#9999ff; margin:20% 20%; height:100%;" >
        
	<div id="Menu" style="display: block; ">
		Menu
                
	</div>
	<div id="Kategorijas" style="display: inline; ">
		kategorijas
	</div>
	<div id="Main" style="display: inline; ">
		main
	</div>
    </span>
</body>
</html>