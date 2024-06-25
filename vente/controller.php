<?php
require_once ("bdd/bdd.php");

$action = isset($_POST["action"]) ? $_POST["action"] : "";
switch ($action) {
    case 'addToBasket':
        $productId = $_POST["productId"];
        echo "coucou";
        addProductToBasket($productId);
        header("Location: panier.php");
        break;
    case 'removeToBasket':
        $productId = $_POST["productId"];
        echo "coucou";
        removeProductToBasket($productId);
        header("Location: panier.php");
        break;

    default:
        echo "default";
        break;
}