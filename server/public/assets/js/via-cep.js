const regex = /^[0-9]{8}$/;
const inputCep = document.querySelector("#cep");
const inputEstado = document.querySelector("#estado");
const inputCidade = document.querySelector("#cidade");
const inputRua = document.querySelector("#rua");

inputCep.addEventListener("keyup", async (event) => {
    const cep = event.target.value;
    if (regex.test(cep)) {
        const data = await fetch("https://viacep.com.br/ws/" + cep + "/json");
        const response = await data.json();
        inputEstado.value = response.uf;
        inputCidade.value = response.localidade;
        inputRua.value = response.logradouro;
        return true;
    }
});
