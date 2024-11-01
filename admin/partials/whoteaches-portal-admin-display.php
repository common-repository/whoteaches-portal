<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://whoteaches.com
 * @since      1.0.0
 *
 * @package    Whoteaches_Portal
 * @subpackage Whoteaches_Portal/admin/partials
 */
?>

<div class="wrap">
	<div class="WTWP_admin_main">
		<div class=WTWP_admin_top>
			<div class="WTWP_top_row">
				<div class="WTWP_logo">
					<a href="https://whoteaches.com/wordpress-plugins" target="_blank" class="WTWP_circle" title="More info on WhoTeaches"><?php echo '<img src="' . plugins_url( 'images/whoteaches-logo.png', dirname(__FILE__) ) . '"> '; ?></a>
				</div>
				<div class="WTWP_plugin_text">
					<h1>WhoTeaches Portal</h1>
					<h2>WordPress Plugin</h2>
					<p>Thank you for installing WhoTeaches Portal. With WhoTeaches Portal you can embed any WhoTeaches Package, several Packages, or an entire profile anywhere on your WordPress website.<br>Install WhoTeaches Portal and add a simple shortcode to any page or post.<br>It's free, requires no coding skills, and you don't even need a WhoTeaches account!</p>
					<p>For more information, please visit our <a href="https://whoteaches.com/wordpress-plugins" target="_blank">WordPress Plugins page on WhoTeaches</a>.</p>
				</div>
				<div class="WTWP_social">
					<iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fwhoteaches&width=50&layout=box_count&action=like&show_faces=false&share=true&height=65&appId=220165718015734" width="50" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe><br>
					<a href="https://twitter.com/WhoTeaches" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @WhoTeaches</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>
			</div>
		</div>
		<div class="WTWP_admin_bottom">
			<div>
					<h4><i class="fa fa-user fa-fw" aria-hidden="true"></i> Profile Embed</h4>
					<p>You can embed an entire WhoTeaches profile on any of your WordPress website pages or posts by entering a simple shortcode containing your profile slug. Here's how:</p>
					<ol>
						<li>Go to <a href="https://whoteaches.com" target="_blank">www.WhoTeaches.com</a> and navigate to the profile you wish to embed.</li>
						<li>Copy the profile slug (the text that appears after "https://whoteaches.com/users/", see below.)</li>
						<?php echo '<img src="' . plugins_url( 'images/profile-slug.jpg', dirname(__FILE__) ) . '">'; ?>
						<li>In the admin menu to the left, go to "Pages" and edit or create a page you wish to embed the WhoTeaches profile on.</li>
						<li>Add the shortcode [WhoTeaches_Portal slug="profile-slug"], with the correct profile slug, into the body of the page and publish it.</li>
					</ol>
					<p>To embed a profile in a post instead of a page, follow the instructions above, only for "Posts" instead of "Pages".</p>
				</div>
			<div>
					<h4><i class="fa fa-gift fa-fw" aria-hidden="true"></i> Package Embed</h4>
					<p>You can embed any number of Packages from WhoTeaches on any page or post, as often as you'd like. Embedding WhoTeaches Packages is done with a shortcode, similar to the one we use for embedding an entire WhoTeaches profile. Here's how it's done:</p>
					<ol>
						<li>Go to <a href="https://whoteaches.com" target="_blank">www.WhoTeaches.com</a> and navigate to a Package you wish to embed.</li>
						<li>Copy the package slug including the profile slug (the text that appears after "https://whoteaches.com/users/". See below.)</li>
						<?php echo '<img src="' . plugins_url( 'images/package-slug.jpg', dirname(__FILE__) ) . '">'; ?>
						<li>In the admin menu to the left, go to "Posts" and edit or create a new post.</li>
						<li>
							Add the shortcode [WhoTeaches_Portal packages="package-slug,another-package-slug"], with the correct package slug, into the body of the post.<br>
							You can add as many Packages as you wish. Simply add additional Package slugs, separated by a comma, just as you see in the example above.</li>
						</li>
					</ol>
					<strong>You may use the shortcode several times in the same post, so you can embed Packages in different parts of your post.</strong>
					<p>To embed Packages in a page instead of a post, follow the instructions above, only for "Pages" instead of "Posts".</p>
				</div>
		</div>
	</div>
</div>
