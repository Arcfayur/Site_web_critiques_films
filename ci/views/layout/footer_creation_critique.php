                <article class="rediger_critique">
                    <h2>Rédiger une critique</h2>
                    <?php if (isset($logged_in) && $logged_in): ?>
                        <form action="<?= site_url("critiques/ajouter/") ?>" method="post">
                            <input type="hidden" name="idSerie" value="<?= $idSerie ?>">
                            <input type="hidden" name="idSaison" value="<?= $idSaison ?>">
                            <label for="critique">Note :</label>
                            <div class="star-rating">
                                <?php for ($i = 5; $i >= 1; $i--): ?>
                                    <input type="radio" id="star<?= $i ?>" name="note" value="<?= $i ?>" />
                                    <label for="star<?= $i ?>">★</label>
                                <?php endfor; ?>
                            </div>
                            <label for="critique">Contenu de votre critique :</label>
                            <textarea id="texte" name="contenu" rows="4"></textarea>
                            <div class="valider">
                                <button type="submit">Valider la critique</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <p><a href="<?= site_url('login') ?>">Connectez-vous pour écrire une critique.</a></p>
                    <?php endif; ?>

                </article>
            </section>
        </main>
	</body>
</html>