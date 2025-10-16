<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crear Producto - TechStore</title>
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
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }
        .back-link {
            position: absolute;
            top: 30px;
            left: 30px;
            color: #00d4aa;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(0, 212, 170, 0.3);
        }
        .back-link:hover {
            background: rgba(0, 212, 170, 0.1);
            transform: translateX(-5px);
        }
        h1 {
            font-size: 2.8em;
            text-align: center;
            margin-bottom: 40px;
            color: #ffffff;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            letter-spacing: 2px;
            font-weight: 300;
            position: relative;
        }
        h1::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background: linear-gradient(90deg, #533483, #1e3a8a);
            border-radius: 2px;
        }
        form {
            background: linear-gradient(145deg, #2a2a40 0%, #1a1a30 100%);
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 600px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            animation: fadeInUp 0.8s ease-out;
        }
        .form-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #ffffff;
            font-weight: 600;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        label .required {
            color: #ff6b6b;
            margin-left: 4px;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            transition: all 0.3s ease;
            outline: none;
            font-family: inherit;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="file"]:focus,
        textarea:focus,
        select:focus {
            border-color: #533483;
            background: rgba(83, 52, 131, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(83, 52, 131, 0.3);
        }
        textarea {
            resize: vertical;
            min-height: 120px;
            max-height: 250px;
        }
        input[type="file"] {
            padding: 12px 20px;
            cursor: pointer;
        }
        input[type="file"]::-webkit-file-upload-button {
            background: linear-gradient(90deg, #533483 0%, #1e3a8a 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            margin-right: 15px;
            transition: all 0.3s ease;
        }
        input[type="file"]::-webkit-file-upload-button:hover {
            background: linear-gradient(90deg, #6b46c1 0%, #2563eb 100%);
            transform: translateY(-1px);
        }
        input::placeholder,
        textarea::placeholder {
            color: rgba(255, 255, 255, 0.4);
            font-style: italic;
        }
        select {
            cursor: pointer;
        }
        select option {
            background: #1a1a30;
            color: #ffffff;
        }
        .error-message {
            color: #ff6b6b;
            font-size: 14px;
            margin-top: 8px;
            display: none;
        }
        .error-message.show {
            display: block;
            animation: shake 0.5s ease-in-out;
        }
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 35px;
        }
        button[type="submit"],
        .btn-secondary {
            flex: 1;
            padding: 16px;
            border: none;
            border-radius: 12px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        button[type="submit"] {
            background: linear-gradient(90deg, #533483 0%, #1e3a8a 100%);
            color: white;
            box-shadow: 0 5px 15px rgba(83, 52, 131, 0.4);
        }
        button[type="submit"]:hover {
            background: linear-gradient(90deg, #6b46c1 0%, #2563eb 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(83, 52, 131, 0.5);
        }
        button[type="submit"]:active {
            transform: translateY(-1px);
        }
        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #ff6b6b;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        textarea::-webkit-scrollbar {
            width: 8px;
        }
        textarea::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
        textarea::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #533483, #1e3a8a);
            border-radius: 4px;
        }
        textarea::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(90deg, #6b46c1, #2563eb);
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
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }
            .back-link {
                top: 15px;
                left: 15px;
                font-size: 14px;
            }
            form {
                padding: 30px 20px;
            }
            h1 {
                font-size: 2em;
                margin-bottom: 30px;
            }
            label {
                font-size: 14px;
            }
            input[type="text"],
            input[type="number"],
            input[type="file"],
            textarea,
            select {
                padding: 12px 16px;
                font-size: 14px;
            }
            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <a href="{{ route('products.index') }}" class="back-link">
        ← Volver a la lista
    </a>

    <h1>Crear Nuevo Producto</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
        @csrf

        <div class="form-group">
            <label for="name">Nombre del Producto <span class="required">*</span></label>
            <input type="text" name="name" id="name" placeholder="Ej: iPhone 14 Pro Max" value="{{ old('name') }}" required>
            @error('name')
                <span class="error-message show">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="type">Tipo de Producto <span class="required">*</span></label>
            <select name="type" id="type" required>
                <option value="">Seleccione un tipo</option>
                <option value="Smartphone" {{ old('type') == 'Smartphone' ? 'selected' : '' }}>Smartphone</option>
                <option value="Laptop" {{ old('type') == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                <option value="Tablet" {{ old('type') == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                <option value="Auriculares" {{ old('type') == 'Auriculares' ? 'selected' : '' }}>Auriculares</option>
                <option value="Smartwatch" {{ old('type') == 'Smartwatch' ? 'selected' : '' }}>Smartwatch</option>
                <option value="Cámara" {{ old('type') == 'Cámara' ? 'selected' : '' }}>Cámara</option>
                <option value="Accesorio" {{ old('type') == 'Accesorio' ? 'selected' : '' }}>Accesorio</option>
                <option value="Otro" {{ old('type') == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('type')
                <span class="error-message show">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Precio ($) <span class="required">*</span></label>
            <input type="number" name="price" id="price" step="0.01" min="0" placeholder="Ej: 1199.99" value="{{ old('price') }}" required>
            @error('price')
                <span class="error-message show">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" placeholder="Describe las características principales del producto...">{{ old('description') }}</textarea>
            @error('description')
                <span class="error-message show">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Imagen del Producto</label>
            <input type="file" name="image" id="image" accept="image/*">
            <span style="font-size: 12px; color: rgba(255,255,255,0.5); display: block; margin-top: 5px;">
                Formatos: JPG, PNG, GIF (Max: 2MB)
            </span>
            @error('image')
                <span class="error-message show">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" name="brand" id="brand" placeholder="Ej: Apple, Samsung, Sony..." value="{{ old('brand') }}">
            @error('brand')
                <span class="error-message show">{{ $message }}</span>
            @enderror
        </div>

        <div class="button-group">
            <button type="submit">Crear Producto</button>
            <button type="reset" class="btn-secondary">Limpiar Formulario</button>
        </div>
    </form>

    <script>
        // Validación del formulario
        document.getElementById('productForm').addEventListener('submit', function(e) {
            let isValid = true;
            const name = document.getElementById('name').value.trim();
            const type = document.getElementById('type').value;
            const price = document.getElementById('price').value;

            if (!name) {
                isValid = false;
                alert('Por favor, ingrese el nombre del producto');
            }
            if (!type) {
                isValid = false;
                alert('Por favor, seleccione un tipo de producto');
            }
            if (!price || price <= 0) {
                isValid = false;
                alert('Por favor, ingrese un precio válido');
            }

            if (!isValid) {
                e.preventDefault();
            }
        });

        // Animación al resetear el formulario
        document.querySelector('.btn-secondary').addEventListener('click', function() {
            setTimeout(() => {
                const form = document.getElementById('productForm');
                form.style.animation = 'none';
                setTimeout(() => {
                    form.style.animation = 'fadeInUp 0.5s ease-out';
                }, 10);
            }, 100);
        });
    </script>
</body>
</html>
