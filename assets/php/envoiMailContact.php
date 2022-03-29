<?php

if(!empty($_GET['email']) && isset($_GET['email'])){
     if($_GET['email'] == 'franchise'){

          $sujet = $_POST['nom'];       
          $email = $_POST['email'];
          $nom   = $_POST['name'];

        
          $message = " Numéro de téléphone : ";
          $message .= $_POST["phone"];
          $message .= "\r\n";
          $message .= "\r\n";
          $message .= "Sujet : Franchise";
          $message .= "\r\n";
          $message .= "\r\n";
          $message .= $_POST['message'];

               if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $destinataire = 'ozipek.mu@gmail.com';
                    $headers .= 'From:' . $nom . ' <' . $email . '>' . "\r\n" .
                         'Reply-To:' . $email . "\r\n" .
                         'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed ' . "\r\n" .
                         'Content-Disposition: inline' . "\r\n" .
                         'Content-Transfer-Encoding: 7bit' . " \r\n" .
                         'X-Mailer:PHP/' . phpversion();
                    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";
                    if (mail($destinataire, $sujet, $message, $headers)) {
                         header('location: ../../franchise.php?success=email');
                    } else {
                         header('location: ../../franchise.php?error=email');
                    }
               } else {
                    header('location: ../../franchise.php?error=adresseemail');
               }
         

     }else if($_GET['email'] == 'contact'){
          $sujet = $_POST['nom'];
          $email = $_POST['email'];
          $nom   = $_POST['name'];


          $message = " Numéro de téléphone : ";
          $message .= $_POST["phone"];
          $message .= "\r\n";
          $message .= "\r\n";
          $message.= "Sujet : Contact";
          $message .= "\r\n";
          $message .= "\r\n";
          $message .= $_POST['message'];

          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $destinataire = 'ozipek.mu@gmail.com';
               $headers .= 'From:' . $nom . ' <' . $email . '>' . "\r\n" .
               'Reply-To:' . $email . "\r\n" .
                    'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed ' . "\r\n" .
                    'Content-Disposition: inline' . "\r\n" .
                    'Content-Transfer-Encoding: 7bit' . " \r\n" .
                    'X-Mailer:PHP/' . phpversion();
               $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";
               if (mail($destinataire, $sujet, $message, $headers)) {
                    header('location: ../../franchise.php?success=email');
               } else {
                    header('location: ../../franchise.php?error=email');
               }
          } else {
               header('location: ../../franchise.php?error=adresseemail');
          }
     }else if($_GET['email'] == 'reservation'){
         $nom = $_POST['name']; 
         $email = $_POST['email']; 
         $time = $_POST['time']; 
         $date = $_POST['date']; 
         $phone =$_POST['phone']; 
         $nbrpersonne = $_POST['nbrpersonne'];

          $sujet = "Réservation";
          $message .= "Nom :";
          $message .= $nom;
          $message .= "\r\n";
          $message = " Numéro de téléphone : ";
          $message .= $phone;
          $message .= "\r\n";
          $message .= "Email :";
          $message .= $email;
          $message .= "\r\n";
          $message .= "Sujet : Réservation";
          $message .= "\r\n";
          $message .= "Date :";
          $message .= $date;
          $message .= " ";
          $message .= $time;
          $message .= "\r\n";
          

          $message .= $_POST['message'];

          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $destinataire = 'ozipek.mu@gmail.com';
               $headers .= 'From:' . $nom . ' <' . $email . '>' . "\r\n" .
                    'Reply-To:' . $email . "\r\n" .
                    'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed ' . "\r\n" .
                    'Content-Disposition: inline' . "\r\n" .
                    'Content-Transfer-Encoding: 7bit' . " \r\n" .
                    'X-Mailer:PHP/' . phpversion();
               $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";
               if (mail($destinataire, $sujet, $message, $headers)) {
                    header('location: ../../reservation.php?success=email');
               } else {
                    header('location: ../../reservation.php?error=email');
               }
          } else {
               header('location: ../../reservation.php?error=adresseemail');
          }
     }

}
