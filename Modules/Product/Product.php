<?php

namespace ProductGalleryWithQuoteButton\Modules\Product;

/**
 * Product is a class for products and their details
 */
class Product
{
    private int $id;
    public string $name = '';
    public string $description = '';
    public float $price = 0.0;
    public string $thumbnail;

    /**
     * @param object $product
     */
    public function __construct(object $product)
    {
        $this->id = (int)$product->id;
        $this->name = filter_var($product->name, FILTER_SANITIZE_STRING);
        $this->price = (float)$product->price;
        $this->description = filter_var($product->description, FILTER_SANITIZE_STRING);
        $this->thumbnail = $product->get_image(); // image in img tag
    }

    /**
     * Get product id
     *
     * @return int
     */
    public function get_id(): int
    {
        return $this->id;
    }

    /**
     * Set product's name
     *
     * @param string $name
     *
     * @return void
     */
    public function set_name(string $name)
    {
        $this->name = $name;
    }

    /**
     * Set product's description
     *
     * @param string $desc Product's description
     *
     * @return void
     */
    public function set_desc(string $desc)
    {
        $this->description = $desc;
    }

    /**
     * Set product's price
     *
     * @param float $price Product's price
     *
     * @return void
     */
    public function set_price(float $price)
    {
        $this->price = $price;
    }
}