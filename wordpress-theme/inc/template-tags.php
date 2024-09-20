<?php
if (!function_exists('dobrogo_post_thumbnail')) :
    function dobrogo_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
?>

            <div class="post-image page-image">
                <?php the_post_thumbnail('full'); ?>
            </div>

        <?php else : ?>

            <a class="post-image page-image" href="<?php echo esc_url(get_permalink()); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    'full',
                    array(
                        'alt' => the_title_attribute(
                            array(
                                'echo' => false,
                            )
                        ),
                    )
                );
                ?>
            </a>
<?php
        endif;
    }
endif;

if (!function_exists('wp_body_open')) :
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
endif;

if (!function_exists('dobrogo_trim')) :
    function dobrogo_trim($string, $max_len = 80, $end_string = '...', $allow_tags = '<a><b><strong><em><i>', $break = false)
    {
        if (empty($string) || mb_strlen($string) <= $max_len) {
            return $string;
        }

        // Prepare the string for the match.
        $string = strip_shortcodes($string);
        $string = str_replace(array("\r\n", "\r", "\n", "\t"), ' ', $string); // phpcs:ignore
        $string = preg_replace('/\>/i', '> ', $string);
        $string = preg_replace('/\</i', ' <', $string);
        $string = preg_replace('/[\x00-\x1F\x7F]/u', '', $string);
        $string = str_replace(' ', ' ', $string);
        $string = preg_replace('/\s+/', ' ', $string);
        $string = preg_replace('/\s\s+/', ' ', trim(strip_tags($string, $allow_tags)));
        $string = html_entity_decode($string);

        // Check for HTML tags and plain text.
        $words_tags  = preg_split('/(<[^>]*[^\/]>)/i', $string, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $current_len = 0;
        $collection  = [];
        $opened_tags = [];
        if (!empty($words_tags)) {
            foreach ($words_tags as $item) {
                if ($current_len >= $max_len) {
                    // No need to continue.
                    break;
                }
                if (substr_count($item, '<') && substr_count($item, '>')) {
                    // This is a tag, let's collect it.
                    $collection[] = $item;
                    if (substr_count($item, '</')) {
                        // This is an ending tag, let's remove the opened one.
                        array_pop($opened_tags);
                    } elseif (substr_count($item, '/>')) {
                        // This is a self-closed tag, nothing to do.
                        continue;
                    } else {
                        // This is an opening tag, let's add it to the opened list.
                        $t = explode(' ', $item);
                        array_push($opened_tags, substr($t[0], 1));
                    }
                } else {
                    // This is a plain text, let's assess the length and maybe collect it.
                    $words = preg_split('/\s/i', $item, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
                    if (!empty($words)) {
                        foreach ($words as $word) {
                            // Add + 1 as spaces count too.
                            $new_lenght = $current_len + mb_strlen($word) + 1;
                            if ($new_lenght <= $max_len) {
                                $collection[] = $word . ' ';
                            } else {
                                if (true === $break) {
                                    $diff         = $max_len - $new_lenght - 1;
                                    $collection[] = substr($word, 0, $diff) . ' ';
                                }
                            }
                            $current_len = $new_lenght;
                            if ($current_len >= $max_len) {
                                break;
                            }
                        }
                    }
                }
            }
        }

        $string = implode('', $collection);
        if (!empty($opened_tags)) {
            // There were some HTML tags opened that need to be closed.
            array_reverse($opened_tags);
            foreach ($opened_tags as $tag) {
                $string .= '</' . $tag;
            }
        }

        // One final round of preparing the returned string.
        $string = trim($string);
        $string = preg_replace('/<[^\/>][^>]*><\/[^>]+>/', '', $string);
        $string = preg_replace('/(\s+\<\/+)+/', '</', $string);
        $string = preg_replace('/(\s+\,+)+/', ',', $string);
        $string = preg_replace('/(\s+\.+)+/', '.', $string);

        // Maybe append the custom ending to the trimmed string.
        $string .= (!empty($end_string)) ? ' ' . $end_string : '';

        return $string;
    }
endif;

if (!function_exists('dobrogo_paginate')) :
    function dobrogo_paginate($query, $paged, array $args = [])
    {
        $big = 999999999;

        $defaults = array(
            'show_all'  => false,
            'prev_next' => true,
            'prev_text' => '« ' . esc_html__('Prev', 'dobrogo'),
            'next_text' => esc_html__('Next', 'dobrogo') . ' »',
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'plain',
        );

        $args = wp_parse_args($args, $defaults);

        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => $paged,
            'total' => $query->max_num_pages,

            'show_all'  => $args['show_all'],
            'prev_next' => $args['prev_next'],
            'prev_text' => $args['prev_text'],
            'next_text' => $args['next_text'],
            'end_size'  => $args['end_size'],
            'mid_size'  => $args['mid_size'],
            'type'      => $args['type'],
        ));
    }
endif;
