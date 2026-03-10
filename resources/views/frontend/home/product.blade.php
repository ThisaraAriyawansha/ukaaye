<section class="tf-section tf-service">
    <div class="container">
        <div class="row">
            <!-- Title + decorative waves -->
            <div class="col-12">
                <div class="title-heading st-3 text-center">
                    <div class="sub-heading clr-pri-1 f-mulish d-flex align-items-center justify-content-center gap-3">
                        <!-- Left wave -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="30" viewBox="0 0 77 30">
                            <path d="M5 15 Q19 5 38 15 T72 15" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M10 20 Q24 10 38 20 T67 20" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.7"/>
                        </svg>

                        <span class="inner-sub st-1">Our Products</span>

                        <!-- Right wave -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="30" viewBox="0 0 77 30">
                            <path d="M5 15 Q19 25 38 15 T72 15" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M10 10 Q24 20 38 10 T67 10" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.7"/>
                        </svg>
                    </div>
                    <h2 class="title clr-pri-1 mt-3">Wholesome Nutrition For Every Stage</h2>
                </div>
            </div>

            <?php
            // Simple product array – add/remove items easily
            $products = [
                ['Baby Cereal', 'Brown Rice, Oatmeal, Ragi', 'assets/images/home/5623566.jpg', 'Baby Cereal', 'st-3', '0.3ms', '800ms'],
                ['Baby Puffs', 'Vanilla, Apple, Strawberry', 'assets/images/home/5623566.jpg', 'Baby Puffs', 'st-4', '0.3ms', '1000ms'],
                ['Baby Puree', 'Apple, Mango, Sweet Potato', 'assets/images/home/5623566.jpg', 'Baby Puree', '', '0.3ms', '1200ms'],
                ['Baby Curry Mix', 'Aromat Special Blend', 'assets/images/home/5623566.jpg', 'Baby Curry Mix', 'st-2', '0.3ms', '1400ms'],
                ['Natural Sweetener', 'Dates Powder, Himalayan Honey', 'assets/images/home/5623566.jpg', 'Natural Sweetener', 'st-3', '0.3ms', '800ms'],
                ['Baby Melts', 'Jamun, Mango, Yogurt', 'assets/images/home/5623566.jpg', 'Baby Melts', 'st-4', '0.3ms', '1000ms'],
                ['Baby Yogurt', 'Blueberry, Strawberry', 'assets/images/home/5623566.jpg', 'Baby Yogurt', '', '0.3ms', '1200ms'],
                ['Baby Biscuits', 'Coming Soon', 'assets/images/home/5623566.jpg', 'Baby Biscuits', 'st-2', '0.3ms', '1400ms'],
            ];
            ?>

            <?php foreach ($products as $i => $p): 
                list($name, $flavors, $img, $alt, $styleClass, $delay, $duration) = $p;
            ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="sc-service fl-scale wow fadeIn animated <?= htmlspecialchars($styleClass) ?>" 
                         data-wow-delay="<?= htmlspecialchars($delay) ?>" 
                         data-wow-duration="<?= htmlspecialchars($duration) ?>">
                        <div class="box-feature inner-scale">
                            <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($alt) ?>">
                        </div>
                        <div class="box-content">
                            <h4 class="title">
                                <a href="{{ route('productdetails') }}" class="clr-pri-1"><?= htmlspecialchars($name) ?></a>
                            </h4>
                            <p class="sub f-mulish clr-pri-1"><?= htmlspecialchars($flavors) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>