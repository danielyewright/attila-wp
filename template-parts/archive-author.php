  <section id="wrapper">
    <a class="hidden-close"></a>
    <header id="blog-header" class="has-cover">
      <div class="inner">
        <nav id="navigation">
          <span id="home-button" class="nav-button">
            <a class="home-button" href="<?php bloginfo( 'url' ); ?>" title="Home"><i class="ic ic-arrow-left"></i> Home</a>
          </span>
          <span id="menu-button" class="nav-button">
            <a class="menu-button"><i class="ic ic-menu"></i> Menu</a>
          </span>
        </nav>
        <div class="post-cover cover" style="background-image: url('http://attila.zutrinken.com/content/images/2015/11/E4E9658662.jpg');"></div>
      </div>
    </header>

    <section id="blog-author" class="has-cover">
      <div class="inner">

        <aside class="post-author">
            <figure class="post-author-avatar">
              <!-- <img src="/content/images/2015/11/avatar.png" alt="zutrinken" /> -->
              <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
            </figure>
          <div class="post-author-bio">
            <h2 class="post-author-name"><?php the_author(); ?></h2>
              <p class="post-author-about">This is the place for a small biography with max 200 characters. Well, now 100 are left. Cool, hugh?</p>
              <span class="post-author-location"><i class="ic ic-location"></i> Berlin</span>
              <span class="post-author-website"><a href="http://zutrinken.com"><i class="ic ic-link"></i> Website</a></span>
            <span class="post-author-stats"><i class="ic ic-posts"></i> <?php the_author_posts(); ?> posts</span>
          </div>
          <div class="clear"></div>
        </aside>
      </div>
    </section>

    <div id="index" class="container">
      <main class="content" role="main">
        <div class="extra-pagination">
          <nav class="pagination" role="pagination">
            <div class="inner">
              <!-- <span class="pagination-info">Page 1 of 1</span> -->
              <span class="pagination-info">
                <?php the_posts_pagination( array(
                  'mid_size'  => 1,
                  'prev_text' => __( 'Back', 'textdomain' ),
                  'next_text' => __( 'Onward', 'textdomain' ),
                ) ); ?>
              </span>
              <div class="clear"></div>
            </div>
          </nav>
        </div>

        <?php if ( have_posts() ) :
          while ( have_posts() ) : the_post(); ?>

            <article class="post tag-general">
              <div class="inner">
                <header class="post-header">
                  <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <span class="post-meta">Posted by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a> in 

                  <?php

                  $categories = get_the_category();
                  $seperator = ", ";
                  $output = '';

                  if ($categories) {
                    foreach ($categories as $category) {
                      $output .= '<a href="' . get_category_link( $category -> term_id ) . '">' . $category -> cat_name . '</a>' . $seperator;
                    }

                    echo trim($output, $seperator);
                  }

                  ?>

                  <!-- <a href="">Uncategorized</a> |  -->
                  <time datetime="<?php echo date( 'Y-F-j' ) ?>"> | <?php echo date( 'F j, Y' ) ?></time></span>
                  <div class="clear"></div>
                </header>

                <section class="post-excerpt">
                  <?php the_excerpt(); ?>
                </section>
              </div>
            </article>

          <?php endwhile;

          else :
            echo '<p>No content found</p>';

        endif; ?>

        <nav class="pagination" role="pagination">
          <div class="inner">
            <span class="pagination-info">Page 1 of 1</span>
            <div class="clear"></div>
          </div>
        </nav>  
      </main>
    </div>