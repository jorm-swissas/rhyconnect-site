<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Header/Navigation -->
    <header class="header">
        <nav class="nav">
            <div class="nav-container">
                <div class="nav-logo">
                    <h1><a href="<?php echo home_url(); ?>">Rhyconnect</a></h1>
                </div>
                <ul class="nav-menu">
                    <li><a href="#about">Über uns</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#contact">Kontakt</a></li>
                </ul>
                <div class="nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>