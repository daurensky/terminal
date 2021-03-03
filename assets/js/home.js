new Glide('.glide', {
    type: 'carousel',
    autoplay: 5000,
    animationTimingFunc: 'ease',
}).mount()

new Glide('.partners-carousel', {
    type: 'carousel',
    autoplay: 2500,
    animationTimingFunc: 'ease',
    perView: 6,
    animationDuration: 1000,
    hoverpause: false,
}).mount()
