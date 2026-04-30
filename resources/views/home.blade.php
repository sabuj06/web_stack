@extends('layouts.app')
@section('title', 'TrueNorth IT Distribution | Home')

@section('content')
<main>
    <section class="hero">
        <div class="hero-slider">
            @foreach($slides as $index => $slide)
            <div class="hero-slide {{ $index === 0 ? 'active' : '' }}"
                 style="background-image: url('{{ asset($slide->image) }}');">
                <div class="container hero-container">
                    <div class="hero-content">
                        <div class="hero-subheader">
                            <span class="line"></span>
                            <span class="text">{{ $slide->label }}</span>
                        </div>
                        <h1>{!! $slide->heading !!}</h1>
                        <p>{{ $slide->text }}</p>
                        <div class="hero-actions">
                            <a href="#products" class="btn-explore">
                                EXPLORE PRODUCTS <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="slider-controls">
            <div class="slider-dots">
                @foreach($slides as $index => $slide)
                <span class="dot {{ $index === 0 ? 'active' : '' }}"
                      onclick="currentSlide({{ $index }})"></span>
                @endforeach
            </div>
        </div>
    </section>

    <section class="about bg-dark">
        <div class="container">
            <h2 class="about-title">About Us</h2>
            <div class="about-grid">
                <div class="about-frame">
                    <div class="about-image">
                        <img src="{{ asset('assets/Home_about_us.png') }}" alt="TrueNorth About Us">
                        <div class="about-tag">
                            <span class="dot"></span>
                            COMPUTATIONAL EXCELLENCE
                        </div>
                    </div>
                </div>
                <div class="about-content">
                    <h3>TrueNorth IT Distribution F.Z.C</h3>
                    <p>stands as a premier Information & Communication Technology distributor, guided by seasoned industry leaders with profound expertise in regional markets. We specialize in trading an extensive array of technology products, including laptops, desktops, monitors, components, servers, storage and networking products, serving markets across UAE, GCC, Africa, CIS, and Asia.</p>
                    <a href="{{ route('about') }}" class="btn-process">
                        EXPLORE OUR PROCESS <span class="arrow">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="vision bg-dark" id="vision">
        <div class="container">
            <h2 class="vision-title">Our Vision</h2>
            <div class="vision-frame">
                <div class="vision-image">
                    <img src="{{ asset('assets/Our_Vision.png') }}" alt="Our Vision">
                    <div class="vision-banner-tag">
                        <span class="gold-dot"></span>
                        VISION STATEMENT
                    </div>
                </div>
            </div>
            <div class="vision-statement-box">
                <p>To build and become a trusted and influential IT distribution partner across emerging markets, driven by integrity, transparency, and passion, while building strong partnerships that create sustainable growth and long-term value for vendors, partners, and customers.</p>
                <div class="vision-value-tags">
                    <span class="v-tag">PRECISION</span>
                    <span class="v-tag">AUTHORITY</span>
                    <span class="v-tag">LONGEVITY</span>
                </div>
            </div>
        </div>
    </section>

    <section class="commitment bg-dark">
        <div class="container">
            <div class="commitment-content">
                <div class="commitment-subheader">
                    <span class="line"></span>
                    <span class="text">THE CORE MISSION</span>
                </div>
                <h2 class="commitment-title">Our Commitment</h2>
                <p class="commitment-text">We prioritize excellence by supplying high-quality products and services designed to fulfil the varied requirements of our valued clients.</p>
            </div>
        </div>
    </section>

    <section class="products bg-dark" id="products">
        <div class="container">
            <div class="products-header">
                <h2 class="products-title">Our Products</h2>
                <p class="products-curated-text">A CURATED ECOSYSTEM OF COMPUTATIONAL INSTRUMENTS DESIGNED FOR ABSOLUTE PERFORMANCE AND TACTILE PERMANENCE.</p>
            </div>
            <div class="products-grid">
                @foreach($products as $product)
                <a href="{{ route('products') }}"
                   class="product-card {{ $product->is_special ? 'card-special' : '' }}"
                   style="text-decoration:none;">
                    <div class="product-image">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-card-bottom">
                        <div class="product-card-info">
                            <h4>{{ $product->name }}</h4>
                            <p class="product-sub">{{ $product->sub_title }}</p>
                        </div>
                        <div class="product-card-action">
                            <span>{{ $product->action_text }}</span>
                            <span class="action-arrow">→</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
    let slideIndex = 0;
    let slides = document.querySelectorAll('.hero-slide');
    let dots   = document.querySelectorAll('.dot');
    let slideInterval = setInterval(nextSlide, 5000);

    function showSlide(n) {
        if (slides.length === 0) return;
        slides.forEach(s => s.classList.remove('active'));
        dots.forEach(d => d.classList.remove('active'));
        slideIndex = (n + slides.length) % slides.length;
        slides[slideIndex].classList.add('active');
        dots[slideIndex].classList.add('active');
    }
    function nextSlide() { showSlide(slideIndex + 1); }
    function currentSlide(n) {
        clearInterval(slideInterval);
        showSlide(n);
        slideInterval = setInterval(nextSlide, 5000);
    }
</script>
@endpush