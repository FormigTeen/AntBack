<!DOCTYPE html>
      <html lang="pt-br">
      	<head>
      		<meta charset="UTF-8">
      		<title>Ant - Error Page</title>
      		<link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
					<link rel="stylesheet" type="text/css" href="AntTalk.css">
      	</head>
      	<body>
      		<div id="Main">
      			<div class="Image"><img src="AntError.svg" alt="Ant"></div>      			<div class ="Error">
      				<h1>Ant Error!</h1>
      				<p>Erro Detectado por favor, verifique o seu código!</br></br>
      					<em><?= $_COOKIE['ErrorMensage']?></em></p>
      			</div>

      		</div>
      		<code id="Terminal">
      			<p><?= $_COOKIE['LogErrorMensage']?></p>
      		</code>

      	</body>
      </html>
