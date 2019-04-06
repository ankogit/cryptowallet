<?
namespace application\models;

use application\core\Model;

class Example extends Model 
{
	public function echoExample()
	{
		echo "Example working with another model";
	}
}