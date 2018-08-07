<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Star Wars</title>

    <link href="teste_eMiolo/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="teste_eMiolo/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="teste_eMiolo/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="teste_eMiolo/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="teste_eMiolo/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

<body style="background-image: url('teste_eMiolo/img/fundo1.jpg');">

  <div id="wrapper">
    <div class="wrapper">        
      <div style="background-color: #000000b0;width: 300px;border-radius: 10%;position: absolute;height: 305px;top: 30%;left: 40%;padding: 23px;">

        <form action="cadastro.php" method="post">
          <div class="form-group">
            <label for="nome" style="color: #fdbf07;">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome">
          </div>
          <div class="form-group" style="color: #fdbf07;">
            <label for="login">Login:</label>
            <input type="text" class="form-control" id="login" name="login">
          </div>
          <div class="form-group" style="color: #fdbf07;">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha">
          </div>       
          <button type="submit" class="btn" style="float: left;background-color: #fdbf07;">Cadastrar</button>

        </form>
      </div>

        <img src="teste_eMiolo/img/darth-login2.jpg" style="float: right;width: 300px;margin-top: 217px">
        <img src="teste_eMiolo/img/star-wars.png" style="width: 220px;left: 38%;position: absolute;">
    </div>

    <!--img src="teste_eMiolo/img/darth-login.png" style="margin-top: 217px;"-->

  </div>

    <script src="teste_eMiolo/vendor/jquery/jquery.min.js"></script>
    <script src="teste_eMiolo/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="teste_eMiolo/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="teste_eMiolo/vendor/raphael/raphael.min.js"></script>
    <script src="teste_eMiolo/vendor/morrisjs/morris.min.js"></script>
    <script src="teste_eMiolo/data/morris-data.js"></script>
    <script src="teste_eMiolo/dist/js/sb-admin-2.js"></script>

</body>

</html>
