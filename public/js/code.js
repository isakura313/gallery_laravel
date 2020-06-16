$(document).ready(function() {
    $(".arts_gallery").magnificPopup({
        delegate: "a",
        type: "image",
        gallery: {
            enabled: true
        },
        removalDelay: 300,
        mainClass: "mgp-fade"
    });
});
