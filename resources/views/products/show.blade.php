@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/showStyle.css')}}">
@endsection

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="index.html">Inicio</a> > <a href="categoria-consolas.html">Consolas</a> > PlayStation 5
    </div>

    <!-- Product Detail -->
    <main class="product-detail">
        <!-- Product Images -->
        <section class="product-image-section">
            <div class="main-image">🎮</div>
            <div class="image-thumbnails">
                <div class="thumbnail active">🎮</div>
                <div class="thumbnail">💿</div>
                <div class="thumbnail">🔊</div>
                <div class="thumbnail">⚙️</div>
            </div>
        </section>

        <!-- Product Information -->
        <section class="product-info-section">
            <div class="product-category">Consola</div>
            <h1 class="product-title">PlayStation 5</h1>

            <div class="product-rating">
                <div class="stars">★★★★★</div>
                <span class="rating-text">(4.8/5 - 2,547 reseñas)</span>
            </div>

            <div class="product-price">$499.99</div>

            <div class="product-description">
                PlayStation 5 lleva el gaming de nueva generación con gráficos 4K, ray tracing y carga ultra rápida.
                Su SSD NVMe, audio 3D y el mando DualSense con gatillos adaptativos ofrecen una experiencia inmersiva
                y fluida tanto en exclusivas como en títulos multiplataforma.
            </div>

            <div class="product-features">
                <h3 class="features-title">Características Principales</h3>
                <ul class="features-list">
                    <li>CPU AMD Zen 2 y GPU RDNA 2 con ray tracing</li>
                    <li>SSD NVMe ultrarrápido para cargas casi instantáneas</li>
                    <li>Audio 3D inmersivo</li>
                    <li>Mando DualSense con gatillos adaptativos y vibración háptica</li>
                    <li>Salida hasta 4K a 120 Hz</li>
                    <li>Retrocompatibilidad con títulos de PS4</li>
                    <li>Streaming y captura integrados</li>
                    <li>Wi‑Fi 6 y Bluetooth</li>
                </ul>
            </div>

            <div class="quantity-section">
                <label class="quantity-label">Cantidad:</label>
                <div class="quantity-controls">
                    <button class="quantity-btn">-</button>
                    <input type="number" class="quantity-input" value="1" min="1">
                    <button class="quantity-btn">+</button>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn-primary">Agregar al Carrito</button>
                <button class="btn-secondary">Comprar Ahora</button>
            </div>

            <div class="product-specs">
                <h3 class="specs-title">Especificaciones Técnicas</h3>
                <div class="specs-grid">
                    <div class="spec-item">
                        <span class="spec-label">Resolución</span>
                        <span class="spec-value">Hasta 4K HDR a 120 Hz</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">CPU</span>
                        <span class="spec-value">AMD Zen 2</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Almacenamiento</span>
                        <span class="spec-value">SSD NVMe de alta velocidad</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">GPU</span>
                        <span class="spec-value">RDNA 2 con ray tracing</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Audio</span>
                        <span class="spec-value">3D Audio (Tempest)</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Sistema</span>
                        <span class="spec-value">PlayStation OS</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Conectividad</span>
                        <span class="spec-value">Wi‑Fi 6, Bluetooth 5.1, HDMI 2.1</span>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
