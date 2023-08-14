const modals = document.querySelectorAll(".modal");

modals.forEach((modal) => {
    modal.addEventListener("shown.bs.modal", (event) => {
        const id = event.relatedTarget.id;
        const addQuantity = document.getElementById("add-quantity-" + id);
        const removeQuantity = document.getElementById("remove-quantity-" + id);
        const quantity = document.getElementById("quantity-" + id);
        const priceProduct = document.getElementById("price-product-" + id);
        const elementPrice = document.getElementById("prince-demand-" + id);

        const quantityProducts = {
            quantity: +quantity.textContent.trim(),
            priceProduct: +priceProduct.textContent.trim(),
            elementPrice: +elementPrice.textContent.trim(),
        };

        addQuantity.addEventListener("click", (event) => {
            quantity.textContent = quantityProducts.quantity + 1;
            quantityProducts.quantity++;
            elementPrice.textContent =
                quantityProducts.elementPrice + quantityProducts.priceProduct;
            quantityProducts.elementPrice += quantityProducts.priceProduct;
        });

        removeQuantity.addEventListener("click", (event) => {
            if (quantityProducts.quantity > 1) {
                quantity.textContent = quantityProducts.quantity - 1;
                quantityProducts.quantity--;
                elementPrice.textContent =
                    quantityProducts.elementPrice -
                    quantityProducts.priceProduct;
                quantityProducts.elementPrice -= quantityProducts.priceProduct;
            }
        });
    });
});
