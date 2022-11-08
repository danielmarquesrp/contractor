-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10-Ago-2022 às 05:28
-- Versão do servidor: 10.5.15-MariaDB-0+deb11u1
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_etarp`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE  PROCEDURE `sp_boletos_update` (IN `pidboleto` TINYINT, IN `pdesfilial` VARCHAR(128), IN `pdesdestinatario` VARCHAR(128))  NO SQL
BEGIN
  
   IF pidboleto > 0 THEN     	 
    
        UPDATE tb_boletos 
        SET 
        desfilial = pdesfilial,
        desdestinatario = pdesdestinatario
  
        WHERE idboleto = pidboleto;  

   ELSE
        INSERT INTO tb_boletos
        (
	       desfilial,
           desdestinatario
        )
        VALUES
        (
           pdesfilial,
           pdesdestinatario
        );    
           
        SET pidboleto = LAST_INSERT_ID();


    END IF;


    SELECT * FROM tb_boletos 
    WHERE idboleto = pidboleto;



END$$

CREATE  PROCEDURE `sp_clients_update` (IN `pidcliente` TINYINT, IN `pdesclient_type` VARCHAR(128), IN `pIE_Indicator` VARCHAR(128), IN `pIE_cod` VARCHAR(128), IN `pdesname` VARCHAR(128), IN `pdesdocument_type` VARCHAR(128), IN `pdesdocument` VARCHAR(128), IN `pdesnumber` VARCHAR(128), IN `pidreference` VARCHAR(128), IN `paddresstype` VARCHAR(128), IN `pdescep` VARCHAR(128), IN `pdesendereco` VARCHAR(128), IN `pdescomplemento` VARCHAR(128), IN `pdesbairro` VARCHAR(128), IN `pdesestado` VARCHAR(128), IN `pdescidade` VARCHAR(128), IN `pdesemail` VARCHAR(128), IN `pdesemailsec` LONGTEXT)  NO SQL
BEGIN




   IF pidcliente > 0 THEN     	 
    
        UPDATE tb_clientes 
        SET 
      	desclient_type = Pdesclient_type,
        IE_Indicator = PIE_Indicator,
        IE_cod = PIE_cod,
        desname = Pdesname,
        desemail = pdesemail,
        desemailsec = pdesemailsec,
        desdocument_type = Pdesdocument_type,
        desdocument = Pdesdocument,
        desnumber= Pdesnumber
        
        WHERE idcliente = pidcliente;  

        UPDATE tb_address 
        SET 
        idreference = pidreference,
        addresstype = paddresstype,
        descep = pdescep,
        desendereco = pdesendereco,
        descomplemento = pdescomplemento,
        desbairro = pdesbairro,
        desestado = pdesestado,
        descidade =pdescidade
      
        WHERE idreference = pidcliente;  


   ELSE

        INSERT INTO tb_address 
        (
            idreference,
            addresstype,
            descep,
            desendereco,
            descomplemento,
            desbairro,
            desestado,
            descidade
           
        )
        VALUES
        (
            pidreference,
            paddresstype,
            pdescep,     
            pdesendereco,
            pdescomplemento,
            pdesbairro,
            pdesestado,
            pdescidade
      
        );
     

        INSERT INTO tb_clientes
        (
	    desclient_type,
        IE_Indicator,
        IE_cod,
        desname,
        desemail,
        desemailsec,
        desdocument_type,
        desdocument,
        desnumber
       
        )
        VALUES
        (
        pdesclient_type,
        pIE_Indicator,
        pIE_cod,
        pdesname,
        pdesemail,
        pdesemailsec,
        pdesdocument_type,
        pdesdocument,
        pdesnumber
        
        );    
           
        SET pidcliente = LAST_INSERT_ID();


    END IF;


    SELECT * FROM tb_clientes 
    WHERE idcliente = pidcliente;



END$$

CREATE  PROCEDURE `sp_filiais_update` (IN `pidfilial` TINYINT, IN `pdesrazaosocial` VARCHAR(128), IN `pdesnomefilial` VARCHAR(128), IN `pdestelefonefilial` VARCHAR(128), IN `pdesemailfilial` VARCHAR(128), IN `pdescnpjfilial` VARCHAR(128), IN `pdesincricaomunicipal` VARCHAR(128), IN `pdesinscricaoestadual` VARCHAR(128), IN `pdescnae` VARCHAR(128), IN `pidreference` VARCHAR(128), IN `paddresstype` VARCHAR(128), IN `pdescep` VARCHAR(128), IN `pdesendereco` VARCHAR(128), IN `pdescomplemento` VARCHAR(128), IN `pdesbairro` VARCHAR(128), IN `pdesestado` VARCHAR(128), IN `pdescidade` VARCHAR(128))  NO SQL
BEGIN
  
   IF pidfilial > 0 THEN     	 
    
        UPDATE tb_filiais 
        SET 
        idfilial = pidfilial,
        desrazaosocial = pdesrazaosocial,
        desnomefilial = pdesnomefilial,
        destelefonefilial = pdestelefonefilial,
        desemailfilial = pdesemailfilial,
        descnpjfilial = pdescnpjfilial,
        desincricaomunicipal = pdesincricaomunicipal,
        desinscricaoestadual = pdesinscricaoestadual,
        descnae = pdescnae
        WHERE idfilial = pidfilial;  

      UPDATE tb_address 
        SET 
        idreference = pidreference,
        addresstype = paddresstype,
        descep = pdescep,
        desendereco = pdesendereco,
        descomplemento = pdescomplemento,
        desbairro = pdesbairro,
        desestado = pdesestado,
        descidade =pdescidade
        WHERE idreference = pidfilial;  

   ELSE

   

        INSERT INTO tb_address 
        (
            idreference,
            addresstype,
            descep,
            desendereco,
            descomplemento,
            desbairro,
            desestado,
            descidade
        )
        VALUES
        (
            pidreference,
            paddresstype,
            pdescep,     
            pdesendereco,
            pdescomplemento,
            pdesbairro,
            pdesestado,
            pdescidade
        );


    
        INSERT INTO tb_filiais
        (
	    idfilial,
        desrazaosocial,
        desnomefilial,
        destelefonefilial,
        desemailfilial,
        descnpjfilial,
        desincricaomunicipal,
        desinscricaoestadual,
        descnae
        )
        VALUES
        (
        pidfilial,
        pdesrazaosocial,
        pdesnomefilial,
        pdestelefonefilial,
        pdesemailfilial,
        pdescnpjfilial,
        pdesincricaomunicipal,
        pdesinscricaoestadual,
        pdescnae
        );    
           
        SET pidfilial = LAST_INSERT_ID();


    END IF;


    SELECT * FROM tb_filiais 
    WHERE idfilial = pidfilial;



END$$

CREATE  PROCEDURE `sp_products_update` (IN `pidproduto` TINYINT, IN `pdesname` VARCHAR(128), IN `pdesdescription` VARCHAR(128), IN `pdestype` VARCHAR(128))  NO SQL
BEGIN
  
   IF pidproduto > 0 THEN     	 
    
        UPDATE tb_produtos 
        SET 
        desname = pdesname,
        desdescription = pdesdescription,
        destype = pdestype

        WHERE idproduto = pidproduto;  

   ELSE
        INSERT INTO tb_produtos
        (
	    desname, 
        desdescription, 
        destype
        )
        VALUES
        (
            pdesname,
            pdesdescription,
            pdestype         
        );    
           
        SET pidproduto = LAST_INSERT_ID();


    END IF;


    SELECT * FROM tb_produtos 
    WHERE idproduto = pidproduto;



END$$

CREATE  PROCEDURE `sp_recoveries_save` (`piduser` INT(11), `pdesip` VARCHAR(45))  BEGIN

 INSERT INTO tb_recoveries(iduser, desip)
 VALUES  (piduser, pdesip);

 SELECT * FROM tb_recoveries
 WHERE idrecovery = LAST_INSERT_ID();


END$$

CREATE  PROCEDURE `sp_relatorios_update` (IN `pidrelatorio` TINYINT, IN `pidcliente` TINYINT, IN `pidfilial` TINYINT, IN `pdesrelatorio` VARCHAR(128), IN `pdesdescription` LONGTEXT, IN `pdesprodutcts_array` VARCHAR(128), IN `pdesprodutcts_array_values` LONGTEXT, IN `pdesfilial_nome` VARCHAR(128), IN `pdescliente_nome` VARCHAR(128), IN `pperiodo_vencimento` INT, IN `pquantidade_parcelas` VARCHAR(128), IN `phas_to_pay_today` TINYINT, IN `pdt_inicial` VARCHAR(128), IN `pdt_vencimento` VARCHAR(128), IN `pdt_final` VARCHAR(128), IN `pdesnumero_parcela` TINYINT, IN `pparcelas_pagas` VARCHAR(255), IN `pdesparcelas` LONGTEXT, IN `pANEXAR_CONTRATO` VARCHAR(128), IN `pNUMERO_REF` VARCHAR(128), IN `pvalor_desconto` VARCHAR(128), IN `pvalor_despesas` VARCHAR(128), IN `pSTATUS_CONTRATO` VARCHAR(128))  BEGIN
  
   IF pidrelatorio > 0 THEN     	 
    
        UPDATE tb_relatorios 
         SET 
           idcliente = pidcliente,
           idfilial = pidfilial,
           desrelatorio = pdesrelatorio,
           desdescription = pdesdescription,
           desprodutcts_array = pdesprodutcts_array,
           desprodutcts_array_values = pdesprodutcts_array_values,
           desfilial_nome = pdesfilial_nome,
           descliente_nome = pdescliente_nome,
           periodo_vencimento = pperiodo_vencimento,
           quantidade_parcelas = pquantidade_parcelas,          	parcelas_pagas = pparcelas_pagas,
           dt_inicial = pdt_inicial,
           dt_vencimento = pdt_vencimento,
           dt_final = pdt_final
             
        WHERE idrelatorio = pidrelatorio;  

   ELSE
        INSERT INTO tb_relatorios
        (
           idcliente,
           idfilial,
           desrelatorio,
           desdescription,
           desprodutcts_array,
           desprodutcts_array_values,
           desfilial_nome,
           descliente_nome,
           periodo_vencimento,           
           quantidade_parcelas,
           has_to_pay_today,        
           dt_inicial,
           dt_vencimento,
           dt_final,
           desnumero_parcela,
            parcelas_pagas,
            desparcelas,
            ANEXAR_CONTRATO,
            NUMERO_REF,
           VALOR_DESCONTO,
           VALOR_DESPESAS,
            STATUS_CONTRATO
        )
        VALUES
        (
           pidcliente,
           pidfilial,
           pdesrelatorio,
           pdesdescription,
           pdesprodutcts_array,
           pdesprodutcts_array_values,
           pdesfilial_nome,
           pdescliente_nome,
           pperiodo_vencimento,     
           pquantidade_parcelas, 
           phas_to_pay_today,     
           pdt_inicial, 
            pdt_vencimento,
           pdt_final,
           pdesnumero_parcela,
           pparcelas_pagas,
           pdesparcelas,
           pANEXAR_CONTRATO,
           pNUMERO_REF,
           pvalor_desconto,
           pvalor_despesas,
            pSTATUS_CONTRATO
        );    
           
        SET pidrelatorio = LAST_INSERT_ID();


    END IF;


    SELECT * FROM tb_relatorios 
    WHERE idrelatorio = pidrelatorio;



END$$

CREATE  PROCEDURE `sp_users_update` (IN `piduser` INT(11), IN `pdeslogin` VARCHAR(128), IN `pdespassword` VARCHAR(128), IN `pinadmin` TINYINT, IN `pdesperson` VARCHAR(128))  BEGIN

    DECLARE vidperson INT;

	
    IF piduser > 0 THEN

        SELECT idperson INTO vidperson
        FROM tb_users
        WHERE iduser = piduser;

        UPDATE tb_persons
        SET desperson = pdesperson
         WHERE idperson = vidperson;


        UPDATE tb_users
        SET deslogin = pdeslogin,
            despassword = pdespassword,
            inadmin = pinadmin
               
        WHERE iduser = piduser;



    ELSE

        INSERT INTO tb_persons (desperson )
         
        VALUES(pdesperson   );
      


        SET vidperson = LAST_INSERT_ID();

        INSERT INTO tb_users (idperson,
            deslogin,
            despassword,
            inadmin  
      )
        VALUES(vidperson,
            pdeslogin,
            pdespassword,
            pinadmin
         );


    END IF;


    SELECT * FROM tb_users a
    INNER JOIN tb_persons b ON a.idperson = b.idperson
    WHERE a.iduser = vidperson;



END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_address`
--

