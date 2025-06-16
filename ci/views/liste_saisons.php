<h6>Liste des saisons<h6>
<main>
    <article>
        <h2><b><?php echo "{$details->name}" ?></b></h2>
        <div class="overview_container">
            <div class="overview_image">
                <?php 
                echo '<img src="data:image/jpeg;base64,'.base64_encode($details->jpeg).'" />';
                ?>
            </div>
            <div class="overview_texte">
                <?php
                echo "<p>{$details->overview}</p>";
                ?>
            </div>   
        </div>
    </article>
            <?php 

            foreach($saisons as $saison) {
                $anchor = site_url("ListeEpisodes/index/{$saison->id}");
                echo "<a href=\"$anchor\">";
                echo "<article class=\"saisons_container\">";
                echo "<div class=\"saisons_image\">";
                echo '<img src="data:image/jpeg;base64,'.base64_encode($saison->jpeg).'" />';
                echo "</div>";
                echo "<div class=\"saisons_texte\">";
                echo "<h2><b>{$saison->name}</b></h2>";
                echo "<p>{$this->model_tvshow->getNumberOfEpisodes($saison->id)->nbEpisodes} épisodes</p>";
                echo "</div>"; 
                echo "</article></a>";
            }

            ?>
</main>