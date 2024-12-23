CREATE TABLE jenis_kendaraan (
    id_jenis_mobil INT AUTO_INCREMENT PRIMARY KEY,
    nama_jenis_mobil VARCHAR(50) NOT NULL -- Contoh: 'Truck Mixer', 'Dump Truck'
);


CREATE TABLE kendaraan (
    id_kendaraan INT AUTO_INCREMENT PRIMARY KEY,
    no_pintu VARCHAR(10) NOT NULL, -- Nomor pintu kendaraan
    id_jenis_kendaraan INT NOT NULL, -- Referensi ke jenis mobil
    no_polisi VARCHAR(15) NOT NULL UNIQUE, -- Nomor polisi kendaraan
    warna_kendaraan VARCHAR(30) NOT NULL, -- Warna kendaraan
    warna_tnkb VARCHAR(30) NOT NULL, -- Warna plat kendaraan
    no_rangka VARCHAR(50) NOT NULL UNIQUE, -- Nomor rangka kendaraan
    no_mesin VARCHAR(50) NOT NULL UNIQUE, -- Nomor mesin kendaraan
    isi_silinder INT NOT NULL, -- Kapasitas mesin dalam cc
    FOREIGN KEY (id_jenis_kendadraan) REFERENCES jenis_kendaraan(id_jenis_kendaraan ON DELETE CASCADE
);


CREATE TABLE driver (
    id_driver INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT  -- REFERENCES KE TABLE AKUN
    nama_driver VARCHAR(50) NOT NULL, -- Nama driver
    no_ktp VARCHAR(20) NOT NULL UNIQUE, -- Nomor KTP driver
    url_foto_ktp VARCHAR(255), -- URL foto KTP
    no_hp VARCHAR(15) NOT NULL, -- Nomor HP driver
    alamat TEXT NOT NULL, -- Alamat driver
    email VARCHAR(30) NULL
    FOREIGN KEY (id_user) REFERENCES admin(id ON DELETE CASCADE
);


CREATE TABLE sim (
    id_sim INT AUTO_INCREMENT PRIMARY KEY,
    id_driver INT NOT NULL, -- Referensi ke driver
    no_sim VARCHAR(20) NOT NULL UNIQUE, -- Nomor SIM
    url_foto_sim VARCHAR(255), -- URL foto SIM
    jenis_sim ENUM('A', 'B1', 'B2') NOT NULL, -- Jenis SIM
    masa_berlaku DATE NOT NULL, -- Tanggal masa berlaku SIM
    FOREIGN KEY (id_driver) REFERENCES driver(id_driver) ON DELETE CASCADE
);


CREATE TABLE driver_kendaraan (
    id_driver_mobil INT AUTO_INCREMENT PRIMARY KEY,
    id_kendaraan INT DEFAULT NULL, -- NULL jika driver cadangan
    id_driver INT NOT NULL, -- Referensi ke driver
    tipe_driver ENUM('Tetap', 'Cadangan') NOT NULL, -- Driver tetap atau cadangan
    FOREIGN KEY (id_kendaraan) REFERENCES kendaraan(id_kendaraan) ON DELETE SET NULL,
    FOREIGN KEY (id_driver) REFERENCES driver(id_driver) ON DELETE CASCADE
);


CREATE TABLE stnk (
    id_stnk INT AUTO_INCREMENT PRIMARY KEY,
    id_kendaraan INT NOT NULL, -- Referensi ke kendaraan
    masa_berlaku_tahunan DATE NOT NULL, -- Tanggal jatuh tempo pajak tahunan
    masa_berlaku_5_tahunan DATE NOT NULL, -- Tanggal jatuh tempo pajak 5 tahunan
    pkb DECIMAL(12,2) NOT NULL, -- Pajak Kendaraan Bermotor
    swdkllj DECIMAL(12,2) NOT NULL, -- Sumbangan Wajib Dana Kecelakaan Lalu Lintas Jalan
    biaya_admin_stnk DECIMAL(12,2) NOT NULL, -- Biaya administrasi STNK
    biaya_admin_tnkb DECIMAL(12,2) NOT NULL, -- Biaya administrasi TNKB
    transport DECIMAL(12,2) NOT NULL, -- Biaya transportasi
    FOREIGN KEY (id_kendaraan) REFERENCES kendaraan(id_kendaraan) ON DELETE CASCADE
);


CREATE TABLE kir (
    id_kir INT AUTO_INCREMENT PRIMARY KEY,
    id_kendaraan INT NOT NULL, -- Referensi ke kendaraan
    nomor_uji_kir VARCHAR(30) NOT NULL, -- Nomor uji KIR
    masa_berlaku DATE NOT NULL, -- Masa berlaku KIR
    FOREIGN KEY (id_kendaraan) REFERENCES kendaraan(id_kendaraan) ON DELETE CASCADE
);
