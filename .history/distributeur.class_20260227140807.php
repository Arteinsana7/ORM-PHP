<?php

require_once('table.class.php');

class Distributeur extends Table
{
	const TABLE_NAME = 'distributeurs';
	const PRIMARY_KEY = 'id_distributeur';
	const FIELDS = ['nom','telephone','adresse','cpostal','ville','pays'];

	protected $id_distributeur;
	protected $nom;
    protected $telephone;
    protected $adresse;
    protected $cpostal;
    protected $ville;
    protected $pays;

    public function __construct($id = null)
	{
		$this->id_distributeur = $id;
	}

	/* SAVE SPECFIQUE AU DISTRIBUTEUR

	public function save()
	{
		if (empty($this->id_distributeur))
		{
			// INSERT
			$query = "INSERT INTO distributeurs (";
			// liste de champ
			$first = true;
			foreach (static::FIELDS as $field)
			{
				if ($first == true)
					$first = false;
				else
					$query .= ', ';
				$query .= $field;
			}
			$query .= ") VALUES (";
			// liste de valeur
			$first = true;
			foreach (static::FIELDS as $field)
			{
				if ($first == true)
					$first = false;
				else
					$query .= ', ';
				$query .= "'".$this->$field."'";
			}
			$query .= ")";
			my_query($query);
			$this->id_distributeur = my_insert_id();
		}
		else
		{
			// UPDATE
			$query = "UPDATE distributeurs SET ";
			$first = true;
			foreach (static::FIELDS as $field)
			{
				if ($first == true)
					$first = false;
				else
					$query .= ', ';
				$query .= $field."='".$this->$field."'";
			}
			$query .= " WHERE id_distributeur = ".$this->id_distributeur;
			my_query($query);
		}
	}*/
}