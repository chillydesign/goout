<?php

$cityguide_active = is_post_type_archive( 'cityguide' );
$escapade_active = is_post_type_archive( 'escapade' );
$tous_active  = ( $cityguide_active == false && $escapade_active == false );
 ?>
<ul class="categories_list">
<li class="<?php if ($tous_active) echo 'active_link'; ?>"><a href="<?php echo home_url( '/cool-trips/' ) ?>">Tous</a></li>
<li class="<?php if ($cityguide_active) echo 'active_link'; ?>"><a href="<?php echo get_post_type_archive_link( 'cityguide' ); ?>">City guides</a></li>
<li class="<?php if ($escapade_active) echo 'active_link'; ?>"><a href="<?php echo get_post_type_archive_link( 'escapade' ); ?>">Escapades</a></li>
</ul>
