<h6>Liste des épisodes<h6>
<main>
    <article>
        <h2><b><?php echo "{$noms->tvshowName} - {$noms->seasonName}" ?></b></h2>
        <div class="overview_container">
            <div class="overview_image">
                <?php 
                echo '<img src="data:image/jpeg;base64,'.base64_encode($imageSaison->jpeg).'" />';
                ?>
            </div>
            <div class="overview_texte">
                <?php
                echo "<p>{$nbEpisodes->nbEpisodes} épisodes</p>";
                ?>
            </div>   
        </div>
    </article>
            <?php 

            $compte = 1;

            foreach($episodes as $episode) {
                echo "<article class=\"episodes_container\">";
                echo "<div class=\"episode_texte\">";
                echo "<h5><i>Épisode {$compte}</i> - <b>{$episode->name}</b> </h5>";
                echo "<p>{$episode->overview}</p>";
                echo "</div>"; 
                echo "</article>";

                $compte++;
            }

            ?>
</main>