@extends('layouts.app')

@section('css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #ffffff;
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Header - mismo que la página principal */
        .header {
            background: linear-gradient(90deg, #2c1810 0%, #533483 50%, #1e3a8a 100%);
            padding: 20px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 2.5em;
            font-weight: bold;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            text-decoration: none;
        }

        .search-bar {
            flex-grow: 1;
            max-width: 600px;
            margin: 0 40px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 15px 20px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            outline: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .user-options {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .user-btn {
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            text-decoration: none;
            border-radius: 20px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .user-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Breadcrumb */
        .breadcrumb {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            font-size: 14px;
            color: #b0b0b0;
        }

        .breadcrumb a {
            color: #00d4aa;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: #ffffff;
        }

        /* Main Content */
        .product-detail {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }

        /* Product Image Section */
        .product-image-section {
            position: sticky;
            top: 120px;
        }

        .main-image {
            width: 100%;
            height: 500px;
            background: linear-gradient(145deg, #f0f0f0 0%, #e0e0e0 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8em;
            color: #666;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .main-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(83, 52, 131, 0.1) 0%, rgba(30, 58, 138, 0.1) 100%);
        }

        .image-thumbnails {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            background: linear-gradient(145deg, #f0f0f0 0%, #e0e0e0 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2em;
            color: #666;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .thumbnail:hover,
        .thumbnail.active {
            border-color: #533483;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(83, 52, 131, 0.3);
        }

        /* Product Info Section */
        .product-info-section {
            animation: fadeInRight 0.8s ease-out;
        }

        .product-category {
            color: #00d4aa;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .product-title {
            font-size: 3em;
            font-weight: bold;
            margin-bottom: 20px;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .stars {
            color: #ffd700;
            font-size: 1.2em;
        }

        .rating-text {
            color: #b0b0b0;
            font-size: 14px;
        }

        .product-price {
            font-size: 2.5em;
            font-weight: bold;
            color: #00d4aa;
            margin-bottom: 30px;
            text-shadow: 0 2px 4px rgba(0, 212, 170, 0.3);
        }

        .product-description {
            color: #e0e0e0;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            border-left: 4px solid #533483;
        }

        .product-features {
            margin-bottom: 40px;
        }

        .features-title {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .features-list {
            list-style: none;
        }

        .features-list li {
            padding: 8px 0;
            color: #e0e0e0;
            position: relative;
            padding-left: 25px;
        }

        .features-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #00d4aa;
            font-weight: bold;
        }

        .quantity-section {
            margin-bottom: 30px;
        }

        .quantity-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #ffffff;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .quantity-btn {
            width: 40px;
            height: 40px;
            background: linear-gradient(90deg, #533483 0%, #1e3a8a 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quantity-btn:hover {
            background: linear-gradient(90deg, #6b46c1 0%, #2563eb 100%);
            transform: translateY(-2px);
        }

        .quantity-input {
            width: 60px;
            height: 40px;
            text-align: center;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.05);
            color: white;
            font-size: 16px;
            outline: none;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            margin-bottom: 40px;
        }

        .btn-primary {
            flex: 1;
            padding: 18px;
            background: linear-gradient(90deg, #533483 0%, #1e3a8a 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 5px 15px rgba(83, 52, 131, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #6b46c1 0%, #2563eb 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(83, 52, 131, 0.4);
        }

        .btn-secondary {
            flex: 1;
            padding: 18px;
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #533483;
            transform: translateY(-3px);
        }

        .product-specs {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .specs-title {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .specs-grid {
            display: grid;
            gap: 15px;
        }

        .spec-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .spec-item:last-child {
            border-bottom: none;
        }

        .spec-label {
            color: #b0b0b0;
            font-weight: 500;
        }

        .spec-value {
            color: #ffffff;
            font-weight: 600;
        }

        /* Animations */
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 20px;
            }

            .search-bar {
                margin: 0;
                max-width: 100%;
            }

            .product-detail {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .product-image-section {
                position: static;
            }

            .product-title {
                font-size: 2.2em;
            }

            .product-price {
                font-size: 2em;
            }

            .action-buttons {
                flex-direction: column;
            }

            .main-image {
                height: 350px;
                font-size: 6em;
            }

            .logo {
                font-size: 2em;
            }
        }
    </style>
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
