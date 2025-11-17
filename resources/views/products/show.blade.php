@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/showStyle.css')}}">
@endsection

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="index.html">Inicio</a> > <a href="categoria-smartphones.html">Smartphones</a> > iPhone 14 Pro Max
    </div>

    <!-- Product Detail -->
    <main class="product-detail">
        <!-- Product Images -->
        <section class="product-image-section">
            <div class="main-image">📱</div>
            <div class="image-thumbnails">
                <div class="thumbnail active">📱</div>
                <div class="thumbnail">📷</div>
                <div class="thumbnail">🔋</div>
                <div class="thumbnail">📺</div>
            </div>
        </section>

        <!-- Product Information -->
        <section class="product-info-section">
            <div class="product-category">Smartphone</div>
            <h1 class="product-title">iPhone 14 Pro Max</h1>

            <div class="product-rating">
                <div class="stars">★★★★★</div>
                <span class="rating-text">(4.8/5 - 2,547 reseñas)</span>
            </div>

            <div class="product-price">$1,199.99</div>

            <div class="product-description">
                El iPhone 14 Pro Max representa la cúspide de la innovación móvil de Apple. Con su pantalla Super Retina
                XDR de 6.7 pulgadas, el chip A16 Bionic más avanzado y un sistema de cámaras profesional, este
                dispositivo redefine lo que puedes hacer con un smartphone.
            </div>

            <div class="product-features">
                <h3 class="features-title">Características Principales</h3>
                <ul class="features-list">
                    <li>Pantalla Super Retina XDR de 6.7 pulgadas</li>
                    <li>Chip A16 Bionic con GPU de 5 núcleos</li>
                    <li>Sistema de cámaras Pro con teleobjetivo</li>
                    <li>Grabación de video 4K Dolby Vision</li>
                    <li>Batería de hasta 29 horas de reproducción de video</li>
                    <li>Resistencia al agua IP68</li>
                    <li>Face ID avanzado</li>
                    <li>5G ultrarrápido</li>
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
                        <span class="spec-label">Pantalla</span>
                        <span class="spec-value">6.7" Super Retina XDR</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Procesador</span>
                        <span class="spec-value">A16 Bionic</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Almacenamiento</span>
                        <span class="spec-value">128GB / 256GB / 512GB / 1TB</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Cámara Principal</span>
                        <span class="spec-value">48MP + 12MP + 12MP</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Cámara Frontal</span>
                        <span class="spec-value">12MP TrueDepth</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Batería</span>
                        <span class="spec-value">Hasta 29h reproducción video</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Sistema Operativo</span>
                        <span class="spec-value">iOS 16</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Conectividad</span>
                        <span class="spec-value">5G, Wi-Fi 6, Bluetooth 5.3</span>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
