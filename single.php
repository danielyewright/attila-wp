<?php 

  get_header(); ?>

  <section id="wrapper">
    <a class="hidden-close"></a>
    <div class="progress-container">
      <span class="progress-bar"></span>
    </div>

    <?php if ( have_posts() ) :
      while ( have_posts() ) : the_post(); ?>
        <header id="post-header" class="<?php if ( has_post_thumbnail() ) { ?>has-cover <?php } ?>">
          <div class="inner">
            <nav id="navigation">
              <span id="home-button" class="nav-button">
                <a class="home-button" href="<?php bloginfo( 'url' ); ?>" title="Home"><i class="ic ic-arrow-left"></i> Home</a>
              </span>
              <span id="menu-button" class="nav-button">
                <a class="menu-button"><i class="ic ic-menu"></i> Menu</a>
              </span>
            </nav>
            <h1 class="post-title"><?php the_title(); ?></h1>
            <span class="post-meta"><a href="<?php get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a> | <time datetime="<?php the_date( 'y-m-d' ); ?>"><?php the_time( 'F j, Y' ); ?></time></span>

            <?php global $post; ?>
            <?php
              $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array(), false, '' );
            ?>

            <?php if ( has_post_thumbnail() ) { ?>
              <div class="post-cover cover" style="background-image: url(<?php echo $src[0]; ?>);"></div>
            <?php } ?>
          </div>
        </header>

        <main class="content" role="main">
          <div class="extra-pagination">
            <nav class="pagination" role="pagination">
              <div class="inner">
                <span class="pagination-info">Page 1 of 1</span>
                <div class="clear"></div>
              </div>
            </nav>
          </div>

          <article class="post tag-general">
            <div class="inner">
              <section class="post-content">
                <?php the_content(); ?>
              </section>

              <section class="post-info">
                <div class="post-share">
                  <a class="twitter" href="<?php echo 'https://twitter.com/share?text=' . get_the_title() . '&url=' . get_the_permalink() ?>" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;">
                    <i class="ic ic-twitter"></i><span class="hidden">Twitter</span>
                  </a>
                  <a class="facebook" href="<?php echo 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() ?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;">
                    <i class="ic ic-facebook"></i><span class="hidden">Twitter</span>
                  </a>
                  <a class="googleplus" href="<?php echo 'https://plus.google.com/share?url=' . get_the_permalink() ?>" onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;">
                    <i class="ic ic-googleplus"></i><span class="hidden">Twitter</span>
                  </a>
                  <div class="clear"></div>
                </div>
                
                <aside class="post-tags">
                  <?php

                  $categories = get_the_category();
                  $seperator = " ";
                  $output = '';

                  if ($categories) {
                    foreach ($categories as $category) {
                      $output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $seperator;
                    }

                    echo trim($output, $seperator);
                  }

                  ?>
                </aside>
                
                <div class="clear"></div>
                
                <aside class="post-author">
                    <figure class="post-author-avatar">
                      <!-- <img src="/content/images/2015/11/avatar.png" alt="zutrinken" /> -->
                      <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                    </figure>
                  <div class="post-author-bio">
                    <h4 class="post-author-name"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></h4>
                      <p class="post-author-about"><?php echo get_the_author_meta( 'description' ); ?></p>
                      <span class="post-author-location"><i class="ic ic-location"></i> <?php echo get_the_author_meta( 'user_location' ); ?></span>
                      <span class="post-author-website"><a href="<?php echo get_the_author_meta( 'user_url' ); ?>" target="_blank"><i class="ic ic-link"></i> Website</a></span>
                  </div>
                  <div class="clear"></div>
                </aside>
              </section>

              <section class="post-comments">
                <a id="show-disqus" class="post-comments-activate">Show Comments</a>
                <?php

                  // If comments are open or we have at least one comment, load up the comment template.
                  if ( comments_open() || get_comments_number() ) :
                    comments_template();
                  endif;

                ?>
              </section>

              <aside class="post-nav">
                <?php 
                $next_post = get_adjacent_post();
                if ( is_a( $next_post , 'WP_Post' ) ) : ?>
                  <a class="post-nav-prev" href="<?php echo get_permalink( $next_post->ID ); ?>">
                    <section class="post-nav-teaser">
                      <i class="ic ic-arrow-right"></i>
                      <h2 class="post-nav-title"><?php echo get_the_title( $next_post->ID ); ?></h2>
                      <p class="post-nav-excerpt"><?php echo get_the_excerpt( $next_post->ID ); ?></p>
                    </section>
                  </a>
                <?php endif; ?>
                <div class="clear"></div>
              </aside>
            </div>
          </article>

        <?php endwhile;

        else :
          echo '<p>No content found</p>';

      endif; ?>

    </main>
    
  <?php get_footer(); 

?>
