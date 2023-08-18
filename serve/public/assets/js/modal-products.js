const modals = document.querySelectorAll(".modal-products");

modals.forEach((modal) => {
    modal.addEventListener("shown.bs.modal", (event) => {
        const id = event.relatedTarget.id;
        const addQuantity = document.getElementById("add-quantity-" + id);
        const removeQuantity = document.getElementById("remove-quantity-" + id);
        const quantity = document.getElementById("quantity-" + id);
        const priceProduct = document.getElementById("price-product-" + id);
        const elementPrice = document.getElementById("prince-demand-" + id);
        const priceInput = document.getElementById("price-item-" + id);

        const quantityProducts = {
            quantity: +quantity.value.trim(),
            priceProduct: +priceProduct.textContent.trim(),
            elementPrice: +elementPrice.textContent.trim(),
        };

        addQuantity.addEventListener("click", (event) => {
            quantity.value = quantityProducts.quantity + 1;
            quantityProducts.quantity++;
            const price = (
                quantityProducts.elementPrice + quantityProducts.priceProduct
            ).toFixed(2);
            elementPrice.textContent = price;
            priceInput.value = price;
            quantityProducts.elementPrice += quantityProducts.priceProduct;
        });

        removeQuantity.addEventListener("click", (event) => {
            if (quantityProducts.quantity > 1) {
                quantity.value = quantityProducts.quantity - 1;
                quantityProducts.quantity--;
                const price = (
                    quantityProducts.elementPrice -
                    quantityProducts.priceProduct
                ).toFixed(2);
                elementPrice.textContent = price;
                priceInput.value = price;
                quantityProducts.elementPrice -= quantityProducts.priceProduct;
            }
        });
    });
});
