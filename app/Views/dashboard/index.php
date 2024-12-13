<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Dashboard</title>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #181818;
            color: #fefefe;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar styling */
        .sidebar {
            width: 270px;
            background: linear-gradient(145deg, #2c2c2c, #444444);
            display: flex;
            flex-direction: column;
            padding: 25px 20px;
            border-right: 2px solid #555;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.3);
            overflow-y: auto;
            /* Mengaktifkan scroll secara vertikal */
            max-height: 100vh;
            /* Batasi tinggi sidebar agar sesuai layar */

            /* Sembunyikan scrollbar */
            scrollbar-width: none;
            /* Untuk Firefox */
            -ms-overflow-style: none;
            /* Untuk IE dan Edge */
        }

        .sidebar::-webkit-scrollbar {
            display: none;
            /* Untuk Chrome, Safari, dan Edge berbasis Chromium */
        }

        .sidebar h2 {
            color: #ffcc00;
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
        }

        .sidebar .menu-item {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #fefefe;
            background-color: #555;
            padding: 15px;
            margin-bottom: 12px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        .sidebar .menu-item:hover {
            background-color: #ffcc00;
            color: #333;
            transform: translateX(5px);
            box-shadow: 0 4px 10px rgba(255, 204, 0, 0.4);
        }

        .sidebar .menu-item i {
            font-size: 22px;
            margin-right: 12px;
            color: #77dd77;
        }

        /* Main content styling */
        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            background: #222;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 30px;
            color: #ffcc00;
            text-align: center;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .card {
            background: linear-gradient(145deg, #292929, #3d3d3d);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.6);
        }

        .card h2 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #77dd77;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card h2 i {
            background: #444;
            padding: 10px;
            border-radius: 50%;
            display: inline-block;
            color: #ffcc00;
        }

        .card ul {
            list-style: none;
            padding: 0;
        }

        .card ul li {
            padding: 10px;
            background-color: #444;
            margin-bottom: 8px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .card ul li:hover {
            background-color: #77dd77;
            color: #333;
        }

        .card .more-info {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 14px;
            color: #ffcc00;
            text-decoration: underline;
            cursor: pointer;
        }

        .card .more-info:hover {
            color: #77dd77;
        }

        .welcome-message {
            text-align: center;
            color: #ffcc00;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="/dashboard" class="menu-item"><i>🏠</i> Dashboard</a>
        <a href="/contracts" class="menu-item"><i>📜</i> Contracts</a>
        <a href="/countries" class="menu-item"><i>🌍</i> Countries</a>
        <a href="/leagues" class="menu-item"><i>🏆</i> Leagues</a>
        <a href="/players" class="menu-item"><i>⚽</i> Players</a>
        <a href="/teams" class="menu-item"><i>🏟️</i> Teams</a>
        <a href="/transfers" class="menu-item"><i>🔄</i> Transfers</a>
        <a href="/logout" class="menu-item"><i>🚪</i> Logout</a>
    </div>


    <!-- Main Content -->
    <div class="main-content">
        <div class="welcome-message">
            Welcome, <?= session()->get('username'); ?>!
        </div>

        <h1>Overview</h1>
        <div class="grid">
            
        <div class="card">
                <h2><i>📜</i> Contracts</h2>
                <ul>
                    <?php foreach ($contracts as $contract): ?>
                        <li><?= esc($contract['salary']); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="card">
                <h2><i>🌍</i> Countries</h2>
                <ul>
                    <?php foreach ($countries as $country): ?>
                        <li><?= esc($country['name']); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="card">
                <h2><i>🏆</i> Leagues</h2>
                <ul>
                    <?php foreach ($leagues as $league): ?>
                        <li><?= esc($league['name']); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="card">
                <h2><i>⚽</i> Players</h2>
                <ul>
                    <?php foreach ($players as $player): ?>
                        <li><?= esc($player['name']); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="card">
                <h2><i>🏟️</i> Teams</h2>
                <ul>
                    <?php foreach ($teams as $team): ?>
                        <li><?= esc($team['name']); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="card">
                <h2><i>🔄</i> Transfers</h2>
                <ul>
                    <?php foreach ($transfers as $transfer): ?>
                        <li><?= esc($transfer['transfer_fee']); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>