<?php 

  get_header(); ?>

  <section id="wrapper">
    <a class="hidden-close"></a>
    <header id="blog-header">
      <div class="inner">
        <nav id="navigation">
          <span id="menu-button" class="nav-button">
            <a class="menu-button"><i class="ic ic-menu"></i> Menu</a>
          </span>
        </nav>
        <h1 class="blog-name"><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        <span class="blog-description"><?php bloginfo( 'description' ); ?></span>
      </div>
    </header>

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
                  <span class="post-meta">Posted by <a href="#"><?php the_author(); ?></a> in <a href="">Uncategorized</a> | <time datetime="<?php echo date( 'Y-F-j' ) ?>"><?php echo date( 'F j, Y' ) ?></time></span>
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
    
  <?php get_footer(); 

?>
