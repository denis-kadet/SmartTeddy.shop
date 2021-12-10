<?php
/*
Template Name: Payment and shipping
*/
?>
<?get_header();?>
<section class="section__bg-payment">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-7 col-sm-8 col-12 order-0">
                <h3 class="payment__title payment__title-mob">Payment options</h3>
                <div class="payment__text">You can pay with your debit or credit card. We accept:</div>
                <ul class="payment__items">
                    <li class="payment__item">
                        <span class="payment__item-img_visa"></span>
                    </li>
                    <li class="payment__item">
                        <span class="payment__item-img_master"></span>
                    </li>
                    <li class="payment__item">
                        <span class="payment__item-img_amer"></span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-7 col-md-5 col-sm-4 col-6 order-2 order-sm-1">
                <div class="payment__img-wrap">
                    <span class="payment__img-bear"></span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-md-12 col-sm-12 col-6 order-1 order-sm-2">
                <h3 class="payment__title ship__option">Shipping options</h3>
                <div class="ship__option-mob_wrap">
                    <div class="ship__option-mob">
                        <span>Shipping options</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 order-3 order-sm-3">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h4 class="ship__title">
                            <span>Free Ground Shipping Offer</span>
                        </h4>
                        <div class="payment__text">Enjoy free ground shipping on eligible purchases made in the U.S., on
                            Smartteddy.store.
                        </div>
                        <ul class="ship__items">
                            <li class="ship__item payment__text">No adjustments to prior purchases.</li>
                            <li class="ship__item payment__text">Cannot be redeemed or exchanged for cash.</li>
                            <li class="ship__item payment__text">Offer is automatically applied at checkout.</li>
                            <li class="ship__item payment__text">Offer terms and duration are subject to change without
                                notice.
                            </li>
                            <li class="ship__item payment__text">Delivery time: 3-5 business days.</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h4 class="ship__title">
                            <span>UPS Priority</span>
                        </h4>
                        <div class="payment__text ship__text">EIf you would like to receive your purchase a little bit
                            earlier, you can choose the UPS Ground delivery option for $10.
                        </div>
                        <div class="payment__text">Delivery time: 2-3 business days.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?get_footer();?>