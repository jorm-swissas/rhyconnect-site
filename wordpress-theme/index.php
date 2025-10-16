<?php get_header(); ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <?php echo get_theme_mod('hero_title', 'Erlebe Partys'); ?> <span class="highlight">neu</span>
                </h1>
                <p class="hero-subtitle">
                    <?php echo get_theme_mod('hero_subtitle', 'Rhyconnect verbindet Menschen auf Events und macht jede Party unvergesslich. Die innovative App für echte Verbindungen.'); ?>
                </p>
                <div class="hero-buttons">
                    <a href="#download" class="btn btn-primary">
                        <i class="fas fa-download"></i>
                        App herunterladen
                    </a>
                    <a href="#about" class="btn btn-secondary">
                        <i class="fas fa-play"></i>
                        Mehr erfahren
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <div class="phone-mockup">
                    <div class="phone-screen">
                        <?php 
                        $screenshots = array();
                        if (get_theme_mod('app_screenshot')) $screenshots[] = get_theme_mod('app_screenshot');
                        if (get_theme_mod('app_screenshot_2')) $screenshots[] = get_theme_mod('app_screenshot_2');
                        if (get_theme_mod('app_screenshot_3')) $screenshots[] = get_theme_mod('app_screenshot_3');
                        if (get_theme_mod('app_screenshot_4')) $screenshots[] = get_theme_mod('app_screenshot_4');
                        if (get_theme_mod('app_screenshot_5')) $screenshots[] = get_theme_mod('app_screenshot_5');
                        if (get_theme_mod('app_screenshot_6')) $screenshots[] = get_theme_mod('app_screenshot_6');
                        if (get_theme_mod('app_screenshot_7')) $screenshots[] = get_theme_mod('app_screenshot_7');
                        if (get_theme_mod('app_screenshot_8')) $screenshots[] = get_theme_mod('app_screenshot_8');
                        if (get_theme_mod('app_screenshot_9')) $screenshots[] = get_theme_mod('app_screenshot_9');
                        if (get_theme_mod('app_screenshot_10')) $screenshots[] = get_theme_mod('app_screenshot_10');
                        
                        if (!empty($screenshots)) : ?>
                            <div class="app-slider">
                                <?php foreach ($screenshots as $index => $screenshot) : ?>
                                    <div class="app-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="<?php echo esc_url($screenshot); ?>" alt="Rhyconnect App Screenshot <?php echo $index + 1; ?>" class="app-screenshot">
                                    </div>
                                <?php endforeach; ?>
                                
                                <?php if (count($screenshots) > 1) : ?>
                                    <button class="slider-prev" onclick="changeSlide(-1)">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="slider-next" onclick="changeSlide(1)">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                    
                                    <div class="slider-dots">
                                        <?php for ($i = 0; $i < count($screenshots); $i++) : ?>
                                            <span class="dot <?php echo $i === 0 ? 'active' : ''; ?>" onclick="currentSlide(<?php echo $i + 1; ?>)"></span>
                                        <?php endfor; ?>
                                    </div>
                                    
                                    <div class="slider-counter">
                                        <span class="current-slide">1</span> / <span class="total-slides"><?php echo count($screenshots); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php else : ?>
                            <!-- Placeholder für App Screenshot -->
                            <div class="app-preview">
                                <i class="fas fa-mobile-alt"></i>
                                <p>Rhyconnect App</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title">Was ist Rhyconnect?</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>
                        Rhyconnect revolutioniert die Art, wie Menschen auf Partys und Events interagieren. 
                        Unsere App ermöglicht es, echte Verbindungen zu knüpfen und unvergessliche 
                        Erlebnisse zu schaffen.
                    </p>
                    <p>
                        Mit innovativen Features bringen wir Partygoers zusammen und sorgen dafür, 
                        dass jeder Event zu einem besonderen Erlebnis wird.
                    </p>
                </div>
                <div class="about-stats">
                    <div class="stat">
                        <h3>10k+</h3>
                        <p>Aktive Nutzer*</p>
                    </div>
                    <div class="stat">
                        <h3>500+</h3>
                        <p>Events*</p>
                    </div>
                    <div class="stat">
                        <h3>50k+</h3>
                        <p>Verbindungen*</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <h2 class="section-title">Features</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Smart Matching</h3>
                    <p>Intelligente Algorithmen verbinden dich mit passenden Personen auf Events.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Event Discovery</h3>
                    <p>Entdecke spannende Partys und Events in deiner Nähe.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Live Chat</h3>
                    <p>Chatte in Echtzeit mit anderen Teilnehmern und bleibe verbunden.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-camera"></i>
                    </div>
                    <h3>Memories</h3>
                    <p>Teile und sammle Erinnerungen von unvergesslichen Nächten.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Sicherheit</h3>
                    <p>Deine Privatsphäre und Sicherheit stehen bei uns an erster Stelle.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Premium Events</h3>
                    <p>Zugang zu exklusiven VIP-Events und besonderen Erlebnissen.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="team">
        <div class="container">
            <h2 class="section-title">Unser Team</h2>
            <div class="team-grid">
                <?php
                $team_members = new WP_Query(array(
                    'post_type' => 'team_member',
                    'posts_per_page' => -1,
                    'post_status' => 'publish'
                ));
                
                if ($team_members->have_posts()) :
                    while ($team_members->have_posts()) : $team_members->the_post();
                        $role = get_post_meta(get_the_ID(), '_team_member_role', true);
                        $bio = get_post_meta(get_the_ID(), '_team_member_bio', true);
                ?>
                        <div class="team-member">
                            <div class="member-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                <?php else : ?>
                                    <i class="fas fa-user"></i>
                                <?php endif; ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                            <p class="member-role"><?php echo esc_html($role); ?></p>
                            <p class="member-bio"><?php echo esc_html($bio); ?></p>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <!-- Default team member if none added in WordPress -->
                    <div class="team-member">
                        <div class="member-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <h3>Emilio Jordan</h3>
                        <p class="member-role">Founder</p>
                        <p class="member-bio">Visionär hinter Rhyconnect mit Leidenschaft für innovative Party-Erlebnisse.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2 class="section-title">Kontakt</h2>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Lass uns sprechen</h3>
                    <p>Interessiert an einer Partnerschaft oder Investment? Wir freuen uns von dir zu hören!</p>
                    
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:hello@rhyconnect.ch">hello@rhyconnect.ch</a>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Switzerland</span>
                    </div>
                    
                    <div class="social-links">
                        <?php if (get_theme_mod('instagram_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('instagram_url')); ?>" target="_blank" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('facebook_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank" class="social-link">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('tiktok_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('tiktok_url')); ?>" target="_blank" class="social-link">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="contact-form">
                    <?php echo do_shortcode('[contact_form]'); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>