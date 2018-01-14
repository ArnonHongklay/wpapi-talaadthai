<?php

class wp_api_tlt extends WP_REST_Controller
{
    protected $rest_base = "x";
    protected $namespace = "wp-api-tlt/v1";

    public function register_routes()
    {
        register_rest_route($this->namespace, '/' . $this->rest_base, array(
          'methods' => 'GET',
          'callback' => 'get_custom_users_data',
        ));
    }
}
