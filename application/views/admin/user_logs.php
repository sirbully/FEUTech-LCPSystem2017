
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="<?=base_url()?>assets/images/favicon.ico"/>
        <title>LCP Portal</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?=base_url()?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css"/>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
               $('.datepicker').datepicker({
                   format: 'mmmm/dd/yyyy',
                   yearRange:[1900,2018]
               });
               $('select').formSelect();
           });
        </script>
        <style>
        
      .with-gap[type="radio"]:checked+label:after{
        background-color: #1976d2 !important;
        border-color: #1976d2 !important;
     } 
     .with-gap[type="radio"]:checked+label:before{
        border-color: #1976d2 !important;
      }
        .input-field textarea:focus + label {
        color: #1976d2 !important;
      }

      .row .input-field textarea:focus {
        border-bottom: 1px solid #1976d2 !important;
        box-shadow: 0 1px 0 0 #1976d2 !important
      }
        .input-field input:focus + label {
            color: #1976d2 !important;
        }
        .row .input-field input:focus {
            border-bottom: 1px solid #1976d2 !important;
            box-shadow: 0 1px 0 0 #1976d2 !important
        }
        .gender{
            display: inline-block !important;
        }
        }
        
    </style>
    </head>
    <body>
        <div class="navbar-fixed">
            <nav class="blue darken-2" role="navigation">         
            </nav>
        </div>
    <div class="row">
        <div class="col s3">  
            <ul id="slide-out" class="side-nav fixed">
                <li>
                    <div class="user-view">
                        <div class="background">
                            <img src="<?=base_url()?>assets/images/bg_side.jpg">
                        </div>
                        <img class="circle" src="<?=base_url()?>assets/images/admin.png">
                        <span class="name">Administrator</span>
                        <br>
                    </div>
                </li>
                <li ><a href="<?= base_url()?>admin" class="waves-effect"><i class="material-icons">account_box</i>Accounts</a></li>
                <li class="active"><a href="<?= base_url()?>admin/userlogs" class="waves-effect"><i class="material-icons">history</i>User Logs</a></li>
                <li><a href="<?= base_url()?>admin/add" class="waves-effect"><i class="material-icons">add</i>Add Doctor or Assistant</a></li>
                <li><div class="divider"></div></li>
                <li><a href="<?= base_url()?>dashboard/logout"><i class="material-icons">exit_to_app</i>Logout</a></li> 
            </ul>     
        </div>
        <div class="col s9">
        <div class="container ">
               <br><br>
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
            <table class="responsive-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Description</th>
            </tr>
            </thead>
            <?php
                foreach ($logs as $log):
            ?>
            <tbody>
                <td><?= $log->id ?></td>
                <td><?= $log->firstname ?></td>
                <td><?= $log->lastname ?></td>
                <td><?=$log->description?> <?= date("M j Y, g:i a", $log->time);?></td
            </tbody>
            <?php endforeach; ?>
        </table>
        </div>
      </div>
        </div>    
  <!--  Scripts-->       
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="<?=base_url()?>assets/js/materialize.js"></script>
        <script src="<?=base_url()?>assets/js/init.js"></script>
        <script>
            $(".button-collapse").sideNav();
    </script>
    </body>
</html>



