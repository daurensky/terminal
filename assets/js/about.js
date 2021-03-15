$(document).ready(() => {
    $('.selector-item').each(function () {
        $(this).click(() => {
            $('.dynamic-sections').each(removeClass)

            $(`#${$(this).data('section')}`).addClass('active')

            $('.selector-item').each(removeClass)

            $(this).addClass('active')
        })
    })
})

function removeClass() {
    $(this).removeClass('active')
}
