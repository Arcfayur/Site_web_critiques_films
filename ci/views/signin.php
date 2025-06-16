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
				<h1 id="connexion">Inscription</h1>
				<form action="" method="post" accept-charset="utf-8">
					<label for="email">E-mail</label>
					<input type="email" name="email" required>
                    <?php

					if (!$email_unique) {
						echo "<p style=\"color: red;\">^ Cette adresse e-mail est déjà utilisée.</p>";
					}

					?>
					<label for="password">Mot de passe</label>
					<input type="password" name="password" minlength=6 required>
                    <label for="password">Confirmez votre mot de passe</label>
                    <input type="password" name="confirmation" minlength=6 required>	
					<?php

					if (!$confirmation_password) {
						echo "<p style=\"color: red;\">^ Le mot de passe ne correspond pas.</p>";
					}

					?>		
  					<button type="submit">Créer un compte</button>
					<p><a href="<?= site_url('login')?>">Se connecter</a></p>
				</form>
			</article>
		</main>
	</body>
</html>