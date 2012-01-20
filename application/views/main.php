    <div id="comixzone">
        
        <?php echo anchor("inform/mail", "get mail") ?>
        
        <?php echo form_open('main/search');?>
        <input name="parameters" id="searchinput" type="text"/>
        <input value="Find" type="submit"/>
        </form>
        <?php foreach ($items as $item): ?>
        <div class="item">
            <img 
                src="<?php if ($item->photo==null) echo base_url('images/nope.jpg'); else echo base_url('application/views/images/Uploads/' . $item->photo . '_thumb.jpg'); ?>" 
                />
            <div class="description">
                <h3><?php echo anchor('main/item/' . $item->id, $item->title);?></h3>
                <div class="fb-like" data-href="<?php echo base_url('main/item/'.$item->id); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-action="recommend" data-font="lucida grande"></div>
                <h4><?php echo $item->short_description ?></h4>
                <b><p id="itemPrice"><?php echo number_format(($item->price * $currencyIndex[$this->session->userdata("eizsolecurr")]),2); echo " " . $this->session->userdata("eizsolecurr");?> </p></b>
            </div>
        </div>
        <?php endforeach;?>
        </div>
    </div>
