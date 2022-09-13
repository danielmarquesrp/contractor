<?php
     namespace Main ;   
     use \PHPMailer\PHPMailer\PHPMailer;
     use \PHPMailer\PHPMailer\SMTP;
     
        class Mailer extends Model{


        
            const EMAIL = 'no_reply@etarp.com.br';
            const PASSWORD = 'MNt64R&FgkpQ';
            const NAME = 'Grupo Etarp - Contabilidade';
            const REPLY_TO_EMAIL = 'no_reply@etarp.com.br'; 
            const HOST = "smtp.office365.com";
            const PORT = "587";

            private $mail;

                public function __construct(
                    
                    $subject,
                    $tplname,
                    $data = array(),
                    $toAddress,
                    $toName

                ){


                    $page = new PageEmail([

                        'header' => false,
                        'footer' => false

                        ]);
                    
                   $html =  $page->setTpl( $tplname, $data, true  );

                   try{




                    date_default_timezone_set('Etc/UTC');

                    $subject = utf8_decode($subject);
                    $name = utf8_decode(Mailer::NAME);
                    $toName = utf8_decode($toName);
                    // $reply_to_name = utf8_decode(Mailer::REPLY_TO_NAME);

                    //Create a new PHPMailer instance
                    $this->mail = new \PHPMailer();
                    //Tell PHPMailer to use SMTP
                    $this->mail->isSMTP();
 
                  
                    //enable ssl
                    $this->mail->SMTPSecure = 'tls';
                    
                    // $this->mail->SMTPOptions = array(
                    //     'ssl' => array(
                    //         'verify_peer'=>true,
                    //         'verify_peer_name'=>true,
                    //         'allow_self_signed' => true
                    //     )
                    // );


                    //Enable SMTP debugging
                    //SMTP::DEBUG_OFF = off (for production use)
                    //SMTP::DEBUG_CLIENT = client messages
                    //SMTP::DEBUG_SERVER = client and server messages
                    $this->mail->SMTPDebug = \SMTP::DEBUG_OFF; 
                    //Set the hostname of the mail server
                    $this->mail->Host = Mailer::HOST;
                    //Set the SMTP port number - likely to be 25, 465 or 587
                    $this->mail->Port = Mailer::PORT;
                    //Whether to use SMTP authentication
                    $this->mail->SMTPAuth = true;
                    //Username to use for SMTP authentication
                    $this->mail->Username = Mailer::EMAIL;
                    //Password to use for SMTP authentication
                    $this->mail->Password = Mailer::PASSWORD;
                    //Set who the message is to be sent from
                    $this->mail->setFrom(Mailer::EMAIL, $name );
                    //Set an alternative reply-to address
                    // $this->mail->addReplyTo(Mailer::REPLY_TO_EMAIL, $reply_to_name);
                    //Set who the message is to be sent to
                    $this->mail->addAddress($toAddress, $toName);
                    //Set the subject line
                    $this->mail->Subject = $subject;
                    //Read an HTML message body from an external file, convert referenced images to embedded,
                    //convert HTML into a basic plain-text alternative body
                    $this->mail->msgHTML($html);
                    //Replace the plain text body with one created manually
                    $this->mail->AltBody = $html; //Email alternativo para navegadores que não suportam HTML bruto
                    //Attach an image file
                    if($data['pdf_directory'])
                    {
                        $this->mail->addAttachment($data['pdf_directory']);
                    }
                    if($data['boleto_directory'])
                    {
                        $this->mail->addAttachment($data['boleto_directory']);
                    }

                   


                   }//end try
                   catch(\Exception $e){
                        return false;
                   }//end Catch
                                                                                                                                                                                                                                                                                

                }//end method
                    


                public function send()
                {

                    try{
                        return $this->mail->send();
                    }//end try
                    catch(\Exception $e){
                        return false;
                    }//end catch

                }





            }//End Class

?>