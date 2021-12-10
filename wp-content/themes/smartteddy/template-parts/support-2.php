<?php
$support_2 = carbon_get_theme_option('crb_places-2');
$check__support_2 = carbon_get_theme_option('crb_show_content-2');
$title_support_2 = carbon_get_theme_option('crb_show_content-title-2');
?>

<?php if (isset($support_2) && ($check__support_2 == false)): ?>
    <div class="col-lg-12">
        <h3 class="support__title"><?= esc_html( $title_support_2) ?></h3>
        <ul id="my-accordion-1" class="accordionjs">
            <?php foreach ($support_2 as $items2): ?>
                <li>
                    <h4 class="accordion__title"><?= esc_html($items2['support__text-faq']) ?></h4>
                    <ul class="accordion__items">
                        <?php foreach ($items2['support__text-faq_sub'] as $item2): ?>
                            <li class="accordion__item"><?= esc_html($item2['support__fragment-text']) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>