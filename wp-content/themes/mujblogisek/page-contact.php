<?php
/* Template Name: Kontakt */
$isProcessed = null;
$isSended = null;
$isError = null;
if (array_key_exists("processed", $_GET)) {
    $isProcessed = (filter_input(INPUT_GET, "processed", FILTER_SANITIZE_NUMBER_INT) == 1);
} elseif (array_key_exists("contact", $_POST)) {
    $data = $_POST["contact"];
    if ($isSended = (count($data) > 0)) {
        if (!check_admin_referer("czechitas_contact")) {
            wp_die(__("Nepovolé odeslání formuláře...", "CZECHITAS_DOMAIN"));
        }
        $name = $data["name"];
        $email = $data["email"];
        $message = $data["message"];
        if (!empty($name) && !empty($email) && !empty($message) && is_email($email)) {
            $body = sprintf(__("Jméno: %s\n", "CZECHITAS_DOMAIN"), $name);
            $body .= sprintf(__("E-mail: %s\n", "CZECHITAS_DOMAIN"), $email);
            $body .= sprintf(__("Zpráva: %s\n", "CZECHITAS_DOMAIN"), $message);
            $body .= sprintf(__("\n---\nTento e-mail byl automaticky vygenerován z webu: %s", "CZECHITAS_DOMAIN"), home_url());
            $result = wp_mail(get_option("admin_email"), __("Zpráva z kontaktního formuláře", "CZECHITAS_DOMAIN"), $body, ["Content-Type: text/html; charset=UTF-8"]);
            if ($result) {
                wp_redirect(add_query_arg("processed", 1, get_permalink()));
                exit;
            } else {
                $isError = true;
            }
        }
    }
}
get_header();
?>

    <header class="masthead" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/contact-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1><?php the_title();?></h1>
                        <?php if (has_excerpt()) {?>
                            <span class="subheading"><?php the_excerpt();?></span>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?php the_content();?>
                <form method="POST">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><?php _e("Jméno:*", "CZECHITAS_DOMAIN");?></label>
                            <input type="text" class="form-control" placeholder="<?php _e("Jméno:*", "CZECHITAS_DOMAIN");?>" name="contact[name]" value="<?php echo $isSended ? $name : ""; ?>" required>
                            <?php if ($isSended && empty($name)) {?>
                                <p class="help-block text-danger"><?php _e("Jméno je povinná položka", "CZECHITAS_DOMAIN");?></p>
                            <?php }?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><?php _e("E-mail:*", "CZECHITAS_DOMAIN");?></label>
                            <input type="email" class="form-control" placeholder="<?php _e("E-mail:*", "CZECHITAS_DOMAIN");?>" name="contact[email]" value="<?php echo $isSended ? $email : ""; ?>" required>
                            <?php if ($isSended) {?>
                                <?php if (empty($email)) {?>
                                    <p class="help-block text-danger"><?php _e("E-mail je povinná položka", "CZECHITAS_DOMAIN");?></p>
                                <?php } elseif (!is_email($email)) {?>
                                    <p class="help-block text-danger"><?php _e("E-mail musí být validní", "CZECHITAS_DOMAIN");?></p>
                                <?php }?>
                            <?php }?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><?php _e("Zpráva:*", "CZECHITAS_DOMAIN");?></label>
                            <textarea rows="5" class="form-control" placeholder="<?php _e("Zpráva:*", "CZECHITAS_DOMAIN");?>" name="contact[message]" required><?php echo $isSended ? $message : ""; ?></textarea>
                            <?php if ($isSended && empty($message)) {?>
                                <p class="help-block text-danger"><?php _e("Zpráva je povinná položka", "CZECHITAS_DOMAIN");?></p>
                            <?php }?>
                        </div>
                    </div>
                    <?php if ($isProcessed) {?>
                        <br><div id="success"><?php _e("Děkujeme za vyplnění formuláře, váš dotaz bude co nejdříve zpracován...", "CZECHITAS_DOMAIN");?></div>
                    <?php } elseif ($isError) {?>
                        <br><div id="error"><?php _e("Omliuváme se, ale během odesílání formuláře došlo k chybě...", "CZECHITAS_DOMAIN");?></div>
                    <?php }?>
                    <br>
                    <?php wp_nonce_field("czechitas_contact");?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><?php _e("Odeslat", "CZECHITAS_DOMAIN");?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
get_footer();
