<div class="col-xs-12 col-md-3 image no-padding" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
    <hgroup>
        <h4 style="background-color: <?php echo get_theme_mod( 'primary_color', '#FFFFFF' ); ?>"><?php echo get_the_category_list(); ?></h4>
        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    </hgroup>
</div>