<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .header {
            background-color: #003087;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 24px;
        }

        .nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
        }

        .nav a:hover {
            text-decoration: underline;
        }

        .cart {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .cart h2 {
            color: #003087;
            margin-bottom: 20px;
        }

        .cart-item {
            background-color: white;
            padding: 20px;
            margin: 10px 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-item p {
            font-size: 18px;
            color: #333;
        }

        .cart-item button {
            padding: 10px 20px;
            background-color: #00a4b4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .cart-item button:hover {
            background-color: #007a8a;
        }

        .checkout {
            text-align: center;
            margin-top: 20px;
        }

        .checkout button {
            padding: 15px 30px;
            background-color: #00a4b4;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .checkout button:hover {
            background-color: #007a8a;
        }

        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                gap: 10px;
            }

            .cart-item button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DomainFinder</h1>
        <div class="nav">
            <a href="#" onclick="redirectTo('index.php')">Home</a>
            <a href="#" onclick="redirectTo('dashboard.php')">Dashboard</a>
        </div>
    </div>

    <div class="cart">
        <h2>Your Cart</h2>
        <div id="cartItems"></div>
        <div class="checkout">
            <button id="checkoutButton" onclick="checkout()">Proceed to Checkout</button>
        </div>
    </div>

    <script>
        function redirectTo(page) {
            window.location.href = page;
        }

        function displayCart() {
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            let cartItems = document.getElementById('cartItems');
            cartItems.innerHTML = '';
            if (cart.length === 0) {
                cartItems.innerHTML = '<p>No items in cart.</p>';
            } else {
                cart.forEach(domain => {
                    let item = document.createElement('div');
                    item.className = 'cart-item';
                    item.innerHTML = `
                        <p>${domain}</p>
                        <button onclick="removeFromCart('${domain}')">Remove</button>
                    `;
                    cartItems.appendChild(item);
                });
            }
        }

        function removeFromCart(domain) {
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            cart = cart.filter(item => item !== domain);
            localStorage.setItem('cart', JSON.stringify(cart));
            displayCart();
        }

        function checkout() {
            console.log('Checkout button clicked');
            alert('Checkout Successfully');
        }

        window.onload = displayCart;

        // Additional event listener for debugging
        document.getElementById('checkoutButton').addEventListener('click', function() {
            console.log('Checkout button event listener triggered');
            checkout();
        });
    </script>
</body>
</html>
