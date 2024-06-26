<?php
function initPDO()
{
    try {
        $pdo = new PDO(
            'mysql:host=127.0.0.1;dbname=vente;charset=utf8',
            'root',
            'root'
        );
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        return $pdo;
    } catch (PDOException $e) {
        echo "" . $e->getMessage();
    }
}

function getAllProducts()
{
    $pdo = initPDO();

    $products = $pdo->query("select * from produit");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}


function getProductById($id)
{
    $pdo = initPDO();

    $products = $pdo->query("
    select * 
    from produit 
    where id=$id");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

function addProductToBasket($id)
{
    echo "loulou";
    $pdo = initPDO();

    $pdo->query("
    update produit 
    set inBasket = (
        select inBasket
        from produit
        where id = $id
        ) +1
    where id = $id;");


    // $pdo = initPDO();

    // $product = getProductById($id);

    // if ($product['inBasket'] < $product['stock']) {
    //     $pdo->query("
    //         update produit 
    //         set inBasket = (
    //             select inBasket
    //             from produit
    //             where id = $id
    //             ) +1
    //         where id = $id;");

    //     echo "Produit ajouté au panier.";
    // } else {
    //     echo "Impossible d'ajouter le produit au panier. Stock insuffisant.";
    // }
}

function removeProductToBasket($id)
{
    echo "liiiliii";
    $pdo = initPDO();

    $pdo->query("
    UPDATE produit 
        SET inBasket = inBasket - 1
        WHERE id = $id AND inBasket > 0
    ");
}