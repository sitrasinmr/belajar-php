<?php
    // 1. Buat koneksi dengan MySQL
    $con = mysqli_connect("localhost","root","","fakultas");

    // 2. Cek koneksi dengan MySQL
    if(mysqli_connect_errno()){
        echo "Koneksi gagal". mysqli_connect_error();
    }else{
        echo "Koneksi berhasil";
    }

    // 3. Membaca data dari table mysql.
    $query = "SELECT * FROM mahasiswa";
    
    // 4. tampilkan data, dengan menjalankan sql query
    $result = mysqli_query($con,$query);
    $mahasiswa = [];
    if ($result){
        // tampilkan data satu per satu
        while($row = mysqli_fetch_assoc($result)){
            $mahasiswa[] = $row;
        }
        mysqli_free_result($result);
    }

    // 5. tutup koneksi mysql
    mysqli_close($con);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table border="1" style="width:50%;">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>

        </tr>
        <?php foreach($mahasiswa as $value): ?>
        <tr>
            <td><?php echo $value["nim"]; ?></td>
            <td><?php echo $value["nama"]; ?></td>
            <td><?php echo $value["tempat_lahir"]; ?></td>
            
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>