<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .text-white{
            color: white;
        }
        .bg-main{
            background-color: rgb(35, 47, 62);
        }
        .p-5{
            padding: 32px;
        }
    </style>
   
    <title>Presto.it</title>
  </head>
  <body>

    <div class="container-fluid bg-main">
        <div class="row">
            <div class="col-12 p-5 text-white">
                <h1>Benvenuto in Presto.it</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Ciao {{$user_contact['user']}} ({{$user_contact['email']}})</h2>
                <h3>La tua richiesta è stata presa in carico.</h3>
                <p>Prossimamente potrà controllare, accedendo con il suo account sulla piattaforma, se la sua richiesta di lavorare con noi come {{$user_contact['job']}} è stata accettata con successo.</p>
                <h3>La sua descrizione:</h3>
                <p>{{$user_contact['description']}}</p>
            </div>
        </div>
    </div>
     

    
  </body>
</html>