<?php

function archive_styles(){   
    wp_enqueue_style( 'recommendation' );
}
add_action('wp_enqueue_scripts','archive_styles');

get_header();?>
        <main>
            <div class="container">
                <section class="form-section">
                    <form action="" class="search-form">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-5 search-col">
                                <input type="text" class="form-control" id="keyword" placeholder="I'm looking for">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-2 search-col">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Any type</option>
                                    <option value="1">Artículo</option>
                                    <option value="2">Podcast</option>
                                    <option value="3">Video</option>
                                </select>
                            </div>                         
                            <div class="col-12 col-sm-6 col-md-4 col-lg-2 search-col">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Any category</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-2 search-col">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Sort by</option>
                                    <option value="1">El más antiguo primero</option>
                                    <option value="2">Por nombre descendente</option>
                                    <option value="3">El más nuevo primero</option>
                                    <option value="3">El más antiguo primero</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 col-lg-1 search-col">
                                <button type="button" class="btn rounded-pill">Search</button>
                            </div>
                        </div>
                    </form>
                </section>
                <section class="posts-section">
                    <?php 
                        $current_query = get_queried_object();
                        $archive_title = is_category() ? $current_query->name : $current_query->labels->name;
                    ?>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-4">
                        <?php if (have_posts()) { ?>
                            <?php while (have_posts()) { ?>
                                <?php the_post(); ?>
                                    <div class="col">                                        
                                        <div class="card h-100 post-card">
                                            <a href="<?php $external_url = get_post_meta( get_the_ID(), 'rmd_mb_external_url', true ); echo esc_url( $external_url ); ?>">
                                                <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top post-img" alt="...">
                                            </a>
                                            <div class="card-body">
                                                <div class="post-icon">
                                                <?php
                                                    $recommendation_type = get_post_meta( get_the_ID(), 'rmd_mb_recommendation_type', true );
                                                    
                                                    if ($recommendation_type == 'articulo'):
                                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic-fill" viewBox="0 0 16 16">
                                                        <path d="M5 3a3 3 0 0 1 6 0v5a3 3 0 0 1-6 0V3z"/>
                                                        <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z"/>
                                                        </svg>';
                                                    elseif ($recommendation_type == 'video'):
                                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5z"/>
                                                        </svg>';
                                                    endif;
                                                    ?> 
                                                </div>
                                                <h5 class="lh-sm m-0 post-title"><?php the_title(); ?></h5>
                                                <span class="lh-sm d-block text-uppercase post-author-title">
                                                    Author info
                                                </span>
                                                <div class="post-author-box d-flex justify-content-start align-items-center">
                                                    <img src="<?php echo get_avatar_url( get_the_author_meta( 'id' )); ?>" class="rounded-circle post-author-img" alt="">
                                                    <span class="lh-sm d-block post-author-name">
                                                        Recomended by <span>
                                                            <?php
                                                                $author_name = get_post_meta( get_the_ID(), 'rmd_mb_author_name', true );
                                                                echo esc_html( $author_name );
                                                            ?>
                                                            </span>
                                                    </span>                                        
                                                </div>
                                                <div class="post-tags-box d-flex justify-content-start align-items-center">
                                                    <?php 
                                                        $tags = get_tags(array(
                                                        'hide_empty' => false
                                                        ));
                                                        foreach ($tags as $tag) {
                                                        echo '<span class="post-tag text-capitalize d-block">' . $tag->name . '</span>';
                                                        }
                                                    ?>
                                                </div>                                    
                                            </div>
                                        </div>
                                    </div>
                                        
                            <?php } ?>
                        <?php } ?>
                        
                        
                    </div>
                </section>
            </div>
        </main>

<?php get_footer();?>