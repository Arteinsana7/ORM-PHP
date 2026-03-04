<?php

require_once('table.class.php');
require_once('genre.class.php');
require_once('distributeur.class.php');

class Film extends Table
{
	const DEBUG = true; // mettre a false pour arreter le debug

	const TABLE_NAME = 'films';
	const PRIMARY_KEY = 'id_film';
	const FIELDS = ['id_genre', 'id_distributeur', 'titre', 'resum', 'date_debut_affiche', 'date_fin_affiche', 'duree_minutes', 'annee_production'];

	protected $id_film;
	protected $id_genre;
	protected $id_distributeur;
	protected $titre;
	protected $resum;
	protected $date_debut_affiche;
	protected $date_fin_affiche;
	protected $duree_minutes;
	protected $annee_production;

	public function __construct($id = null)
	{
		$this->id_film = $id;
	}

	public function genre()
	{
		if (!empty($this->id_genre)) {
			$genre = new Genre($this->id_genre);
			$genre->hydrate();
			return $genre;
		}
	}

	public function distributeur()
	{
		if (!empty($this->id_distributeur)) {
			$distributeur = new Distributeur($this->id_distributeur);
			$distributeur->hydrate();
			return $distributeur;
		}
	}
}
