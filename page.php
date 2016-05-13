<?php 

  get_header(); ?>

  <section id="wrapper">
    <a class="hidden-close"></a>
    <header id="post-header">
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

        <?php global $post; ?>
      </div>
    </header>

    <main class="content" role="main">
      <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

          <article class="post page">
            <div class="inner">
              <section class="post-content">
                <?php the_content(); ?>
              </section>
            </div>
          </article>

        <?php endwhile;

        else :
          echo '<p>No content found</p>';

      endif; ?>

    </main>
    
  <?php get_footer(); 

?>
