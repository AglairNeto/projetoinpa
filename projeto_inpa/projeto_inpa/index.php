<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Agenda</title>

    <!-- Bootstrap -->
    <link href="resources/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div id="container">
      <div id="form">
        <form class="form-inline"  method="POST">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Seu nome">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="seuemail@example.com">
          </div>
          <div class="form-group" id="submit-box">
                <button id="submit" class="btn btn-primary">Salvar</button>
          </div>
          <div class="form-group"  id="update-box" style="display:none;">
                <button id="update" class="btn btn-primary">Alterar</button>
                <button id="cancel" class="btn btn-default">Cancelar</button>
          </div>
        </form>
      </div>
      <div id="loadBody">

      </div>
    </div>

    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/bootstrap/bootstrap.min.js"></script>
    <script src="resources/js/delegate.js"></script>
  </body>
</html>
