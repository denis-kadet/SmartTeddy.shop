<?php
$support_4 = carbon_get_theme_option('crb_places-4');
$check__support_4 = carbon_get_theme_option('crb_show_content-4');
$title_support_4 = carbon_get_theme_option('crb_show_content-title-4');
?>
<pre>

</pre>
<?php if (isset($support_4) && ($check__support_4 == false)): ?>
    <div class="col-lg-12">
        <h3 class="support__title"><?= esc_html( $title_support_4) ?></h3>
        <ul id="my-accordion-3" class="accordionjs">
            <?php foreach ($support_4 as $items): ?>
                <li>
                    <h4 class="accordion__title"><?= esc_html($items['support__text-faq']) ?></h4>
                    <ul class="accordion__items">
                        <?php foreach ($items['support__text-faq_sub'] as $item): ?>
                            <li class="accordion__item"><?= esc_html($item['support__fragment-text']) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
