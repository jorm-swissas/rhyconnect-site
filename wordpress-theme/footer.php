    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <h3>Rhyconnect</h3>
                    <p>Die Zukunft der Party-Erlebnisse</p>
                </div>
                <div class="footer-links">
                    <div class="footer-section">
                        <h4>App</h4>
                        <ul>
                            <li><a href="#">iOS Download</a></li>
                            <li><a href="#">Android Download</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h4>Unternehmen</h4>
                        <ul>
                            <li><a href="#">Über uns</a></li>
                            <li><a href="#">Karriere</a></li>
                            <li><a href="#">Presse</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h4>Legal</h4>
                        <ul>
                            <li><a href="<?php echo home_url('/datenschutz'); ?>">Datenschutz</a></li>
                            <li><a href="<?php echo home_url('/agb'); ?>">AGB</a></li>
                            <li><a href="<?php echo home_url('/impressum'); ?>">Impressum</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Rhyconnect. Alle Rechte vorbehalten.</p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>