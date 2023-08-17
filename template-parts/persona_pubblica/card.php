<?php

    global $pp_id, $with_border;

    $persona = get_post( $pp_id );

    $prefix = '_dci_persona_pubblica_';
    $descrizione_breve = dci_get_meta('descrizione_breve', $prefix, $persona->ID);
    $foto = dci_get_meta('foto', $prefix, $persona->ID);

	$inc_args = array(
            'post_type' => 'incarico',
            'meta_query' => array(
                array(
                    'key'     => '_dci_incarico_persona',
                    'value'   => $persona->ID
                ),
            ),
            'numberposts' => -1,
	        'post_status' => 'publish',
	        'orderby' => 'post_title',
	        'order' => 'ASC',
        );
     $inc_query = new WP_Query( $inc_args );
     $inc_list = get_posts($inc_args);

	 $incarichi = array();

	 foreach($inc_list as $incarico) {
     	array_push($incarichi,$incarico->post_title);
     }

    if($with_border) {
?>

<div class="card card-teaser card-teaser-info rounded shadow-sm p-3">
    <div class="card-body pe-3">
        <p class="card-title text-paragraph-regular-medium-semi mb-3">
            <a class="text-decoration-none" href="<?php echo get_permalink($persona->ID); ?>" data-element="service-area">
            <?php echo $persona->post_title; ?>
            </a>
        </p>
        <div class="card-text">
            <?php 
            if($descrizione_breve) {
            	echo $descrizione_breve;
            } else {
            	echo implode(', ', $incarichi);
            }
    ?>
        </div>
    </div>
    <?php if ($foto) { ?>
        <div class="avatar size-xl">
            <?php dci_get_img($foto); ?>
        </div>
    <?php } else {
    ?>
		<svg class="icon svg-marker-simple"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-user"></use></svg>
    <?php } ?>
</div>
<?php } else { ?>
<div class="card card-teaser border rounded shadow p-4">
    <div class="card-body pe-3">
        <h4 class="u-main-black mb-1 title-small-semi-bold-medium">
            <a class="text-decoration-none" href="<?php echo get_permalink($persona->ID); ?>">
            <?php echo $persona->post_title; ?>
            </a>
        </h4>
        <div class="card-text">
            <?php 
            if($descrizione_breve) {
            	echo $descrizione_breve;
            } else {
            	echo implode(', ', $incarichi);
            }
    ?>
        </div>
    </div>
    <?php if ($foto) { ?>
    <div class="avatar size-xl">
        <?php dci_get_img($foto); ?>
    </div>
    <?php } else {
    ?>
		<svg class="icon svg-marker-simple"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-user"></use></svg>
    <?php } ?>
</div>
<?php } 
$with_border = false;
?>