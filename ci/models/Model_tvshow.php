<?php 
// MODEL
if ( ! defined('BASEPATH')) exit('No direct script access allowed');                                             

class Model_tvshow extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function getTvshow(){
		$query = $this->db->query("
			SELECT tvshow.name,tvshow.id,jpeg,
					(SELECT COUNT(*) from season
					 WHERE season.tvShowId = tvshow.id) as nb
			FROM tvshow
			JOIN poster ON tvshow.posterId = poster.id"
		);
		return $query->result();
	}

	public function getTvshowByGenre($genre) {
		$query = $this->db->query("
			SELECT tvshow.name, tvshow.id, jpeg,
				(SELECT COUNT(*) from season
				 WHERE season.tvShowId = tvshow.id) as nb
			FROM tvshow 
			JOIN poster ON tvshow.posterId = poster.id
			JOIN tvshow_genre ON tvshow.id = tvshow_genre.tvShowId 
			JOIN genre ON genre.id = tvshow_genre.genreId 
			WHERE genre.name = '{$genre}';"
		);
		return $query->result();
		
	}

	public function getGenres() {
		$query = $this->db->query("
			SELECT genre.name 
			FROM genre;"
		);
		return $query->result();
	}

	public function searchTvshow($string) {
		$query = $this->db->query("
			SELECT tvshow.name, tvshow.id, jpeg,
				(SELECT COUNT(*) from season
				 WHERE season.tvShowId = tvshow.id) as nb
			FROM tvshow 
			JOIN poster ON tvshow.posterId = poster.id
			WHERE tvshow.name LIKE '%{$string}%';"
		);
		return $query->result();
	} 


	public function getTvshowById($id) {
		$query = $this->db->query("
		SELECT *, 
			(SELECT COUNT(*) from season
			 WHERE season.tvShowId = tvshow.id) as nb
		FROM tvshow 
		JOIN poster ON tvshow.posterId = poster.id
		WHERE tvshow.id = {$id}
		;"
		);
		return $query->result();
	}

	public function getSeasonsById($id) {
		$query = $this->db->query("
		 SELECT season.id AS id, season.tvShowId, season.name, poster.jpeg, season.seasonNumber 
		 FROM season LEFT JOIN poster ON season.posterId = poster.id WHERE season.tvShowId = {$id};");
		return $query->result();
	}

	public function getNumberOfEpisodes($seasonId) {
		$query = $this->db->query("SELECT COUNT(*) AS nbEpisodes FROM episode WHERE seasonId = {$seasonId};");
		return $query->row();
	}

	public function getSeriesNameBySeasonId($id) {
		$query = $this->db->query("SELECT DISTINCT tvshow.name AS tvshowName, season.name AS seasonName FROM tvshow JOIN season ON tvshow.id = season.tvShowId WHERE season.id = {$id};");
		return $query->row();
	}

	public function getEpisodesBySeasonId($id) {
		$query = $this->db->query("SELECT episode.name, episode.overview, episode.episodeNumber FROM episode JOIN season ON episode.seasonId = season.id WHERE season.id = {$id};");
		return $query->result();
	}

	public function getImageBySeasonId($id) {
		$query = $this->db->query("SELECT poster.jpeg FROM poster JOIN season ON season.posterId = poster.id WHERE season.id = {$id};");
		return $query->row();
	}


	public function getNumberOfEpisodesBySeasonId($id) {
		$query = $this->db->query("SELECT COUNT(*) AS nbEpisodes FROM episode WHERE episode.seasonId = {$id};");
		return $query->row();
	}
}

