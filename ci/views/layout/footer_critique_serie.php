
            <section>
                <hr class="separation">
                <article>
                    <h2>Critiques</h2>
                    <?php 

                    if (!$critiques && $nom_url == "ListeSaisons") {
                        echo "<p>Aucune critique n'a été rédigée pour cette série.</p>";
                    }

                    else if (!$critiques && $nom_url == "ListeEpisodes") {
                        echo "<p>Aucune critique n'a été rédigée pour cette saison.</p>";
                    }

                    else {
                        foreach ($critiques as $critique) {
                            $etoilesPleines = str_repeat("★", $critique->note);
                            $etoilesVides = str_repeat("☆", 5 - $critique->note);
                            echo "<hr class=\"separation\">";
                            echo "<h5>$etoilesPleines$etoilesVides</h5>";
                            echo "<p>$critique->contenu</p>";
                        }
                    }

                    ?>
                </article>