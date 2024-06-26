<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
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
                    <img class="homeLogoImg imgPanier" src="./images/panier3.jpeg" alt="logo du site">
                </a>
            </div>
        </header>
        
        <article class="article">
            <h1 class="homeTitle ">Choissisez La Meilleure Merco</h1>
            <div class="separateur"></div>
            <div class='boxSearch'>
                <button class='buttonSearch' onclick="searchProduct()">Rechercher</button>
                <div class="searchInput">
                    <input type="text" id="searchInput" placeholder="Rechercher une voiture..." onkeyup="showSuggestions(this.value)">
                    <div id="suggestions" class="suggestions"></div>
                </div>
            </div>
            
            <!-- Start of loop for products -->
            <?php
                require_once ("bdd/bdd.php");
                $products = getAllProducts();
                foreach ($products as $product) :
            ?>
                <div class="article2" id="product-<?php echo htmlspecialchars($product["id"]); ?>">
                    <article class="article">
                        <h2 class="articleText"><?php echo htmlspecialchars($product["libelle"]); ?></h2>

                        <img class="articleImg" src="<?php echo htmlspecialchars($product["image"]); ?>" alt="<?php echo htmlspecialchars($product["libelle"]); ?>">

                        <div class="articleInfo">
                            <div>
                                <p class="articleChiffres"><?php echo htmlspecialchars($product["prix"]); ?></p>
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
                            <?php if ($product["stock"] > 0) : ?>
                                <form class="formButton" method="post" action="controller.php">
                                    <input type="hidden" name="action" value="addToBasket" />
                                    <input type="hidden" name="productId" value="<?php echo htmlspecialchars($product["id"]); ?>" />
                                    <button class="buttonStart" type="submit">Ajouter au panier</button>
                                </form>
                            <?php else : ?>
                                <div class=ruptureStock>
                                    <button class="buttonStart" type="button" disabled>Ajouter au panier</button>
                                    <p>Désolé, ce produit n'est plus en stock</p>
                                </div>
                            <?php endif; ?>                                   
                        </form>
                    </article>

                    <div class="homeBgEclairage1"></div>
                    <div class="homeBgEclairage2"></div>

                    <section class="carousel" aria-label="Gallery">
                        <ol class="carousel__viewport">
                            <li id="carousel__slide1" class="carousel__slide">
                                <img class='imgCarrousel' src="<?php echo htmlspecialchars($product["image"]); ?>" alt="<?php echo htmlspecialchars($product["title"]); ?>">
                                <div class="carousel__snapper">
                                    <button class="carousel__prev" data-target="carousel__slide4"><</button>
                                    <button class="carousel__next" data-target="carousel__slide2">></button>
                                </div>
                            </li>
                            <li id="carousel__slide2" class="carousel__slide">
                                <img class='imgCarrousel' src="./images/interieurGT63s.jpeg" alt="logo du site">
                                <div class="carousel__snapper">
                                    <button class="carousel__prev" data-target="carousel__slide1"><</button>
                                    <button class="carousel__next" data-target="carousel__slide3">></button>
                                </div>
                            </li>
                            <li id="carousel__slide3" class="carousel__slide">
                                <img class='imgCarrousel' src="<?php echo htmlspecialchars($product["image"]); ?>" alt="<?php echo htmlspecialchars($product["title"]); ?>">
                                <div class="carousel__snapper">
                                    <button class="carousel__prev" data-target="carousel__slide2"><</button>
                                    <button class="carousel__next" data-target="carousel__slide4">></button>
                                </div>
                            </li>
                            <li id="carousel__slide4" class="carousel__slide">
                                <img class='imgCarrousel' src="<?php echo htmlspecialchars($product["image"]); ?>" alt="<?php echo htmlspecialchars($product["title"]); ?>">
                                <div class="carousel__snapper">
                                    <button class="carousel__prev" data-target="carousel__slide4"><</button>
                                    <button class="carousel__next" data-target="carousel__slide4">></button>
                                </div>
                            </li>
                        </ol>
                        <div class="homeBgEclairage3"></div>
                        <div class="homeBgEclairage4"></div>
                    </section>

                    <div class="longSeparateur"></div> 
                </div>
            <?php endforeach; ?>
            <!-- End of loop for products -->

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.carousel__prev, .carousel__next');

            buttons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault(); 
                    const targetSlideId = this.getAttribute('data-target');
                    const targetSlide = document.getElementById(targetSlideId);
                    targetSlide.scrollIntoView({ behavior: 'smooth' });
                });
            });
        });

        function searchProduct() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const products = <?php echo json_encode($products); ?>;

            for (let product of products) {
                if (product.libelle.toLowerCase().includes(searchInput)) {
                    const productId = 'product-' + product.id;
                    const productElement = document.getElementById(productId);
                    if (productElement) {
                        productElement.scrollIntoView({ behavior: 'smooth' });
                    }
                    break; // Stop the loop after finding the first match
                }
            }
        }

        function showSuggestions(value) {
            const suggestions = document.getElementById('suggestions');
            suggestions.innerHTML = '';
            if (value.length > 0) {
                const products = <?php echo json_encode($products); ?>;
                const filteredProducts = products.filter(product => product.libelle.toLowerCase().includes(value.toLowerCase()));
                filteredProducts.forEach(product => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.classList.add('suggestion-item');
                    suggestionItem.textContent = product.libelle;
                    suggestionItem.onclick = function() {
                        document.getElementById('searchInput').value = product.libelle;
                        suggestions.innerHTML = '';
                        searchProduct();
                    };
                    suggestions.appendChild(suggestionItem);
                });
                suggestions.style.display = 'block'; // Afficher les suggestions
            } else {
                suggestions.style.display = 'none'; // Cacher les suggestions
            }
        }

        // Cacher les suggestions si on clique en dehors du champ de recherche
        document.addEventListener('click', function(event) {
            const searchInput = document.getElementById('searchInput');
            const suggestions = document.getElementById('suggestions');
            if (!searchInput.contains(event.target) && !suggestions.contains(event.target)) {
                suggestions.style.display = 'none';
            }
        });
    </script>

</body>

<?php
include ("footer.php");
?>

</html>
