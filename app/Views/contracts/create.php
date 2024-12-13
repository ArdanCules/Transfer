<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kontrak Baru</title>
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
            margin-bottom: 20px;
            color: #ffcc00;
            text-align: center;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
        }

        form {
            background: #292929;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            font-size: 18px;
            color: #ffcc00;
            margin-bottom: 10px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 8px;
            background: #333;
            color: #fefefe;
            font-size: 16px;
        }

        button {
            background: #77dd77;
            color: #222;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            display: block;
            width: 100%;
            margin-bottom: 10px;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #66bb66;
        }

        a {
            text-decoration: none;
            color: #ffcc00;
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }

        a:hover {
            text-decoration: underline;
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
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Tambah Kontrak Baru</h1>
        <form action="/contracts/store" method="post">
            <label for="player_id">Pemain:</label>
            <select name="player_id" id="player_id" required>
                <?php foreach ($players as $player): ?>
                    <option value="<?= $player['id']; ?>"><?= $player['name']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="team_id">Tim:</label>
            <select name="team_id" id="team_id" required>
                <?php foreach ($teams as $team): ?>
                    <option value="<?= $team['id']; ?>"><?= $team['name']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="start_date">Tanggal Mulai:</label>
            <input type="date" name="start_date" id="start_date" required>

            <label for="end_date">Tanggal Selesai:</label>
            <input type="date" name="end_date" id="end_date" required>

            <label for="salary">Gaji:</label>
            <input type="number" name="salary" id="salary" required>

            <button type="submit">Simpan</button>
        </form>
        <a href="/contracts">Kembali</a>
    </div>
</body>
</html>
