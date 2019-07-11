<div id="rooms-grid" class='pure-g'>
    <?php foreach ($rooms as $room) : ?>
        <?php
        $attachment_id = get_post_thumbnail_id($room->ID);
        $img_src = wp_get_attachment_image_url($attachment_id, 'medium');
        $img_srcset = wp_get_attachment_image_srcset($attachment_id, 'medium');
        ?>
        <div class="room pure-bnb-sm-1-<?php echo $attrs['per_row_sm']; ?> pure-bnb-md-1-<?php echo $attrs['per_row_md']; ?> pure-bnb-lg-1-<?php echo $attrs['per_row_lg']; ?>">
            <img src="<?php echo esc_url($img_src); ?>"
                                             srcset="<?php echo esc_attr($img_srcset); ?>"
                                             sizes="(max-width:600px) 100vw;(min-width:601px) and (max-width:1499px) 600px"
                                             style="width:100%"
                                             alt="<?php echo esc_attr($room->post_title); ?>">

             <div class="room-overlay"></div>

            <div class="flip-side">
                <div class="text-container">
                    <h2 class="room-title"><?php echo $room->post_title; ?></h2>
                    <p class="room-subtitle">Sleeps <?php echo get_field('sleeps', $room->ID) ?></p>
                </div>
            </div>
            <a class="room-url" href="<?php echo get_the_permalink($room); ?>"></a>
        </div>
    <?php endforeach; ?>
</div>