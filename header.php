
    <?php wp_head(); ?>
</head>

<body>
    

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php wp_head(); ?>
    </head>
    <body>
        <header class="archive-header">
            <div class="container">
                <div class="nav-logo">
                    <?php
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $custom_logo_data = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                            $custom_logo_url = $custom_logo_data[0];
                    ?>
                    <figure class="d-flex justify-content-center">
                        <img src="<?php echo esc_url( $custom_logo_url ); ?>" class="brand-logo" alt="">
                    </figure>
                </div>
            </div>
            <div class="hero" style="background-image: linear-gradient(260deg, #7AB5B0BF, #93BD9ABF), url(<?php echo header_image(); ?>);">
                <div class="container">
                    <h1 class="lh-sm hero-title">
                        Resource Toolkit
                    </h1>
                    <span class="d-block lh-sm hero-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </span>
                </div>
            </div>
        </header>