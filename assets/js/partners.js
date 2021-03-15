$(document).ready(() => {
    new Glide('.partners-carousel', {
        type: 'carousel',
        autoplay: 2500,
        animationTimingFunc: 'ease',
        perView: 6,
        animationDuration: 1000,
        hoverpause: false,
    }).mount()
})
