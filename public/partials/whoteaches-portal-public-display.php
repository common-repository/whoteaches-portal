<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://whoteaches.com
 * @since      1.0.0
 *
 * @package    Whoteaches_Portal
 * @subpackage Whoteaches_Portal/public/partials
 */
?>

<?php
	require_once "whoteaches-portal-show-stars.php";
?>

<div class="WTWP_container">
	<?php if (isset($whoteaches_packages['data'])) : ?>
		<?php if (isset($whoteaches_profile['data'])) : ?>
		<div class="WTWP_header">
			<div class="media">
				<div class="media-left">
					<a href="<?php echo $whoteaches_profile['data']['attributes']['profile-url']; ?>" target="_blank">
						<img class="media-object" src="<?php echo isset($whoteaches_profile['data']['attributes']['avatar']) ? $whoteaches_profile['data']['attributes']['avatar'] : plugins_url( 'images/whoteaches-default.png', dirname( __FILE__ ) ); ?>" alt="...">
					</a>
				</div>
				<div class="media-body">
					<h4 class="media-heading"><?php echo $whoteaches_profile['data']['attributes']['name']; ?></h4>
					<div class="media-info">
						<div>
							<?php 
							if (isset($whoteaches_profile['data']['attributes']['tags'])) {
								if ($whoteaches_profile['data']['attributes']['tags'] == "member") {
									echo '<i class="fa fa-heart"></i>';
								} else {
									echo '<i class="fa fa-graduation-cap"></i>';
								}
								echo $whoteaches_profile['data']['attributes']['tags'];
							}
							?>		
						</div>
						<div>
							<?php $whoteaches_profile['data']['attributes']['tags']; ?>
						</div>
					</div>
					<div class="WTWP_buttons">
						<ul class="WTWP_navigation">
							<div class="WTWP_network">
								<li>
									<a href="<?php echo $whoteaches_profile['data']['attributes']['profile-url']; ?>/followers" target="_blank">
										<div class="WTWP_stats_content">
											<div class="WTWP_stat_heading">Followers</div>
											<div class="WTWP_stat_data">
												<span id="WTWP_followers_count"><?php echo $whoteaches_profile['data']['attributes']['followers']; ?></span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="<?php echo $whoteaches_profile['data']['attributes']['profile-url']; ?>/following" target="_blank">
										<div class="WTWP_stats_content">
											<div class="WTWP_stat_heading">Following</div>
											<div class="WTWP_stat_data">
												<span id="WTWP_following_count"><?php echo $whoteaches_profile['data']['attributes']['following']; ?></span>
											</div>
										</div>
									</a>
								</li>
							</div>
						</ul>
					</div>
				</div>
				<div class="media-right">
					<a href="https://whoteaches.com" target="_blank">
						<?php echo '<img src="' . plugins_url( 'images/whoteaches-logo.png', dirname( __FILE__ ) ) . '" class="media-object" alt="Powered by WhoTeaches"> '; ?>
					</a>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div>
			<ul class="WTWP_package_list row">
			<?php foreach ($whoteaches_packages['data'] as $package) : ?>
				<li class="WTWP_package col-xs-12 col-lg-6">
					<div class="WTWP_package_container">
						<a href="<?php echo $package['attributes']['package-link'] ?>">
							<div class="WTWP_package_picture">
								<img src="<?php echo $package['attributes']['package-avatar'] ?>" alt="<?php echo $package['attributes']['package-title'] ?>">
							</div>
							<div class="WTWP_absolute_container">
								<span class="WTWP_tagged_left">
									<div class="WTWP_package_rating">
										<div class="WTWP_star_buttons" data-toggle="tooltip" title="<?php echo  ($package['attributes']['package-rating'] < 1) ? "No ratings yet" : $package['attributes']['package-rating'] . " stars" ?>" data-placement="bottom">
												<?php whoteaches_portal_show_stars($package['attributes']['package-rating']) ?>
										</div>
									</div>
								</span>
								<?php if ($package['attributes']['package-discounted-price'] != 0) : ?>
									<span class="WTWP_tagged_right" data-toggle="tooltip" title="Discounted rate" data-placement="bottom">
										<span class="WTWP_reduced"><i class="fa fa-tag"></i> $<?php echo $package['attributes']['package-discounted-price'] ?></span> <span class="WTWP_original">$<?php echo $package['attributes']['package-price'] ?></span>
									</span>
								<?php else : ?>
									<span class="WTWP_tagged_right">$<?php echo $package['attributes']['package-price'] ?></span>
								<?php endif; ?>
								</div>						
								<div class="WTWP_package_info">
								<div class="WTWP_package_owner_avatar">
									<img src="<?php echo isset($package['attributes']['tutor-avatar']) ? $package['attributes']['tutor-avatar'] : plugins_url( 'images/whoteaches-default.png', dirname( __FILE__ ) ); ?>" data-toggle="tooltip" title="<?php echo $package['attributes']['tutor-name'] ?>" data-placement="right">
								</div>
								<div class="WTWP_package_title" itemprop="name">
									<?php echo substr($package['attributes']['package-title'], 0, 40); ?>
								</div>
								<div class="WTWP_package_details" itemprop="description">
									<?php echo $package['attributes']['package-value'] ?>
									<?php if ($package['attributes']['package-type'] == 'Group') : ?>
										<i class="fa fa-users fa-fw" title="Group lessons"></i>Group
									<?php else : ?>
										<i class="fa fa-user fa-fw" title="Individual lessons"></i>Individual
									<?php endif; ?>
									<i class="fa fa-map-marker" title="Location where classes are given"></i> <?php echo $package['attributes']['package-location'] ?>
								</div>
							</div>
						</a>
					</div>
				</li>
      <?php endforeach; ?>
			</ul>
		</div>
		<?php if (!isset($whoteaches_profile['data'])) : ?>
			<div class="WTWP_package_embed_header">
				<p>Private classes on <a href="https://whoteaches.com" target="_blank">WhoTeaches</a></p>
				<?php echo '<img src="' . plugins_url( 'images/whoteaches-small.png', dirname( __FILE__ ) ) . '" width="15" alt="Powered by WhoTeaches"> '; ?>
			</div>
		<?php endif; ?>
	<?php else : ?>
		<p>WhoTeaches Portal is correctly installed, however, we could not find a profile in the following URL: <strong>https://whoteaches.com/users/<?php echo $attributes['slug'] ?></strong></p>
		<p>Please enter a valid profile slug into the shortcode, like so: [WhoTeaches_Portal slug="your-user-slug"]</p>
		<p>For assistance, please visit <a href="https://whoteaches.com/wordpress" target="_blank">https://whoteaches.com/wordpress</a>.</p>
	<?php endif; ?>

</div>