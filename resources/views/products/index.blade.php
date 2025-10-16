<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TechStore - Catálogo de Productos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #ffffff;
            line-height: 1.6;
            min-height: 100vh;
        }
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
            flex-wrap: wrap;
            gap: 20px;
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
            gap: 15px;
            align-items: center;
        }
        .user-btn {
            padding: 12px 24px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            text-decoration: none;
            border-radius: 20px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            font-weight: 600;
            font-size: 14px;
        }
        .user-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
        .user-btn.btn-create {
            background: linear-gradient(90deg, #00d4aa 0%, #00a67e 100%);
            border-color: transparent;
        }
        .user-btn.btn-create:hover {
            background: linear-gradient(90deg, #00f5c4 0%, #00d4aa 100%);
        }
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
                        radial-gradient(circle at center, #533483 0%, #1e3a8a 100%);
            padding: 80px 20px;
            text-align: center;
        }
        .hero-content h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            font-weight: 300;
            letter-spacing: 2px;
        }
        .hero-content p {
            font-size: 1.3em;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        .products-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }
        .section-title {
            font-size: 2.5em;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .filter-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .filter-btn {
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }
        .filter-btn:hover,
        .filter-btn.active {
            background: linear-gradient(90deg, #533483 0%, #1e3a8a 100%);
            border-color: transparent;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        .product-card {
            background: linear-gradient(145deg, #2a2a40 0%, #1a1a30 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(83, 52, 131, 0.3);
            border-color: rgba(83, 52, 131, 0.5);
        }
        .product-image {
            width: 100%;
            height: 250px;
            background: linear-gradient(45deg, #f0f0f0 0%, #e0e0e0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4em;
            color: #666;
            position: relative;
            overflow: hidden;
        }
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .product-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(83, 52, 131, 0.1) 0%, rgba(30, 58, 138, 0.1) 100%);
        }
        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #00d4aa, #00a67e);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            z-index: 1;
        }
        .product-info {
            padding: 25px;
        }
        .product-name {
            font-size: 1.4em;
            font-weight: bold;
            margin-bottom: 10px;
            color: #ffffff;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .product-type {
            color: #00d4aa;
            font-size: 0.9em;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }
        .product-description {
            color: #b0b0b0;
            font-size: 0.9em;
            margin-bottom: 15px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            min-height: 60px;
        }
        .product-price {
            font-size: 1.8em;
            font-weight: bold;
            color: #00d4aa;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(0, 212, 170, 0.3);
        }
        .product-actions {
            display: flex;
            gap: 10px;
        }
        .product-btn {
            flex: 1;
            padding: 12px;
            background: linear-gradient(90deg, #533483 0%, #1e3a8a 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            text-align: center;
        }
        .product-btn:hover {
            background: linear-gradient(90deg, #6b46c1 0%, #2563eb 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(83, 52, 131, 0.4);
        }
        .product-btn.btn-view {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        .product-btn.btn-view:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #533483;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #b0b0b0;
        }
        .empty-state h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #ffffff;
        }
        .footer {
            background: linear-gradient(90deg, #1a1a2e 0%, #16213e 100%);
            padding: 40px 0;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 60px;
        }
        .footer p {
            color: #b0b0b0;
            font-size: 14px;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @media (max-width: 768px) {
            .nav-container {
                justify-content: center;
            }
            .search-bar {
                order: 3;
                width: 100%;
            }
            .hero-content h1 {
                font-size: 2.5em;
            }
            .products-grid {
                grid-template-columns: 1fr;
            }
            .logo {
                font-size: 2em;
            }
            .section-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="nav-container">
            <a href="{{ route('products.index') }}" class="logo">TechStore</a>
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Buscar productos..." id="searchInput">
            </div>
            <div class="user-options">
                <a href="{{ route('products.create') }}" class="user-btn btn-create">+ Nuevo Producto</a>
                <a href="#" class="user-btn">Carrito (0)</a>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Bienvenido a TechStore</h1>
            <p>Descubre los mejores productos tecnológicos al mejor precio</p>
        </div>
    </section>

    <section class="products-section">
        <div class="section-header">
            <h2 class="section-title">Catálogo de Productos</h2>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">Todos</button>
                <button class="filter-btn" data-filter="Smartphone">Smartphones</button>
                <button class="filter-btn" data-filter="Laptop">Laptops</button>
                <button class="filter-btn" data-filter="Auriculares">Auriculares</button>
                <button class="filter-btn" data-filter="Smartwatch">Smartwatch</button>
            </div>
        </div>

        @if($products->count() > 0)
            <div class="products-grid" id="productsGrid">
                @foreach($products as $product)
                    <div class="product-card" data-type="{{ $product->type }}" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                        <div class="product-image">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                @switch($product->type)
                                    @case('Smartphone') 📱 @break
                                    @case('Laptop') 💻 @break
                                    @case('Auriculares') 🎧 @break
                                    @case('Smartwatch') ⌚ @break
                                    @case('Tablet') 📱 @break
                                    @case('Cámara') 📷 @break
                                    @default 📦
                                @endswitch
                            @endif
                            @if($product->created_at->diffInDays(now()) < 7)
                                <span class="product-badge">Nuevo</span>
                            @endif
                        </div>
                        <div class="product-info">
                            <div class="product-type">{{ $product->type }}</div>
                            <h3 class="product-name">{{ $product->name }}</h3>
                            @if($product->description)
                                <p class="product-description">{{ $product->description }}</p>
                            @endif
                            <div class="product-price">${{ number_format($product->price, 2) }}</div>
                            <div class="product-actions">
                                <a href="{{ route('products.show', $product->id) }}" class="product-btn btn-view">Ver Detalles</a>
                                <button class="product-btn" onclick="addToCart({{ $product->id }})">Agregar</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h2>No hay productos disponibles</h2>
                <p>¡Sé el primero en agregar un producto!</p>
                <a href="{{ route('products.create') }}" class="user-btn btn-create" style="display: inline-block; margin-top: 20px;">
                    + Crear Primer Producto
                </a>
            </div>
        @endif
    </section>

    <footer class="footer">
        <p>&copy; 2024 TechStore. Todos los derechos reservados.</p>
    </footer>

    <script>
        // Búsqueda de productos
        const searchInput = document.getElementById('searchInput');
        const productsGrid = document.getElementById('productsGrid');
        const productCards = document.querySelectorAll('.product-card');

        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();

            productCards.forEach(card => {
                const productName = card.querySelector('.product-name').textContent.toLowerCase();
                const productType = card.querySelector('.product-type').textContent.toLowerCase();

                if (productName.includes(searchTerm) || productType.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Filtros por categoría
        const filterButtons = document.querySelectorAll('.filter-btn');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remover clase active de todos los botones
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Agregar clase active al botón clickeado
                this.classList.add('active');

                const filterValue = this.getAttribute('data-filter');

                productCards.forEach(card => {
                    const cardType = card.getAttribute('data-type');

                    if (filterValue === 'all' || cardType === filterValue) {
                        card.style.display = 'block';
                        card.style.animation = 'fadeInUp 0.6s ease-out forwards';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Función para agregar al carrito
        function addToCart(productId) {
            // Aquí puedes implementar la lógica del carrito
            alert('Producto agregado al carrito! ID: ' + productId);

            // Animación del botón
            const btn = event.target;
            const originalText = btn.textContent;
            btn.textContent = '✓ Agregado';
            btn.style.background = 'linear-gradient(90deg, #00d4aa 0%, #00a67e 100%)';

            setTimeout(() => {
                btn.textContent = originalText;
                btn.style.background = '';
            }, 2000);
        }

        // Animación de las tarjetas al cargar
        window.addEventListener('load', function() {
            productCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                }, index * 100);
            });
        });
    </script>
</body>
</html>
