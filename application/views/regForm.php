<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-izsole: Reģistrācija</title>
        <link REL=StyleSheet HREF= <?php echo base_url('application/views/main.css');?> />
        <link REL=StyleSheet HREF= <?php echo base_url('application/views/userdata.css');?> />
<body>
    



    <div id="whole_page">
    <div id="top_bar">
        <div id="top_bar_left">
            <p>
                <?php echo anchor(base_url('main/'),'main'); ?>
            </p>
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
            <?php echo form_open('formval/regVal');?>
            <?php echo form_fieldset(); echo validation_errors(); ?>
            <table border="0">
                <tr>
                    <td>
                        <p id="formp">Name*:</p>
                        <?php echo form_error('name'); ?>
                    </td>
                    <td>
                        <p id="formp"><input name="name" id="name" value="<?php echo set_value('name'); ?>" type="text"/></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="formp">Surname*:</p>
                        <?php echo form_error('surname'); ?>
                    </td>
                    <td>
                        <p id="formp"><input name="surname" id="surname" value="<?php echo set_value('surname'); ?>" type="text"/></p>
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
                    </td>
                </tr>
                <tr>
                    <td>
                        <p id="formp">Mobile operator:</p>
                    </td>
                    <td>
                        <select id="asd" name="mobile_operator">
                        <option value="1" >LMT</option>
                        <option value="2" >Tele2</option>
                        <option value="3" >Bite</option>
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
                        <?php echo form_error('username'); ?>
                    </td>
                    <td>
                        <p id="formp"><input name="username" id="username" value="<?php echo set_value('username'); ?>" type="text"/></p>
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
                <tr>
                    <td>
                        <p id="formp">Please, retype password*:</p>
                    
                        <?php echo form_error('repassword'); ?>
                    </td>
                    <td> 
                        <p id="formp"><input name="repassword" id="rePassword" type="password"/></p></hr>
                    </td>
                </tr>
            </table>
            <?php echo form_fieldset_close();?>
            <input type="checkbox" id="termsAgreement"/>
            <p id="policy">I have read and accepted the<a href="">User Agreement</a>
                and <a href="">Privacy Policy</a>
            
            <p><input type="submit" value="Sign up"> </p>
            
        </form>
        
        </div>
    </div>
</body>
</html>
