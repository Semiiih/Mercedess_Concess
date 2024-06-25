<!DOCTYPE html>
<html >

<head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="./node_modules/swiper/swiper-bundle.min.css"> -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/logo.png">
    <title>Mercedes Concess</title>
</head>

<body>
    <div class="home" id="acceuil">
        <header class="homeHeader">
            <div class="homeLogo">
                <img class="homeLogoImg" src="./images/logo.png" alt="logo du site">
                <p>Mercedes Concess</p>
            </div>

            <ul class="navbar">
                <li><a href="#acceuil">Acceuil</a></li>
                <li><a href="">À Propos</a></li>
                <li><a href="">Populaire</a></li>
                <li><a href="">En vedette</a></li>
            </ul>
            <div>
                <a class="panier" href="./panier.php">Panier
                    <img class="homeLogoImg imgPanier" src="./images/panier3.jpeg" alt="logo du site" >
                </a>
            </div>
            

        </header>

        <div>
            <article class="article">
                <h1 class="homeTitle ">Choissisez La Meilleure Merco</h1>
                <div class="separateur"></div>          
        
         <!-- Start of loop for products -->
         <?php
            $products = [
                [
                    "title" => "AMG GT63 S",
                    "price" => "214 855. 00 €",
                    "power" => "577 ch",
                    "engine" => "V8 de 4,0 L",
                    "image" => "./images/amgGt63s.jpg",
                    "id" => 2
                ],
                [
                    "title" => "G63 AMG avec Edition 1",
                    "price" => "275 893.75 €",
                    "power" => "585 ch",
                    "engine" => "V8 de 4,0 L",
                    "image" => "./images/amgClasseG63.jpeg",
                    "id" => 2
                ],
                [
                    "title" => "Mercedes-AMG GLE 63 S 4MATIC",
                    "price" => "173 450 €",
                    "power" => "612 ch",
                    "engine" => "V8 de 5,5 L",
                    "image" => "./images/gle.jpeg",
                    "id" => 3
                ]
            ];

            foreach ($products as $product) :
            ?>
                <div class="article2">
                    <article class="article">
                        <h2 class="articleText"><?php echo htmlspecialchars($product["title"]); ?></h2>

                        <img class="articleImg" src="<?php echo htmlspecialchars($product["image"]); ?>" alt="<?php echo htmlspecialchars($product["title"]); ?>">

                        <div class="articleInfo">
                            <div>
                                <p class="articleChiffres"><?php echo htmlspecialchars($product["price"]); ?></p>
                                <p class="articleSousDescriptions">Prix</p>
                            </div>
                            <div>
                                <p class="articleChiffres"><?php echo htmlspecialchars($product["power"]); ?></p>
                                <p class="articleSousDescriptions">Chevaux</p>
                            </div>
                            <div>
                                <p class="articleChiffres"><?php echo htmlspecialchars($product["engine"]); ?></p>
                                <p class="articleSousDescriptions">Moteur</p>
                            </div>
                        </div>

                        <form class="formButton" method="post" action="controller.php">
                            <input type="hidden" name="action" value="addToBasket" />
                            <input type="hidden" name="productId" value="<?php echo htmlspecialchars($product["id"]); ?>" />
                            <button class="buttonStart" type="submit">Ajouter au panier</button>
                        </form>
                    </article>

                    <div class="homeBgEclairage1"></div>
                    <div class="homeBgEclairage2"></div>

                    <section class="carousel" aria-label="Gallery">
                        <ol class="carousel__viewport">
                            <li id="carousel__slide1" class="carousel__slide">
                                <img class='imgCarrousel' src="<?php echo htmlspecialchars($product["image"]); ?>" alt="<?php echo htmlspecialchars($product["title"]); ?>">
                                <div class="carousel__snapper">
                                    <a href="#carousel__slide4" class="carousel__prev"><</a>
                                    <a href="#carousel__slide2" class="carousel__next">></a>
                                </div>
                            </li>
                            <li id="carousel__slide2" class="carousel__slide">
                                <img class='imgCarrousel' src="./images/interieurGT63s.jpeg" alt="logo du site">
                                <div class="carousel__snapper"></div>
                                <a href="#carousel__slide1" class="carousel__prev"><</a>
                                <a href="#carousel__slide3" class="carousel__next">></a>
                            </li>
                            <li id="carousel__slide3" class="carousel__slide">
                                <img class='imgCarrousel' src="<?php echo htmlspecialchars($product["image"]); ?>" alt="<?php echo htmlspecialchars($product["title"]); ?>">
                                <div class="carousel__snapper"></div>
                                <a href="#carousel__slide2" class="carousel__prev"><</a>
                                <a href="#carousel__slide4" class="carousel__next">></a>
                            </li>
                            <li id="carousel__slide4" class="carousel__slide">
                                <img class='imgCarrousel' src="<?php echo htmlspecialchars($product["image"]); ?>" alt="<?php echo htmlspecialchars($product["title"]); ?>">

                                <div class="carousel__snapper"></div>
                                <a href="#carousel__slide3" class="carousel__prev"><</a>
                                <a href="#carousel__slide1" class="carousel__next">></a>
                            </li>
                        </ol>
                        <div class="homeBgEclairage3"></div>
                        <div class="homeBgEclairage4"></div>
                    </section>
                </div>
            <?php endforeach; ?>
            <!-- End of loop for products -->
    </div>
</body>

<?php
include ("footer.php");
?>

</html> 