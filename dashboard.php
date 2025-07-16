<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Manage Domains</title>
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

        .dashboard {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .dashboard h2 {
            color: #003087;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #00a4b4;
            color: white;
        }

        td button {
            padding: 8px 15px;
            background-color: #00a4b4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }

        td button:hover {
            background-color: #007a8a;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            th {
                display: none;
            }

            tr {
                margin-bottom: 15px;
            }

            td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DomainFinder</h1>
        <div class="nav">
            <a href="#" onclick="redirectTo('index.php')">Home</a>
            <a href="#" onclick="redirectTo('cart.php')">Cart</a>
        </div>
    </div>

    <div class="dashboard">
        <h2>Your Domains</h2>
        <table>
            <thead>
                <tr>
                    <th>Domain Name</th>
                    <th>Expiration Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';
                $sql = "SELECT * FROM domains";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['expiration_date'] . '</td>';
                        echo '<td>';
                        echo '<button onclick="renewDomain(\'' . $row['name'] . '\')">Renew</button>';
                        echo '<button onclick="transferDomain(\'' . $row['name'] . '\')">Transfer</button>';
                        echo '<button onclick="removeDomain(\'' . $row['name'] . '\')">Remove</button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="3">No domains registered.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function redirectTo(page) {
            window.location.href = page;
        }

        function renewDomain(domain) {
            alert('Renew functionality for ' + domain + ' (non-functional as per requirements).');
        }

        function transferDomain(domain) {
            alert('Transfer functionality for ' + domain + ' (non-functional as per requirements).');
        }

        function removeDomain(domain) {
            alert('Remove functionality for ' + domain + ' (non-functional as per requirements).');
        }
    </script>
</body>
</html>
