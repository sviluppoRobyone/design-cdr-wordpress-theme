<?php
global $argomento_full, $count;

$arg1 = dci_get_option('argomenti_evidenziati_1','homepage')[0];
$arg2 = dci_get_option('argomenti_evidenziati_2','homepage')[0];
$arg3 = dci_get_option('argomenti_evidenziati_3','homepage')[0];
$argomenti_evidenza = array($arg1, $arg2, $arg3);

$altri_argomenti = dci_get_option('argomenti_altri','homepage');
?>

<div class="container">
    <div class="row">
        <h2 class="text-white title-xlarge mb-3">In evidenza</h2>
    </div>
    <div>
        <div class="card-wrapper card-teaser-wrapper card-teaser-wrapper-equal card-teaser-block-3">
            <?php $count=1;
            foreach ($argomenti_evidenza as $argomento_full) {
                if($argomento_full['argomento_'.$count.'_argomento'])
                    get_template_part("template-parts/home/scheda-argomento");
                ++$count;
            } ?>
        </div>
    </div>
    <div class="row pt-30">
        <div class="l-lg-10 col-xl-6 offset-lg-1 offset-xl-2">
            <div class="row d-lg-inline-flex">
                <div class="col-lg-3">
                    <h3 class="text-uppercase mb-3 title-xsmall-bold text u-grey-light">
                        Altri argomenti
                    </h3>
                </div>
                <div class="col-lg-9 argomenti">
                    <?php if (is_array($altri_argomenti)) {
                        foreach ($altri_argomenti as $arg_id) {
                            $argomento = get_term_by('term_taxonomy_id', $arg_id);
                            $url = get_term_link(intval($arg_id),'argomenti');
                    ?>
                    <div class="chip chip-simple pb-0 mb-2">
                        <a href="<?php echo $url ?>" class="chip-label" aria-label="Vai all'argomento <?php echo $argomento->name; ?>" title="Vai all'argomento <?php echo $argomento->name; ?>"><?php echo $argomento->name ?></a>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2 text-center">
            <a href="<?php echo dci_get_template_page_url("page-templates/argomenti.php"); ?>" class="btn btn-primary mt-40" aria-label="Vai alla pagina argomenti" title="Vai alla pagina argomenti">Vedi tutti</a>
        </div>
    </div>
</div>
