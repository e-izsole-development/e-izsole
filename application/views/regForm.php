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
    
        
	
        
        <div id="comixzone_reg">
            <?php echo validation_errors(); ?>
            <?php echo form_open('formval/regVal');?>
            <p id="formp">Name*:</p>
            <?php echo form_error('name'); ?>
            <p id="formp"><input name="name" id="name" value="<?php echo set_value('name'); ?>" type="text"/></p>
            <p id="formp">Surname*:</p>
            <?php echo form_error('surname'); ?>
            <p id="formp"><input name="surname" id="surname" value="<?php echo set_value('surname'); ?>" type="text"/></p>
            <p id="formp">Country*:</p>
            <?php echo form_error('country'); ?>
            <p id="formp"><input name="country" id="country" value="<?php echo set_value('country'); ?>" type="text"/></p>
            <p id="formp">City*:</p>
            <?php echo form_error('city'); ?>
            <p id="formp"><input name="city" id="city" value="<?php echo set_value('city'); ?>" type="text"/></p>
            <p id="formp">Address*:</p>
            <?php echo form_error('address'); ?>
            <p id="formp"><input name="address" id="address" value="<?php echo set_value('address'); ?>" type="text"/></p>
            <p id="formp">Phone number:</p>
            <p id="formp"><input name="phone_number" id="phone_number" value="<?php echo set_value('phone_number'); ?>" type="text"/></p>
            <p id="formp">Mobile operator:</p>
            <select id="asd">
            <option value="1">LMT</option>
            <option value="2">Tele2</option>
            <option value="3">Bite</option>
            </select>
            <p id="formp">E-mail*:</p>
            <?php echo form_error('e_mail'); ?>
            <p id="formp"><input name="e_mail" id="e_mail" value="<?php echo set_value('e_mail'); ?>" type="text"/></p><hr/>
            <p id="formp">Username*:</p>
            <?php echo form_error('username'); ?>
            <p id="formp"><input name="username" id="username" value="<?php echo set_value('username'); ?>" type="text"/></p>
            <p id="formp">Password*:</p>
            <?php echo form_error('password'); ?>
            <p id="formp"><input name="password" id="password" type="password"/></p>
            <p id="formp">Please, retype password*:</p>
            <?php echo form_error('repassword'); ?>
            <p id="formp"><input name="repassword" id="rePassword" type="password"/></p></hr>
            <input type="checkbox" id="termsAgreement"/>
            <p id="policy">I have read and accepted the<a href="">User Agreement</a>
                and <a href="">Privacy Policy</a>
            
            <p><input type="submit" value="Sign up"> </p>
            
        </form>
        
        </div>
    </div>
</body>
</html>
