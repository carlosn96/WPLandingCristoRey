<?php
/**
 * Title: El Café de la Mañana Listing
 * Slug: cristorey/el-cafe-listing
 * Categories: featured, text
 * Description: A premium listing for 'El Café de la mañana' posts.
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"
    style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
    <h2 class="wp-block-heading has-text-align-center" style="font-style:normal;font-weight:700">El Café de la Mañana
    </h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.2rem","fontStyle":"italic"}}} -->
    <p class="has-text-align-center" style="font-size:1.2rem;font-style:italic">Un momento para reflexionar y empezar el
        día con Dios.</p>
    <!-- /wp:paragraph -->

    <!-- wp:spacer {"height":"var:preset|spacing|40"} -->
    <div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:query {"queryId":2,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","categoryIds":[5],"inherit":false},"displayLayout":{"type":"flex","columns":3}} -->
    <div class="wp-block-query">
        <!-- wp:post-template -->
        <!-- wp:group {"style":{"border":{"width":"1px","style":"solid","color":"var:preset|color|theme-2"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"shadow":"var:preset|shadow|natural"},"backgroundColor":"theme-1"} -->
        <div class="wp-block-group has-theme-1-background-color has-background"
            style="border-color:var(--wp--preset--color--theme-2);border-width:1px;border-style:solid;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);box-shadow:var(--wp--preset--shadow--natural)">
            <!-- wp:post-date {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px","fontSize":"0.8rem"}},"textColor":"theme-3"} /-->

            <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"1.5rem","lineHeight":"1.2"}}} /-->

            <!-- wp:post-excerpt {"moreText":"Leer más","style":{"typography":{"fontSize":"0.95rem"}}} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
        <!-- wp:query-pagination-previous /-->
        <!-- wp:query-pagination-numbers /-->
        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->