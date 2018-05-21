<?php 



/**	
 * 
 */
namespace Inc\Base;

 use \Inc\Api\DatabaseApi;

class Frontend extends BaseController
{

function register (){
add_action ('wp_footer',array($this, 'render'));	
}
function render() {
	
 	$fmdb = new DatabaseApi;
 	$params =  $fmdb->getParams();

  $temp =  $params["shape"] ? "fm-square" : "fm-circle";
	$class = "fm-icon-position $temp";
	$temp =  $params["menu-position"] ? "	right:50px;" : "left:50px;";
	$fm_wrapper_style = $temp."font-size:".$params["font-size"]."; color:".$params["font-color"].";"; 

	$icon_style= "border-color:".$params["border-color"]."; background-color:".$params["bg-color"].";";

	
	?>
	<div class="fm-wrapper unselectable" style="<?php echo $fm_wrapper_style;?>">
		<input type="hidden"  name="duration" value="<?php echo   $params["duration"]; ?>">
<?php


   	if ($params["iswpmenu"]==1) 
$wp_items = wp_get_nav_menu_items( $params["wpmenu-slug"]);
   else 
$wp_items =$fmdb->getParamsItems();
   
 //for ($i=0; $i<6; $i++) {
 $i=0;
 if ($wp_items!=false)
   	foreach ($wp_items as $key => $item) {

	switch ($params["structure"]) {
		case '0':
		  $items_style="position:absolute; left:15px; bottom:".(65+$params["margin"]+$i*(50+$params["margin"]))."px;" ;
			break;
		case '1':
		$t = 75+$params["margin"];
		if ($params["menu-position"]==1) {$k = -1; $t=45+$params["margin"];} else $k=1;
		$items_style="position:absolute; bottom:5px; left:".$k*($t+$i*($params["margin"]+50))."px;" ;
			break;
		case '2':
$items_length = 90+80*intdiv($i,3);
$x_items=intval(sin(deg2rad($i%3*45+90*$params["menu-position"]))*	$items_length)+5;
$y_items=intval(cos(deg2rad($i%3*45+90*$params["menu-position"]))*	$items_length)+15;
$items_style="position:absolute; bottom:".$x_items."px; left:".$y_items."px;";
			break;
		default:
	  $items_style="position:absolute; left:15px; bottom:".(75+$i*60)."px;" ;
			break;
	}

//	


	?>
<a href="	<?php echo $item->url; ?>" style="color:<?php echo $params["font-color"]; ?>;"><div id="fm-item<?php echo $i; ?>" class="fm-items <?php echo $class ?>" style="<?php echo $icon_style." ".$items_style;?>">
	
			<?php 
	if (($params["iswpmenu"]==0) && ($item->icon ==1)) echo '<span id="af3" class="'.$item->iconaf.'"> </span>'; else 
			echo mb_substr($item->title,0, 1, "UTF-8");

			 ?>
</div></a>
<?php
$i++; }?>


<div id="fm-megabutton" class="<?php echo $class ?>" style="<?php echo $icon_style ?>">
<span id="fm-megacontent"><span id="megafont" class=" unselectable <?php echo $params["icon"] ? $params["icon-awesome"]:''; ?>"><?php echo !$params["icon"]? $params["symbol"]:''; ?></span> <span id="megaclose" class="unselectable">X</span></span>	
</div>
</div>
	<?php
}
}