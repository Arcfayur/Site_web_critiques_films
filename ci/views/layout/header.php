<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>SERIES</title>
		<link
	  rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
   />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<link rel="stylesheet" href="assets/style.css" />
		<?=link_tag('assets/style.css')?>
	</head>
	<body>
		<main class='container'>
			<nav>
				<ul>
					<li><strong>Séries</strong></li>
					<li><a href="<?= site_url('tvshow') ?>"><i class="fas fa-home"></i></a></li>

					<?php if (!isset($logged_in) || !$logged_in): ?>
						<li><a href="<?= site_url('login') ?>"><i class="fas fa-user"></i></a></li>
					<?php else: ?>
						<li><a href="<?= site_url('login/logout') ?>"><i class="fas fa-right-from-bracket"></i></a></li>
					<?php endif; ?>
				</ul>
				<ul>
					<li>
						<form method="POST" action="." role="search">
							<select name="type" aria-label="Type" onchange="this.form.submit()">
								<?php

								if (!$genre_selectionne) {
									echo "<option value=\"Genre\" selected disabled hidden> Genre </option>";
								}	

								foreach($genres as $genre) {
									if ($genre_selectionne === $genre->name) {
										echo "<option value=\"{$genre->name}\" selected>{$genre->name}</option>";
									} else {
										echo "<option value=\"{$genre->name}\">{$genre->name}</option>";
									}
								}

								?>
							</select>
							<input name="search" type="search" placeholder="Search" />
							<input type="submit" value="Search"/>
						</form>
					</li>
				</ul>
			</nav>
