    <!-- Header #homepage -->
    <section class="header-homepage">
        <base href="<?php echo RESOURCES_FRONT; ?>jquery.raty.css">
        <div class="container">
            <div class="row header-margin">
                <div class="col-sm-12">
                    <h5 class="hero-title"><?php echo get_languageword('Everything you need in order to find the') ?> <?php echo get_languageword('right'); ?> <?php echo get_languageword('class for you'); ?></h5>
                    <p class="hero-tag"><?php echo get_languageword('Explore') . ' - ' . get_languageword('Enrich') . ' - ' . get_languageword('Excel'); ?></p>
                </div>
                <?php if (!$this->ion_auth->is_tutor()) { ?>
                    <div class="col-sm-12">
                        <!-- Home Search form -->
                        <?php
                        if (!empty($location_opts) || !empty($course_opts)) :
                            $this->load->view('sections/search_section_home', array('location_opts' => $location_opts, 'course_opts' => $course_opts), false);
                        endif;
                        ?>
                        <!-- Home Search form -->
                    </div>
                <?php } ?>
                <!-- Disable Gambar Icon Background -->
                <!-- <div class="col-sm-12">
                    <img src="<?php echo URL_FRONT_IMAGES; ?>headericons.png" alt="" class="img-responsive">
                </div> -->
            </div>
        </div>
    </section>
    <!-- Ends Header #homepage -->

    <!-- Advantages #homepage -->
    <?php if (strip_tags($this->config->item('site_settings')->advantages_section) == "On") {
        echo $this->config->item('sections')->Advantages_Section;
    } ?>
    <!-- Ends Advantages #homepage -->

    <!-- How-it-works #homepage -->
    <?php $about_us_how_it_works = $this->base_model->get_page_how_it_works();

    if (!empty($about_us_how_it_works)) {

        echo $about_us_how_it_works[0]->description;
    }
    ?>
    <!-- Ends How-it-works #homepage -->


    <!-- Testimonial slider -->
    <div class="container" id='testimonials'>
        <div class="row row-margin">
            <div class="col-sm-12 ">
                <h2 class="heading"><?php echo get_languageword('Why Students'); ?> <?php echo get_languageword('Love Us'); ?></h2>
            </div>
            <div class="col-sm-12">
                <div class="testimonial-slider owl-theme">
                    <?php foreach ($site_testimonials as $row) { ?>
                        <div class=" item">
                            <div class="feedback-block">
                                <div class="comment">
                                    <h4>“</h4>
                                    <p><?php echo $row->comments; ?></p>
                                </div>

                                <div class="profile-block">
                                    <div class="media-left">
                                        <div class="profile-img">
                                            <img src="<?php if (isset($row->image)) echo  URL_PUBLIC_UPLOADS_TESTIMONIALS . '/' . $row->image; ?>" alt=".." class="img-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">

                                        <h4><?php echo $row->name; ?></h4>
                                        <p><?php echo $row->position; ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Ends Testimonial slider -->

    <!-- Youtube #Homepage -->
    <div class="container" id='testimonials'>
        <div class="row row-margin">
            <div class="col-sm-12 ">
                <h2 class="heading"><?php echo get_languageword('Masih_Bingung_Daftar_sebagai_Mitra_Pengajar'); ?> <?php echo get_languageword('Love Us'); ?></h2>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="owl-theme" style="--aspect-ratio: 16/9;">
                    <?php 
                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/zCgFPnz8r0I?autoplay=1&mute=1&controls=0&loop=1" frameborder="2"></iframe>'; 
                    ?>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="owl-theme" style="--aspect-ratio: 16/9;">
                    <?php 
                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/z3uDxi1FSsw?autoplay=1&mute=1&controls=0&loop=1" frameborder="2"></iframe>'; 
                    ?>
                </div>
            </div>
        </div>
    </div>  
    <!-- Youtube #Homepage -->

    <!-- Counter #Homepage -->
    <!-- Disable terlebih dahulu jumlah pengaajaran -->
    <?php
    // $this->load->view('lesson_count.php'); 
    ?>
    <!-- Counter #Homepage -->

    <?php if (!empty($home_tutor_ratings)) { ?>
        <!-- Top-rated slider -->
        <section class="weekly-top-rated">
            <div class="container">
                <div class="row row-margin">
                    <div class="col-md-12">
                        <h2 class="heading-border-btm"><?php echo get_languageword('weekly_top'); ?> <?php echo get_languageword('tutors'); ?></h2>
                        <div class="toprated-slider owl-theme">
                            <?php foreach ($home_tutor_ratings as $rating) {
                                $hlink = URL_HOME_TUTOR_PROFILE . '/' . $rating->slug;
                            ?>
                                <div class="item">
                                    <div class="profile-block">
                                        <div class="media-left">
                                            <div class="profile-img">
                                                <a href="<?php echo $hlink; ?>">
                                                    <img src="<?php echo get_tutor_img($rating->photo, $rating->gender); ?>" alt="" class="img-circle">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <a href="<?php echo $hlink; ?>">
                                                <h4 title="<?php echo $rating->username; ?>"><?php echo $rating->username; ?></h4>
                                                <p><?php echo $rating->qualification; ?></p>
                                                <div class="top_tutor_rating" <?php if (!empty($rating->rating)) echo 'data-score=' . $rating->rating; ?>></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Ends Top-rated slider -->
    <?php } ?>

    <link rel="stylesheet" href="<?php echo URL_FRONT_CSS; ?>jquery.raty.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="<?php echo URL_FRONT_JS; ?>jquery.raty.js"></script>
    <script>
        /****** Tutor Avg. Rating  ******/
        $('div.top_tutor_rating').raty({

            path: '<?php echo RESOURCES_FRONT; ?>raty_images',
            score: function() {
                return $(this).attr('data-score');
            },
            readOnly: true
        });
    </script>
    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
        var i;
        var x = document.getElementsByClassName("header-homepage");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>