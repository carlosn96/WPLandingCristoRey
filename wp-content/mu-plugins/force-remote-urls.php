<?php
/*
Plugin Name: Force Remote URLs for REST API
Description: Asegura que las publicaciones creadas localmente vía REST API guarden el GUID y URLs utilizando el dominio remoto verdadero.
*/

if (!defined('ABSPATH'))
    exit;

add_action('wp_insert_post', 'cristorey_fix_guid_after_insert', 99, 3);
function cristorey_fix_guid_after_insert($post_id, $post, $update)
{
    // Aplicar reemplazo solo bajo el contexto de la API REST local conectada a DB remota
    if (defined('REST_REQUEST') && REST_REQUEST) {
        global $wpdb;
        static $remote_url = null;

        if ($remote_url === null) {
            $remote_url = rtrim($wpdb->get_var("SELECT option_value FROM {$wpdb->options} WHERE option_name = 'home'"), '/');
        }

        $local_url = defined('WP_HOME') ? rtrim(WP_HOME, '/') : 'http://localhost/cristorey_wp';

        if (!empty($remote_url) && $local_url !== $remote_url) {
            // Asegurar que remote_url usa HTTPS
            $secure_remote_url = str_replace('http://', 'https://', $remote_url);

            $new_guid = str_replace($local_url, $secure_remote_url, $post->guid);
            $new_content = str_replace($local_url, $secure_remote_url, $post->post_content);

            if ($new_guid !== $post->guid || $new_content !== $post->post_content) {
                remove_action('wp_insert_post', 'cristorey_fix_guid_after_insert', 99);
                $wpdb->update(
                    $wpdb->posts,
                    array('guid' => $new_guid, 'post_content' => $new_content),
                    array('ID' => $post_id)
                );
                clean_post_cache($post_id);
                add_action('wp_insert_post', 'cristorey_fix_guid_after_insert', 99, 3);
            }
        }
    }
}

add_action('add_attachment', 'cristorey_fix_attachment_guid', 99);
function cristorey_fix_attachment_guid($post_id)
{
    if (defined('REST_REQUEST') && REST_REQUEST) {
        global $wpdb;
        $remote_url = rtrim($wpdb->get_var("SELECT option_value FROM {$wpdb->options} WHERE option_name = 'home'"), '/');
        $local_url = defined('WP_HOME') ? rtrim(WP_HOME, '/') : 'http://localhost/cristorey_wp';

        if (!empty($remote_url) && $local_url !== $remote_url) {
            $secure_remote_url = str_replace('http://', 'https://', $remote_url);
            $guid = $wpdb->get_var($wpdb->prepare("SELECT guid FROM {$wpdb->posts} WHERE ID = %d", $post_id));
            if ($guid) {
                $new_guid = str_replace($local_url, $secure_remote_url, $guid);
                if ($new_guid !== $guid) {
                    $wpdb->update($wpdb->posts, array('guid' => $new_guid), array('ID' => $post_id));
                    clean_post_cache($post_id);
                }
            }
        }
    }
}
