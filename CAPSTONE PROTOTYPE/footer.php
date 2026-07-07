        </div>
        </main>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-section">
                        <h3>About LGU Bontoc</h3>
                        <p>The official website of the Local Government Unit of Bontoc, Mountain Province.</p>
                        <p><strong>Vision:</strong> A progressive and resilient community.</p>
                    </div>
                    <div class="footer-section">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="?action=home">Home</a></li>
                            <li><a href="?action=officials">Officials</a></li>
                            <li><a href="?action=mayor-message">Mayor's Message</a></li>
                            <li><a href="?action=announcements">Announcements</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h3>Contact Us</h3>
                        <p>📍 Bontoc, Mountain Province</p>
                        <p>📞 (074) 123-4567</p>
                        <p>✉️ info@lgubontoc.gov.ph</p>
                    </div>
                    <div class="footer-section">
                        <h3>Follow Us</h3>
                        <div class="social-links">
                            <a href="#" class="social-link">Facebook</a>
                            <a href="#" class="social-link">Twitter</a>
                            <a href="#" class="social-link">YouTube</a>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>&copy; <?php echo date('Y'); ?> LGU Bontoc. All Rights Reserved.</p>
                    <p>Developed with ❤️ by the Municipal ICT Office</p>
                </div>
            </div>
        </footer>

        <script>
            // Simple image slider functionality
            let slideIndex = 0;
            let slideTimer;

            function showSlides() {
                let slides = document.querySelectorAll('.slide');
                if (slides.length === 0) return;
                slides.forEach((slide, index) => {
                    slide.style.display = (index === slideIndex) ? 'block' : 'none';
                });
                slideIndex = (slideIndex + 1) % slides.length;
                setTimeout(showSlides, 5000);
            }
            document.addEventListener('DOMContentLoaded', showSlides);
        </script>
        </body>

        </html>