@extends('layouts.app')
@section('title', 'About Us | TrueNorth IT Distribution')

@section('content')
<main>
    <section class="about-page-hero">
        <div class="products-hero-overlay"></div>
        <div class="container products-hero-content">
            <h1 class="products-hero-title">{{ $about->hero_title }}</h1>
            <p class="products-hero-description">{{ $about->hero_description }}</p>
        </div>
    </section>

    <section class="about-detailed bg-dark">
        <div class="container about-detailed-grid">
            <div class="about-detailed-info">
                <h2 class="about-detailed-title"><span class="gold-text">About Us</span></h2>
                <div class="about-detailed-text">
                    <p>{{ $about->about_text }}</p>
                </div>
            </div>
            <div class="about-detailed-visuals">
                <div class="main-image-wrapper">
                    <img src="{{ asset($about->about_image) }}" alt="Server Infrastructure">
                </div>
                <div class="footprint-card">
                    <div class="footprint-map-area"><div class="map-circle"></div></div>
                    <div class="footprint-content">
                        <p class="footprint-label">FOOTPRINT</p>
                        <p class="footprint-regions">{{ $about->footprint_regions }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container explore-btn-container">
            <a href="{{ route('products') }}" class="btn-explore-products">EXPLORE PRODUCTS <span>→</span></a>
        </div>
    </section>

    <section class="our-solutions">
        <div class="container">
            <h2 class="solutions-title">Our Solutions</h2>
            <div class="solutions-card">
                <p>{{ $about->solutions_text }}</p>
            </div>
        </div>
    </section>

    <section class="core-values">
        <div class="container">
            <div class="core-values-header">
                <h2 class="core-values-title">Our Core Values</h2>
                <div class="core-values-subtitle">
                    <span class="title-line"></span>
                    <p>{{ $about->core_values_subtitle }}</p>
                </div>
            </div>
            <div class="values-grid">
                @foreach($coreValues as $value)
                <div class="value-card {{ $value->card_type }}">
                    <div class="value-icon"><i class="{{ $value->icon }}"></i></div>
                    <h3>{{ $value->title }}</h3>
                    <p>{{ $value->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="vision bg-dark" id="vision">
        <div class="container">
            <h2 class="vision-title">Our Vision Statement</h2>
            <div class="vision-frame">
                <div class="vision-image">
                    <img src="{{ asset($about->vision_image) }}" alt="Our Vision">
                    <div class="vision-banner-tag">
                        <span class="gold-dot"></span> VISION STATEMENT
                    </div>
                </div>
            </div>
            <div class="vision-statement-box">
                <p>{{ $about->vision_text }}</p>
                <div class="vision-value-tags">
                    <span class="v-tag">{{ $about->vision_tag_1 }}</span>
                    <span class="v-tag">{{ $about->vision_tag_2 }}</span>
                    <span class="v-tag">{{ $about->vision_tag_3 }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="commitment bg-dark">
        <div class="container">
            <div class="commitment-content">
                <div class="commitment-subheader">
                    <span class="line"></span>
                    <span class="text">{{ $about->core_mission_label }}</span>
                </div>
                <h2 class="commitment-title">{{ $about->commitment_title }}</h2>
                <p class="commitment-text">{{ $about->commitment_text }}</p>
            </div>
        </div>
    </section>
</main>
@endsection