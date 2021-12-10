<?php
$support_3 = carbon_get_theme_option('crb_places-3');
$check__support_3 = carbon_get_theme_option('crb_show_content-3');
$title_support_3 = carbon_get_theme_option('crb_show_content-title-3');
?>

<?php if (isset($support_3) && ($check__support_3 == false)): ?>
    <div class="col-lg-12">
        <h3 class="support__title"><?= esc_html( $title_support_3) ?></h3>
        <ul id="my-accordion-2" class="accordionjs">
            <?php foreach ($support_3 as $items): ?>
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


<!--<div class="col-lg-12">-->
<!--    <h3 class="support__title">-->
<!--        Payment and delivery-->
<!--    </h3>-->
<!--    <ul id="my-accordion-2" class="accordionjs">-->
<!--         Section 1 -->
<!--        <li>-->
<!--            <h4 class="accordion__title">What forms of payment do you accept? </h4>-->
<!--            <ul class="accordion__items">-->
<!--                <li class="accordion__item">You can pay for your order online using a bank card.</li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        < Section 2 -->
<!--        <li>-->
<!--            <h3 class="accordion__title">Can you deliver a Teddy anywhere?</h3>-->
<!--            <ul class="accordion__items">-->
<!--                <li class="accordion__item">At this moment we can ship Teddies anywhere in the U.S. via UPS. You can check Smart Teddy on Amazon for an extended delivery option.</li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <Section 3 -->
<!--        <li>-->
<!--            <h3 class="accordion__title">What delivery options do you offer?</h3>-->
<!--            <ul class="accordion__items">-->
<!--                <li class="accordion__item">We have free Standard shipping, which will take 3-5 business days, and UPS priority shipping, 2-3 business days for an extra $10.</li>-->
<!--            </ul>-->
<!--        </li>-->
<!--    </ul>-->
<!--</div>-->
