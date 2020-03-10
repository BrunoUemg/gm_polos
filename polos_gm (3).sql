-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Mar-2020 às 19:30
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polos_gm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int(11) NOT NULL,
  `nomeAluno` varchar(100) NOT NULL,
  `dtNascimento` varchar(10) NOT NULL,
  `nomePai` varchar(100) NOT NULL,
  `profissaoPai` varchar(100) NOT NULL,
  `nomeMae` varchar(100) NOT NULL,
  `profissaoMae` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `enderecoResidencial` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `idPolo` int(11) NOT NULL,
  `telefoneContato` varchar(18) NOT NULL,
  `escola` varchar(60) NOT NULL,
  `anoEscola` varchar(60) NOT NULL,
  `turmaEscola` varchar(30) NOT NULL,
  `turnoEscola` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `nomeAluno`, `dtNascimento`, `nomePai`, `profissaoPai`, `nomeMae`, `profissaoMae`, `sexo`, `enderecoResidencial`, `bairro`, `idPolo`, `telefoneContato`, `escola`, `anoEscola`, `turmaEscola`, `turnoEscola`) VALUES
(1, 'teste', '2019-12-12', 'testst', 'tstst', 'sttst', 'ttstst', 'tstst', 'tst', 'tst', 1, '', 'sdsd', 'sdsdd', 'sdjskdj', 'dsdhsj'),
(3, '$nomeAluno', '$dtNascime', '$nomePai', '$profissaoPai', '$nomeMae', '$profissaoMae', '$sexo', '$enderecoResidencial', '$bairro', 1, '', 'sdssd', 'sddssd', 'sdkjsdk', 'fsdf'),
(4, 'brunp', '2020-02-28', 'test', 'shajs', 'dshjdh', 'hjdshj', 'Masculino', 'hjdhjs', 'jshdj', 1, '', 'fdggd', 'sfgdf', 'sdjsdj', 'fsdf'),
(5, 'testa', '2000-09-10', 'bhdhd', 'ahsdjh', 'hjsdhjsh', 'sjdhds', 'Masculino', 'jsdhshjd', 'jhsdjds', 1, '(55)5454-5454', 'jadhj', 'sjdh', 'dsjdhj', 'hsjdhsjdjh'),
(6, 'bruno', '13092000', 'antonio', 'sddjsj', 'ksdjk', 'ksdjk', 'kdjs', 'ksdj', 'ksjd', 3, '565566', '5ds56556', '565', '565', '56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encontro`
--

CREATE TABLE `encontro` (
  `idEncontro` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `dt` varchar(15) NOT NULL,
  `horaInicio` varchar(5) NOT NULL,
  `idPolo` int(11) NOT NULL,
  `nomeEncontro` varchar(60) NOT NULL,
  `horaFinal` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `encontro`
--

INSERT INTO `encontro` (`idEncontro`, `descricao`, `dt`, `horaInicio`, `idPolo`, `nomeEncontro`, `horaFinal`) VALUES
(1, 'testando ', '2020-03-05', '13:00', 1, 'teste', '15:00'),
(2, 'adf ', '2020-03-19', '12:00', 2, 'sas', '12:50'),
(3, 'vamos la ', '2020-03-13', '13:00', 1, 'novo', '14:00'),
(4, 'poloans ', '2020-09-03', '13:00', 3, 'polo1', '15:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE `escola` (
  `idEscola` int(11) NOT NULL,
  `ano` varchar(4) NOT NULL,
  `turma` varchar(60) NOT NULL,
  `turno` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `monitor`
--

CREATE TABLE `monitor` (
  `idMonitor` int(11) NOT NULL,
  `nomeMonitor` varchar(80) NOT NULL,
  `idPolo` int(11) NOT NULL,
  `dtNascimento` varchar(10) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `rua` varchar(60) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `monitor`
--

INSERT INTO `monitor` (`idMonitor`, `nomeMonitor`, `idPolo`, `dtNascimento`, `cpf`, `email`, `telefone`, `celular`, `cep`, `rua`, `numero`, `bairro`, `estado`, `cidade`) VALUES
(25, 'Bruno Soares Marcondes', 1, '2000-09-13', '465.408.248-40', 'bruno.marcondes0913@hotmail.com', '(17)3280-4176', '(17)99716-2634', '15.400-000', 'dfs', '45', 'sdfsd', 'DF', 'BrasÃ­lia'),
(28, 'tetsssttsts', 3, '2000-09-15', '585.585.858-58', 'bruno.marcondes0913@hotmail.com', '(17)3280-4176', '(17)99716-2634', '15.400-000', '12522', '1212', 'asd', 'SC', 'Abdon Batista'),
(29, 'Carlos', 1, '2000-09-13', '414.141.414-14', 'bruno.marcondes0913@hotmail.com', '(17)3280-4176', '(17)99716-2634', '15.400-000', 'dsdsd', '201', 'jhsdjds', 'SC', 'Abdon Batista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `polo`
--

CREATE TABLE `polo` (
  `idPolo` int(11) NOT NULL,
  `nomePolo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `polo`
--

INSERT INTO `polo` (`idPolo`, `nomePolo`) VALUES
(1, 'polos'),
(2, 'teste'),
(3, 'polos1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(100) NOT NULL,
  `userAcesso` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `idMonitor` int(11) DEFAULT NULL,
  `idAluno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `userAcesso`, `senha`, `idMonitor`, `idAluno`) VALUES
(1, 'Administrador', 'adm', 'adm123', NULL, NULL),
(2, 'bruno', 'monitor', '123', NULL, NULL),
(3, 'teste', 'teste', '123', 1, NULL),
(4, 'aluno', 'aluno', '123', NULL, 4),
(5, 'teset', '465.408.248-', '4545-05-04', 1, NULL),
(9, 'Brunp', '465.408.248-40', '2000-09-13', 23, NULL),
(10, 'bruno', '111.111.111-11', '111.111.111-11', 24, NULL),
(11, 'Bruno Soares Marcondes', '465.408.248-40', '465.408.248-40', 25, NULL),
(12, 'exluir', '565.656.565-65', '565.656.565-65', 26, NULL),
(13, 'sdhfh', '111.111.111-11', '111.111.111-11', 27, NULL),
(14, 'tetsssttsts', '585.585.858-58', '585.585.858-58', 28, NULL),
(15, 'Carlos', '414.141.414-14', '414.141.414-14', 29, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`),
  ADD KEY `idPolo` (`idPolo`);

--
-- Indexes for table `encontro`
--
ALTER TABLE `encontro`
  ADD PRIMARY KEY (`idEncontro`),
  ADD KEY `fk_idPolo1` (`idPolo`);

--
-- Indexes for table `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`idEscola`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`idMonitor`),
  ADD KEY `idPolo` (`idPolo`);

--
-- Indexes for table `polo`
--
ALTER TABLE `polo`
  ADD PRIMARY KEY (`idPolo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idMonitor` (`idMonitor`),
  ADD KEY `idAluno` (`idAluno`),
  ADD KEY `idMonitor_2` (`idMonitor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `encontro`
--
ALTER TABLE `encontro`
  MODIFY `idEncontro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `escola`
--
ALTER TABLE `escola`
  MODIFY `idEscola` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitor`
--
ALTER TABLE `monitor`
  MODIFY `idMonitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `polo`
--
ALTER TABLE `polo`
  MODIFY `idPolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_idPolo` FOREIGN KEY (`idPolo`) REFERENCES `polo` (`idPolo`);

--
-- Limitadores para a tabela `encontro`
--
ALTER TABLE `encontro`
  ADD CONSTRAINT `fk_idPolo1` FOREIGN KEY (`idPolo`) REFERENCES `polo` (`idPolo`);

--
-- Limitadores para a tabela `monitor`
--
ALTER TABLE `monitor`
  ADD CONSTRAINT `fk_idPolo2` FOREIGN KEY (`idPolo`) REFERENCES `polo` (`idPolo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
