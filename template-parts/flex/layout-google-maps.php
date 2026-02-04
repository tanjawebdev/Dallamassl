<?php
$name = get_sub_field('name');
$address = get_sub_field('address');
$telephone = get_sub_field('telephone');
$fax = get_sub_field('fax');
$email = get_sub_field('email');
$location = get_sub_field('location');
?>
<div class="google-maps-wrapper">
  <div class="row">
    <div class="col-md-5">
      <div class="map-text">
        <?php if ($name): ?>
          <h2><?php echo esc_html($name); ?></h2>
        <?php endif; ?>

        <?php if ($address): ?>
          <h3><?php echo nl2br(esc_html($address)); ?></h3>
        <?php endif; ?>
        <div class="map-text-info">
          <?php if ($telephone): ?>
            <p>Telefon<br>
              <a href="tel:<?php echo esc_attr($telephone); ?>"><?php echo esc_html($telephone); ?></a>
            </p>
          <?php endif; ?>

          <?php if ($fax): ?>
            <p>Fax<br>
              <?php echo esc_html($fax); ?>
            </p>
          <?php endif; ?>

          <?php if ($email): ?>
            <p>E-Mail<br>
              <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
            </p>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="offset-md-1 col-md-6">
      <div class="map-wrapper">
        <div class="map-placeholder" data-map-src="<?php echo esc_html($location); ?>">
          <p>
            Um Ihre Privatsphäre zu schützen, wird diese Karte erst nach Ihrer Zustimmung geladen.
            Durch Klick auf „Karte laden“ werden Daten an Google übertragen.
          </p>
          <button type="button" class="map-load-btn">Karte laden</button>
        </div>
      </div>

      <script>
        document.addEventListener("DOMContentLoaded", function () {
          const placeholders = document.querySelectorAll(".map-placeholder");

          placeholders.forEach(function (placeholder) {
            const button = placeholder.querySelector(".map-load-btn");
            const mapSrc = placeholder.getAttribute("data-map-src");

            button.addEventListener("click", function () {
              // Create iframe only after consent
              const iframe = document.createElement("iframe");
              iframe.src = mapSrc;
              iframe.width = "600";
              iframe.height = "600";
              iframe.style = "border:0;width:100%;height:100%;";
              iframe.frameBorder = "0";
              iframe.allowFullscreen = true;
              iframe.loading = "lazy";
              iframe.referrerPolicy = "no-referrer-when-downgrade";

              placeholder.replaceWith(iframe);
            });
          });
        });
      </script>
    </div>
  </div>
</div>