
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TeleEspecialista - Home</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar-static-top.css" rel="stylesheet">

</head>

<body>

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">TeleEspecialista</a></li>
                <li><a href="#about">Início</a></li>
                <li><a href="#contact">Buscar Especialista</a></li>
                <li><a href="#contact">Consultar agenda</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a id="menuNomeUsuario" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nome usuário <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><button id="buttonLoggout" onclick="loggout()" class="btn btn-primary btn-block" type="button">Loggout</button></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!--<div class="container">-->
<!--    <div class="jumbotron">-->
<!--        <h1>Navbar example</h1>-->
<!--        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>-->
<!--        <p>To see the difference between static and fixed top navbars, just scroll.</p>-->
<!--        <p>-->
<!--            <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>-->
<!--        </p>-->
<!--    </div>-->
<!--</div>-->

<!-- Inicialização do Firebase (JavaScript) -->
<script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDAXBlqr1ruV6CKAV7ROmThtNINOz3_ICg",
    authDomain: "telemedicina-5e24d.firebaseapp.com",
    databaseURL: "https://telemedicina-5e24d.firebaseio.com",
    projectId: "telemedicina-5e24d",
    storageBucket: "telemedicina-5e24d.appspot.com",
    messagingSenderId: "343042999075"
  };
  firebase.initializeApp(config);
  //<!-- Uso do Firebase (JavaScript) -->
  firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      // User is signed in.
      var email_id = user.email;
      // window.alert(
      //   "Bem-vindo " + email_id + "." +
      //   "\nVocê está logado no sistema de telemedicina."+
      //   "\nAtualmente logado.");
      document.getElementById("menuNomeUsuario").innerHTML = email_id;
    } else {
      // No user is signed in.
      document.getElementById("menuNomeUsuario").innerHTML = "Usuário";
      window.location = 'http://tele-especialista.sytes.net/login.php'
    }
  });

  function loggout(){
    firebase.auth().signOut().then(function() {
    // Sign-out successful.
    // firebase.auth().onAuthStateChanged é chamada
    }).catch(function(error) {
      // An error happened.
      // var errorCode = error.code;
      var errorMessage = error.message;
      window.alert("Error: " + errorCode + "\n" + errorMessage);
    });
  }
</script>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
