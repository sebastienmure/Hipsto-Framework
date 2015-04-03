<?php
namespace model\helper;

interface IHelper
{
	public static function getAll();
	public static function getOneById($id);
	public static function update($object);
	public static function remove($object);
}