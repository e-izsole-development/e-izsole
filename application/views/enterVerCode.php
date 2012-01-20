<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-izsole</title>
        <link REL=StyleSheet HREF= <?php echo base_url('application/views/main.css');?> />
        <link REL=StyleSheet HREF= <?php echo base_url('application/views/userdata.css');?> />
<body>
    



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
    
        
	<div id="logo">
            <a  href="<?php echo base_url('main'); ?>"><image src="<?php echo base_url('images/logo.jpg'); ?>"/></a>
        </div>
        
        <div id="comixzone_reg">
        <?php echo form_open('formval/checkPhoneCode');?>
            
            <?php echo form_fieldset();?>
            <table>
                <tr>
                    <td>
                        <p id="formp">Phone verification code:</p>
                    </td>
                    <td>
                        <p id="formp"><input name="code" id="country" value="<?php echo set_value('country'); ?>" type="text"/></p>
                    </td>
                </tr>
            </table>
            <p><input type="submit" value="Save"> </p>
            <?php echo form_fieldset_close();?>
        </form>
        <?php echo form_open('formval/checkEmailCode');?>
            
            <?php echo form_fieldset();?>
            <table>
                <tr>
                    <td>
                        <p id="formp">E-mail verification code:</p>
                    </td>
                    <td>
                        <p id="formp"><input name="code" id="country" value="<?php echo set_value('country'); ?>" type="text"/></p>
                    </td>
                </tr>
            </table>
            <p><input type="submit" value="Save"> </p>
            <?php echo form_fieldset_close();?>
        </form>
            
            
            
            
        
        
        </div>
    </div>
</body>
</html>
