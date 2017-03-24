<?php
    require_once 'lib/PHPMailerAutoload.php';

    $errors = array();      // array to hold validation errors
    $data   = array();      // array to pass back data

    // validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array


    $pfb_data = array(
      'email_address' => $_POST['user-email'],
      'status'        => 'subscribed'
    );
    $encoded_pfb_data = json_encode($pfb_data);
    echo $encoded_pfb_data;
    // Setup cURL sequence
    // $ch = curl_init();

    // echo $ch;



    if (empty($_POST['user-email'])) {
        $errors['user-email'] = 'Email is required.';
    }


    if ( ! empty($errors)) {


        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors process our form, then return a message
        $mail = new PHPMailer;

        $email = filter_var($_POST['user-email']);
        $user_name = filter_var($_POST['user-name']);
        $user_text = filter_var($_POST['user-text']);
        // $user_source = filter_var($_POST['user-source']);
        // $user_referrer = filter_var($_POST['user-referrer']);




        //Enable SMTP debugging.
        $mail->SMTPDebug = 3;
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();
        //Set SMTP host name
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;
        //Provide username and password

        $mail->Username = "";
        $mail->Password = "";
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";
        //Set TCP port to connect to
        $mail->Port = 587;

        $mail->From = $email;
        $mail->setFrom('hello@zohem.com', 'ContactUs Enquiry: '.$user_name.'');
        $mail->addAddress('hello@zohem.com', 'zohem');



        $mail->isHTML(true);

        $mail->Subject = "Contact Us form Zohem";

        $mail->Body = '<h3>contact us form from '.$email.'</h3>

            <table>
            <tbody>



            <tr>
            <td style="padding-top:10px;"><b>Email: </b></td>
            <td style="padding-top:10px;">'.$email.'</td>
            </tr>
            <tr>
            <td style="padding-top:10px;"><b>Name: </b></td>
            <td style="padding-top:10px;">'.$user_name.'</td>
            </tr>
            <tr>
            <td style="padding-top:10px;"><b>Query: </b></td>
            <td style="padding-top:10px;">'.$user_text.'</td>
            </tr>




            </tbody>
            </table>
            <p style="font-size:13px;">This is coming from zohem.com contact form.</p>
            ';

        $mail->AltBody = $_POST['message'];

        if(!$mail->send())
        {
            echo "Mailer Error";
            //echo json_encode($mail->ErrorInfo);

        }
        else
        {
            // show a message of success and provide a true success variable
            $data['success'] = true;
            $data['message'] = 'Success!';

            // if there are no errors process our form, then return a message
            $mail = new PHPMailer;

            $email = filter_var($_POST['user-email']);

            //Enable SMTP debugging.
            $mail->SMTPDebug = 3;
            //Set PHPMailer to use SMTP.
            $mail->isSMTP();
            //Set SMTP host name
            $mail->Host = "smtp.gmail.com";
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;
            //Provide username and password
            $mail->Username = "";
            $mail->Password = "";
            
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = "tls";
            //Set TCP port to connect to
            $mail->Port = 587;

            $mail->From = $email;
            $mail->setFrom('hello@zohem.com', 'Thank You!');
            $mail->addAddress($email,'user');


            $mail->isHTML(true);

            $mail->Subject = "Thank You!";

            $mail->Body = '<!DOCTYPE html>
          <html>
            <head>
              <meta name="viewport" content="width=device-width">
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              <title>zohem Subscriber</title>
              <style type="text/css">
              @media only screen and (max-width: 620px) {
                table[class=body] h1 {
                  font-size: 28px !important;
                  margin-bottom: 10px !important; }
                table[class=body] p,
                table[class=body] ul,
                table[class=body] ol,
                table[class=body] td,
                table[class=body] span,
                table[class=body] a {
                  font-size: 16px !important; }
                table[class=body] .wrapper,
                table[class=body] .article {
                  padding: 10px !important; }
                table[class=body] .content {
                  padding: 0 !important; }
                table[class=body] .container {
                  padding: 0 !important;
                  width: 100% !important; }
                table[class=body] .main {
                  border-left-width: 0 !important;
                  border-radius: 0 !important;
                  border-right-width: 0 !important; }
                table[class=body] .btn table {
                  width: 100% !important; }
                table[class=body] .btn a {
                  width: 100% !important; }
                table[class=body] .img-responsive {
                  height: auto !important;
                  max-width: 100% !important;
                  width: auto !important; }}

              @media all {
                .ExternalClass {
                  width: 100%; }
                .ExternalClass,
                .ExternalClass p,
                .ExternalClass span,
                .ExternalClass font,
                .ExternalClass td,
                .ExternalClass div {
                  line-height: 100%; }
                .apple-link a {
                  color: inherit !important;
                  font-family: inherit !important;
                  font-size: inherit !important;
                  font-weight: inherit !important;
                  line-height: inherit !important;
                  text-decoration: none !important; }
                .btn-primary table td:hover {
                  background-color: #34495e !important; }
                .btn-primary a:hover {
                  background-color: #34495e !important;
                  border-color: #34495e !important; } }
              </style>
            </head>
            <body class="" style="background-color:#f6f6f6;font-family:sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;line-height:1.4;margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
              <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background-color:#f6f6f6;width:100%;">
                <tr>
                  <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
                  <td class="container" style="font-family:sans-serif;font-size:14px;vertical-align:top;display:block;max-width:580px;padding:10px;width:580px;Margin:0 auto !important;">
                    <div class="content" style="box-sizing:border-box;display:block;Margin:0 auto;max-width:580px;padding:10px;">
                      <!-- START CENTERED WHITE CONTAINER -->
                      <span class="preheader" style="color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0;">You contacted us at zohem.com - </span>
                      <table class="main" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background:#fff;border-radius:3px;width:100%;">
                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                          <td class="wrapper" style="font-family:sans-serif;font-size:14px;vertical-align:top;box-sizing:border-box;padding:20px;">
                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;">
                              <tr>
                                <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">
                                  <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">Hi there,</p>
                                  <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">Thanks for contacting us, we will get in touch with you, shortly.</p>
                                  <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;box-sizing:border-box;width:100%;">
                                    <tbody>
                                      <tr>
                                        <td align="left" style="font-family:sans-serif;font-size:14px;vertical-align:top;padding-bottom:15px;">
                                          <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;width:auto;">
                                            <tbody>
                                              <tr>
                                                <td style="font-family:sans-serif;font-size:14px;vertical-align:top;background-color:#ffffff;border-radius:5px;text-align:center;background-color:#3498db;"> <a href="http://zohem.com" target="_blank" style="text-decoration:underline;background-color:#ffffff;border:solid 1px #3498db;border-radius:5px;box-sizing:border-box;color:#3498db;cursor:pointer;display:inline-block;font-size:14px;font-weight:bold;margin:0;padding:12px 25px;text-decoration:none;text-transform:capitalize;background-color:#3498db;border-color:#3498db;color:#ffffff;">Visit Us</a> </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">Zohem, Decentralised User Behaviour Data Protocol</p>
                                  <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">Regards,<br/>Zohem Team</p>
                                </td>
                              </tr>
                              <tr>
          <td style="width:100%"><img alt="Zohem"  height="auto" src="http://zohem.com/assets/img/zohemlogo.png" style="border:none;display:block;outline:none;text-decoration:none;width:50%;height:auto" width="100" class="CToWUd"></a></td>
          </tr>
                            </table>
                          </td>
                        </tr>
                        <!-- END MAIN CONTENT AREA -->
                      </table>
                      <!-- END CENTERED WHITE CONTAINER -->
                    </div>
                  </td>
                  <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
                </tr>
              </table>
            </body>
          </html>';

            $mail->AltBody = $_POST['message'];

            if(!$mail->send())
            {
                echo "Mailer Error";
                //echo json_encode($mail->ErrorInfo);

            }
            else
            {


            }

        }




    }
    echo json_encode($data);
//die();
?>
