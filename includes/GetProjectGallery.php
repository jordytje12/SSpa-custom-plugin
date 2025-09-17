<?php

class GetProjectGallery
{
    public function __construct(){}
    public function getProjectGallery($field_key = 'afbeeldingen', $post_id = null){
        $gallery = [];

        if(!$post_id){
            $post_id = get_the_ID();
        }
        if(!$post_id || !$field_key){
            return $gallery;
        }
        $meta = get_post_meta($post_id, $field_key, true);
        if(!$meta){
            return $gallery;
        }
        $gallery = explode(',', $meta);
        $gallery = array_filter(array_map('trim', $gallery));

        return $gallery;
    }
}