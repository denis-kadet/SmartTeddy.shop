<?php
$support = carbon_get_theme_option('crb_places');
$check__support_1 = carbon_get_theme_option('crb_show_content-1');
$title_support_1 = carbon_get_theme_option('crb_show_content-title-1');
?>
<pre>

</pre>
<?php if (isset($support) && ($check__support_1 == false)): ?>
    <div class="col-lg-12">
        <h3 class="support__title"><?= esc_html( $title_support_1) ?></h3>
        <ul id="my-accordion" class="accordionjs">
            <?php foreach ($support as $items): ?>
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