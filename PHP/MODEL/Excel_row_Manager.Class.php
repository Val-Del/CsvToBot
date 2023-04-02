<?php

class Excel_row_Manager
{

	public static function add(Gen__Excel_row $obj)
	{
		return DAO::add($obj);
	}

	public static function update(Gen__Excel_row $obj)
	{
		return DAO::update($obj);
	}

	public static function delete(Gen__Excel_row $obj)
	{
		return DAO::delete($obj);
	}

	public static function findById($id)
	{
		return DAO::select(Gen__Excel_row::getAttributes(), "Gen__Excel_row", ["IdPanier" => $id])[0];
	}

	public static function getList(array $nomColonnes = null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
		$nomColonnes = ($nomColonnes == null) ? Gen__Excel_row::getAttributes() : $nomColonnes;
		return DAO::select($nomColonnes, "gen__excel_row",   $conditions,  $orderBy,  $limit,  $api,  $debug);
	}
	public static function createTable($obj)
	{
		return DAO::createTable($obj);
	}
	public static function dropTable($obj)
	{
		return DAO::dropTable($obj);
	}
	public static function getInfo($obj)
	{
		return DAO::getInfo($obj);
	}
}