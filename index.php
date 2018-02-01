<?php
   ini_set("display_errors", 1);
   require_once "models/MAContestant.php";
   $post = (object) filter_input_array(INPUT_POST);

   if( $post->request == "save-pageant-details" ) {
      $contestant = new MAContestant((array) $post);
      $contestant->save();

      //Upload the pictures..
      $contestant->uploadPhotos($_FILES);
      // MAContestant::createTable((array) $post); exit();
      // die(json_encode($_FILES));
      print "<pre>";
      print_r($post);
      print "</pre>";
      exit();
   }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
   <head>
      <meta charset="UTF-8">
      <title></title>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
      
      <!-- Bootstrap CDN -->
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      <script  src="http://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

      <!-- Paystack API -->
      <script src="https://js.paystack.co/v1/paystack.js"></script>

      <!-- Sweet Alert -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.6/sweetalert2.all.min.js"></script>

      <!-- Moment JS -->
      <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>

      <script src="js/vue.js"></script>
      <!-- Vuejs -->
   </head>
   <body>
      <div class="col-md-10 col-md-offset-1" style="padding: 30px 0">
         <?php
         require "reg-form.php";
         ?>
      </div>
   </body>
</html>
