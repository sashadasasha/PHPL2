<?

use app\models\{Product, Cart, User};
use app\engine\Db;


include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
echo $product->getOne(3);

$user = new User(new Db());
echo $user->getAll();


var_dump($product);

function foo(IModel $model) {

}