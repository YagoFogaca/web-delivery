$(document).ready(function () {
    const inputsActive = $(".active-product");
    const inputsIds = $(".id");
    const token = $('[name="_token"]').val();

    $.each(inputsActive, function (key, inputActive) {
        $(inputActive).on("change", function (e) {
            $.ajax({
                type: "PATCH",
                url: "/product/active/" + inputsIds[key].value,
                data: JSON.stringify({
                    active: inputActive.checked,
                    _token: token,
                }),
                dataType: "json",
                contentType: "application/json",
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(xhr);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        });
    });
});
