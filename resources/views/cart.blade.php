<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <style>
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #999;
            text-align: center;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-weight: bold;
            width: 80%;
            margin: auto;
        }

        .confirm-form {
            width: 80%;
            margin: 20px auto;
            text-align: right;
        }

        input[type="text"] {
            padding: 8px;
            width: 300px;
        }

        button {
            padding: 8px 15px;
            background-color: green;
            color: white;
            border: none;
        }

        .quantity-btns {
            display: inline-flex;
            gap: 10px;
        }

        .quantity-btn {
            padding: 5px 10px;
            background-color: #117a7a;
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Your Cart</h2>

    @if(session('cart') && count(session('cart')) > 0)
        <!-- Form to update cart quantity -->
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
                                <div class="quantity-btns">
                                    <!-- Send the key for identifying the cart item when updating quantity -->
                                    <button type="submit" class="quantity-btn" name="action" value="decrease_{{ $key }}">-</button>
                                    <span>{{ $item->quantity }}</span>
                                    <button type="submit" class="quantity-btn" name="action" value="increase_{{ $key }}">+</button>
                                </div>
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

        <!-- Separate form for confirming the order -->
        <form action="{{ route('cart.confirm') }}" method="POST" class="confirm-form">
            @csrf
            <input type="text" name="location" placeholder="Enter delivery location" required>
            <button type="submit">Confirm Order</button>
        </form>
    @else
        <p style="text-align:center;">Your cart is empty.</p>
    @endif

    @if(session('success'))
        <p style="text-align:center; color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="text-align:center; color: red;">{{ session('error') }}</p>
    @endif
    
    <a href="{{ route('medicine.list') }}" class="btn">back</a>
</body>
</html>
