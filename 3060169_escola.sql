-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb20.awardspace.net
-- Generation Time: 12-Jun-2019 às 04:45
-- Versão do servidor: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3060169_escola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int(11) NOT NULL,
  `data_nacimento` varchar(20) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` varchar(30) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `data_cad` varchar(20) DEFAULT NULL,
  `cep` varchar(50) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `data_nacimento`, `logradouro`, `numero`, `bairro`, `nome`, `cidade`, `estado`, `data_cad`, `cep`, `id_curso`) VALUES
(1, '23/04/1998', 'Avenida Manoel Borba Gato', '12', 'Dom Pedro I', 'JONATHAS DE ABREU MENDONCA', 'Manaus', 'AM', '31/05/2019', '69042500', 3),
(2, '24/03/1999', 'Rua César Emir Duarte', '43', 'Dom Pedro I', 'juninho play', 'Manaus', 'AM', '31/05/2019', '69042660', 2),
(4, '21/09/2007', 'Rua César Emir Duarte', '', 'Dom Pedro I', 'jonathas testando', 'Manaus', 'AM', '31/05/2019', '69042660', 2),
(6, '12/01/1998', 'Rua César Emir Duarte', '12', 'Dom Pedro I', 'jonathas teste 4', 'Manaus', 'AM', '31/05/2019', '69042660', 3),
(7, '11/09/1989', 'Rua Campos Lindos', '37', 'Nova Esperança', 'Luan da silva vasconcelos', 'Manaus', 'AM', '02/06/2019', '69037568', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_cursos`
--

CREATE TABLE `aluno_cursos` (
  `id_aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno_cursos`
--

INSERT INTO `aluno_cursos` (`id_aluno`, `id_curso`) VALUES
(2, 2),
(3, 2),
(4, 2),
(5, 4),
(6, 3),
(7, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `idCursos` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `data_cad` varchar(20) DEFAULT NULL,
  `id_prof` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`idCursos`, `nome`, `data_cad`, `id_prof`) VALUES
(1, 'engenharia da computação', '30/05/2019', 4),
(2, 'ciências da computação', '30/05/2019', 5),
(3, 'Engenharia civil', '30/05/2019', 7),
(4, 'artes e biomédicina', '30/05/2019', 6),
(5, 'odontologia ', '31/05/2019', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `idProfessor` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `data_nascimento` varchar(20) DEFAULT NULL,
  `data_cad` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idProfessor`, `nome`, `data_nascimento`, `data_cad`) VALUES
(4, 'jonathas mendonça', '23/08/1995', '30/05/2019'),
(5, 'jonathas ', '07/05/2019', '30/05/2019'),
(6, 'uebert jancen moreira', '23/08/1989', '30/05/2019'),
(7, 'klemerson castro da silva', '13/05/2019', '30/05/2019'),
(8, 'franscisco dinola', '21/01/1980', '30/05/2019'),
(9, 'joão da silva', '14/05/2019', '30/05/2019'),
(10, 'kleber moreira pereira', '03/09/1970', '30/05/2019'),
(11, 'silva souva pereira', '30/09/1980', '30/05/2019'),
(12, 'marcos paulo silva', '01/01/1987', '30/05/2019'),
(13, 'diego patrick souva', '21/01/1978', '30/05/2019'),
(14, 'wagner santos', '21/01/1960', '30/05/2019'),
(16, 'Bills santos da silva', '21/01/1988', '31/05/2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`);

--
-- Indexes for table `aluno_cursos`
--
ALTER TABLE `aluno_cursos`
  ADD PRIMARY KEY (`id_aluno`,`id_curso`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idCursos`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idProfessor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idCursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
