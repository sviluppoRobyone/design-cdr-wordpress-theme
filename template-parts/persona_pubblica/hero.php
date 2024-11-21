<?php
    global $title, $description, $with_shadow, $data_element, $content;

    if (!$title) $title = get_the_title();
    if (!$description) $description = dci_get_meta('descrizione','_dci_page_',$post->ID ?? null);
    if(!$content) $content = get_the_content();
?>

<div class="container" id="main-container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <?php get_template_part("template-parts/common/breadcrumb"); ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center <?php echo $with_shadow? 'row-shadow' : ''?>">
        <div class="col-12 col-lg-10">
            <div class="cmp-hero">
                <section class="it-hero-wrapper bg-white align-items-start">
                    <div class="it-hero-text-wrapper pt-0 ps-0 pb-2">
                        <h1 class="text-black hero-title" <?php echo $data_element ? $data_element : null ?>>
                            <?php echo $title; ?> 
                        </h1>
                        <div class="hero-text">
                            <p><?php echo $description; ?></p>
                        </div>
                    </div>
                </section>
            </div>
            <div class="pt-4 pb-4">
                <?php
                if($content != '')
                    echo $content; 
                ?>
            </div>
        </div>
       
    </div>
</div>