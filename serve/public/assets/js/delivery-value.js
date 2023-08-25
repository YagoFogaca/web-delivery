const radioInputs = document.getElementsByName("address");
const spanPrice = document.getElementById("delivery-value");
const inputDeliveryValue = document.getElementById("delivery_value");
const btnContinue = document.getElementById("continue");

radioInputs.forEach((radio) => {
    radio.addEventListener("change", handleRadioChange);
});

function handleRadioChange(event) {
    const selectedRadio = event.target;

    if (selectedRadio.checked) {
        const cep = selectedRadio.value;
        console.log(`O CEP selecionado é: ${cep}`);
        $.ajax({
            url: "/delivery-value/" + cep,
            dataType: "json",
            contentType: "application/json",
            success: function (response) {
                spanPrice.textContent = response.delivery_value;
                inputDeliveryValue.value = response.delivery_value;
                btnContinue.removeAttribute("disabled");
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log(xhr);
                console.log(textStatus);
                console.log(errorThrown);
            },
        });
    }
}
