
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TeleEspecialista - Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
</head>

<body>

<div class="container">

    <form class="form-signin">
        <h2 id="headerEntrar" class="form-signin-heading text-center">Entrar</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>

        <button onclick="login()" class="btn btn-lg btn-primary btn-block" type="button">Entrar</button>
        <button onclick="loginwithgoogle()" class="btn btn-lg btn-primary btn-block" type="button">Entrar com Google (Imagem)</button>
        <br>
        <div class="text-center">
            <a href="#">Esqueci a senha</a> |
            <a href="#">Cadastrar</a>
        </div>
    </form>

</div> <!-- /container -->

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
      window.location = 'http://tele-especialista.sytes.net/home.php'
    } else {
      // No user is signed in.
    }
  });

  function login(){
    var userEmail = document.getElementById("inputEmail").value;
    var userPass = document.getElementById("inputPassword").value;

    firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      window.alert("Error: " + errorCode + "\n" + errorMessage);
    });
  }

  function loginwithgoogle(){
    var provider = new firebase.auth.GoogleAuthProvider();
    //provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
    //firebase.auth().languageCode = 'pt';
    //firebase.auth().signInWithRedirect(provider);
    firebase.auth().signInWithPopup(provider).then(function(result) {
      // This gives you a Google Access Token. You can use it to access the Google API.
      var token = result.credential.accessToken;
      // The signed-in user info.
      var user = result.user;
      // ...
    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
      window.alert("Error: " + errorCode + "\n" + errorMessage + "\n" + email);
    });
  }
  // firebase.auth().getRedirectResult().then(function(result) {
  //   if (result.credential) {
  //     // This gives you a Google Access Token. You can use it to access the Google API.
  //     var token = result.credential.accessToken;
  //     // ...
  //   }
  //   // The signed-in user info.
  //   var user = result.user;
  //   //window.alert("tudo certo: " + user );
  // }).catch(function(error) {
  //   // Handle Errors here.
  //   var errorCode = error.code;
  //   var errorMessage = error.message;
  //   // The email of the user's account used.
  //   var email = error.email;
  //   // The firebase.auth.AuthCredential type that was used.
  //   var credential = error.credential;
  //   // ...
  //   window.alert("Error: " + errorCode + "\n" + errorMessage + "\n" + email);
  // });
</script>


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
