<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain Search Results</title>
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

        .results {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .result-item {
            background-color: white;
            padding: 20px;
            margin: 10px 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .result-item p {
            font-size: 18px;
            color: #333;
        }

        .result-item button {
            padding: 10px 20px;
            background-color: #00a4b4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .result-item button:hover {
            background-color: #007a8a;
        }

        @media (max-width: 768px) {
            .result-item {
                flex-direction: column;
                gap: 10px;
            }

            .result-item button {
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
            <a href="#" onclick="redirectTo('cart.php')">Cart</a>
        </div>
    </div>

    <div class="results">
        <h2>Search Results</h2>
        <?php
        include 'db.php';
        if (isset($_POST['domain'])) {
            $domain = $_POST['domain'];
            $extensions = ['.com', '.net', '.org', '.co'];
            foreach ($extensions as $ext) {
                $full_domain = $domain . $ext;
                $sql = "SELECT * FROM domains WHERE name = '$full_domain'";
                $result = $conn->query($sql);
                $available = $result->num_rows == 0;
                echo '<div class="result-item">';
                echo '<p>' . $full_domain . ' is ' . ($available ? 'Available' : 'Taken') . '</p>';
                if ($available) {
                    echo '<button onclick="addToCart(\'' . $full_domain . '\')">Add to Cart</button>';
                }
                echo '</div>';
            }
        }
        ?>
    </div>

    <script>
        function redirectTo(page) {
            window.location.href = page;
        }

        function addToCart(domain) {
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            cart.push(domain);
            localStorage.setItem('cart', JSON.stringify(cart));
            alert(domain + ' added to cart!');
            redirectTo('cart.php');
        }
    </script>
</body>
</html>
