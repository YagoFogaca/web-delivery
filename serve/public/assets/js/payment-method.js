const form = document.getElementById("change-cash");
const input = document.getElementById("input-change-cash");

form.addEventListener("submit", (event) => {
    event.preventDefault();
    input.value = event.currentTarget.change_cash.value;
});
