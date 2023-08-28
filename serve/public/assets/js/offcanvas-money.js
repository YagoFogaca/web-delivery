const inputs = document.getElementsByName("payment-method");
const btnMoney = document.querySelector("#btn-money");
const btnContinuePaymentMethod = document.getElementById("continue");

inputs.forEach((radio) => {
    radio.addEventListener("change", handleRadioChange);
});

function handleRadioChange(event) {
    const selectedRadio = event.target;

    if (selectedRadio.checked && selectedRadio.value === "dinheiro") {
        btnMoney.style.display = "inline-block";
        btnContinuePaymentMethod.removeAttribute("disabled");
    } else {
        btnMoney.style.display = "none";
        btnContinuePaymentMethod.removeAttribute("disabled");
    }
}
