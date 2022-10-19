<?php
require'koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM game");

$game = [];

while ($row = mysqli_fetch_assoc($result)) {
    $game[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Link BoxIcon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/6ed6487098.js" crossorigin="anonymous"></script>

</head>
<body>
    <header id="header">
        <div class="nav container">
            <p href="#" class="logo">Game<span><a >shop</a></span></p>

            <div class="wrap">
                <div class="search">
                   <input type="text" class="searchTerm" placeholder="Search..">
                   <button type="submit" class="searchButton"><i class='bx bx-search'></i></button>
                </div>
            </div>
            
            <div  class="navigation">
                <a href="index.php">Home</a>
                <a id="me" onclick="popup()"href="#aboutme">About Me</a>
            </div>
            <div class="darkmode">
                <input type="checkbox" class="checkbox" id="checkbox">
                <label for="checkbox" class="label">
                    <i class='bx bxs-sun' ></i>
                    <i class='bx bxs-moon' ></i>
                    <div class="ball"></div>
                </label>
            </div>
            <script src="main.js"></script>

        </div>
    </header>

    <div class="add-game">
        <h1>Data Game</h1>
        <a href="tambah.php">
            <button type="button" class="add-new">Add New</button>
        </a>
        <table class="tabel-data" border=1px>
            <tr class="atas">
                <th>NO</th>
                <th>Judul</th>
                <th>Genre</th>
                <th>Harga</th>
                <th>Diskon</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1; foreach ($game as $gme):?>
            <tr>
                <td><?php echo $i ;?></td>
                <td><?php echo $gme["nama_game"]; ?></td>
                <td><?php echo $gme["genre"] ;?></td>
                <td>Rp.<?php echo $gme["harga"] ;?></td>
                <td><?php echo $gme["diskon"] ;?>%</td>
                <td class="operation"><a href="edit.php?id=<?php echo $gme["id"]; ?>"><i class='bx bx-pencil'></i></i></a> 
                | <a href="hapus.php?id=<?php echo $gme["id"]; ?>" onclick = "return confirm('And yakin ingin mengahpus data ini ?')"><i class='bx bx-trash' ></i></a></td>
            </tr>
            <?php $i++; endforeach;?>
        </table>
    </div>
    <div class="footer">
        <p id="footer"><a id="footer1">@Copyright 2022 - by Dhimas Eko</a></p>
    </div>
</body>
</html>