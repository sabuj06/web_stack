@extends('layouts.app')
@section('title', 'Products | TrueNorth IT Distribution')

@section('content')
<main>
    <section class="products-page-hero">
        <div class="products-hero-overlay"></div>
        <div class="container products-hero-content">
            <p class="hero-label">ENGINEERED FOR EXCELLENCE</p>
            <h1 class="products-hero-title">
                <span class="gold-text">The New Standard of<br>Performance</span>
            </h1>
            <p class="products-hero-description">Every component is meticulously calibrated. Every curve is precision-milled. Experience the tactile peak of modern computing.</p>
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