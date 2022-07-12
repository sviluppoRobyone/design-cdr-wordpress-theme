<?php
    $categorie = get_terms('tipi_documento', array(
        'hide_empty' => false,
    ) );
?>

<div class="container py-5" id="argomento">
    <h2 class="title-xxlarge mb-4">Esplora per categoria</h2>
    <div class="row g-4">       
        <?php foreach ($categorie as $categoria) { 
        ?>
        <div class="col-md-6 col-xl-4">
            <div class="cmp-card-simple card-wrapper pb-0 rounded border border-light">
              <div class="card shadow-sm rounded">
                <div class="card-body">
                    <a href="<?php echo get_term_link($categoria->term_id); ?>" aria-label="Vai alla categoria <?php echo $categoria->name; ?>" title="Vai alla categoria <?php echo $categoria->name; ?>"><h3 class="card-title t-primary title-xlarge"><?php echo $categoria->name; ?></h3></a>
                    <p class="titillium text-paragraph mb-0 description">
                        <?php echo $categoria->description; ?>
                    </p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
    </div>
</div>