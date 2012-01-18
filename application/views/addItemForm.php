<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-izsole: Reģistrācija</title>
        <link REL=StyleSheet HREF= <?php echo base_url('application/views/main.css');?> />
<body>
    
<?php //var_dump($this->session->userdata) ?>

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
                            <?php var_dump($userType); if ($userType =='a') { ?>
                            <option value=<?php echo base_url('main/newItem'); ?>>Admin</option>
                            <?php }?>
                            <option value=<?php echo base_url(); ?>>Last Seen</option>
                            <option value=<?php echo base_url('main/logout'); ?>>Logout</option>
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
    
        
	
        
        <div id="comixzone_reg">
            <?php echo validation_errors(); ?>
            <?php echo form_open('formval/itemVal');?>
            <p id="formp">Item title*:</p>
            <?php echo form_error('title'); ?>
            <p id="formp"><input name="title" id="title" size="30" value="<?php echo set_value('title'); ?>" type="text"/></p>
            <p id="formp">Short description*:</p>
            <?php echo form_error('short_description'); ?>
            <p id="formp"><input name="short_description" id="short_description" size="30" value="<?php echo set_value('short_description'); ?>" type="text"/></p>
            <p id="formp">Descrition*:</p>
            <?php echo form_error('description'); ?>
            <textarea name="description" id="description" size="30" value="<?php echo set_value('description'); ?>" rows="10" cols="60"></textarea>
            <p id="formp">Photo:</p>
            <p id="formp"><input name="photo" id="photo" size="30" type="file"/></p>
            <p id="formp">Auction (check, if yes): <input name="auction" id="auction" value="<?php echo set_value('auction'); ?>" type="checkbox"/></p>
            <p id="formp">Price*:</p>
            <?php echo form_error('price'); ?>
            <p id="formp"><input name="price" id="price" size="30" value="<?php echo set_value('price'); ?>" type="text"/></p>
            <p id="formp">Category:</p>
            <select name="category" id="category">
            <?php foreach ($categories as $cat): ?>
            <option value="<?php echo $cat->id; ?>"><?php echo $cat->title; ?></option>
            <?php endforeach; ?>
            </select>
            <input name="seller_ID" value="<?php echo $this->session->userdata('eizsoleuser') ?>" type="hidden"/>
            <br/><br/>
            <input type="checkbox" id="termsAgreement"/>
            <p id="policy">I have read and accepted the<a href="">User Agreement</a>
                and <a href="">Privacy Policy</a>
            
            <p><input type="submit" value="Add new Item"> </p>
            
        </form>
        
        </div>
    </div>
</body>
