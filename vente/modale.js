document.addEventListener("DOMContentLoaded", function () {
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("openModal");
  var span = document.getElementsByClassName("close")[0];

  btn.onclick = function () {
    modal.style.display = "block";
    loadProducts();
  };

  span.onclick = function () {
    modal.style.display = "none";
  };

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };

  function loadProducts() {
    var productList = document.getElementById("productList");
    var products = [
      { name: "Produit 1", quantity: 2, price: 10 },
      { name: "Produit 2", quantity: 1, price: 20 },
    ];
    productList.innerHTML = "";
    products.forEach(function (product) {
      var productItem = document.createElement("div");
      productItem.textContent =
        product.name +
        " - Quantité: " +
        product.quantity +
        " - Prix: " +
        product.price +
        "€";
      productList.appendChild(productItem);
    });
  }
});
