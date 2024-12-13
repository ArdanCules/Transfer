<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tim</title>
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

        a {
            background-color: #ffcc00;
            color: #222;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 20px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #ff4f4f;
            color: #fff;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            color: #fefefe;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #555;
        }

        th {
            background-color: #333;
        }

        tr:nth-child(even) {
            background-color: #444;
        }

        tr:hover {
            background-color: #555;
        }

        button {
            background-color: #ff4f4f;
            color: #fff;
            padding: 8px 16px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: auto;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #ffcc00;
            color: #222;
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
        <h1>Daftar Tim</h1>
        <a href="/teams/create">Tambah Tim Baru</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Tim</th>
                    <th>Liga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teams as $team): ?>
                    <tr>
                        <td><?= $team['id']; ?></td>
                        <td><?= $team['name']; ?></td>
                        <td><?= $team['league_name']; ?></td>
                        <td>
                            <a href="/teams/edit/<?= $team['id']; ?>">Edit</a>
                            <form action="/teams/delete/<?= $team['id']; ?>" method="post" style="display:inline;">
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>