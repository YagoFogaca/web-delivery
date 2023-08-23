const radioInputs = document.querySelectorAll(".form-check-input");
const spanPrice = document.getElementById("delivery-value");

radioInputs.forEach((radio) => {
    radio.addEventListener("change", handleRadioChange);
});

function handleRadioChange(event) {
    const selectedRadio = event.target;

    if (selectedRadio.checked) {
        const cep = selectedRadio.value;
        console.log(`Endereço com ID ${cep} selecionado`);
        $.ajax({
            url: "/delivery-value/" + cep,
            dataType: "json",
            contentType: "application/json",
            success: function (response) {
                spanPrice.textContent = response.delivery_value;
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log(xhr);
                console.log(textStatus);
                console.log(errorThrown);
            },
        });
    }
}
