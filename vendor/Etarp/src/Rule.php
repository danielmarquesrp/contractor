<?php

namespace Main;

use Main\DB\Sql;

        class Rule{

    
                public static function get_root_url(){
                        $sql = new Sql();
                        $q = $sql->select("SELECT deswebsite_root_url FROM tb_consts");
                        $row = $q[0];
                        return $row['deswebsite_root_url'];
                }



                const ERROR_SET_RECOVERY  = "Ocorreu um erro ao recuperar a senha | Por favor, tente novamente.";
                const ERROR_CURRENT_PASS_CLIENTE = "Verifique os campos | Por favor, tente novamente. ";
                CONST ALREADY_CONNECTED = "Você já está conectado | Por favor, desconecte-se antes de tentar logar. ";

                const HEADER_INFO = "projeto-login-header-info";
                
                //LOGIN
                const ERROR_EMAIL = "Informe o seu Email";
                const VALIDATE_EMAIL = "O Email parece estar em um formator inválido | Por favor, tente novamente.";

                const ERROR_PASSWORD = "Por favor, não deixe campos em branco!";

                const PASSWORD_LENGHT_MIN = 6;
                const PASSWORD_LENGHT_MAX = 20;

                const VALIDATE_PASSWORD = "A senha deve ter de ".Rule::PASSWORD_LENGHT_MIN. " até " .Rule::PASSWORD_LENGHT_MAX." caracteres | Por favor, tente novamente.";            
                
                const ERROR_PRODUCT_EMPTY = "Insira algum produto ou serviço";

                const ERROR_LOGIN = "Usuário inexistente ou senha inválida";
                //FIM LOGIN

                const PRODUCT_SUCCEFUL_UPDATED = "Produto Atualizado com sucesso!";
              
                const ERROR_NOTFOUNDED = "Usuário não encontrado";
                const ERROR_BOOL = "Utilize um valor válido";
                const VALIDATE_BOOL = "O valor precisa estar entre 0 e 1";


                const UPDATE_ITEM = "Atualizado com sucesso!";

                //Atualizar Senha de usuário Comum
                const INCORRECT_CONFIRM = "As senhas não coincidem" ;   
                const SUCESS_PASSWORD = "Senha alterada com sucesso!";
                //Atualizar Senha de usuário Comum


                //Exibição de Usuários no painel administrador
                const PAGINATION_MAXNUMBER = 999;
                const PAGINATION_MINNUMBER = 1;
                const PAGINATION_ITENSPERPAGE = 10;
                //Exibição de Usuários no painel administrador


                //Atualizar Senha de usuário administrador
                const ERROR_CURRENT_PASS = "Por favor, insira a senha antiga.";
                const VERIFY_CURRENT_PASS = "A nova senha não pode ser igual a anterior, tente novamente";
                const VERIFY_PASSWORD = "A senha atual informada é inválida. Por favor, tente novamente.";
                //Atualizar Senha de usuário administrador
            
     
          
          
                const URI_ADMIN = "admin";
                const URI_RECOVERY = "recuperar-senha";
                const URI_RECOVERYSENT = "redefinir";
                const URI_USER_LOGIN = "login";
                const URI_SUPPORT = "central-ajuda";

                const ERROR_GET_RECOVERY = "Houve um erro inesperado | Por favor, volte no Email e clique novamente no Link que você recebeu 
                | Caso o erro persista, aguarde aproximadamente 60 minutos e peça uma nova recuperação de senha ou entre em contato com o suporte ";
                //Recovery de senha de administrador

                const ERROR_DESCRIPTION = "Informe a descrição do contrato";
                
                //REGISTRAR
                const ERROR_NAME = "Informe o seu Nome";      
                const VALIDATE_NAME =  "O seu nome não pode conter caracteres especiais ou números | Por favor, tente novamente";
                const VALIDATE_FULL_NAME = "Este nome não parece estar completo";
 
                const ERROR_EMAIL_CONFIRM = "Informe a confirmação do e-mail";

                const VALIDATE_EMAIL_CONFIRM = "Os emails informados precisam ser iguais | Por favor, tente novamente";
                const ERROR_INTERMS = "Por favor, marque o checkbox se estiver de acordo com os termos de uso";

                const CHECK_USER_EXISTS = "Já existe uma conta cadastrada com este email | Por favor, utilize outro ";

                const ERROR_REGISTER = "Ocorreu um erro momentâneo devido a uma instabilidade na conexão de internet entre o nosso servidor
                e o seu dispositivo | Por favor, tente se cadastrar novamente | caso ainda sim o erro persista, entre em contato com o suporte";

                const ERROR_ENTITIES = "Ocorreu um erro momentâneo devido a uma instabilidade na conexão de internet entre o nosso servidor
                e o seu dispositivo | Porém sua conta foi criada | Por favor, faça o login utilizando o email e senha escolhidos | 
                caso ocorra algum erro entre em contato com o suporte";
               
                const EMAIL_RECOVERY_SUBJECT = "Recuperação de senha";
                const EMAIL_FATURA_ENVIADA = "Nota Emitida - Grupo Etarp";
                const EMAIL_REGISTER_SUCCESS = "Cadastro - Etarp";

          
                const SUCCES_UPDATE_INFO = "Seu Perfil atualizado com sucesso | Obrigado por utilizar os nossos serviços!";
                const ERROR_UPDATE_INFO = "Ocorreu um erro ao atualizar oseu perfil | Por favor, tente novamente.";

            

                const INCORRECT_FIELDS = "Os campos não parecem estar completos | Por favor, verifique e tente novamente. ";



                //ÁREA DE MODIFICAR SERVICOS
                const ERROR_UNAUTHORIZED_SERVICE = "Você não possui permissão para fazer isso!";


               

                //PRODUTOS
                const PRODUCT_SUCCEFUL_DELETED = "Produto deletado com sucesso!";
                const ERROR_PRODUCT_DELETED = "Ocorreu um erro ao deletar | Por favor, tente novamente.";
                const SUCCEFULL_PURCHASED_APROVADO =  "Compra salva com sucesso | Armazenada como [ Aprovada ] | Obrigado por utilizar a Oliveira Trust DEV";
                const SUCCEFULL_PURCHASED_PENDENTE =  "Compra salva com sucesso | Armazenada como [ Pendente ] | Obrigado por utilizar a Oliveira Trust DEV";
                const SUCCEFULL_PURCHASED_CANCELADO = "Compra salva com sucesso | Armazenada como [ Cancelada ] | Obrigado por utilizar a Oliveira Trust DEV";
                const UPDATE_BUY_ERROR = "Não foi possível alterar | Erro desconhecido";
                const SUCCESS_UPDATED_INFO = "Infomações de compra atualizadas com sucesso!";
                const PURCHASE_DELETED_SUCCESS = "Recibo de compra deletado com sucesso | Obrigado por utilizar a Oliveira Trust DEV ";
                const PURCHASE_DELETED_ERROR =" Não foi remover o recibo | Erro desconhecido";
                //Tentativas de compra
                const SAMEUSER_BUY_TRY = "Você não pode comprar o seu próprio produto | Por favor, troque de conta e tente novamente";
                const NOT_CONNECTED_USER_BUY = "Você precisa estar logado para comprar um produto | Por favor, conecte-se e tente novamente";
                const ADMIN_TRY_BUY = "Um administrador não pode comprar produtos | Por favor, troque de conta e tente novamente";

                //CONSTANTES DE SERVIÇO (ADICIONAR PLANO)
                const ERROR_SERVICE_NAME = "Nome inválido ou não informado | Por favor, verifique os campos e tente novamente.";
                const ERROR_SERVICE_RESUME = "Descrição Breve inválida ou não informada | Por favor, verifique os campos e tente novamente." ;
                const ERROR_SERVICE_DESCRIPTION = "Descrição inválida ou não informada | Por favor, verifique os campos e tente novamente.";
                const ERROR_SERVICE_OBJECTIVE = "Função do serviço inválida ou não informada | Por favor, verifique os campos e tente novamente."; 
                const ERROR_SERVICE_CATEGORY = "Categoria do serviço inválida ou não informada | Por favor, verifique os campos e tente novamente.";
                const ERROR_SERVICE_TAGS = "Tags do serviço inválidas ou não informadas | Por favor, verifique os campos e tente novamente.";
                const ERROR_SERVICE_PRICE = "Valor do serviço inválido ou não informado | Por favor, verifique os campos e tente novamente.";
                const ERROR_SERVICE_IMAGES = "Não foram encontradas imagens para o seu serviço | Por favor, envie alguma imagem e tente novamente.";
                const ERROR_SERVICE_IMAGES_UPLOAD = "Ocorreu um erro ao enviar as suas imagens | Por favor, atualize a página e tente novamente.";

                const SUCCESS_CREATED = "Seu anúncio foi publicado com sucesso | Obrigado por utilizar os nossos serviços, é sempre um prazer poder te ajudar!";



                const ERROR_SERVICE_VALIDATE_NAME = "Não utilize números ou caracteres especiais no nome do seu serviço | Por favor, tente novamente.";
                const ERROR_SERVICE_VALIDATE_RESUME = "Não utilize números ou caracteres especiais na pequena descrição do seu serviço | Por favor, tente novamente.";
                const ERROR_SERVICE_VALIDATE_DESCRIPTION = "Não utilize números ou caracteres especiais na descrição do seu serviço | Por favor, tente novamente.";
                const ERROR_SERVICE_VALIDATE_OBJECTIVE = "Não utilize números ou caracteres especiais no objetivo do seu serviço | Por favor, tente novamente.";
                const ERROR_SERVICE_VALIDATE_CATEGORY = "Não utilize números ou caracteres especiais na categoria do seu serviço | Por favor, tente novamente.";
                const ERROR_SERVICE_VALIDATE_TAGS = "Não utilize números em alguma das tags do seu serviço | Por favor, tente novamente.";
                const ERROR_SERVICE_VALIDATE_PRICE = "Não utilize letras no valor do seu serviço | Por favor, tente novamente.";
                
                const ERROR_IMAGE_SIZE = "Uma ou mais imagens são muito grandes, não podemos utilizar | Por favor, redimensione ou nos envie outra.";
                const ERROR_IMAGE_MAX = "Você atingiu o limite máximo de imagens (Máximo de QUATRO) | Por favor, exclua algumas imagens .";


                const MaxNumberOfImages = 4;
                const MaxSizeOfImages = 2; //EM MEGABYTE (MB)
                
                const VALOR_TAXA_SERVICO = '10%';
                //ENDEREÇO
                const ADDRESS_UPDATED = "Suas informações de endereço foram atualizadas com sucesso | Obrigado por utilizar os nossos serviços";
                const ADDRESS_ERROR = "Suas informações não foram atualizadas | Por favor, não deixe campos em branco!";



                const EMPTY_NAME = "Você não preencheu o campo NOME | Por favor, não deixe campos em branco!";
                const EMPTY_DOCUMENT = "Você não preencheu o campo DOCUMENTO | Por favor, não deixe campos em branco!";
                const EMPTY_TYPE = "Você não preencheu o campo TIPO DE CONTA | Por favor, não deixe campos em branco!";
                const EMPTY_DESCRIPTION = "Você não preencheu o campo DESCRIÇÃO | Por favor, não deixe campos em branco!";
                const EMPTY_PRICE = "Você não preencheu o campo VALOR | Por favor, não deixe campos em branco!";
                const EMPTY_ADDRESS = "Você não preencheu o campo ENDEREÇO | Por favor, não deixe campos em branco!";
                const EMPTY_CEP = "Você não preencheu o campo CEP | Por favor, não deixe campos em branco!";




                const EMPTY_DESCEP = "Você não preencheu o campo CEP | Por favor, não deixe campos em branco!";
                const EMPTY_DESADDRESS = "Você não preencheu o campo ENDEREÇO | Por favor, não deixe campos em branco!";
                const EMPTY_DESCOMPLEMENTO = "Você não preencheu o campo COMPLEMENTO | Por favor, não deixe campos em branco!";
                const EMPTY_DESBAIRRO = "Você não preencheu o campo BAIRRO | Por favor, não deixe campos em branco!";
                const EMPTY_DESSTATE = "Você não preencheu o campo ESTADO | Por favor, não deixe campos em branco!";
                const EMPTY_DESCITY = "Você não preencheu o campo CIDADE | Por favor, não deixe campos em branco!";
                




                const EMPTY_CLIENT_TYPE = "Você não preencheu o campo TIPO DE CLIENTE | Por favor, não deixe campos em branco!";
                const EMPTY_IE_INDICATOR = "Você não preencheu o campo INDICADOR DA IE | Por favor, não deixe campos em branco!";
                const EMPTY_IE = "Você não preencheu o campo INSCRIÇÃO ESTADUAL | Por favor, não deixe campos em branco!";
                const EMPTY_NUMBER = "Você não preencheu o campo NÚMERO DE TELEFONE| Por favor, não deixe campos em branco!";






                const EMPTY_DESCNAE = "Você não preencheu o campo CNAE | Por favor, não deixe campos em branco!";
                const EMPTY_INCRICAO_ESTADUAL = "Você não preencheu o campo INSCRIÇÃO ESTADUAL | Por favor, não deixe campos em branco!";
                const EMPTY_INCRICAO_MUNICIPAL = "Você não preencheu o campo INSCRIÇÃO MUNICIPAL | Por favor, não deixe campos em branco!";
                const EMPTY_EMAIL = "Você não preencheu o campo EMAIL | Por favor, não deixe campos em branco!";
                const EMPTY_RAZAOSOCIAL ="Você não preencheu o campo RAZAOSOCIAL | Por favor, não deixe campos em branco!";



                const EMPTY_PRODUCTS = "Você precisa informar algum produto | Por favor, tente novamente";

                const UNKNOWN_ERROR = "Não foi possível realizar essa ação | Por favor, entre em contato.";
















                //VARIAVEIS GLOBAIS PADRÃO DE CADASTRO

                const DEFAULT_INADMIN = 0;
                const DEFAULT_INSELLER = 1;
                const DEFAULT_INBUYER = 1;
                const DEFAULT_INSTATUS = 1;
                const DEFAULT_INAUTOSTATUS = 1;
                const DEFAULT_INTYPEDOC = 0; //0 CPF -> 1 CNPJ
                const DEFAULT_COUNTRY_AREA = 55;
             

        }

?>