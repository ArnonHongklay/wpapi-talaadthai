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
        $args = array(
          'post_type' => 'product',
          'post_status' => 'publish',
          'meta_query' => array(
            array(
                'key' => 'Popular',
                'value' => '1',
                'compare' => '='
            )
          )
        );

        return $this->respone_message('ok', $this->combined_data($args), 200);
    }

    public function get_products_data()
    {
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'orderby' => array(
                'popular_clause' => 'ASC'
            ),
        );

        return $this->respone_message('ok', $this->combined_data($args), 200);
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

    public function combined_data($args)
    {
        $posts = get_posts($args);
        $result = $posts;

        foreach ($posts as $p_key => $p_value) {
            $meta_posts = get_post_meta($p_value->ID);
            foreach ($meta_posts as $m_key => $m_value) {
                $result[$p_key]->$m_key = $m_value[0];
            }
        }

        return $result;
    }
}
