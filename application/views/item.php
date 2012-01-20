   <div id="comixzone">
        
        
        <div id="leftzone">
            
                <?php if ($item->photo==null) echo "<img src=\"" . base_url('images/nope.jpg') . ' "/>'; 
                else echo '<a href="' . base_url('application/views/images/Uploads/' . $item->photo . '.jpg') . '" >' .
                        '<img src="' . base_url('application/views/images/Uploads/' . $item->photo . '_thumb.jpg') . '" /></a>'; ?> 
            <h1><?php echo $item->title ?></h1>
            <b><p id="itemPrice">Price: <?php echo number_format(($item->price * $currencyIndex[$this->session->userdata("eizsolecurr")]),2); echo " " . $this->session->userdata("eizsolecurr"); ?></p></b>
            <div class="fb-like" data-href="http://localhost/eizsole" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-action="recommend" data-font="lucida grande"></div>
        </div>
        <div id="rightzone">
            <p><?php echo $item->description ?></p>
            <table>
            <?php foreach ($item->parameters as $parameter): ?>
                <tr>
                    <td>
                        <?php echo $parameter->title ?>
                    </td>
                    <td>
                        <?php echo $parameter->value ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
        </div>
        <?php echo form_open('main/bidVal/'.$item->id); ?>
               <p>Place new bid:</p>
               <?php if (isset($bidError))
                   echo '<p id="error">' . $bidError . '</p>';?>
               <input name="old_bid" value="<?php echo number_format(($item->price * $currencyIndex[$this->session->userdata("eizsolecurr")]),2); ?>" type="hidden"/>
               <input name="new_bid" id="new_bid" size ="10" type="text"/>
               <input type="submit" value="Confirm"/>
           </form>
    </div>
