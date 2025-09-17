<?php

class SerenaSpa_GalleryShortcode
{
    public function __construct(){
        add_shortcode('projecten_gallery_grid', array($this, 'render'));
    }
    public function render(){
        if(!is_singular('project')){
            return '';
        }

        $gallery_obj = new GetProjectGallery();
        $gallery = $gallery_obj->getProjectGallery();

        if(empty($gallery)){
            return '';
        }
        $gallery = array_slice($gallery, 0, 10);

        return $this->render_gallery_html($gallery);
    }
    public function render_gallery_html($gallery) {
        ob_start();
        include plugin_dir_path(__FILE__) . '../templates/gallery-grid.php';
        return ob_get_clean();
    }
}
new SerenaSpa_GalleryShortcode();