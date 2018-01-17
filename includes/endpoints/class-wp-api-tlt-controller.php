<?php

class wp_api_tlt extends WP_REST_Controller
{
    protected $namespace = "api-tlt/v1";

    public function register_routes()
    {
        register_rest_route($this->namespace, '/markets', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_markets_data'),
        ));

        register_rest_route($this->namespace, '/products', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_products_data'),
        ));
    }

    public function get_markets_data()
    {
        $q = new WP_Query(array(
            'post_status' => 'publish',
            'meta_query' => array(
                'popular_clause' => array(
                    'key' => 'popular',
                    'value' => '1',
                )
            ),
            'orderby' => array(
                'popular_clause' => 'ASC'
            ),
        ));

        return $this->respone_message('ok', $q, 200);
    }

    public function get_products_data()
    {
        $q = new WP_Query(array(
            'post_status' => 'publish',
            'meta_query' => array(
                'popular_clause' => array(
                    'key' => 'popular',
                    'value' => '1',
                )
            ),
            'orderby' => array(
                'popular_clause' => 'ASC'
            ),
        ));

        return $this->respone_message('ok', $q, 200);
    }

    public function respone_message($code, $message, $status)
    {
        return array(
          'code' => $code,
          'message' => $message,
          'data' => array(
            'status' => $status,
          ),
        );
    }
}
