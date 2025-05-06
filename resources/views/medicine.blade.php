<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedConnect</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f8f9fa;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .logo {
             width: 400px;
             padding-left: 80px;
        }

        .search-box {
            flex-grow: 1;
            margin: 0 20px;
            position: relative;
        }
        .search-box input {
            width: 100%;
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .search-box button {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 80px;
            background-image: linear-gradient(45deg,rgb(6, 36, 80),rgb(46, 110, 205));
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            color: white;
        }
        .user-actions {
            display: flex;
            align-items: center;
        }
        .user-profile, .cart {
            margin-left: 15px;
            position: relative;
        }
        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color:rgb(200, 7, 7);
            color: white;
            font-size: 10px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .user-info {
            font-size: 1px;
            text-align: right;
        }
        .user-info .name {
            font-weight: bold;
        }
        .user-info .cash {
            color: #777;
        }
        .main-container {
            display: flex;
            margin-top: 10px;
        }
        .sidebar {
            width: 240px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 10px ;
            height: calc(100vh - 60px);
            overflow-y: auto;
        }
        .sidebar-item {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .sidebar-item:hover {
            background-color: #f1f1f1;
        }


        .sidebar-item i {
            margin-left: auto;
            font-size: 12px;
            color: #777;
        }


        .content {
            flex-grow: 1;
            padding: 0 20px;
        }


        .category-card:hover {
            transform: translateY(-5px);
        }
        .category-card img {
            width: 100%;
            height: 100px;
            object-fit: contain;
            padding: 10px;
        }
        .category-card .name {
            padding: 10px;
            font-size: 14px;
            color: #333;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
            margin-top: 20px;
        }
        .product-card {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: relative;
        }

        .product-image {
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            width: 250px;
        }
        .product-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .product-name {
            padding: 0 10px;
            font-size: 14px;
            font-weight: bold;
        }
        .product-dose {
            padding: 0 10px;
            font-size: 12px;
            color: #666;
            margin-bottom: 10px;
        }
        .product-price {
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .price {
            font-weight: bold;
            font-size: 14px;
        }
        .add-btn {
            background-color: #fff;
            color:rgb(17, 27, 117);
            border: 1px solid rgba(13, 25, 95, 0.42);
            padding: 5px 15px;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .add-btn:hover {
            background-image: linear-gradient(45deg,rgb(6, 36, 80),rgb(46, 110, 205));
            color: #fff;
        }
        .float-cart {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-image: linear-gradient(45deg,rgb(6, 36, 80),rgb(46, 110, 205));
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        .cart-item-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color:rgb(156, 2, 2);
            color: white;
            font-size: 10px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @media (max-width: 1200px) {
            .products-grid {
                grid-template-columns: repeat(4, 1fr);
            }
            .category-card {
                width: 23%;
            }
        }
        @media (max-width: 992px) {
            .products-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            .category-card {
                width: 31%;
            }
        }
        @media (max-width: 768px) {
            .header {
                flex-wrap: wrap;
            }
            .search-box {
                order: 3;
                width: 100%;
                margin: 10px 0 0;
            }
            .main-container {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                height: auto;
                overflow-x: auto;
                display: flex;
                padding: 0;
            }
            .sidebar-item {
                flex-direction: column;
                text-align: center;
                min-width: 80px;
            }
            .sidebar-item img {
                margin-right: 0;
                margin-bottom: 5px;
            }
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .category-card {
                width: 48%;
            }
        }
        @media (max-width: 576px) {
            .products-grid {
                grid-template-columns: 1fr;
            }
            .category-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="{{asset('images/logo.png') }}" height="48px" width="296px" alt="">
            
        </div>

<form action="{{ route('medicines.search') }}" method="GET" class="search-box">
<input type="text" id="search-input" name="query" placeholder="Search for medicines..." value="{{ request('query') }}">
    <button type="submit">Search</button>
</form>





        <div class="user-actions">
            <div class="user-profile">
                <div class="user-info">
                    <div class="name">Hello, {{ session('patient')->name }}</div>
                    
                </div>
            </div>
            <div class="cart">
                
                <a href="{{ route('cart.index') }}" class="cart-icon">🛒</a>
                <div class="cart-count">0</div>
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="sidebar">
            <div class="sidebar-item">
                
                <span>Shop By Category</span>
            </div>
            <div class="sidebar-item">
                <span>Medicine</span>
                <i>▼</i>
            </div>
        </div>

        <div class="content">

            <div class="products-grid">
@foreach($medicines as $medicine)
<div class="product-card">
    <img src="{{ asset($medicine->image_path) }}" alt="{{ $medicine->name }}"  class="product-image">
    <div class="product-name">{{ $medicine->name }}- {{ $medicine->type }}</div>
    <div class="product-dose">{{ $medicine->weight }}   |   Stock({{ $medicine->stock }})</div>
    <div class="product-price">
                        <div class="price">৳{{ $medicine->price }}</div>
                        <form action="{{ route('cart.add') }}" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{ $medicine->id }}">
                          <button type="submit" class="add-btn">ADD</button>
                        </form>
    </div>
</div>

@endforeach

@if($medicines->isEmpty())
    <p>No medicines found for your search.</p>
@endif
                
                

                </div>
            </div>
        </div>
    </div>

    <div class="float-cart">
        🛒
        <div class="cart-item-count">0</div>
    </div>

    




    <script>
        // Basic interactivity for demonstration
        const addButtons = document.querySelectorAll('.add-btn');
        const cartCount = document.querySelector('.cart-count');
        const floatCartCount = document.querySelector('.cart-item-count');
        let count = 0;
        
        addButtons.forEach(button => {
            button.addEventListener('click', () => {
                count++;
                cartCount.textContent = count;
                floatCartCount.textContent = count;
                
                // Change button style briefly
                button.textContent = "ADDED";
                button.style.backgroundColor = "#117a7a";
                button.style.color = "white";
                
                setTimeout(() => {
                    button.textContent = "ADD";
                    button.style.backgroundColor = "";
                    button.style.color = "";
                }, 1000);
            });
        });
    </script>
</body>
</html>