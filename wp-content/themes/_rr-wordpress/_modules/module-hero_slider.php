<?php $images = get_field('slider');

// Slider
  if( $images ): ?>
      <div id="slider" class="flexslider">
          <ul class="slides">
              <?php foreach( $images as $image ): ?>
                  <li style="background-image:url(<?php echo $image['url']; ?>);">
                    <?php if ( $image['description'] ) : ?>
                      <a href="<?php echo $image['description']; ?>"></a>
                    <?php endif; ?>
                     <!--  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /> -->
                  </li>
              <?php endforeach; ?>
          </ul>
      </div>
  <?php endif; ?>
