<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8"/>
	<title>Reports</title>
        <link REL=StyleSheet HREF="/e-izsole-development/application/views/main.css"/>
</head>
<body>
    <div id="whole_page">
      <div id="top_bar_left">
		<button>
                My home
                </button>
                <button>
                Add product
                </button>
                <button>
                Last seen
                </button>
                <p id="top_username">Registered as : <?php echo $this->session->userdata("eizsoleuser"); ?></p>
        </div>
            <div id="top_bar_right">
                <button>lang</button>
                <button>curr</button>
            </div> 
        <div id="logo">
            <a  href="<?php echo base_url('main'); ?>"><image src="<?php echo base_url('images/logo.jpg'); ?>"/></a>
        </div>
        <div id="comixzone">
        
        <?php foreach ($items as $item): ?>
        <div class="item">
            <img 
                src="<?php if ($item->photo==null) echo 'images/nope.jpg'; else echo $item->photo; ?>" 
                />
            <div class="description">
                <h3><?php echo anchor('index.php/main/item/' . $item->id, $item->title);?></h3>
                <div class="fb-like" data-href="http://localhost/eizsole" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-action="recommend" data-font="lucida grande"></div>
                <h4><?php echo $item->description ?></h4>
                <p><?php echo $item->price; ?> Eur  </p>
            </div>
        </div>
        <?php endforeach;?>
        </div>
    </div>
    
</body>
</html>
