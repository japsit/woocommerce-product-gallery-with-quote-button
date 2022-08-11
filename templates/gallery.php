<?php
require_once WPGWQB_PLUGIN_DIR . '/Modules/Gallery/Gallery.php';

use WooCommerceProductGalleryWithQuoteButton\Modules\Gallery\Gallery;

// Get from Settings which categories should be shown in Gallery
$options = (array)get_option('wpgwqb_show_category');
$categories = isset(array_values($options)[0]) === true ? array_values($options)[0] : [];
// Find matching names for categories
$categories = array_map('get_the_category_by_ID', $categories);

// Create a gallery instance and fill gallery with products in previously defined category
$gallery = new Gallery();
$gallery->set_products(['category' => $categories]);

// Set product in variable
$products = $gallery->get_products();
// Define button Make an offer
$button_text = __('Make an offer', WPGWQB_TEXT_DOMAIN);
$button = "<button><span>$button_text</span></button>";

?>

<script>
    if (typeof GalleryWithButton === 'undefined') {
        var GalleryWithButton = {};
    }
    GalleryWithButton.Products = []
    <?php
    // This magic generates gallery as javascript object and generates html elements for each product
    foreach ($products as $product) {
    ?>
    GalleryWithButton.Products.push({
        id: '<?=$product->get_id()?>',
        name: '<?=addslashes(json_encode($product->name))?>',
        desc: '<?=addslashes(json_encode($product->description))?>',
        price: '<?=json_encode($product->price)?>',
    });
    <?php } ?>
</script>

<div class="wpg-gallery">
    <?php foreach ($products as $product) { ?>
        <div class='wpg-gallery-item' key=" <?= $product->get_id() ?>">
            <div class='wpg-wrap-image'> <?= $product->thumbnail ?> </div>
            <div class='gallery-item-text-content'>
                <button class="wpg-gallery-item-button"
                        onclick="GalleryButtonRequestQuote(<?= $product->get_id() ?>)"><?= __('Request quote', 'woocommerce-product-gallery-with-quote-button') ?></button>
                <div class='price'><?= number_format($product->price, 2); ?> <?= get_woocommerce_currency_symbol(); ?></div>
                <h2 class='title'><?= $product->name ?></h2>
                <p> <?= $product->description ?> </p>
            </div>
        </div>
    <?php } ?>
</div>