@extends('layouts.app')
@section('title', 'Contact | TrueNorth IT Distribution')

@section('content')
<main>
    <section class="contact-hero">
        <div class="contact-hero-overlay"></div>
        <div class="container contact-hero-content">
            <p class="protocol-label">PROTOCOL 01 // GLOBAL INQUIRY</p>
            <h1 class="contact-hero-title">Connect with <span class="gold-text">Precision</span></h1>
            <p class="contact-hero-description">Our specialists are ready to help you engineer your next infrastructure breakthrough.</p>
        </div>
    </section>

    <section class="inquiry-center bg-dark">
        <div class="container inquiry-grid">
            <div class="inquiry-info">
                <p class="inquiry-label">INQUIRY PROTOCOL</p>
                <h1 class="inquiry-title">Global Inquiry <span class="gold-text">Center</span></h1>
                <p class="inquiry-description">Our corporate advisory division provides strategic guidance for international stakeholders.</p>
                <div class="contact-meta-list">
                    <div class="meta-item">
                        <div class="meta-icon"><i class="fas fa-location-dot"></i></div>
                        <div class="meta-content">
                            <p class="meta-label">HEADQUARTERS</p>
                            <p class="meta-text">PO Box: 932 B.C. 1300692, C1 Building Ajman Free Zone United Arab Emirates</p>
                        </div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-icon"><i class="fas fa-envelope"></i></div>
                        <div class="meta-content">
                            <p class="meta-label">EMAIL ADDRESS</p>
                            <p class="meta-text">minal.t@truenorthitd.com</p>
                        </div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-icon"><i class="fas fa-phone"></i></div>
                        <div class="meta-content">
                            <p class="meta-label">DIRECT LINE</p>
                            <p class="meta-text">+971 50 6848012</p>
                        </div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-icon"><i class="fas fa-clock"></i></div>
                        <div class="meta-content">
                            <p class="meta-label">AVAILABILITY</p>
                            <p class="meta-text">Mon-Fri 09:00 - 18:00</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="inquiry-form-container">
                <div class="service-request-box">
                    <h2 class="form-title">Service Request</h2>
                    @if(session('success'))
                        <div class="alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label>FULL NAME</label>
                                <input type="text" name="name"
                                       placeholder="ALEXANDER VANCE"
                                       value="{{ old('name') }}">
                                @error('name')
                                    <span class="error-text">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>PHONE NUMBER</label>
                                <input type="text" name="phone"
                                       placeholder="+971 000 000 000"
                                       value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="form-group full-width">
                            <label>EMAIL ADDRESS</label>
                            <input type="email" name="email"
                                   placeholder="OFFICE@DOMAIN.COM"
                                   value="{{ old('email') }}">
                            @error('email')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group full-width">
                            <label>SERVICE INTERESTED IN</label>
                            <select name="service">
                                <option>SELECT A DIVISION</option>
                                <option {{ old('service') == 'IT DISTRIBUTION'    ? 'selected' : '' }}>IT DISTRIBUTION</option>
                                <option {{ old('service') == 'ASSET MANAGEMENT'   ? 'selected' : '' }}>ASSET MANAGEMENT</option>
                                <option {{ old('service') == 'CORPORATE ADVISORY' ? 'selected' : '' }}>CORPORATE ADVISORY</option>
                            </select>
                        </div>
                        <div class="form-group full-width">
                            <label>MESSAGE BOX</label>
                            <textarea name="message"
                                      placeholder="PLEASE DESCRIBE YOUR INQUIRY...">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn-inquiry">SEND INQUIRY</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-map">
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115348.6010041165!2d55.4549216!3d25.390848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5f79a9307771%3A0xe54e6616a2bb22b1!2sAjman%20Free%20Zone!5e0!3m2!1sen!2sae!4v1690000000000!5m2!1sen!2sae"
                    width="100%" height="600"
                    style="border:0;filter:grayscale(1) contrast(1.1) opacity(0.8);"
                    allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
</main>
@endsection