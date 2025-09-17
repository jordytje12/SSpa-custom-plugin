<div class="projecten-gallery-grid">
    <?php foreach ($gallery as $index => $img_id): ?>
        <div class="grid-item">
            <?php
            $full_image_url = wp_get_attachment_image_url($img_id, 'full');
            $img_html = wp_get_attachment_image($img_id, 'large', false, array(
                'loading' => 'lazy',
                'alt' => get_post_meta($img_id, '_wp_attachment_image_alt', true)
            ));
            
            if ($img_html && $full_image_url):
            ?>
                <a href="<?php echo esc_url($full_image_url); ?>" 
                   data-elementor-open-lightbox="yes" 
                   data-elementor-lightbox-slideshow="projecten-gallery">
                    <div class="image-wrapper">
                        <?php echo $img_html; ?>
                        <div class="overlay">
                        </div>
                    </div>
                </a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>