<!--

Custom page for listing people
-->
<?php /* Template Name: Personlista */ ?>

<?php

get_header();



?>





<div id="primary" class="content-area col-md-9">
	<main id="main" class="post-wrap personlista-head" role="main">

        <h1><?php print_r($wp_query->post->post_title); ?></h1>

        	<ul class="personlista">

<?php


$user_query = new WP_User_Query(array( 'meta_key' => '_tern_wp_member_list', 'meta_value' => get_post_meta($post->ID, 'personlista', true) ));

	// User Loop
if ( ! empty( $user_query->get_results() ) ) {
	foreach ( $user_query->get_results() as $user ) {
		echo '<li>';
		echo '<h2>' . $user->first_name . ' ' . $user->last_name . '</h2>';

		if ($user->description) {
			echo '<p class="description">' . $user->description . '</p>';
		}
		if ($user->mobile) {
			echo '<div class="phone"><span>tel: </span>' . $user->mobile . '</div>';
		}
		if ($user->user_email) {
			echo '<a href="mailto:' . $user->user_email . '" class="email">' . $user->user_email . '</a>';
		}
		if ($user->user_url) {
			echo '<a href="' . $user->user_url . '" class="webbplats" target=_blank>' . $user->user_url . '</a>';
		}
		echo '</li>';
	}
} else {
	echo '<li>Någonting är fel med databasen, kontakta <a href="mailto:info@gruppterapi.org">info@gruppterapi.org</a></li>';
}

?>

<!--

        		<li>
        			<img src="https://www.su.se/polopoly_fs/1.292934.1473063008!/image/image.png_gen/derivatives/person_260/image.png" />
        			<div>
        				<h2>Thomas Chritensen</h2>
        				<a href="mailto:thomas.christensen@su.se" class="email">thomas.christensen@su.se</a>
        				<p class="description">Thomas äter gärna räksmörgås</p>
        				<a href="http://www.dn.se" class="webbplats">http://www.dn.se</a>
					</div>
        		</li>

        		<li>
        			<img src="https://www.su.se/polopoly_fs/1.292934.1473063008!/image/image.png_gen/derivatives/person_260/image.png" />
        			<div>
        				<h2>John Klevebring</h2>
        				<a href="mailto:thomas.christensen@su.se" class="email">thomas.christensen@su.se</a>
        				<p class="description">John äter gärna kräksmörgås</p>
        				<a href="http://www.dn.se" class="webbplats">http://www.dn.se</a>
					</div>
        		</li>
        	-->
        	</ul>

			<!-- List latest pusers based on members-list requires members list plugin -->

	</main>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>