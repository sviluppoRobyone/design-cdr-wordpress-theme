<?php
    $pages = dci_get_children_pages('amministrazione');
    $arr_pages = array_keys((array)$pages);
?>
<div class="container py-5">
    <h2 class="title-xxlarge mb-4">
        Esplora l'amministrazione
    </h2>
    <div class="row g-4">
        <?php foreach ($arr_pages as $key => $page_name) { 
            $page = $pages[$page_name]; ?>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="cmp-card-simple card-wrapper pb-0 rounded border border-light">
            <div class="card shadow-sm rounded">
                <div class="card-body">
                <a href="<?php echo $page['link']; ?>" aria-label="Vai all'argomento <?php echo $page_name; ?>" title="Vai all'argomento <?php echo $page_name; ?>" data-element="administration-element"><h3 class="card-title t-primary title-xlarge"><?php echo $page_name; ?></h3></a>
                <p class="titillium text-paragraph mb-0">
                    <?php echo $page['description']; ?>
                </p>
                </div>
            </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>