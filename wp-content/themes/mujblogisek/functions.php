<?php

// --- simple autoload ---------------------------

foreach (glob(get_template_directory() . "/inc/*.php") as $file) {
    require $file;
}

// --- styles & scripts ---------------------------

add_action("wp_enqueue_scripts", "wp_enqueue_scripts_action_callback");

function wp_enqueue_scripts_action_callback()
{
    $templateDirectoryUri = get_template_directory_uri();
    // styles
    wp_enqueue_style("bootstrap-style", "$templateDirectoryUri/vendor/bootstrap/css/bootstrap.min.css");
    wp_enqueue_style("fontawesome-style", "$templateDirectoryUri/vendor/fontawesome-free/css/all.min.css");
    wp_enqueue_style("lora-font", "https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic");
    wp_enqueue_style("opensans-font", "https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800");
    wp_enqueue_style("theme-style", "$templateDirectoryUri/css/clean-blog.min.css");
    wp_enqueue_style("custom-style", "$templateDirectoryUri/style.css");
    // scripts
    wp_enqueue_script("bootstrap-script", "$templateDirectoryUri/vendor/bootstrap/js/bootstrap.bundle.min.js", ["jquery"], null, true);
    wp_enqueue_script("theme-script", "$templateDirectoryUri/js/clean-blog.min.js", ["jquery"], null, true);
}

// --- menus ---------------------------

add_action("after_setup_theme", "after_setup_theme_action_callback");

function after_setup_theme_action_callback()
{
    register_nav_menu("header-menu", __("Menu v hlavičce", "CZECHITAS_DOMAIN"));
}

// --- pagination ---------------------------

add_filter("next_posts_link_attributes", "next_posts_link_attributes_filter_callback");

function next_posts_link_attributes_filter_callback()
{
    return "class=\"btn btn-primary float-right\"";
}

add_filter("previous_posts_link_attributes", "previous_posts_link_attributes_filter_callback");

function previous_posts_link_attributes_filter_callback()
{
    return "class=\"btn btn-primary float-left\"";
}

// --- sidebar ---------------------------

register_sidebar([
    "name" => __("Výchozí postraní panel", "4FIS_DOMAIN"),
    "id" => "default-sidebar",
    "description" => "",
    "class" => "",
    "before_widget" => '<li id="%1$s" class="widget %2$s">',
    "after_widget" => "</li>\n",
    "before_title" => "<h2 class=\"widgettitle\">",
    "after_title" => "</h2>\n",
]);

// --- languages ---------------------------

// $customThemeLanguagePath = path_join(get_template_directory(), "languages");
// load_theme_textdomain("CZECHITAS_DOMAIN", $customThemeLanguagePath);
