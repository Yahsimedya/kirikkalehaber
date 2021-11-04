
var swiper = new Swiper(".fotogaleri_slider", {
    slidesPerView: 1,
    spaceBetween: 20,
    slidesPerGroup: 3,
    loop: !1,
    loopFillGroupWithBlank: !1,
    pagination: { el: ".swiper-pagination", clickable: !0 },
    autoplay: { delay: 4e3 },
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    breakpoints: { 320: { slidesPerView: 1, spaceBetween: 20 }, 480: { slidesPerView: 1, spaceBetween: 20 }, 640: { slidesPerView: 1, spaceBetween: 20 }, 960: { slidesPerView: 3, spaceBetween: 20 } },
});
$(document).ready(function () {
    $("#footer-kapat").click(function () {
        return $(".desktop-sticy").hide(), $("#footer-kapat").hide(), !1;
    });
}),


swiper = new Swiper(".detay-slider", {
    lazy: !0,
    pagination: {
        el: ".detay-pagination",
        clickable: !0,
        renderBullet: function (e, n) {
            return '<span class="' + n + '">' + (e + 1) + "</span>";
        },
    },
});
$(".detay-pagination>.swiper-pagination-bullet").hover(function () {
    $(this).trigger("click");
});


// swiper = new Swiper(".surmanset-slider", {
//     direction: "vertical",
//     slidesPerView: 1,
//     spaceBetween: 30,
//     autoHeight: !0,
//     height: window.innerHeight,
//     grabCursor: !0,
//     pagination: {
//         el: ".swiper-pagination ",
//         clickable: !0,
//         renderBullet: function (e, n) {
//             return '<span class="' + n + '">' + (e + 1) + "</span>";
//         },
//     },
// });
// $(".surmanset>.swiper-pagination-bullet").hover(function () {
//     $(this).trigger("click");
// })

