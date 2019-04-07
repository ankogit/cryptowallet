<?
namespace application\models;

use application\core\Model;

class Example extends Model 
{
	public function echoExample()
	{
		return "Example working with another model";
	}
}