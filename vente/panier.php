<?php
session_start();

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

function getProductById($id)
{
    $pdo = initPDO();

    $stmt = $pdo->prepare("SELECT * FROM produit WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [1, 2]; 
}

$cartProducts = [];
$total = 0;
foreach ($_SESSION['cart'] as $productId ) {
    $product = getProductById($productId);
    if ($product) {
        $cartProducts[] = $product;
        $total += $product['prix'] * $product['inBasket'];
    }
    
}

$isEmpty = true;
foreach ($cartProducts as $product) {
    if ($product['inBasket'] > 0) {
        $isEmpty = false;
        break;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./node_modules/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/logo.png">
    <title>Mercedes Concess</title>
</head>

<body>
    <div class="home" id="panier">
        <header class="homeHeader">
            <div class="homeLogo">
                <img class="homeLogoImg" src="./images/amgGt63s.jpg" alt="logo du site">
                <p>Mercedes Concess</p>
            </div>

            <ul class="navbar">
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="">À Propos</a></li>
                <li><a href="">Populaire</a></li>
                <li><a href="">En vedette</a></li>
            </ul>
            
            <a class="panier" href="./panier.php">Panier</a>
        </header>

        <div>
            <article class="article">
                <div class="homeBgEclairage1"></div>
                <div class="homeBgEclairage2"></div>
                
                <div class="divPanier">
                    <h1>Votre panier :</h1>
                    <div class="totalDiv">
                        <h1>Total de la commande : <?php echo htmlspecialchars($total); ?> €</h1>
                    </div>
                    <?php if (!$isEmpty) : ?>
                        <?php foreach ($cartProducts as $product) : ?>
                            <?php if ($product['inBasket'] > 0) : ?>
                                <div class="panierBlock">
                                    <h3>Libellé : <?php echo htmlspecialchars($product['libelle']); ?></h3>
                                    <h4>Prix : <?php echo htmlspecialchars($product['prix']); ?> €</h4>
                                    <h4>Stock : <?php echo htmlspecialchars($product['stock']); ?></h4>
                                    <h4 class="quantityControl">nombre dans le panier : <?php echo htmlspecialchars($product['inBasket']); ?>
                                        <div class="quantityControl">
                                            <form class="addDelete" method="post" action="controller.php">
                                                <input type="hidden" name="action" value="addToBasket" />
                                                <input type="hidden" name="productId" value="<?php echo $product["id"]?>" />
                                                <button class="buttonAddDelete" type="submit">+</button>
                                            </form>
                                            <form class="addDelete" method="post" action="controller.php">
                                                <input type="hidden" name="action" value="removeToBasket" />
                                                <input type="hidden" name="productId" value="<?php echo $product["id"]?>" />
                                                <button class="buttonAddDelete" type="submit">-</button>
                                            </form>
                                        </div>
                                    </h4>
                                    <h4><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['libelle']); ?>" width="760"></h4>
                                    <div class="buttonDiv">
                                        <!-- <form method="POST" action="panier.php">
                                            <input type="hidden" name="remove_product_id" value="<?php echo $product['id']; ?>">
                                            <button type="submit" class="button">Supprimer</button>
                                        </form> -->
                                        <form class="formButton" method="post" action="controller.php">
                                            <input type="hidden" name="action" value="removeToBasket" />
                                            <input type="hidden" name="productId" value="<?php echo $product["id"]?>" />
                                            <button class="button" type="submit">supprimer</button>
                                        </form>
                                        <button class="button">Commander</button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class='panierVide'>Votre panier est vide.</p>
                    <?php endif; ?>
                </div>
            </article>
            
        </div>
        
    </div>
</body>

</html>
