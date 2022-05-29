<!-- Gallery Section  -->

<section class="gallery__section">
    <div class="gallery__container">

        <?php if (!empty($gallery)) { ?>
            <div class="gallery__carousel__section">
                <div class="gallery__carousel__cotnainer">
                    <?php foreach ($gallery as $gall) { ?>
                        <div class="gallery__carousel__image">
                            <img src="<?php echo base_url(); ?>assets/gallery/<?php echo $gall['image']; ?>" alt="<?php echo $gall['title']; ?>">
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="gallery__grid__section">
                <div class="gallery__grid__container">
                    <?php foreach ($gallery as $gall) { ?>
                        <div class="gallery__grid__card">
                            <div class="gallery__grid__images">
                                <img src="<?php echo base_url(); ?>assets/gallery/<?php echo $gall['image']; ?>" alt="<?php echo $gall['title']; ?>">
                            </div>

                            <div class="gallery__grid__title">
                                <?php if (!empty($gall['title'])) { ?>
                                    <h6><?php echo $gall['title']; ?></h6>
                                <?php } else { ?>
                                    <h6>-</h6>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        <?php } else { ?>
            <div class="no__data__container">
                <img src="<?php echo base_url(); ?>assets/images/no-data/no-data.png" alt="No Data Found">
            </div>
        <?php } ?>
    </div>
</section>

<!-- Gallery Section  Ends -->