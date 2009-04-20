<?php if($_GET['registered'] == "yes") { diggbarred_register(); } ?>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready( function($) {
	
	$('#collectList').hide();
	
	$("#collectListTrigger").click(function () {
		$("#collectList").toggle();
	});

});
//]]>
</script>
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
<h2>Diggbarred Settings</h2>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<h3>General Settings</h3>
<table class="form-table">
	<tr valign="top">
		<th><label for="diggbarred_message">Your Message: </label></th>
		<td>
			<textarea name="diggbarred_message" rows="5" cols="50" id="diggbarred_message" type="text"><?php echo get_option('diggbarred_message'); ?></textarea>
		</td>
	</tr>
	<tr valign="top">
		<th><label for="diggbarred_style">Message Style: </label><p style="font-size:10px; color: #666;">This will be applied to the &lt;div&gt; element that contains your message.</p></th>
		<td>
			<textarea name="diggbarred_style" id="diggbarred_style" rows="5" cols="50" type="text"><?php echo get_option('diggbarred_style'); ?></textarea>
		</td>
	</tr>
</table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="diggbarred_message, diggbarred_style" />
<p class="submit">
	<input type="submit" name="submit" class="button-primary" value="Save Changes" />
</p>
</form>
<?php if(get_option('diggbarred_registered') != "yes") { ?>
<form method="get" action="http://extrafuture.com/tybor/tybor.php">
<h3>Registration Settings</h3>
<table class="form-table">
	<tr valign="top">
		<td><p>Registering your plugin will help us make better software. EXTRA FUTURE <strong>does not collect any identifiable information</strong>, such as your name or blog URL. If you'd like to see exactly what we do collect, <a href="#collectList" id="collectListTrigger">you can see the list</a>.</p>
		<div id="collectList" style="margin-left: 15px;">
			<h4>Information Collected:</h4>
			<ul>
				<li>the PHP version</li>
				<li>a list of currently-enabled PHP extensions</li>
				<li>the Apache version</li>
				<li>The version of this plugin</li>
				<li>The current time</li>
			</ul>
		</div>
		</td>
	</tr>
</table>
<?php

$apache_version = "unknown";
if(function_exists(apache_get_version)) { $apache_version = apache_get_version(); }
$php_version = "unknown";
if(function_exists(phpversion)) { $php_version = phpversion(); }
$php_extensions = "unknown";
if(function_exists(get_loaded_extensions)) { $php_extensions = serialize(get_loaded_extensions()); }

?>
<input type="hidden" name="ext" value='<?php echo $php_extensions; ?>' />
<input type="hidden" name="app" value="diggbarred" />
<input type="hidden" name="v" value="<?php echo get_option('diggbarred_version'); ?>" />
<input type="hidden" name="id" value="<?php echo get_option('extra_future_site_id'); ?>" />
<input type="hidden" name="php" value='<?php echo $php_version; ?>' />
<input type="hidden" name="apache" value='<?php echo $apache_version; ?>' />
<input type="hidden" name="back_to" value='<?php echo curPageURL(); ?>' />
<p class="submit">
	<input type="submit" name="submit" class="button-primary" value="Register" />
</p>
</form>
<?php } else { ?>
<p>You registered this plugin on <?php echo date('d F Y',get_option('station_identification_registered_on')); ?>. Thanks!</p>
<?php } ?>
</div>