      <footer id="footer">
        <div class="inner">
          <section class="credits">
            <!-- <span class="credits-theme">Theme <a href="https://github.com/zutrinken/attila">Attila</a> by <a href="http://zutrinken.com" rel="nofollow">zutrinken</a></span> -->
            <span class="credits-theme"><?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'attila' ), 'Attila', '<a href="http://underscores.me/" rel="designer">Daniely Wright</a>' ); ?></span>
            <span class="credits-software"><?php printf( esc_html__( 'Proudly powered by %s', 'underscores' ), 'WordPress' ); ?></span>
          </section>
        </div>
      </footer>
    </section>
    
    <!-- Disqus comments -->
    <script>var disqus = 'YOUR_DISQUS_SHORTNAME';</script>

    <?php wp_footer(); ?>
  </body>
</html>