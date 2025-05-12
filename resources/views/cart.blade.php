<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
            padding: 40px;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .cart-container {
            width: 90%;
            max-width: 1000px;
            background: #fff;
            margin: 30px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }

        th {
            background-color: #117a7a;
            color: white;
            font-weight: bold;
        }

        td span {
            display: inline-block;
            min-width: 25px;
        }

        .quantity-btn {
            padding: 5px 12px;
            background-color: #117a7a;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .quantity-btn:hover {
            background-color: #0c5c5c;
        }

        .total {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }

        .confirm-box {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 30px;
        }

        .confirm-box input[type="text"],
        .confirm-box input[type="tel"] {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .confirm-box button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .confirm-box button:hover {
            background-color: #218838;
        }

        .messages {
            text-align: center;
            margin-top: 20px;
        }

        .messages p {
            margin: 5px;
            font-size: 16px;
        }

        .messages .success {
            color: green;
        }

        .messages .error {
            color: red;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            text-decoration: none;
            color: #117a7a;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Your Cart</h2>

    <div class="cart-container">

        @if(session('cart') && count(session('cart')) > 0)
            <form action="{{ route('cart.update') }}" method="POST">
                @csrf
                <table>
                    <thead>
                        <tr>
                            <th>Medicine</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach(session('cart') as $key => $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>৳{{ $item->price }}</td>
                                <td>
                                    <button type="submit" class="quantity-btn" name="action" value="decrease_{{ $key }}">-</button>
                                    <span>{{ $item->quantity }}</span>
                                    <button type="submit" class="quantity-btn" name="action" value="increase_{{ $key }}">+</button>
                                </td>
                                <td>৳{{ $item->price * $item->quantity }}</td>
                                @php $total += $item->price * $item->quantity; @endphp
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="total">
                    Total: ৳{{ $total }}
                </div>
            </form>

            <!-- Confirm Order Form -->
            <form action="{{ route('cart.confirm') }}" method="POST" class="confirm-box">
                @csrf
                <input type="text" name="location" placeholder="Enter delivery address" required>
                <input type="tel" name="phone" placeholder="Enter phone number" pattern="[0-9]{10,15}" required>
                <button type="submit">Confirm Order</button>
            </form>
        @else
            <p style="text-align:center;">Your cart is empty.</p>
        @endif

        <!-- Feedback Messages -->
        <div class="messages">
            @if(session('success'))
                <p class="success">{{ session('success') }}</p>
            @endif
            @if(session('error'))
                <p class="error">{{ session('error') }}</p>
            @endif
        </div>

    </div>

    <a href="{{ route('medicine.list') }}" class="back-link">← Back to Medicine List</a>

</body>
</html>
