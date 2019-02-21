<html>
	<head>
		<meta charset="UTF-8">
		<title>TELA DE LOGIN</title>

		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/login.css" />

	</head>
	<body>

			<div class="loginarea">
				<form method="POST">
							
					<input type="email" name="email" placeholder="DIgite seu email" />

					<input type="password" name="password" placeholder="Digite sua senha" />

					<input type="submit" value="Entrar" /> <br/>

					<?php if(isset($error) && !empty($error)): ?>
						<div class="warning"><?php echo $error; ?></div>
					<?php endif; ?>

				</form>
			</div>

	</body>
</html>
