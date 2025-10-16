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
                <button id="theme-toggle" aria-label="Dark/Light Mode umschalten">
                    <svg id="icon-moon" width="26" height="26" viewBox="0 0 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:block;"><path d="M21 13.5A9 9 0 0 1 12.5 3a7.5 7.5 0 1 0 8.5 10.5z"/></svg>
                    <svg id="icon-sun" width="26" height="26" viewBox="0 0 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;"><circle cx="13" cy="13" r="5"/><g><line x1="13" y1="1" x2="13" y2="4"/><line x1="13" y1="22" x2="13" y2="25"/><line x1="1" y1="13" x2="4" y2="13"/><line x1="22" y1="13" x2="25" y2="13"/><line x1="4.22" y1="4.22" x2="6.34" y2="6.34"/><line x1="19.66" y1="19.66" x2="21.78" y2="21.78"/><line x1="4.22" y1="21.78" x2="6.34" y2="19.66"/><line x1="19.66" y1="6.34" x2="21.78" y2="4.22"/></g></svg>
                </button>
                <div class="nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>