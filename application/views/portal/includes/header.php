<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Lung Center of the Philippines</title>
  <link rel="icon" href="<?=base_url()?>assets/images/favicon.ico"/>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link href="<?=base_url()?>assets/css/fullcalendar.min.css" rel="stylesheet">

  <!--  Scripts--> 
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.4/moment-with-locales.min.js"></script>
  <script src="<?=base_url()?>assets/js/fullcalendar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  
  <!-- Embedded CSS -->
  <style>
  .slider .slides li img {
      background-size:100% auto;
      background-repeat: no-repeat;
  }
  .no-js #loader { display: none;  }
  .js #loader { display: block; position: absolute; left: 100px; top: 0; }
  .preloader-background {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #eee;
    position: fixed;
    z-index: 100;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;	
  }
  .card.small{
    .card-image{ 
      height:300px;
    } 
  }
  .editLink a {
    color: #000000;
    text-decoration: none;
  }
  .noSpace a {
    margin: 0;
    padding: 0;
  }
  #sidenav-overlay { z-index: 1; }
  ul.dropdown-content {
    width: auto !important;           
    li > span { white-space: nowrap; }
  } 
  ul.dropdown-content.select-dropdown li:not(.disabled) span {
    color: #1565c0;
  }
  .modal { width: 40% !important; text-align: center; }
  </style>

  <!-- JS and jQuery -->
  <script>
  $(document).ready(function(){
    $('.slider').slider();
    $('.materialboxed').materialbox();
    $(".dropdown-button").dropdown({ hover: false, belowOrigin: true, constrain_width: false, alignment: 'right' });
    $(".dropdown-trigger").dropdown({ hover: true });
    $(".dropdown-content>li>a").css("color", '#1565c0');
  });

  document.addEventListener("DOMContentLoaded", function(){
    $('.preloader-background').delay(1700).fadeOut('slow');
    $('.preloader-wrapper').delay(1700).fadeOut();
  });
  </script>
