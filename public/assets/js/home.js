$('.dropdownku a.dropdown-toggle').on('click', function (e) {

});

$('.dropdownku').hover(function (e) {
    $('.dropdown-departemen').addClass('show');
}, () => {
    $('.dropdown-departemen').removeClass('show');
});
