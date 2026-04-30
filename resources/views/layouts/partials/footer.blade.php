<footer class="main-footer">
    <div class="footer-top-stripe"></div>
    <div class="container footer-grid">
        <div class="footer-col brand-col">
            <div class="footer-logo">
                <img src="{{ asset('assets/logo.png') }}" alt="TrueNorth Logo">
            </div>
            <div class="social-links">
                <a href="#" class="social-box"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-box"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-box"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="footer-col">
            <h4 class="footer-heading">Resources</h4>
            <ul class="footer-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('products') }}">Products</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-col contact-col">
            <h4 class="footer-heading">Contact</h4>
            <div class="contact-item">
                <span class="contact-icon"><i class="fas fa-phone"></i></span>
                <span class="contact-text">+971 50 6848012</span>
            </div>
            <div class="contact-item">
                <span class="contact-icon"><i class="fas fa-envelope"></i></span>
                <span class="contact-text">minal.t@truenorthitd.com</span>
            </div>
            <div class="contact-item">
                <span class="contact-icon"><i class="fas fa-location-dot"></i></span>
                <span class="contact-text">
                    PO Box: 932<br>B.C. 1300692, C1 Building<br>
                    Ajman Free Zone<br>United Arab Emirates
                </span>
            </div>
        </div>
        <div class="footer-col presence-col">
            <h4 class="footer-heading">Presence</h4>
            <div class="presence-map">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/ec/World_map_blank_without_borders.svg" alt="Presence Map">
                <div class="map-marker"></div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container footer-bottom-flex">
            <p class="copyright-text">
                &copy; {{ date('Y') }} TRUENORTH IT DISTRIBUTION FZ LLC. ALL RIGHTS RESERVED.
            </p>
            <div class="footer-legal-links">
                <a href="#">PRIVACY</a>
                <a href="#">TERMS</a>
            </div>
        </div>
    </div>
</footer>