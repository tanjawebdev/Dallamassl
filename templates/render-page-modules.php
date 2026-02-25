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

    case 'hero_gallery_mouse_position':
      get_template_part('template-parts/flex/layout', 'hero-gallery-mouse-position'); break;

    case 'hero_single':
      get_template_part('template-parts/flex/layout', 'hero-single'); break;

    case 'akkordeon_text':
      get_template_part('template-parts/flex/layout', 'akkordeon-text'); break;

    case 'akkordeon_contacts':
      get_template_part('template-parts/flex/layout', 'akkordeon-contacts'); break;

    case 'body_text':
      get_template_part('template-parts/flex/layout', 'body-text'); break;

    case 'body_images':
      get_template_part('template-parts/flex/layout', 'body-images'); break;

    case 'title':
      get_template_part('template-parts/flex/layout', 'title'); break;

    case 'sticky_d':
      get_template_part('template-parts/flex/layout', 'sticky-d'); break;

    case 'hero_gallery_mouse_position':
      get_template_part('template-parts/flex/layout', 'hero-gallery-mouse-position'); break;

    case 'project_hero_big_image':
      get_template_part('template-parts/flex/layout', 'project-hero-big-image'); break;

    case 'project_related_work':
      get_template_part('template-parts/flex/layout', 'project-related-work'); break;

    case 'service_intro':
      get_template_part('template-parts/flex/layout', 'service-intro'); break;

    case 'service_section_1':
      get_template_part('template-parts/flex/layout', 'service-section-1'); break;

    case 'service_section_2':
      get_template_part('template-parts/flex/layout', 'service-section-2'); break;

    case 'service_section_3':
      get_template_part('template-parts/flex/layout', 'service-section-3'); break;

    case 'service_section_4':
      get_template_part('template-parts/flex/layout', 'service-section-4'); break;

    case 'about_section_1':
      get_template_part('template-parts/flex/layout', 'about-section-1'); break;

    case 'about_section_2':
      get_template_part('template-parts/flex/layout', 'about-section-2'); break;

    case 'about_section_3':
      get_template_part('template-parts/flex/layout', 'about-section-3'); break;

    case 'about_section_4':
      get_template_part('template-parts/flex/layout', 'about-section-4'); break;

    case 'about_section_5':
      get_template_part('template-parts/flex/layout', 'about-section-5'); break;

    case 'about_section_6':
      get_template_part('template-parts/flex/layout', 'about-section-6'); break;

    case 'about_section_7':
      get_template_part('template-parts/flex/layout', 'about-section-7'); break;

    case 'project_overview':
      get_template_part('template-parts/flex/layout', 'project-overview'); break;

    case 'project_quotes':
      get_template_part('template-parts/flex/layout', 'project-quote'); break;

    case 'contact':
      get_template_part('template-parts/flex/layout', 'contact'); break;

    case 'home_project_teaser':
      get_template_part('template-parts/flex/layout', 'home-project-teaser'); break;

    case 'home_about_teaser':
      get_template_part('template-parts/flex/layout', 'home-about-teaser'); break;

  }

  if (function_exists('section_close')) {
    section_close($opts);
  } else {
    if ($opts['container'] !== 'none') echo '</div>';
    echo '</section>';
  }

endwhile;