$(document).ready(function () {
    $('.to-top').click(function () {
        window.scrollTo({
            top: 0,
        })
    })

    $(":input").inputmask();
})
