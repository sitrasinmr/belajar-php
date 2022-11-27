<?php
if (isset($_GET['id'])){   

    $id = $_GET['id'];

    // 1. Buat koneksi dengan MySQL
    $con = mysqli_connect("localhost","root","","fakultas");

    // 2. Cek koneksi dengan MySQL
    if(mysqli_connect_errno()){
        echo "Koneksi gagal". mysqli_connect_error();
    }else{
        echo "Koneksi berhasil";
    }

    // 3. Membaca data dari table mysql.
    $query = "SELECT * FROM mahasiswa WHERE id=$id";
    
    // 4. tampilkan data, dengan menjalankan sql query
    $result = mysqli_query($con,$query);
    $mahasiswa =[];
    if ($result){
        // tampilkan data satu per satu
        while($row = mysqli_fetch_assoc($result)){
            $mahasiswa = $row;
        }
        mysqli_free_result($result);
    }

    // 5. tutup koneksi mysql
    mysqli_close($con);

}

// tangkap data dari form submit
if (isset($_POST['submit'])){
    //var_dump($_POST);
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $id_jurusan = $_POST['id_jurusan'];
    $tpt_lahir = $_POST['tpt_lahir'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $id = $_POST['id'];

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
    $sql = "UPDATE mahasiswa SET nim='$nim',nama='$nama',id_jurusan='$id_jurusan',tempat_lahir='$tpt_lahir',
    alamat='$alamat' WHERE id=$id ";

    // Jalankan query
    if (mysqli_query($con, $sql)) {
        echo "Data berhasil diubah";
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
    <title>Update Data Mahasiswa</title>
</head>
<body>
    <h1>Update Data Mahasiswa</h1>
    <?php //var_dump($mahasiswa); ?>
    <form action="update.php" method="post">
	        NIM: <input type="text" name="nim" value="<?php echo $mahasiswa['nim']; ?>"><br>
	        Nama: <input type="text" name="nama" value="<?php echo $mahasiswa['nama']; ?>"><br>
	        ID Jurusan: <input type="number" name="id_jurusan" value="<?php echo $mahasiswa['id_jurusan']; ?>"><br>
	        Jenis Kelamin: <input type="text" name="gender" value="<?php echo $mahasiswa['jenis_kelamin']; ?>"><br>
	        Tempat Lahir: <input type="text" name="tpt_lahir" value="<?php echo $mahasiswa['tempat_lahir']; ?>"><br>
	        Alamat: <input type="text" name="alamat" value="<?php echo $mahasiswa['alamat']; ?>"><br>
            <input type="number" name="id" value="<?php echo $mahasiswa['id']; ?>" hidden>
	        <button type="submit" name="submit">Update Data</button>
    </form>
</body>
</html>