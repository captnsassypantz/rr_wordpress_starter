<section id="Section__blogreel">
    <div class="HomepageTitle">
      <h2>- From the Blog -</h2>
    </div>
  <div class="PageContainer">
  <ul class="GridThrees">
      <?php
      $args = array('orderby' => 'date', 'posts_per_page' => 3);
      $the_query = new WP_Query( $args );

      if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
        echo '<li>';
          $the_query->the_post();
          if (has_post_thumbnail()) {
              the_post_thumbnail('medium');
          }
          else{
            echo '<img src="'. esc_url( get_theme_mod( 'CompanyLogo' )) .'">';
            // <img src='<?php echo esc_url( get_theme_mod( 'CompanyLogo' ) );
          }

          the_title('<h3>','</h3>');
          the_date('M, d, Y', '<span>', '</span>');
          the_excerpt();

          echo '<span><a href="' . get_permalink() . '">Read More</a></span>';
        echo '</li>';
        }
      } else {}
      wp_reset_postdata();
     ?>
    </ul>
  <button><a href="<?php bloginfo('url') ?>/blog">View all blog posts</a></button>
  </div>
</section>
