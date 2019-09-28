<?

use app\models\{Basket, Product, User};
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);



$product = new Product(null, "Молоко", "Свежее", 70);
$product->insert();

$user = new User(null, "superuser", "1234");
$user->insert();

$product=Product::getOne(4);
var_dump($product);
$product->delete();
