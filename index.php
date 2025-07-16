<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoDaddy Clone - Domain Search</title>
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

        .hero {
            background: linear-gradient(to right, #003087, #00a4b4);
            padding: 50px 20px;
            text-align: center;
            color: white;
        }

        .hero h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .search-bar {
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            gap: 10px;
        }

        .search-bar input {
            padding: 15px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            flex-grow: 1;
        }

        .search-bar button {
            padding: 15px 30px;
            background-color: #00a4b4;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-bar button:hover {
            background-color: #007a8a;
        }

        .extensions {
            margin: 20px 0;
            text-align: center;
        }

        .extensions span {
            display: inline-block;
            background-color: #fff;
            color: #003087;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            font-weight: bold;
        }

        .promotions {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .promo-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .promo-card h3 {
            color: #003087;
            margin-bottom: 10px;
        }

        .promo-card p {
            color: #333;
        }

        @media (max-width: 768px) {
            .hero h2 {
                font-size: 28px;
            }

            .search-bar {
                flex-direction: column;
            }

            .search-bar input, .search-bar button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DomainFinder</h1>
        <div class="nav">
            <a href="#" onclick="redirectTo('dashboard.php')">Dashboard</a>
            <a href="#" onclick="redirectTo('cart.php')">Cart</a>
        </div>
    </div>

    <div class="hero">
        <h2>Find Your Perfect Domain Name</h2>
        <form id="searchForm" action="results.php" method="POST">
            <div class="search-bar">
                <input type="text" name="domain" placeholder="Enter your domain name" required>
                <button type="submit">Search</button>
            </div>
        </form>
        <div class="extensions">
            <span>.com</span>
            <span>.net</span>
            <span>.org</span>
            <span>.co</span>
        </div>
    </div>

    <div class="promotions">
        <div class="promo-card">
            <h3>.com Domain</h3>
            <p>Starting at $9.99/year</p>
        </div>
        <div class="promo-card">
            <h3>.net Domain</h3>
            <p>Starting at $12.99/year</p>
        </div>
        <div class="promo-card">
            <h3>.org Domain</h3>
            <p>Starting at $14.99/year</p>
        </div>
    </div>

    <script>
        function redirectTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
