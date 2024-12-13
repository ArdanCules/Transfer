<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kontrak</title>
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
            text-decoration: none;
            background: #77dd77;
            color: #222;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 20px;
            transition: background 0.3s ease;
        }

        a:hover {
            background: #66bb66;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #292929;
            border-radius: 12px;
            overflow: hidden;
        }

        thead tr {
            background-color: #333;
        }

        thead th {
            color: #ffcc00;
            text-align: left;
            padding: 10px;
        }

        tbody td {
            padding: 10px;
            border-bottom: 1px solid #444;
        }

        tbody tr:hover {
            background-color: #444;
        }

        tbody td a {
            text-decoration: none;
            background: #ffcc00;
            color: #222;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        tbody td a:hover {
            background: #e6b800;
        }

        tbody td button {
            background: #dd3333;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        tbody td button:hover {
            background: #cc0000;
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
        <h1>Daftar Kontrak</h1>
        <a href="/contracts/create">Tambah Kontrak Baru</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pemain</th>
                    <th>Tim</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contracts as $contract): ?>
                    <tr>
                        <td><?= $contract['id']; ?></td>
                        <td><?= $contract['player_id']; ?></td>
                        <td><?= $contract['team_id']; ?></td>
                        <td><?= $contract['start_date']; ?></td>
                        <td><?= $contract['end_date']; ?></td>
                        <td><?= $contract['salary']; ?></td>
                        <td>
                            <a href="/contracts/edit/<?= $contract['id']; ?>">Edit</a>
                            <form action="/contracts/delete/<?= $contract['id']; ?>" method="post" style="display:inline;">
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
