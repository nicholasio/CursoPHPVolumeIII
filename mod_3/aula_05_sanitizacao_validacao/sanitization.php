<html>
	<head>
		<title>
			Sanitizando as Entradas
		</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Deixe seu comentário!</h1>
		<form action="" method="POST">
			<p>
				Nome: <input type="text" name="username">
			</p>
			<p>
				<textarea name="comment" id="" cols="30" rows="10"></textarea>	
			</p>
			<p>
				<input type="submit" name="btn">	
			</p>
			
		</form>

		<?php
			if ( ! empty($_POST) && isset($_POST['btn']) ) {
				/*$username = $_POST['username'];
				$comment  = $_POST['comment'];*/

				/*$username = htmlentities($_POST['username'],ENT_QUOTES, 'UTF-8');
				$comment  = htmlentities($_POST['comment'], ENT_QUOTES, 'UTF-8');*/

				require 'vendor/autoload.php';

				$config = HTMLPurifier_Config::createDefault();
				$purifier = new HTMLPurifier($config);

				$username = $purifier->purify($_POST['username']);
				$comment  = $purifier->purify($_POST['comment']);

				//Validando

				if ( mb_strlen($comment) > 0 ) {
					echo "<h3>{$username}</h3>";
					echo "<p>{$comment}</p>";
		
				}
			}

			/**
			 * Para sanitizações mais avançadas use o component HTMLPurifier
			 * http://htmlpurifier.org/
			 *
			 * PHP também oferece a função filter_input
			 */

		?>
	</body>
</html>