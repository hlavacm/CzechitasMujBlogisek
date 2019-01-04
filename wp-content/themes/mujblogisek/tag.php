<?php
$term = get_queried_object();
get_header();
?>

    <header class="masthead" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/home-bg.jpg" )'>
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1><?php echo $term->name; ?></h1>
                    <span class="subheading"><?php echo $term->description; ?></span>
                </div>
            </div>
        </div>
    </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part("template-parts/loop");
                    }
                    get_template_part("template-parts/pagination");
                } else {
                    get_template_part("template-parts/empty");
                }
                ?>
            </div>
        </div>
    </div>
<?php
get_footer();