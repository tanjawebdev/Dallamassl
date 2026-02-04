<?php
/**
 * Rendert die ACF Flexible-Content-Felder aus `page_modules`
 * Erwartet pro Layout ein Partial unter: /template-parts/flex/layout-*.php
 */

if (!function_exists('have_rows') || !have_rows('page_modules')) {
  return;
}

while (have_rows('page_modules')) : the_row();

  // Section-Optionen
  $opts = [
    'name'       => get_row_layout(),
    'container'  => get_sub_field('container') ?: 'container-lg',
    'bg'         => get_sub_field('background') ?: 'none',
    'id'         => get_sub_field('id-anchor') ?: '',
    'show_on'    => get_sub_field('show-on') ?: 'everywhere',
    'space_after' => get_sub_field('space_after') ?: '',
  ];

  // Öffne Section-Hülle nur, wenn Helper existieren – sonst simple Wrapper
  if (function_exists('section_open')) {
    section_open($opts);
  } else {
    $name = $opts['name'];
    $id   = $opts['id'] ? ' id="'.esc_attr($opts['id']).'"' : '';
    $cont = $opts['container'];
    $space_after = $opts['space_after'];
    echo '<section'.$id.' class="'.$name.' '.$space_after.'">';
    if ($cont !== 'none') echo '<div class="'.$cont.'">';
  }

  switch (get_row_layout()) {
    case 'hero_gallery':
      get_template_part('template-parts/flex/layout', 'hero-gallery'); break;

    case 'hero_single':
      get_template_part('template-parts/flex/layout', 'hero-single'); break;

    case 'category_cards':
      get_template_part('template-parts/flex/layout', 'category-cards'); break;

    case 'text_links_image_right':
      get_template_part('template-parts/flex/layout', 'text-links-image-right'); break;

    case 'text_rights_image_left':
      get_template_part('template-parts/flex/layout', 'text-rights-image-left'); break;

    case 'cta_image':
      get_template_part('template-parts/flex/layout', 'cta-image'); break;

    case 'akkordeon_text':
      get_template_part('template-parts/flex/layout', 'akkordeon-text'); break;

    case 'akkordeon_contacts':
      get_template_part('template-parts/flex/layout', 'akkordeon-contacts'); break;

    case 'body_text':
      get_template_part('template-parts/flex/layout', 'body-text'); break;

    case 'info_box_selection':
      get_template_part('template-parts/flex/layout', 'info-box-selection'); break;

    case 'google_maps':
      get_template_part('template-parts/flex/layout', 'google-maps'); break;

    case 'body_images':
      get_template_part('template-parts/flex/layout', 'body-images'); break;

    case 'statement':
      get_template_part('template-parts/flex/layout', 'statement'); break;

    case 'title':
      get_template_part('template-parts/flex/layout', 'title'); break;

    case 'downloadlink':
      get_template_part('template-parts/flex/layout', 'downloadlink'); break;

    case 'content_blog_slider':
      get_template_part('template-parts/flex/layout', 'content-blog-slider'); break;

    case 'contact_cards':
      get_template_part('template-parts/flex/layout', 'contact-cards'); break;

    case 'timeline':
      get_template_part('template-parts/flex/layout', 'timeline'); break;  

    // Legacy cases (keeping for backwards compatibility)
    case 'intro':
      get_template_part('template-parts/flex/layout', 'intro'); break;

    case 'text_1col':
      get_template_part('template-parts/flex/layout', 'text-1col'); break;

    case 'text_2col':
      get_template_part('template-parts/flex/layout', 'text-2col'); break;

    case 'text_3col':
      get_template_part('template-parts/flex/layout', 'text-3col'); break;

    case 'text_4col':
      get_template_part('template-parts/flex/layout', 'text-4col'); break;

    case 'text_left_image_right':
      get_template_part('template-parts/flex/layout', 'text-left-image-right'); break;

    case 'image_left_text_right':
      get_template_part('template-parts/flex/layout', 'image-left-text-right'); break;

    case 'image_slider':
      get_template_part('template-parts/flex/layout', 'image-slider'); break;

    case 'bildboxen':
      get_template_part('template-parts/flex/layout', 'bildboxen'); break;

    case 'galerie':
      get_template_part('template-parts/flex/layout', 'galerie'); break;

    case 'tabs':
      get_template_part('template-parts/flex/layout', 'tabs'); break;

    case 'akkordeon':
      get_template_part('template-parts/flex/layout', 'akkordeon'); break;

    case 'breaker':
      get_template_part('template-parts/flex/layout', 'breaker'); break;

    case 'code_editor':
      get_template_part('template-parts/flex/layout', 'code-editor'); break;

    case 'google_map':
      get_template_part('template-parts/flex/layout', 'google-map'); break;

    case 'sticky_d':
      get_template_part('template-parts/flex/layout', 'sticky-d'); break;

    case 'hero_gallery_mouse_position':
      get_template_part('template-parts/flex/layout', 'hero-gallery-mouse-position'); break;
  }

  if (function_exists('section_close')) {
    section_close($opts);
  } else {
    if ($opts['container'] !== 'none') echo '</div>';
    echo '</section>';
  }

endwhile;