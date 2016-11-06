<section id="Section__testimonials">
  <div class="PageContainer">
  <i class="fa fa-quote-left" aria-hidden="true"></i>
  <i class="fa fa-quote-right" aria-hidden="true"></i>
    <?php
      $args = array('post_type' => 'testimonials', 'posts_per_page' => 1);
      $the_query = new WP_Query( $args );

      if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
          $the_query->the_post();
          the_content();

          the_title('<span> - ','</span>');
        }
      } else {}
      wp_reset_postdata();
   ?>

  <button><a href="<?php bloginfo('url') ?>/testimonials">Raving fans</a></button>
  </div>
</section>
