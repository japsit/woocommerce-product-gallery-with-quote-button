<?php
require_once WPGWQB_PLUGIN_DIR . '/Modules/Gallery/Gallery.php';

use ProductGalleryWithQuoteButton\Modules\Gallery\Gallery;

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
        id: '<?php echo (int)$product->get_id(); ?>',
        name: '<?php echo addslashes(json_encode($product->name));?>',
        desc: '<?php echo addslashes(json_encode($product->description));?>',
        price: '<?php echo json_encode($product->price);?>',
    });
    <?php } ?>
</script>

<div class="wpg-gallery">
    <?php foreach ($products as $product) { ?>
        <div class='wpg-gallery-item' key=" <?php esc_attr_e($product->get_id()); ?>">
            <div class='wpg-wrap-image'> <?php echo $product->thumbnail; ?> </div>
            <div class='gallery-item-text-content'>
                <button class="wpg-gallery-item-button"
                        onclick="GalleryButtonRequestQuote(<?php esc_attr_e($product->get_id()); ?>)"><?php esc_html_e('Request quote', WPGWQB_TEXT_DOMAIN); ?></button>
                <div class='price'><?php echo esc_html(number_format($product->price, 2)); ?><?php echo esc_html(get_woocommerce_currency_symbol()); ?></div>
                <h2 class='title'><?php echo esc_html($product->name); ?></h2>
                <p> <?php echo esc_html($product->description); ?> </p>
            </div>
        </div>
    <?php } ?>
</div>