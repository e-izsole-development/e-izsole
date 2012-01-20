<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-izsole: Reģistrācija</title>
        <link REL=StyleSheet HREF= <?php echo base_url('application/views/main.css');?> />
<body>
    



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
    
        
	<div id="logo">
            <a  href="<?php echo base_url('main'); ?>"><image src="<?php echo base_url('./application/views/images/newlogo.jpg'); ?>"/></a>
        </div>
        
        <div id="comixzone_reg">
            <p>Successfully done!</p>
            <a href="<?php echo base_url("") ?>">Home</a>
        
        </div>
    </div>
</body>
</html>

