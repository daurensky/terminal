new Glide('.glide', {
    type: 'carousel',
    autoplay: 5000,
    animationTimingFunc: 'ease',
}).mount()

$(document).ready(function () {
    $('.to-top').click(function () {
        window.scrollTo({
            top: 0,
        })
    })
})
