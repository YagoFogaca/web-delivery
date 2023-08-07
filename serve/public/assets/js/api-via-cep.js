const inputCep = document.querySelector("#cep");
const inputState = document.querySelector("#state");
const inputCity = document.querySelector("#city");
const inputDistrict = document.querySelector("#district");
const inputStreet = document.querySelector("#street");

inputCep.addEventListener("keyup", async (event) => {
    if (event.target.value.length === 8) {
        const response = await fetch(
            "https://viacep.com.br/ws/" + event.target.value + "/json/"
        );
        const data = await response.json();
        inputState.value = data.uf;
        inputCity.value = data.localidade;
        inputDistrict.value = data.bairro;
        inputStreet.value = data.logradouro;
        return;
    }
});
