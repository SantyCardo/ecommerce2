@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/indexStyle.css')}}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-banner">
            <div class="hero-overlay"></div>
            <div class="hero-text">
                <h1>Versus COLOMBIA store</h1>
                <p>La casa de las consolas de nueva generación</p>
                <a href="#productos" class="cta-btn">Disponible Ahora</a>
            </div>
        </div>
    </section>
    
    <!-- Tabs -->
    <nav class="tabs">
        <button class="tab active">Más reciente</button>
        <button class="tab">Colecciones</button>
        <button class="tab">Ofertas</button>
        <button class="tab">Explorar</button>
    </nav>
    <!-- Products Section -->
    <section id="productos" class="products-section">
        <h2 class="section-title">Productos Destacados</h2>

        <div class="products-grid">
            <!-- Producto 1 -->
            <div class="product-card">
                <div class="product-image">🎮</div>
                <div class="product-info">
                    <h3 class="product-name">PlayStation 5</h3>
                    <p class="product-type">Consola</p>
                    <div class="product-price">$499.99</div>
                    <button class="product-btn">Agregar al Carrito</button>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="product-card">
                <div class="product-image">🎮</div>
                <div class="product-info">
                    <h3 class="product-name">Xbox Series X</h3>
                    <p class="product-type">Consola</p>
                    <div class="product-price">$499.99</div>
                    <button class="product-btn">Agregar al Carrito</button>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="product-card">
                <div class="product-image">🎮</div>
                <div class="product-info">
                    <h3 class="product-name">Nintendo Switch OLED</h3>
                    <p class="product-type">Consola</p>
                    <div class="product-price">$349.99</div>
                    <button class="product-btn">Agregar al Carrito</button>
                </div>
            </div>

            <!-- Producto 4 -->
            <div class="product-card">
                <div class="product-image">🎮</div>
                <div class="product-info">
                    <h3 class="product-name">Xbox Series S</h3>
                    <p class="product-type">Consola</p>
                    <div class="product-price">$299.99</div>
                    <button class="product-btn">Agregar al Carrito</button>
                </div>
            </div>

            <!-- Producto 5 -->
            <div class="product-card">
                <div class="product-image">🎮</div>
                <div class="product-info">
                    <h3 class="product-name">Nintendo Switch Lite</h3>
                    <p class="product-type">Consola</p>
                    <div class="product-price">$199.99</div>
                    <button class="product-btn">Agregar al Carrito</button>
                </div>
            </div>
        </div>
    </section>
@endsection
