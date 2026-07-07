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
            // Improved image slider functionality
            let slideIndex = 0;
            let slideTimer;

            function showSlides(n) {
                let slides = document.querySelectorAll('.slide');
                let dots = document.querySelectorAll('.dot');

                if (slides.length === 0) return;

                // Handle index wrapping
                if (n >= slides.length) slideIndex = 0;
                else if (n < 0) slideIndex = slides.length - 1;
                else slideIndex = n;

                // Hide all slides and deactivate all dots
                slides.forEach((slide, index) => {
                    slide.style.display = (index === slideIndex) ? 'block' : 'none';
                });

                if (dots.length > 0) {
                    dots.forEach((dot, index) => {
                        dot.className = dot.className.replace(" active", "");
                        if (index === slideIndex) dot.className += " active";
                    });
                }

                // Reset timer
                clearTimeout(slideTimer);
                slideTimer = setTimeout(() => showSlides(slideIndex + 1), 6000);
            }

            // Manual navigation functions
            function moveSlide(n) {
                showSlides(slideIndex + n);
            }

            function currentSlide(n) {
                showSlides(n);
            }

            document.addEventListener('DOMContentLoaded', () => {
                showSlides(slideIndex);
            });
        </script>
        </body>

        </html>