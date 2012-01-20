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
                            <option selected="selected" value=<?php echo current_url(); ?>> <?php echo $menu['profile']; ?></option>
                            <?php if ($verificationStatus != 'a') { ?>
                            <option value=<?php echo base_url('formval/inputVerCode') ?>>Enter Verification codes</option>
                            <?php } ?>
                            <option value=<?php echo base_url('user/editUser'); ?>><?php echo $menu['editmyprofile']; ?></option>
                            <option value=<?php echo base_url('main/newItem'); ?>><?php echo $menu['addproduct']; ?></option>
                            <?php  if ($userType =='a') { ?>
                            <option value=<?php echo base_url('admin'); ?>><?php echo $menu['admin']; ?></option>
                            <?php }?>
                            <option value=<?php echo base_url('main/myProductForSail'); ?>><?php echo $menu['myproducts']; ?></option>
                            <option value=<?php echo base_url('main/lastTwenyViewed'); ?>><?php echo $menu['lastviewed']; ?></option>
                            <option value=<?php echo base_url('main/logout'); ?>><?php echo $menu['logout']; ?></option>
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
                <form method="POST" action=<?php echo base_url('main/upadteLanguage');  ?> id="lang">
                    <select name="languagechoise" id='languagechoise' onchange="document.forms['lang'].submit();">
                        <?php foreach ($languages as $language): ?>
                        <option value=<?php echo $language->title . " "; ?> <?php if ($language->title == $this->session->userdata("language")) { ?>selected='selected'<?php }?> >  <?php  echo $language->title;?> </option>
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
