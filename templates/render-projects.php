<?php
/**
 * Rendert die ACF Flexible-Content-Felder aus `projects`
 * Erwartet pro Layout ein Partial unter: /template-parts/flex/layout-*.php
 */

if (!function_exists('have_rows') || !have_rows('projects')) {
  return;
}

while (have_rows('projects')) : the_row();

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
    case 'project_hero_big_image':
      get_template_part('template-parts/flex/layout', 'project-hero-big-image'); break;

    case 'project_hero_small_image':
      get_template_part('template-parts/flex/layout', 'project-hero-small-image'); break;

    case 'body_text':
      get_template_part('template-parts/flex/layout', 'body-text'); break;

    case 'body_images':
      get_template_part('template-parts/flex/layout', 'body-images'); break;

    case 'statement':
      get_template_part('template-parts/flex/layout', 'statement'); break;

    case 'title':
      get_template_part('template-parts/flex/layout', 'title'); break;
  }

  if (function_exists('section_close')) {
    section_close($opts);
  } else {
    if ($opts['container'] !== 'none') echo '</div>';
    echo '</section>';
  }

endwhile;
