<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }} - TechStore</title>
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
        .product-detail {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }
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
        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
        .product-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, #00d4aa, #00a67e);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: bold;
            z-index: 1;
        }
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
        .product-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #b0b0b0;
            font-size: 14px;
        }
        .product-price {
            font-size: 2.8em;
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
        .product-specs {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .specs-title {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #ffffff;
        }
        .spec-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
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
            width: 45px;
            height: 45px;
            background: linear-gradient(90deg, #533483 0%, #1e3a8a 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .quantity-btn:hover {
            background: linear-gradient(90deg, #6b46c1 0%, #2563eb 100%);
            transform: translateY(-2px);
        }
        .quantity-input {
            width: 70px;
            height: 45px;
            text-align: center;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.05);
            color: white;
            font-size: 18px;
            font-weight: bold;
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
        .admin-actions {
            display: flex;
            gap: 15px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .btn-edit, .btn-delete {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }
        .btn-edit {
            background: linear-gradient(90deg, #00d4aa 0%, #00a67e 100%);
            color: white;
        }
        .btn-edit:hover {
            background: linear-gradient(90deg, #00f5c4 0%, #00d4aa 100%);
            transform: translateY(-2px);
        }
        .btn-delete {
            background: linear-gradient(90deg, #ff6b6b 0%, #ee5a52 100%);
            color: white;
        }
        .btn-delete:hover {
            background: linear-gradient(90deg, #ff8585 0%, #ff6b6b 100%);
            transform: translateY(-2px);
        }
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
        @media (max-width: 768px) {
            .nav-container {
                justify-content: center;
            }
            .search-bar {
                order: 3;
                width: 100%;
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
                font-size: 2.2em;
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
</head>
<body>
    <header class="header">
        <div class="nav-container">
            <a href="{{ route('products.index') }}" class="logo">TechStore</a>
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Buscar productos...">
            </div>
            <div class="user-options">
                <a href="{{ route('products.create') }}" class="user-btn">+ Nuevo</a>
                <a href="#" class="user-btn">Carrito (0)</a>
            </div>
        </div>
    </header>

    <div class="breadcrumb">
        <a href="{{ route('products.index') }}">Inicio</a> >
        <a href="{{ route('products.index') }}">{{ $product->type }}</a> >
        {{ $product->name }}
    </div>

    <main class="product-detail">
        <section class="product-image-section">
            <div class="main-image">
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
        </section>

        <section class="product-info-section">
            <div class="product-category">{{ $product->type }}</div>
            <h1 class="product-title">{{ $product->name }}</h1>

            <div class="product-meta">
                <div class="meta-item">
                    <span>🏷️</span>
                    <span>SKU: #{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</span>
                </div>
                @if($product->brand)
                    <div class="meta-item">
                        <span>🏢</span>
                        <span>Marca: {{ $product->brand }}</span>
                    </div>
                @endif
                <div class="meta-item">
                    <span>📅</span>
                    <span>Agregado: {{ $product->created_at->format('d/m/Y') }}</span>
                </div>
            </div>

            <div class="product-price">${{ number_format($product->price, 2) }}</div>

            @if($product->description)
                <div class="product-description">
                    {{ $product->description }}
                </div>
            @endif

            <div class="product-specs">
                <h3 class="specs-title">Información del Producto</h3>
                <div class="spec-item">
                    <span class="spec-label">Categoría</span>
                    <span class="spec-value">{{ $product->type }}</span>
                </div>
                @if($product->brand)
                    <div class="spec-item">
                        <span class="spec-label">Marca</span>
                        <span class="spec-value">{{ $product->brand }}</span>
                    </div>
                @endif
                <div class="spec-item">
                    <span class="spec-label">Precio</span>
                    <span class="spec-value">${{ number_format($product->price, 2) }}</span>
                </div>
                <div class="spec-item">
                    <span class="spec-label">Disponibilidad</span>
                    <span class="spec-value" style="color: #00d4aa;">En Stock</span>
                </div>
                <div class="spec-item">
                    <span class="spec-label">Última Actualización</span>
                    <span class="spec-value">{{ $product->updated_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            <div class="quantity-section">
                <label class="quantity-label">Cantidad:</label>
                <div class="quantity-controls">
                    <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                    <input type="number" class="quantity-input" id="quantity" value="1" min="1" max="99">
                    <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn-primary" onclick="addToCart()">Agregar al Carrito</button>
                <button class="btn-secondary" onclick="buyNow()">Comprar Ahora</button>
            </div>

            <div class="admin-actions">
                <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">✏️ Editar Producto</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="flex: 1;" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete" style="width: 100%;">🗑️ Eliminar</button>
                </form>
            </div>
        </section>
    </main>

    <script>
        function increaseQuantity() {
            const input = document.getElementById('quantity');
            const currentValue = parseInt(input.value);
            if (currentValue < 99) {
                input.value = currentValue + 1;
            }
        }

        function decreaseQuantity() {
            const input = document.getElementById('quantity');
            const currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
        }

        function addToCart() {
            const quantity = document.getElementById('quantity').value;
            const productName = "{{ $product->name }}";
            alert(`${quantity} unidad(es) de "${productName}" agregado al carrito!`);

            // Animación del botón
            const btn = event.target;
            const originalText = btn.textContent;
            btn.textContent = '✓ Agregado al Carrito';
            btn.style.background = 'linear-gradient(90deg, #00d4aa 0%, #00a67e 100%)';

            setTimeout(() => {
                btn.textContent = originalText;
                btn.style.background = '';
            }, 2500);
        }

        function buyNow() {
            const quantity = document.getElementById('quantity').value;
            alert(`Procesando compra de ${quantity} unidad(es)...`);
        }
    </script>
</body>
</html>
