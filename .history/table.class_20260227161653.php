<?php
//table.class.php

abstract class Table
{
	// executée quand on essaie d'ecrie
	public function __set($attribute, $value)
	{
		// potentielle securite d'acces atrribut
		$this->$attribute = $value;
	}

	public function __get($attribute)
	{
		// potentielle securite d'acces atrribut
		if (isset($this->$attribute))
			return $this->$attribute;
		elseif (method_exists(get_called_class(), $attribute)) {
			return $this->$attribute();
		}
	}


	public function hydrate()
	{
		$sql = 'select * from ' . static::TABLE_NAME . ' where ' . static::PRIMARY_KEY . '=' . $this->{static::PRIMARY_KEY};
		// select * from genres where id_genre=2
		$line = my_fetch_array($sql);

		foreach ($line[0] as $field => $value) {
			//echo "$field : $value<br>";
			$this->$field = $value;
		}
	}

	//fonction all() qui renvoie un tableau de films
	/*static public function all()
	{
		$sql = 'select * from '.static::TABLE_NAME;
		$lines = my_fetch_array($sql);

		return $lines;
	}*/

	//fonction all() qui renvoie une collection d'objet films
	static public function all()
	{
		$sql = "select id_film from films";
		$ids = my_fetch_array($sql);

		$called_class = get_called_class();
		$collection = [];
		foreach ($ids as $id) {

			$object = new $called_class($id[static::PRIMARY_KEY]);
			$object->hydrate();
			$collection[] = $object;
		}

		return $collection;
	}

	public function save()
	{
		if (empty($this->{static::PRIMARY_KEY})) {
			// INSERT
			$query = "INSERT INTO " . static::TABLE_NAME . " (";
			// liste de champ
			$first = true;
			foreach (static::FIELDS as $field) {
				if ($first == true)
					$first = false;
				else
					$query .= ', ';
				$query .= $field;
			}
			$query .= ") VALUES (";
			// liste de valeur
			$first = true;
			foreach (static::FIELDS as $field) {
				if ($first == true)
					$first = false;
				else
					$query .= ', ';
				$query .= "'" . $this->$field . "'";
			}
			$query .= ")";
			my_query($query);
			$this->{static::PRIMARY_KEY} = my_insert_id();
		} else {
			// UPDATE
			$query = "UPDATE " . static::TABLE_NAME . " SET ";
			$first = true;
			foreach (static::FIELDS as $field) {
				if ($first == true)
					$first = false;
				else
					$query .= ', ';
				$query .= $field . "='" . $this->$field . "'";
			}
			$query .= " WHERE " . static::PRIMARY_KEY . " = " . $this->{static::PRIMARY_KEY};
			my_query($query);
		}
	}
}
