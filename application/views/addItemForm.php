
	<title>E-izsole: Add New Item for Sale</title>

<?php error_reporting(0); ?>	
        
        <div id="comixzone_reg">
            <?php echo validation_errors();?>
            <?php echo $error;?>
            <?php echo form_open_multipart('formval/itemVal');?>
            <p id="formp">Item title*:</p>
            <?php echo form_error('title'); ?>
            <p id="formp"><input name="title" id="title" size="30" value="<?php echo set_value('title'); ?>" type="text"/></p>
            <p id="formp">Short description*:</p>
            <?php echo form_error('short_description'); ?>
            <p id="formp"><input name="short_description" id="short_description" size="30" value="<?php echo set_value('short_description'); ?>" type="text"/></p>
            <p id="formp">Descrition*:</p>
            <?php echo form_error('description'); ?>
            <textarea name="description" id="description" size="30" value="<?php echo set_value('description'); ?>" rows="10" cols="60"></textarea>
            
           <p id="formp">Photo (.jpg only):</p>
           <p id="formp"><input name="userfile" id="photo" size="30" type="file"/></p>
            
            
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
