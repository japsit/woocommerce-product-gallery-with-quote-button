<?php
?>

<div id="gallery-with-quote-contact-form-div">
    <form method="post" id="gallery-with-quote-contact-form" enctype="multipart/form-data">
        <?php wp_nonce_field('gallery_with_quote_contact_form','name_of_nonce_field'); ?>

        <h2><?=__('Contact us', 'wpgwqb')?></h2>

        <div id="gallery-with-quote-message"></div>
        <input type="hidden" id="gallery-with-quote-form-name-product-id">

        <label for="gwqf-product-name"><?=__('Product','wpgwqb')?>:</label>
        <div id="gwqf-product-name" class="gwqf-prod-info"></div>

        <label for="gwqf-product-desc"><?=__('Description','wpgwqb')?>:</label>
        <div id="gwqf-product-desc" class="gwqf-prod-info"></div>

        <label for="gwqf-product-price"><?=__('Price','wpgwqb')?>:</label>
        <div id="gwqf-product-price" class="gwqf-prod-info"></div>

        <label for="gallery"><?=__('Name','wpgwqb')?></label>
        <input type="text" id="gallery-with-quote-form-name" name="gallery-with-quote-form-name" placeholder="<?=__('Name','wpgwqb')?>">

        <label for="gallery-with-quote-form-email"><?=__('Email','wpgwqb')?></label>
        <input type="email" name="gallery-with-quote-form-email" id="gallery-with-quote-form-email"
               required class="email">

        <label for="gallery-with-quote-form-tel"><?=__('Telephone','wpgwqb')?></label>
        <input type="text" id="gallery-with-quote-form-tel" name="gallery-with-quote-form-tel" placeholder="+0401234567">

        <div id="msg"></div>
        <button id="gallery-with-quote-form-button" class="submitbtn"><?=__('Send','wpgwqb')?></button>
        <a id="gallery-with-quote-form-cancel" class="click-link"><?=__('Cancel','wpgwqb')?></a>

        <div class="success_msg" style="display: none">Message
            Sent Successfully</div>

        <div class="error_msg" style="display: none">Message
            Not Sent, There is some error.</div>

    </form>
</div>
