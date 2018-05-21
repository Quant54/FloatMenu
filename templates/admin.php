<?php 
use \Inc\Api\DatabaseApi;
$fmdb = new DatabaseApi;
$params =  $fmdb->getParams();
global $user_ID;
if( user_can( $user_ID, 'manage_options') ){
$ajax_nonce = wp_create_nonce( "my-special-string" );
var_dump($ajax_nonce);

?>

<div class="wrap">
	<h1>Quant Plugin</h1>
<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible" style="display:none;"> 
<p><strong>Settings saved.</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Hide notification.</span></button></div>

<table class="form-table">
<tr>
	<th>Structure:</th>
	<td>
    <p><label><input name="structure" type="radio" value="0" <?php echo  $params["structure"]=="0" ? "checked" : ''  ?> >Vertical line</label></p>
    <p><label><input name="structure" type="radio" value="1" <?php echo $params["structure"]=="1" ?  "checked" : ''  ?> >Horizontal line</label></p>
    <p><label><input name="structure" type="radio" value="2" <?php echo $params["structure"]=="2" ?  "checked" : ''  ?> >Tree</label></p>
	</td>
</tr>

<tr>
	<th>Shape:</th>
	<td>
    <p><label><input name="shape" type="radio" value="0" <?php echo  $params["shape"]=="0" ? "checked" : ''  ?> >Circle</label></p>
    <p><label><input name="shape" type="radio" value="1" <?php echo $params["shape"]=="1" ?  "checked" : ''  ?> >Square</label></p>
	</td>
</tr>
<tr>
	<th>Position:</th>
	<td>
    <p><label><input name="menu-position" type="radio" value="0" <?php echo  $params["menu-position"]=="0" ? "checked" : ''  ?> >Left</label></p>
    <p><label><input name="menu-position" type="radio" value="1" <?php echo $params["menu-position"]=="1" ?  "checked" : ''  ?> >Right</label></p>
	</td>
</tr>
<tr>
	<th>Main icon:</th>
	<td>
    <p><label><input name="icon" type="radio" value="0" <?php echo  $params["icon"]=="0" ? "checked" : ''  ?> >Custom: </label>
    	<input maxlength="1" type="text" name="symbol" size="1" value="<?php echo  $params["symbol"]; ?>"/></p>
    <p>	
    	<label><input name="icon" type="radio" value="1" <?php echo $params["icon"]=="1" ?  "checked" : ''  ?> >Awesome: 
    	<span id="af" class="fa fa-address-book-o" /> </span> (*click it to choose an icon)
    	</label>
    </p>
	</td>
</tr>
<tr>
	<th>Choose from existing WP menu or Custom menu: 

</th>
	<td>
    <p>
<input name="iswpmenu" type="radio" value="1" <?php echo  $params["iswpmenu"]=="1" ? "checked" : ''  ?> >
    	<label>
<select  id="wpmenu-slug">
	<?php 	$menus = get_terms('nav_menu');
foreach ($menus as $key => $value) {
		$selected = "";
			if ($params["wpmenu-slug"] ==$value->slug) $selected = "selected";
echo '<option value="'.$value->slug.'" '.$selected.'>'.$value->name.'</option>';
}
 ?>

</select>
    </label></p>
  
    <?php
$re =  $fmdb->getParamsItems();



?>
<input name="iswpmenu" type="radio" value="0" <?php echo  $params["iswpmenu"]=="0" ? "checked" : ''  ?> >

<table id="menuitems-table" class="widefat " cellspacing="0">
    <thead>
    <tr>

         <th id="columnname" class="manage-column column-columnname" scope="col">ID</th>
            <th id="columnname" class="manage-column column-columnname" scope="col">Symbol</th>
            <th id="columnname" class="manage-column column-columnname " scope="col">AF</th> 
            <th id="columnname" class="manage-column column-columnname" scope="col">URL</th> 
            <th id="columnname" class="manage-column column-columnname" scope="col">Action</th> 

    </tr>
    </thead>


    <tbody>
    	<?php foreach ($re as $key => $value) {?>
    		
    	
        <tr class="alternate" id="row<?php echo $value->id; ?>">
        
            <td class="column-columnname"><?php echo $value->id; ?></td>
            <td class="column-columnname"><?php echo $value->title; ?></td>
            <td class="column-columnname"><span class="<?php echo $value->iconaf; ?>"></td>
              <td class="column-columnname"><?php echo $value->url; ?></td>
              <td class=""><span  data-id="<?php echo $value->id; ?>" id="affe" class="fa fa-times-rectangle-o fmdelete" style="color:#a50000; cursor: pointer;"> </span></td>
        </tr>
        <?php } ?>

    </tbody>
</table>
<table style="width:100%; background-color: #f9f9f9; margin-top:10px;">
	<tr>
<td>
<input name="addicon" type="radio" value="0" checked>Custom:	<input maxlength="50" type="text" name="add_symbol" size="1" value="Z"/>
</td>
<td>
<input name="addicon" type="radio" value="1" >Awesome: 	<span id="af3" class="fa fa-address-book-o" /> </span>
</td>
<td>
 <label for="">  URL: 	<input maxlength="55" type="text" name="add_url" size="20" value="http://google.com"/></label>
</td>
<td><input id="add-item" type=button class="button button-primary" name="submit" value="Add item"></td>
</tr>
</table>



	</td>
</tr>
<tr>
	<th>Font size:</th>

	<td><label><select id="font-size">
		<?php for ($i=0.2; $i<3;$i=$i+0.2) {
			$selected = "";
			if ($params["font-size"] ===$i."rem") $selected = "selected";
		echo '<option value="'.$i.'rem" '. $selected.'>'.$i.'</option>'; 
		}?> 
		</select>rem</label>
	</td>
</tr>
<tr>
	<th>Margin:</th>

	<td><label><select id="margin">
		<?php for ($i=0; $i<41;$i++) {
			$selected = "";
			if ($params["margin"] ==$i) $selected = "selected";
		echo '<option value="'.$i.'" '. $selected.'>'.$i.'</option>'; 
		}?> 
		</select>px</label>
	</td>
</tr>
<tr>
	<th>Duration:</th>

	<td><label><select id="duration">
		<?php for ($i=100; $i<4100;$i=$i+100) {
			$selected = "";

			if ($params["duration"] ==$i) echo  $selected = "selected";
		echo '<option value="'.$i.'" '. $selected.'>'.round($i/1000,1).'</option>'; 
		}?> 
		</select>sec.</label>
	</td>
</tr>
<!-- <tr>
	<th>Duration :</th>

	<td><label><select id="font-size">
		<?php 
		// for ($i=0.2; $i<3;$i=$i+0.2) {
		// 	$selected = "";
		// 	if ($params["font-size"] ===$i."rem") $selected = "selected";
		// echo '<option value="'.$i.'rem" '. $selected.'>'.$i.'</option>'; 
	//	}
		?> 
		</select>rem</label>
	</td>
</tr> -->
<tr>
	<th>Font color:</th>
	<td>
   <div id="colorPicker" class="colorPicker">
        <a class="color"><div class="colorInner" style="background-color:<?php echo $params["font-color"]; ?>;"></div></a>
        <div class="track"></div>
        <ul class="dropdown"><li></li></ul>
        <input type="hidden"  id="colorinput1"  class="colorInput"  value="<?php echo $params["font-color"]; ?>"/>
    </div>
	</td>
</tr>
<tr>
	<th>Background color:</th>
	<td>
   <div id="colorPicker2" class="colorPicker">
        <a class="color"><div class="colorInner" style="background-color:<?php echo $params["bg-color"]; ?>;"></div></a>
        <div class="track"></div>
        <ul class="dropdown"><li></li></ul>
        <input type="hidden" id="colorinput2" class="colorInput"  value="<?php echo $params["bg-color"]; ?>"/>
    </div>
	</td>
</tr>
<tr>
	<th>Border color:</th>
	<td>
   <div id="colorPicker3" class="colorPicker">
        <a class="color"><div class="colorInner" style="background-color:<?php echo $params["border-color"]; ?>;"></div></a>
        <div class="track"></div>
        <ul class="dropdown"><li></li></ul>
        <input type="hidden" id="colorinput3" class="colorInput"  value="<?php echo $params["border-color"]; ?>"/>
    </div>
	</td>
</tr>
<tr>
	<th>Mobile show:</th>
	<td>
<input type="checkbox" name="mobile" <?php echo  $params["moblie-show"]=="1" ? "checked" : ''  ?>>
	</td>
</tr>
</table>
<input id="save-sittings" type=button class="button button-primary" name="submit" value="Save settings">


</div>
<?php } else echo "<h1>You can't look at this page</h1>";?>