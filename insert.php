<?php
    // tangkap data dari form submit
    if (isset($_POST['submit'])){
        //var_dump($_POST);
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $id_jurusan = $_POST['id_jurusan'];
        $tpt_lahir = $_POST['tpt_lahir'];
        $gender = $_POST['gender'];
        $alamat = $_POST['alamat'];

        // 1. Buat koneksi dengan MySQL
        $con = mysqli_connect("localhost","root","","fakultas");

        // 2. Check connection
        if (mysqli_connect_errno()) {
            echo "Koneksi gagal: " . mysqli_connect_error();
            exit();
        }else{
            echo 'koneksi berhasil';
        }
        // Buat sql query untuk insert ke database
        // Buat query insert dan jalankan 
        $sql = "insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, alamat)
                values ($id_jurusan,'$nim', '$nama', '$gender', '$tpt_lahir', '$alamat')";

        // Jalankan query
        if (mysqli_query($con, $sql)) {
            echo "Data berhasil ditambahkan";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
          
        mysqli_close($con);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
        <form action="insert.php" method="post">
	        NIM: <input type="text" name="nim"><br>
	        Nama: <input type="text" name="nama"><br>
	        ID Jurusan: <input type="number" name="id_jurusan"><br>
	        Jenis Kelamin: <input type="text" name="gender"><br>
	        Tempat Lahir: <input type="text" name="tpt_lahir"><br>
	        Alamat: <input type="text" name="alamat"><br>
	        <button type="submit" name="submit">Tambah Data</button>
        </form>
</body>
</html>