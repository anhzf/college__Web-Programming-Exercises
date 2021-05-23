-- kuliah.mahasiswa definition

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `semester` int(2) NOT NULL,
  `ipk` double NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
