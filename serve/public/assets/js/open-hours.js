$("form").submit(function (event) {
    event.preventDefault();

    const daysOfWeek = ["seg", "ter", "qua", "qui", "sex", "sab", "dom"];
    const openHours = [];

    daysOfWeek.forEach((day) => {
        const openHour = {
            day: event.target[day].value,
            start_time: event.target[`start_time_${day}`].value,
            end_time: event.target[`end_time_${day}`].value,
            active: event.target[`active_${day}`].checked,
        };
        openHours.push(openHour);
    });

    $.ajax({
        type: "PUT",
        url: "/open-hours",
        data: JSON.stringify({
            data: openHours,
            _token: event.target._token.value,
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
