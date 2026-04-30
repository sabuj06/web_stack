@extends('layouts.app')
@section('title', 'Products | TrueNorth IT Distribution')

@section('content')
<main>
    <section class="products-page-hero">
        <div class="products-hero-overlay"></div>
        <div class="container products-hero-content">
            <p class="hero-label">{{ $productsPage->hero_label }}</p>
            <h1 class="products-hero-title">
                <span class="gold-text">{{ $productsPage->hero_title }}</span>
            </h1>
            <p class="products-hero-description">{{ $productsPage->hero_description }}</p>
        </div>
    </section>

    <section class="products bg-dark" id="products">
        <div class="container">
            <div class="products-header">
                <h2 class="products-title">{{ $productsPage->section_title }}</h2>
                <p class="products-curated-text">{{ $productsPage->section_subtitle }}</p>
            </div>
            <div class="products-grid">
                @foreach($products as $product)
                <a href="#" class="product-card {{ $product->is_special ? 'card-special' : '' }}"
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