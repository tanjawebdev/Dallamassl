
  </div><!-- #content -->

  <footer id="colophon" class="site-footer">
    <div class="footer-content container-lg">
      
      <!-- Top Section with 4 Columns -->
      <div class="footer-top row">
        <!-- Column 1: Hardcoded Left Text -->
        <div class="footer-column footer-tagline h3 col-md-5">
          <span>INTERIOR<br>DESIGN +<br>INNENARCHITEKTUR</span>
        </div>

        <!-- Column 2: Hardcoded Address -->
        <div class="footer-column footer-address col-md-2">
          <p>Dallamassl e.U.<br>
          Köstlergasse 10/7<br>
          1060 Wien<br>
          <a href="tel:+436644213140">+43 664 42 13 140</a><br>
          <a href="mailto:office@dallamassl.at">office@dallamassl.at</a></p>
        </div>

        <!-- Column 3: Tagline + Legal Menu -->
        <div class="footer-column footer-legal-column col-md-3">
          <p class="footer-subtitle">Mitglied der Ingenieursbüros<br>für Innenarchitektur</p>
          <?php 
          wp_nav_menu( array( 
            'theme_location' => 'menu-legal', 
            'menu_id' => 'menu-legal',
            'container' => false
          ) ); 
          ?>
        </div>

        <!-- Column 4: Social Media Menu -->
        <div class="footer-column footer-socials-column col-md-2">
          <?php 
          wp_nav_menu( array( 
            'theme_location' => 'menu-socials', 
            'menu_id' => 'menu-socials',
            'container' => false
          ) ); 
          ?>
        </div>
      </div>

      <!-- Bottom Section with Logo and Copyright -->
      <div class="footer-bottom">
        <div class="footer-logo-large">
           <img src="<?php echo get_template_directory_uri(); ?>/static/img/dm-logo-white.svg" alt="Dallamassl">
        </div>
        <div class="footer-copyright">
          <span class="h4">COPYRIGHT, <?php echo date('Y'); ?></span>
        </div>
      </div>

    </div>
  </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
