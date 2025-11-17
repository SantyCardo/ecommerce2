@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/indexStyle.css')}}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Bienvenido a TechStore</h1>
            <p>Descubre los mejores productos tecnológicos al mejor precio</p>
        </div>
    </section>
    <!-- Products Section -->
    <section class="products-section">
        <h2 class="section-title">Productos Destacados</h2>

        <div class="products-grid">
            <!-- Producto 1 -->
            <div class="product-card">
                <div class="product-image">📱</div>
                <div class="product-info">
                    <h3 class="product-name">iPhone 14 Pro Max</h3>
                    <p class="product-type">Smartphone</p>
                    <div class="product-price">$1,199.99</div>
                    <button class="product-btn">Agregar al Carrito</button>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="product-card">
                <div class="product-image">💻</div>
                <div class="product-info">
                    <h3 class="product-name">MacBook Pro 16"</h3>
                    <p class="product-type">Laptop</p>
                    <div class="product-price">$2,399.99</div>
                    <button class="product-btn">Agregar al Carrito</button>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="product-card">
                <div class="product-image">🎧</div>
                <div class="product-info">
                    <h3 class="product-name">AirPods Pro 2</h3>
                    <p class="product-type">Auriculares</p>
                    <div class="product-price">$249.99</div>
                    <button class="product-btn">Agregar al Carrito</button>
                </div>
            </div>

            <!-- Producto 4 -->
            <div class="product-card">
                <div class="product-image">⌚</div>
                <div class="product-info">
                    <h3 class="product-name">Apple Watch Series 9</h3>
                    <p class="product-type">Smartwatch</p>
                    <div class="product-price">$399.99</div>
                    <button class="product-btn">Agregar al Carrito</button>
                </div>
            </div>

            <!-- Producto 5 -->
            <div class="product-card">
                <div class="product-image">📷</div>
                <div class="product-info">
                    <h3 class="product-name">Canon EOS R6 Mark II</h3>
                    <p class="product-type">Cámara</p>
                    <div class="product-price">$2,499.99</div>
                    <button class="product-btn">Agregar al Carrito</button>
                </div>
            </div>
        </div>
    </section>
@endsection
