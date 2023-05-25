$.getJSON("js/data.json", function (data) {
    $(".user").text(data.user);
});