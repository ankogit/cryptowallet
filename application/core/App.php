<?php
namespace application\core;
class App
{
	public static function getModel($className)
	{
		$class = "application\models\\" . $className;
		if (class_exists($class)) {
				return new $class;
		}
		return false;
	}
}