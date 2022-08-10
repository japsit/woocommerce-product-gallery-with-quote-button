<?php

namespace GalleryWithButton\Modules\Gallery;

require_once WPGWQB_PLUGIN_DIR . '/Modules/Product/Product.php';

use GalleryWithButton\Modules\Product\Product;


class Gallery
{
    private $products = array();

    /**
     * @param array $filters Get Woocommerce Products with given filters
     *
     * @return void
     */
    public function set_products($filters = array()): void
    {
        $this->products = array();
        $products = wc_get_products($filters);
        foreach ($products as $product) {
            $this->products[] = new Product($product);
        }
    }

    /**
     * Get products
     *
     * @return array
     */
    public function get_products()
    {
        return $this->products;
    }


}