SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `sapatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE `sapatos`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `sapatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
ALTER TABLE `sapatos` ADD `imagem` VARCHAR(255) NOT NULL AFTER `preco`;
INSERT INTO `sapatos` (`id`, `nome`, `descricao`, `preco`, `imagem`) VALUES
('1', 'Tênis de Corrida', 'Tênis confortável para corrida.', '199.99', 'https://images.tcdn.com.br/img/img_prod/649787/tenis_de_corrida_on_running_cloud_x_3_feminino_ivory_alloy_10407_2_09611f9350fb4441999b03049f062b55.jpg'),
('2', 'Sapato Social', 'Sapato elegante para ocasiões formais.', '299.99', 'https://img.irroba.com.br/fit-in/600x600/filters:fill(fff):quality(80)/dgalloni/catalog/produtos-2023/junho/dsc7078.JPG'),
('3', 'Sapatênis Casual', 'Sapatênis estiloso para uso diário.', '149.99', 'https://img.irroba.com.br/fit-in/600x600/filters:fill(fff):quality(80)/myrolcal/catalog/036/sapatenis-masculino-casual-macio-confortavel-1marfim.jpeg');
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);
CREATE TABLE meias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    imagem VARCHAR(255) 
);
