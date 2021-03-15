$(document).ready(() => {
    $('.to-top').click(() => {
        window.scrollTo({
            top: 0,
        })
    })

    $(':input').inputmask()
})
