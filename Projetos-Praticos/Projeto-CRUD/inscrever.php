<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cadastrar-se</title>

    <link rel="stylesheet" type="text/css" href="estilo.css">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  	<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          </button>
	          <img src="imagens/logo_fundo_cinza.jpg" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="index.html">Voltar para página Inicial</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	    	<div class="row">

	    		<div class="col-md-3"></div>
		    		<div class="col-md-6 page-header">
		    			<h1>Cadastre-se</h1>
		    			<span id="subtitulo">Leva apenas alguns segundos.</span>
		    		</div>
		    	<div class="col-md-3"></div>
		    </div>


	    	<div class="row">
	    			<div class="col-md-3"></div>
	    			<div class="col-md-6">
				    	<form action="valida_form.php" method="post">
					    	<div class="form-group">
					    		<label for="nome">Nome</label>
					    		<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo">
					    	</div>

					    	<div class="form-group">
					    		<label for="nome">Usuário</label>
					    		<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite um nome de usuário">
					    	</div>

					    	<div class="form-group">
					    		<label for="email">Email</label>
					    		<input type="text" class="form-control" id="email" name="email" placeholder="Digite seu email">
					    	</div>

					    	<div class="form-group">
					    		<label for="senha">Senha</label>
					    		<input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma senha">
					    	</div>

					    	<button type="submit" class="btn btn-primary">Cadastrar</button>

				    	</form>
			    	<div class="col-md-3"></div>
		    	</div>
		    </div>

	    </div> <!-- /Container form-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>