<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Login</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<?=link_tag('assets/style_login.css')?>
	</head>
		<body>
		<main class="container">
			<a href="<?= site_url('tvshow') ?>"><i class="fas fa-home"></i></a>
			<p></p>
			<article>
				<h1 id="connexion">Connexion</h1>
				<form action="" method="post" accept-charset="utf-8">
					<label for="email">E-mail</label>
					<input type="email" name="email" required>
					<label for="password">Mot de passe</label>
					<input type="password" name="password" required>	
					<?php
					
					if ($connexion_reussie === false) {
						echo "<p style=\"color: red;\">E-mail ou mot de passe incorrect.</p>";
					}

					?>
  					<button type="submit">Se connecter</button>
					<p><a href="<?= site_url('signin')?>">Créer un compte</a></p>
				</form>
			</article>
		</main>
	</body>
</html>