CREATE TABLE `tb_address` (
  `idaddress` int(11) NOT NULL,
  `idreference` varchar(128) NOT NULL,
  `addresstype` varchar(128) NOT NULL,
  `descep` varchar(128) NOT NULL,
  `desendereco` varchar(128) NOT NULL,
  `descomplemento` varchar(128) NOT NULL,
  `desbairro` varchar(128) NOT NULL,
  `desestado` varchar(128) NOT NULL,
  `descidade` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_address`
--

--INSERT INTO `tb_address` (`idaddress`, `idreference`, `addresstype`, `descep`, `desendereco`, `descomplemento`, `desbairro`, `desestado`, `descidade`) VALUES
--(47, '33', '1', '21540-500', 'Estrada do Barro Vermelho', 'poste branco 43', 'Rocha Miranda', 'Rio de Janeiro', 'Rio de Janeiro'),
--(72, '48', '1', '14050070', 'Rua Doutor Loiola, 516', 'sala 02', 'Vila Tibério', 'São paulo', 'Ribeirão Preto'),
--(75, 'danielmarques.rp@gmail.com', '0', 'Estrada do Barro Vermelho', '600', 'teste', 'RJ', 'Rio de Janeiro', '50'),
--(79, '55', '0', '14050070', 'Rua Doutor Loiola', 'Sala 02, 516', '24121', 'RJ', 'Ribeirão Preto'),
--(80, '56', '0', '14050070', '1', '1', '1', '1', '1'),
--(81, 'danielmarques.rp@gmail.com', '0', '1', '1', '1', '1', '1', '56'),
--(108, '69', '0', '21545500', 'RJ', '421412412', '00000000', 'RJ', 'RIO DE JANEIRO'),
--(112, '48', '1', '14050070', 'Rua Doutor Loiola, 516', 'sala 02', 'Vila Tibério', 'São paulo', 'Ribeirão Preto'),
--(113, '73', '0', 'CEP *', 'Endereço *', 'Complemento *', 'Bairro *', 'Estado *', 'Cidade *'),
--(115, '49', '1', '14000000', 'rua fox, 1', 'sala2', 'bairro one', 'SP', 'city fox'),
--(116, '75', '0', '6666', 'rua grupo, 23', 'sal 696', 'vila do bairro', 'sao paulo', 'rib preto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_boletos`
--

CREATE TABLE `tb_boletos` (
  `idboleto` tinyint(11) NOT NULL,
  `desfilial` varchar(128) NOT NULL,
  `desdestinatario` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `idcliente` tinyint(4) NOT NULL,
  `desclient_type` varchar(128) NOT NULL,
  `IE_Indicator` varchar(128) NOT NULL,
  `IE_cod` varchar(128) NOT NULL,
  `desname` varchar(128) NOT NULL,
  `desemail` varchar(255) NOT NULL,
  `desemailsec` longtext NOT NULL,
  `desdocument_type` varchar(128) NOT NULL,
  `desdocument` varchar(128) NOT NULL,
  `desnumber` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_clientes`
--

--INSERT INTO `tb_clientes` (`idcliente`, `desclient_type`, `IE_Indicator`, `IE_cod`, `desname`, `desemail`, `desemailsec`, `desdocument_type`, `desdocument`, `desnumber`) VALUES
--(73, 'Cliente', 'OPÇÃO 3', 'Inscrição Estadual *', 'Nome do Cliente *', 'vto.hugo67@gmail.com', '', 'PESSOA JURÍDICA', 'CPF/CNPJ do Cliente *', 'Telefone do Cliente *'),
--(75, 'Cliente', 'OPÇÃO 3', '11111', 'clie testando', 'daniel@etarp.com.br', 'daniel@foxonesoft.com.br', 'Cliente', '999999', '16161616');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_consts`
--

CREATE TABLE `tb_consts` (
  `id` int(11) NOT NULL,
  `desdevelopment` varchar(256) NOT NULL,
  `deswebsite_root_url` varchar(256) NOT NULL,
  `desmercadopagotoken` varchar(264) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_consts`
--

--INSERT INTO `tb_consts` (`id`, `desdevelopment`, `deswebsite_root_url`, `desmercadopagotoken`) VALUES
--(1, 'https://etarpv2.elisyumcorp.com/', 'https://etarpv2.elisyumcorp.com/', 'TEST-1758101653358813-051811-2804ac179f74288b8aab9e6a4cb5632c-778851117');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_filiais`
--

CREATE TABLE `tb_filiais` (
  `idfilial` tinyint(11) NOT NULL,
  `desrazaosocial` varchar(128) NOT NULL,
  `desnomefilial` varchar(128) NOT NULL,
  `destelefonefilial` varchar(128) NOT NULL,
  `desemailfilial` varchar(128) NOT NULL,
  `descnpjfilial` varchar(128) NOT NULL,
  `desincricaomunicipal` varchar(128) NOT NULL,
  `desinscricaoestadual` varchar(128) NOT NULL,
  `descnae` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_filiais`
--

--INSERT INTO `tb_filiais` (`idfilial`, `desrazaosocial`, `desnomefilial`, `destelefonefilial`, `desemailfilial`, `descnpjfilial`, `desincricaomunicipal`, `desinscricaoestadual`, `descnae`) VALUES
--(48, 'ETARP AUTOMACAO E INFORMATICA EIRELLI', 'ETARP AUTOMACAO', '16 32895501', 'grupoetarp@etarp.com.br', '24466750000111', '123456789321', '123456', '44343-testeste'),
--(49, 'fox one razao', 'fox one', '123456789', 'fox@fox.com', '789789789', '321321321', '654654', '458789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_persons`
--

CREATE TABLE `tb_persons` (
  `idperson` int(11) NOT NULL,
  `desperson` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_persons`
--

INSERT INTO `tb_persons` (`idperson`, `desperson`) VALUES
--(141, 'Vitor Hugo'),
--(144, 'daniel'),
(151, 'Admin'),
(152, 'Etarp Admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `idproduto` tinyint(4) NOT NULL,
  `desname` varchar(128) NOT NULL,
  `desdescription` varchar(128) NOT NULL,
  `destype` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_produtos`
--

--INSERT INTO `tb_produtos` (`idproduto`, `desname`, `desdescription`, `destype`) VALUES
--(45, 'Produto 2', 'teste serv', 1),
--(46, 'Produto 1', 'tetse prod', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_recoveries`
--

CREATE TABLE `tb_recoveries` (
  `idrecovery` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `dtrecovery` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_relatorios`
--

CREATE TABLE `tb_relatorios` (
  `idrelatorio` int(11) NOT NULL,
  `idfilial` tinyint(4) NOT NULL,
  `idcliente` tinyint(4) NOT NULL,
  `desrelatorio` varchar(128) NOT NULL,
  `desdescription` longtext NOT NULL,
  `desprodutcts_array` varchar(128) NOT NULL,
  `desprodutcts_array_values` longtext NOT NULL,
  `desfilial_nome` varchar(128) NOT NULL,
  `descliente_nome` varchar(128) NOT NULL,
  `periodo_vencimento` varchar(128) NOT NULL,
  `quantidade_parcelas` varchar(128) NOT NULL,
  `has_to_pay_today` tinyint(4) NOT NULL,
  `dt_inicial` varchar(128) NOT NULL,
  `dt_vencimento` varchar(128) NOT NULL,
  `dt_final` varchar(128) NOT NULL,
  `desnumero_parcela` tinyint(4) NOT NULL DEFAULT 1,
  `parcelas_pagas` varchar(255) DEFAULT NULL,
  `desparcelas` longtext NOT NULL,
  `ANEXAR_CONTRATO` varchar(128) NOT NULL,
  `NUMERO_REF` varchar(128) NOT NULL,
  `VALOR_DESCONTO` varchar(128) NOT NULL,
  `VALOR_DESPESAS` varchar(128) NOT NULL,
  `STATUS_CONTRATO` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_relatorios`
--

--INSERT INTO `tb_relatorios` (`idrelatorio`, `idfilial`, `idcliente`, `desrelatorio`, `desdescription`, `desprodutcts_array`, `desprodutcts_array_values`, `desfilial_nome`, `descliente_nome`, `periodo_vencimento`, `quantidade_parcelas`, `has_to_pay_today`, `dt_inicial`, `dt_vencimento`, `dt_final`, `desnumero_parcela`, `parcelas_pagas`, `desparcelas`, `ANEXAR_CONTRATO`, `NUMERO_REF`, `VALOR_DESCONTO`, `VALOR_DESPESAS`, `STATUS_CONTRATO`) VALUES
--(385, 48, 73, 'ETARP AUTOMACAO', ' asfaf', '46', '[[\"46\",\"1\",\"25\"]]', 'ETARP AUTOMACAO', 'teste', '30', '3', 1, '2022-08-03', '03-08-2022', '03-11-2022', 2, NULL, '[{\"num_parcela\":0,\"desboleto\":\"https:\\/\\/etarpv2.elisyumcorp.com\\/\\/pdf-files\\/\\/boleto-9789483794184454-etarp.pdf\",\"descontrato\":\"https:\\/\\/etarpv2.elisyumcorp.com\\/\\/pdf-files\\/contrato-9789483794184454-etarp.pdf\"},{\"num_parcela\":1,\"desboleto\":\"https:\\/\\/etarpv2.elisyumcorp.com\\/\\/pdf-files\\/\\/boleto-385.pdf\",\"descontrato\":\"https:\\/\\/etarpv2.elisyumcorp.com\\/\\/pdf-files\\/NCL-385.pdf\"},{\"num_parcela\":2,\"desboleto\":null,\"descontrato\":null},{\"num_parcela\":3,\"desboleto\":null,\"descontrato\":null}]', '0', '00', '00.00', '00.00', 'PENDENTE'),
--(386, 48, 75, 'ETARP AUTOMACAO', ' prod1', '45,46', '[[\"45\",\"1\",\"10\"],[\"46\",\"1\",\"10\"]]', 'ETARP AUTOMACAO', 'clie testando', '30', '2', 1, '2022-08-03', '10-08-2022', '10-10-2022', 1, NULL, '[{\"num_parcela\":0,\"desboleto\":\"https:\\/\\/etarpv2.elisyumcorp.com\\/\\/pdf-files\\/\\/boleto-8467551355750239-etarp.pdf\",\"descontrato\":\"https:\\/\\/etarpv2.elisyumcorp.com\\/\\/pdf-files\\/contrato-8467551355750239-etarp.pdf\"},{\"num_parcela\":1,\"desboleto\":null,\"descontrato\":null},{\"num_parcela\":2,\"desboleto\":null,\"descontrato\":null}]', '2', '1', '1', '1', 'PENDENTE'),
--(387, 49, 75, 'fox one', 'teste ', '45,46', '[[\"45\",\"1\",\"12\"],[\"46\",\"1\",\"12\"]]', 'fox one', 'clie testando', '30', '5', 1, '2022-08-03', '20-08-2022', '20-01-2023', 1, NULL, '[{\"num_parcela\":0,\"desboleto\":null,\"descontrato\":null},{\"num_parcela\":1,\"desboleto\":null,\"descontrato\":null},{\"num_parcela\":2,\"desboleto\":null,\"descontrato\":null},{\"num_parcela\":3,\"desboleto\":null,\"descontrato\":null},{\"num_parcela\":4,\"desboleto\":null,\"descontrato\":null},{\"num_parcela\":5,\"desboleto\":null,\"descontrato\":null}]', '2', '9999', '00.00', '12', 'PENDENTE'),
--(388, 48, 73, 'ETARP AUTOMACAO', 'testes', '45', '[[\"45\",\"1\",\"1\"]]', 'ETARP AUTOMACAO', 'Nome do Cliente *', '30', '0', 1, '2022-08-10', '10-08-2022', '10-08-2022', 1, NULL, '[{\"num_parcela\":0,\"desboleto\":\"https:\\/\\/etarpv2.elisyumcorp.com\\/\\/pdf-files\\/\\/boleto-388.pdf\",\"descontrato\":\"https:\\/\\/etarpv2.elisyumcorp.com\\/\\/pdf-files\\/NCL-388.pdf\"}]', '0', '00', '00.00', '00.00', 'PENDENTE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_states`
--

CREATE TABLE `tb_states` (
  `idstate` int(2) NOT NULL,
  `desstate` varchar(20) DEFAULT NULL,
  `desstatecode` varchar(2) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_states`
--

INSERT INTO `tb_states` (`idstate`, `desstate`, `desstatecode`, `dtregister`) VALUES
(1, 'Acre', 'AC', '2019-06-12 18:07:28'),
(2, 'Alagoas', 'AL', '2019-06-12 18:07:28'),
(3, 'Amazonas', 'AM', '2019-06-12 18:07:28'),
(4, 'Amapá', 'AP', '2019-06-12 18:07:28'),
(5, 'Bahia', 'BA', '2019-06-12 18:07:28'),
(6, 'Ceará', 'CE', '2019-06-12 18:07:28'),
(7, 'Distrito Federal', 'DF', '2019-06-12 18:07:28'),
(8, 'Espírito Santo', 'ES', '2019-06-12 18:07:28'),
(9, 'Goiás', 'GO', '2019-06-12 18:07:28'),
(10, 'Maranhão', 'MA', '2019-06-12 18:07:28'),
(11, 'Minas Gerais', 'MG', '2019-06-12 18:07:28'),
(12, 'Mato Grosso do Sul', 'MS', '2019-06-12 18:07:28'),
(13, 'Mato Grosso', 'MT', '2019-06-12 18:07:28'),
(14, 'Pará', 'PA', '2019-06-12 18:07:28'),
(15, 'Paraíba', 'PB', '2019-06-12 18:07:28'),
(16, 'Pernambuco', 'PE', '2019-06-12 18:07:28'),
(17, 'Piauí', 'PI', '2019-06-12 18:07:28'),
(18, 'Paraná', 'PR', '2019-06-12 18:07:28'),
(19, 'Rio de Janeiro', 'RJ', '2019-06-12 18:07:28'),
(20, 'Rio Grande do Norte', 'RN', '2019-06-12 18:07:28'),
(21, 'Rondônia', 'RO', '2019-06-12 18:07:28'),
(22, 'Roraima', 'RR', '2019-06-12 18:07:28'),
(23, 'Rio Grande do Sul', 'RS', '2019-06-12 18:07:28'),
(24, 'Santa Catarina', 'SC', '2019-06-12 18:07:28'),
(25, 'Sergipe', 'SE', '2019-06-12 18:07:28'),
(26, 'São Paulo', 'SP', '2019-06-12 18:07:28'),
(27, 'Tocantins', 'TO', '2019-06-12 18:07:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_stmt_options`
--

CREATE TABLE `tb_stmt_options` (
  `id` tinyint(4) NOT NULL,
  `desemail` varchar(256) NOT NULL,
  `despassword` varchar(256) NOT NULL,
  `deshost` varchar(256) NOT NULL,
  `desport` varchar(256) NOT NULL,
  `dessendername` varchar(256) NOT NULL,
  `desreplytoemail` varchar(256) NOT NULL,
  `desregistersuccess` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_stmt_options`
--

--INSERT INTO `tb_stmt_options` (`id`, `desemail`, `despassword`, `deshost`, `desport`, `dessendername`, `desreplytoemail`, `desregistersuccess`) VALUES
--(1, 'no_reply@etarp.com.br', 'MNt64R&FgkpQ', 'smtp.office365.com', '587', 'Grupo Etarp - Contabilidade', 'no_reply@etarp.com.br', 'Etarp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `iduser` int(11) NOT NULL,
  `idperson` int(11) NOT NULL,
  `deslogin` varchar(128) NOT NULL,
  `despassword` varchar(256) NOT NULL,
  `inadmin` tinyint(4) DEFAULT 0,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`iduser`, `idperson`, `deslogin`, `despassword`, `inadmin`, `dtregister`) VALUES
--(141, 141, 'vto.hugo62@gmail.com', '$2y$10$F58haxHgLYbdgY5nb9g5eujFVqNIzmkDS4MA6HKm8LoNC3NHOGjdW', 0, '2021-07-13 03:31:41'),
(151, 151, 'carla@etarp.com.br', '0', 0, '2022-07-13 22:29:45'),
(152, 152, 'daniel@etarp.com.br', '$12$8Db20E0CSjueSExxpUvqfuudqnTQ/bjHXAGFTX6h2AaBc0SyzEB/q', 0, '2022-08-03 13:30:26');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`idaddress`);

--
-- Índices para tabela `tb_boletos`
--
ALTER TABLE `tb_boletos`
  ADD PRIMARY KEY (`idboleto`);

--
-- Índices para tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Índices para tabela `tb_consts`
--
ALTER TABLE `tb_consts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_filiais`
--
ALTER TABLE `tb_filiais`
  ADD PRIMARY KEY (`idfilial`);

--
-- Índices para tabela `tb_persons`
--
ALTER TABLE `tb_persons`
  ADD PRIMARY KEY (`idperson`);

--
-- Índices para tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`idproduto`);

--
-- Índices para tabela `tb_recoveries`
--
ALTER TABLE `tb_recoveries`
  ADD PRIMARY KEY (`idrecovery`);

--
-- Índices para tabela `tb_relatorios`
--
ALTER TABLE `tb_relatorios`
  ADD PRIMARY KEY (`idrelatorio`);

--
-- Índices para tabela `tb_states`
--
ALTER TABLE `tb_states`
  ADD PRIMARY KEY (`idstate`);

--
-- Índices para tabela `tb_stmt_options`
--
ALTER TABLE `tb_stmt_options`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_address`
--
ALTER TABLE `tb_address`
  MODIFY `idaddress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de tabela `tb_boletos`
--
ALTER TABLE `tb_boletos`
  MODIFY `idboleto` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `idcliente` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `tb_consts`
--
ALTER TABLE `tb_consts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_filiais`
--
ALTER TABLE `tb_filiais`
  MODIFY `idfilial` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `tb_persons`
--
ALTER TABLE `tb_persons`
  MODIFY `idperson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `idproduto` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `tb_recoveries`
--
ALTER TABLE `tb_recoveries`
  MODIFY `idrecovery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de tabela `tb_relatorios`
--
ALTER TABLE `tb_relatorios`
  MODIFY `idrelatorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT de tabela `tb_stmt_options`
--
ALTER TABLE `tb_stmt_options`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
