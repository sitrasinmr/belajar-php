CREATE DATABASE fakultas;

CREATE TABLE jurusan (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    kode CHAR(4) NOT NULL,
    nama VARCHAR(50) NOT NULL
);

CREATE TABLE mahasiswa (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_jurusan INTEGER NOT NULL,
    nim CHAR(8) NOT NULL,
    nama VARCHAR(50) NOT NULL,
    jenis_kelamin enum ('laki-laki', 'perempuan') NOT NULL,
    tempat_lahir VARCHAR(50) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_jurusan) REFERENCES jurusan(id)
);


--insert jurusan
insert into jurusan (kode, nama) values ("PTIF", "Pendidikan Teknik Informatika");
insert into jurusan (kode, nama) values ("APBL", "Administrasi Publik");

--insert mahasiswa
insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) values 
(2, "20220002", "Fulan", "laki-laki", "Malang", "2000-05-02", "Jl. Soekarno Hatta 38");
insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) values 
(2, "20220002", "Sitra", "perempuan", "Banda", "2000-01-07", "Jl. Kramat Pulo Gg 12");

-- update data mahasiswa
update mahasiswa set alamat = "Jl. Soekarno Hatta 38" where id = 1;

-- delete data mahasiswa
delete from mahasiswa where id=2;
