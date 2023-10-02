<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Design_Comuni_Italia
 */


function genera_voci_tassonomia($tassonomia)
{
    $terms =  get_terms(array(
        'taxonomy' => $tassonomia,
        'hide_empty' => true,
    ));
    foreach ($terms as $term) {
    ?>
        <li>
            <a href="<?= get_term_link($term) ?>"><?= $term->name ?></a>
        </li>
    <?php
    }
}
?>
<footer class="it-footer" id="footer">
    <div class="it-footer-main">
        <div class="container">
            <div class="row">
                <div class="col-12 footer-items-wrapper logo-wrapper">
                    <div class="it-brand-wrapper">
                        <a href="<?php echo home_url() ?>">
                            <?php get_template_part("template-parts/common/logo"); ?>
                            <div class="it-brand-text">
                                <h2 class="no_toc"><?php echo dci_get_option("nome_comune"); ?></h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 footer-items-wrapper">
                    <?php
                    $location = "menu-footer-col-1";
                    if (has_nav_menu($location)) { ?>
                        <h3 class="footer-heading-title">
                            <?php echo wp_get_nav_menu_name($location); ?>
                        </h3>
                    <?php wp_nav_menu(array(
                            "theme_location" => $location,
                            "depth" => 0,
                            "menu_class" => "footer-list",
                            'walker' => new Footer_Menu_Walker()
                        ));
                    }
                    ?>
                </div>
                <div class="col-md-3 footer-items-wrapper">
                    <?php
                    $location = "menu-footer-col-2";
                    if (has_nav_menu($location)) {
                    ?>
                        <h3 class="footer-heading-title">
                            <?php echo wp_get_nav_menu_name($location); ?>
                        </h3>
                    <?php wp_nav_menu(array(
                            "theme_location" => $location,
                            "depth" => 0,
                            "menu_class" => "footer-list",
                            'walker' => new Footer_Menu_Walker()
                        ));
                    } else {
                    ?>
                        <h3 class="footer-heading-title">
                            Categorie di Servizio
                        </h3>
                        <ul class="footer-list">
                            <?php genera_voci_tassonomia('categorie_servizio'); ?>
                        </ul>
                        <?php
                    } ?>
                </div>
                <div class="col-md-3 footer-items-wrapper">
                    <?php
                    $location = "menu-footer-col-3";
                    if (has_nav_menu($location)) {
                    ?>
                        <h3 class="footer-heading-title">
                            <?php echo wp_get_nav_menu_name($location); ?>
                        </h3>
                    <?php wp_nav_menu(array(
                            "theme_location" => $location,
                            "depth" => 0,
                            "menu_class" => "footer-list",
                            'walker' => new Footer_Menu_Walker()
                        ));
                    } else {
                    ?>
                        <h3 class="footer-heading-title">
                            Tipi di Documento
                        </h3>
                        <ul class="footer-list">
                            <?php genera_voci_tassonomia('tipi_documento'); ?>
                        </ul>
                        <?php
                    } ?>
                </div>
                <div class="col-md-3 footer-items-wrapper">
                    <?php
                    $location = "menu-footer-col-4-1";
                    if (has_nav_menu($location)) { ?>
                        <h3 class="footer-heading-title">
                            <?php echo wp_get_nav_menu_name($location); ?>
                        </h3>
                    <?php wp_nav_menu(array(
                            "theme_location" => $location,
                            "depth" => 0,
                            "menu_class" => "footer-list",
                            "container_class" => "footer-list",
                            'walker' => new Footer_Menu_Walker()
                        ));
                    } else {
                    ?>
                        <h3 class="footer-heading-title">
                            Novità
                        </h3>
                        <ul class="footer-list">
                            <?php genera_voci_tassonomia('tipi_notizia'); ?>
                        </ul>
                        <?php
                    }
                    ?>
                    <?php
                    $location = "menu-footer-col-4-2";
                    if (has_nav_menu($location)) { ?>
                        <h3 class="footer-heading-title">
                            <?php echo wp_get_nav_menu_name($location); ?>
                        </h3>
                    <?php wp_nav_menu(array(
                            "theme_location" => $location,
                            "depth" => 0,
                            "menu_class" => "footer-list",
                            'walker' => new Footer_Menu_Walker()
                        ));
                    }
                    ?>
                </div>
                <div class="col-md-9 mt-md-4 footer-items-wrapper">
                    <h3 class="footer-heading-title">Contatti</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="footer-info">
                                <strong><?php echo dci_get_option("nome_comune"); ?></strong>


                                <?php
                                if (dci_get_option("contatti_indirizzo", 'footer')) {
                                ?>
                                    <br /><a href="https://www.openstreetmap.org/search?query=<?php echo dci_get_option("contatti_indirizzo", 'footer'); ?>" title="Mappa e indicazioni stradali"><?php echo dci_get_option("contatti_indirizzo", 'footer'); ?></a>
                                <?php
                                }
                                ?>

                                <?php
                                $codice_fiscale = dci_get_option("contatti_CF", 'footer');
                                $partita_iva = dci_get_option("contatti_PIVA", 'footer');

                                if ($codice_fiscale && $codice_fiscale == $partita_iva) {
                                    echo '<br />Codice fiscale / P.IVA: ' . $codice_fiscale;
                                } else {
                                ?>
                                    <br /><?php if ($codice_fiscale) echo 'Codice fiscale: ' . $codice_fiscale; ?>
                                    <br /><?php if ($partita_iva) echo 'Partita IVA: ' . $partita_iva; ?>
                                <?php
                                }
                                ?>
                                <br /><br />
                                <?php
                                $ufficio_id = dci_get_option("contatti_URP", 'footer');
                                $ufficio = get_post($ufficio_id);
                                if ($ufficio_id) { ?>
                                    <a href="<?php echo get_post_permalink($ufficio_id); ?>" class="list-item" title="Vai alla pagina: URP">
                                        <?php echo $ufficio->post_title ?>
                                    </a>
                                <?php } ?>
                                <?php if (dci_get_option("numero_verde", 'footer')) echo '<br />Numero verde: <a href="tel:' . dci_get_option("numero_verde", 'footer') . '">' . dci_get_option("numero_verde", 'footer') . '</a>'; ?>
                                <?php if (dci_get_option("SMS_Whatsapp", 'footer')) echo '<br />SMS e WhatsApp: <a href="tel:' . dci_get_option("SMS_Whatsapp", 'footer') . '">' . dci_get_option("SMS_Whatsapp", 'footer') . '</a>'; ?>
                                <?php
                                if (dci_get_option("contatti_PEC", 'footer')) echo '<br />PEC: '; ?>
                                <a href="mailto:<?php echo dci_get_option("contatti_PEC", 'footer'); ?>" class="list-item" title="PEC <?php echo dci_get_option("nome_comune"); ?>"><?php echo dci_get_option("contatti_PEC", 'footer'); ?></a>
                                <?php if (dci_get_option("centralino_unico", 'footer')) echo '<br />Centralino unico: <a href="' . dci_get_option("centralino_unico", 'footer') . '">' . dci_get_option("centralino_unico", 'footer') . '</a>'; ?>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <?php
                            $location = "menu-footer-info-1";
                            if (has_nav_menu($location)) {
                                wp_nav_menu(array(
                                    "theme_location" => $location,
                                    "depth" => 0,
                                    "menu_class" => "footer-list",
                                    'walker' => new Footer_Menu_Walker()
                                ));
                            }
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?php
                            $location = "menu-footer-info-2";
                            if (has_nav_menu($location)) {
                                wp_nav_menu(array(
                                    "theme_location" => $location,
                                    "depth" => 0,
                                    "menu_class" => "footer-list",
                                    'walker' => new Footer_Menu_Walker()
                                ));
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-md-4 footer-items-wrapper">
                    <?php
                    $socials = dci_get_option('link_social', 'socials');
                    if (is_array($socials) && count($socials)) {
                    ?>
                        <h3 class="footer-heading-title">Seguici su</h3>
                        <ul class="list-inline text-start social">
                            <?php foreach ($socials as $social) { ?>
                                <li class="list-inline-item">
                                    <a href="<?php echo $social['url_social'] ?>" target="_blank" class="p-2 text-white">
                                        <svg class="icon icon-sm icon-white align-top">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" href="#<?php echo $social['icona_social'] ?>"></use>
                                        </svg>
                                        <span class="visually-hidden"><?php echo $social['nome_social']; ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul><!-- /header-social-wrapper -->
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 footer-items-wrapper">
                    <div class="footer-bottom">
                        <?php if (dci_get_option("media_policy", 'footer')) { ?>
                            <a href="<?php echo dci_get_option("media_policy", 'footer'); ?>">Media policy</a>
                        <?php } ?>
                        <?php if (dci_get_option("sitemap", 'footer')) { ?>
                            <a href="<?php echo dci_get_option("sitemap", 'footer'); ?>">Mappa del sito</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>