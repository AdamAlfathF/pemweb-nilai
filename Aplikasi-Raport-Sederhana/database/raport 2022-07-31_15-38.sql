
-- Database Backup --
-- Ver. : 1.0.1
-- Host : 127.0.0.1
-- Generating Time : Jul 31, 2022 at 10:38:32:AM



CREATE TABLE `guru` (
  `nip` varchar(18) NOT NULL,
  `kd_mp` int(11) DEFAULT NULL,
  `nama_guru` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` enum('ISLAM','PROTESTAN','KATHOLIK','HINDU','BUDHA','KONGHUCU','LAINNYA') DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `kd_mp` (`kd_mp`),
  CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`kd_mp`) REFERENCES `mata_pelajaran` (`kd_mp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO guru VALUES
("197303012006040082","10","Bambang","Pamengpeuk","L","ISLAM"),
("197303012006041013","1","Budi","Cikancung","L","ISLAM"),
("197303012006041093","3","Rini Sopiati","Ciledug","P","ISLAM"),
("197303012006041434","5","Titin Suratin","Pamengpeuk","P","ISLAM"),
("197303012006041439","8","Tina Martil","Baleendah","P","ISLAM"),
("197303012006041801","9","Jajang","Cikancung","L","PROTESTAN"),
("197303012006041867","4","Abdul Halim","Tarogong","L","ISLAM"),
("197303012006042817","2","Anwar","Pamengpeuk","L","ISLAM"),
("197303012006047117","7","Hani","Tarogong","P","ISLAM"),
("197303012006048803","11","Entis","Panyileukan","P","ISLAM"),
("197303012006048865","6","Tarno","Mengkurakyat","L","ISLAM");




CREATE TABLE `mata_pelajaran` (
  `kd_mp` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mp` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_mp`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;


INSERT INTO mata_pelajaran VALUES
("1","Pendidikan Agama Islam"),
("2","PKN"),
("3","Bahasa Indonesia"),
("4","Matematika"),
("5","Ilmu Pengetahuan Alam"),
("6","Ilmu Pengetahuan Sosial"),
("7","Bahasa Inggris"),
("8","Seni Budaya"),
("9","Penjasorkes"),
("10","Prakarya"),
("11","Bahasa Sunda");




CREATE TABLE `nilai` (
  `nis` varchar(8) NOT NULL,
  `kd_mp` int(11) NOT NULL,
  `semester` enum('1','2') DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL,
  `predikat` char(1) DEFAULT NULL,
  KEY `nis` (`nis`),
  KEY `kd_mp` (`kd_mp`),
  CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE,
  CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`kd_mp`) REFERENCES `mata_pelajaran` (`kd_mp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO nilai VALUES
("77241560","4","1","80","B"),
("77241560","5","1","76","C"),
("77241560","6","1","67","C"),
("77241560","7","1","68","C"),
("77241560","8","1","82","B"),
("77241560","9","1","79","B"),
("77241560","10","1","90","A"),
("77241560","11","1","73","C"),
("77287165","1","1","80","B"),
("77287165","2","1","66","C"),
("77287165","3","1","70","C"),
("77287165","4","1","67","C"),
("77287165","5","1","82","B"),
("77287165","6","1","66","C"),
("77287165","7","1","92","A"),
("77287165","8","1","85","B"),
("77287165","9","1","71","C"),
("77287165","10","1","70","C"),
("77287165","11","1","79","B"),
("77228601","2","1","81","B"),
("77228601","3","1","69","C"),
("77228601","5","1","85","B"),
("77228601","6","1","65","C"),
("77228601","7","1","81","B"),
("77228601","8","1","72","C"),
("77228601","9","1","66","C"),
("77228601","10","1","72","C"),
("77228601","11","1","82","B"),
("77288132","1","1","90","A"),
("77288132","2","1","77","B"),
("77288132","3","1","65","C"),
("77288132","4","1","87","B"),
("77288132","5","1","80","B"),
("77288132","6","1","70","C"),
("77288132","7","1","83","B"),
("77288132","8","1","66","C"),
("77288132","9","1","72","C"),
("77288132","10","1","67","C"),
("77288132","11","1","70","C"),
("77228601","4","1","90","A"),
("77228601","1","1","90","A");




CREATE TABLE `siswa` (
  `nis` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `kelas` enum('VII','VIII','IX') NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` enum('ISLAM','PROTESTAN','KATHOLIK','HINDU','BUDHA','KONGHUCU','LAINNYA') DEFAULT NULL,
  `orang_tua` varchar(30) DEFAULT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO siswa VALUES
("14141425","Daffa","","VII","0000-00-00","L","ISLAM","",""),
("77228601","heri","Jl. Cimarantes","VII","2007-06-05","L","ISLAM","Joko","SDN Ngamplang Sari 4"),
("77241560","alika","Jl. Garut Tasik","VII","2007-07-17","P","ISLAM","Tono","SDN Ngamplang Sari 4"),
("77287165","siti","Jl. Margalaksana","VII","2007-08-10","P","ISLAM","Jakaria","SDN Ngamplang Sari 4"),
("77288132","adi","Jl. Tarogong","VII","2008-08-18","L","ISLAM","Hasan","SDN Ngamplang Sari 4");


