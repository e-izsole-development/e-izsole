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
            <a  href="<?php echo base_url('main'); ?>"><image src="<?php echo base_url('./application/views/images/newlogo.jpg'); ?>"/></a>
        </div>
        
        <div id="comixzone_reg">
            <?php echo form_open('formval/editVal');?>
            <?php echo form_fieldset(); echo validation_errors(); ?>
            <table border="0">
                <tr>
                    <td>
                        <p id="formp">Name*:</p>
                       
                    </td>
                    <td>
                        <p id="formp"><?php echo $names->name; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="formp">Surname*:</p>
                        
                    </td>
                    <td>
                        <p id="formp"><?php echo $names->surname; ?></p>
                    </td>
            </table>
            <?php echo form_fieldset_close(); echo form_fieldset();?>
            <table>
                <tr>
                    <td>
                        <p id="formp">Country*:</p>
                        <?php echo form_error('country'); ?>
                    </td>
                    <td>
                        <p id="formp"><input name="country" id="country" value="<?php echo set_value('country'); ?>" type="text"/></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="formp">City*:</p>
                        <?php echo form_error('city'); ?>
                    </td>
                    <td>
                        <p id="formp"><input name="city" id="city" value="<?php echo set_value('city'); ?>" type="text"/></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="formp">Address*:</p>
                        <?php echo form_error('address'); ?>
                    </td>
                    <td>
                        <p id="formp"><input name="address" id="address" value="<?php echo set_value('address'); ?>" type="text"/></p>
                    </td>
                </tr>
            </table>
            <?php echo form_fieldset_close(); echo form_fieldset();?>
            <table>
                <tr>
                    <td>
                        <p id="formp">Phone number:</p>
                    </td>
                    <td>
                        <p id="formp"><input name="phone_number" id="phone_number" value="<?php echo set_value('phone_number'); ?>" type="text"/></p>
                        <p>
                            (For LMT users it is an <a href="http://www.lmt.lv/lat/abonentiem/pakalpojumi/iszinu_pakalpojumi/sms_no_interneta/sms_no_interneta_identifikators">LMT ID</a>)
                            Number(or ID) should be activated, if you want to subscribe for news, warnings, requests and so on... Usually it costs as one simple SMS. (you should pay only once)
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="formp">Mobile operator:</p>
                    </td>
                    <td>
                        <select id="asd" name="mobile_operator">
                        <option value="1">LMT</option>
                        <option value="2">Tele2</option>
                        <option value="3">Bite</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="formp">E-mail*:</p>
                        <?php echo form_error('e_mail'); ?>
                    </td>
                    <td>
                        <p id="formp"><input name="e_mail" id="e_mail" value="<?php echo set_value('e_mail'); ?>" type="text"/></p>
                    </td>
                </tr>
            </table>
            <?php echo form_fieldset_close(); echo form_fieldset();?>
            <table>
                <tr>
                    <td>
                        <p id="formp">Username*:</p>
                       
                    </td>
                    <td>
                        <p id="formp"><?php echo $names->username; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="formp">New Password:</p>
                        <?php echo form_error('newpassword'); ?>
                    </td>
                    <td>
                        <p id="formp"><input name="newpassword" id="password" type="password"/></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="formp">Please, retype password:</p>
                    
                        <?php echo form_error('repassword'); ?>
                    </td>
                    <td> 
                        <p id="formp"><input name="repassword" id="rePassword" type="password"/></p></hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="formp">Password*:</p>
                        <?php echo form_error('password'); ?>
                    </td>
                    <td>
                        <p id="formp"><input name="password" id="password" type="password"/></p>
                    </td>
                </tr>
            </table>
            <?php echo form_fieldset_close();?>
            
            
            <p><input type="submit" value="Save"> </p>
            
        </form>
        
        </div>
    </div>
</body>
</html>
