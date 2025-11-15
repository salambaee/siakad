-- MySQL Script (Versi Ternormalisasi)

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema siakad_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS siakad_db DEFAULT CHARACTER SET utf8 ;
USE siakad_db ;

-- -----------------------------------------------------
-- Table siakad_db.prodi
-- -----------------------------------------------------
-- TABEL BARU: Master untuk Program Studi (Menghilangkan Redundansi)
CREATE TABLE IF NOT EXISTS siakad_db.prodi (
  id_prodi INT NOT NULL AUTO_INCREMENT,
  nama_prodi VARCHAR(100) NOT NULL,
  jenjang VARCHAR(10) NULL COMMENT 'Contoh: D3, D4, S1',
  PRIMARY KEY (id_prodi))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table siakad_db.mahasiswa
-- -----------------------------------------------------
-- PERUBAHAN: Kolom 'prodi' (VARCHAR) diganti 'id_prodi' (INT, FK)
CREATE TABLE IF NOT EXISTS siakad_db.mahasiswa (
  nim BIGINT NOT NULL,
  nama VARCHAR(100) NOT NULL,
  id_prodi INT NOT NULL, -- <-- Diganti dari VARCHAR
  angkatan VARCHAR(4) NOT NULL,
  PRIMARY KEY (nim),
  UNIQUE INDEX nim_UNIQUE (nim ASC),
  INDEX fk_mahasiswa_prodi_idx (id_prodi ASC),
  CONSTRAINT fk_mahasiswa_prodi
    FOREIGN KEY (id_prodi)
    REFERENCES siakad_db.prodi (id_prodi)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table siakad_db.admin
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS siakad_db.admin (
  id_admin INT NOT NULL AUTO_INCREMENT,
  nama VARCHAR(45) NULL,
  username VARCHAR(45) NULL,
  password VARCHAR(255) NULL,
  PRIMARY KEY (id_admin))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table siakad_db.dosen
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS siakad_db.dosen (
  nidn BIGINT NOT NULL,
  nama VARCHAR(45) NULL,
  keahlian VARCHAR(45) NULL,
  password VARCHAR(255) NULL,
  peran VARCHAR(45) NULL,
  PRIMARY KEY (nidn))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table siakad_db.mata_kuliah
-- -----------------------------------------------------
-- PERUBAHAN: Ditambahkan 'id_prodi' (FK) agar MK terikat ke Prodi
CREATE TABLE IF NOT EXISTS siakad_db.mata_kuliah (
  kode_mk VARCHAR(10) NOT NULL,
  id_prodi INT NOT NULL, -- <-- Ditambahkan
  nama_mk VARCHAR(100) NULL,
  sks INT NULL,
  PRIMARY KEY (kode_mk),
  INDEX fk_mk_prodi_idx (id_prodi ASC),
  CONSTRAINT fk_mk_prodi
    FOREIGN KEY (id_prodi)
    REFERENCES siakad_db.prodi (id_prodi)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table siakad_db.jadwal
-- -----------------------------------------------------
-- OPTIMASI: Kolom 'hari' diubah menjadi ENUM
CREATE TABLE IF NOT EXISTS siakad_db.jadwal (
  id_jadwal INT NOT NULL AUTO_INCREMENT,
  kode_mk VARCHAR(10) NULL,
  nidn BIGINT NULL,
  hari ENUM('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu') NULL, -- <-- Optimasi
  jam VARCHAR(20) NULL COMMENT 'Contoh: 08:00 - 10:30',
  ruang VARCHAR(20) NULL,
  PRIMARY KEY (id_jadwal),
  INDEX fk_jadwal_mk_idx (kode_mk ASC),
  INDEX fk_jadwal_dosen_idx (nidn ASC),
  CONSTRAINT fk_jadwal_mk
    FOREIGN KEY (kode_mk)
    REFERENCES siakad_db.mata_kuliah (kode_mk)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_jadwal_dosen
    FOREIGN KEY (nidn)
    REFERENCES siakad_db.dosen (nidn)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table siakad_db.krs
-- -----------------------------------------------------
-- OPTIMASI: Kolom 'status_validasi' diubah menjadi ENUM
CREATE TABLE IF NOT EXISTS siakad_db.krs (
  id_krs INT NOT NULL AUTO_INCREMENT,
  nim BIGINT NULL,
  id_jadwal INT NULL,
  semester VARCHAR(45) NULL,
  tahun_ajaran VARCHAR(45) NULL,
  status_validasi ENUM('Menunggu', 'Disetujui', 'Ditolak') NULL DEFAULT 'Menunggu', -- <-- Optimasi
  PRIMARY KEY (id_krs),
  INDEX fk_krs_mahasiswa_idx (nim ASC),
  INDEX fk_krs_jadwal_idx (id_jadwal ASC),
  CONSTRAINT fk_krs_mahasiswa
    FOREIGN KEY (nim)
    REFERENCES siakad_db.mahasiswa (nim)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_krs_jadwal
    FOREIGN KEY (id_jadwal)
    REFERENCES siakad_db.jadwal (id_jadwal)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table siakad_db.nilai
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS siakad_db.nilai (
  id_nilai INT NOT NULL AUTO_INCREMENT,
  id_krs INT NULL,
  nilai_huruf VARCHAR(10) NULL,
  nilai_angka FLOAT NULL,
  PRIMARY KEY (id_nilai),
  INDEX fk_nilai_krs_idx (id_krs ASC),
  CONSTRAINT fk_nilai_krs
    FOREIGN KEY (id_krs)
    REFERENCES siakad_db.krs (id_krs)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;