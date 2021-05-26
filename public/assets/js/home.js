$(".dropdownku a.dropdown-toggle").on(
    "click",
    function (e) {
        $(".dropdown-departemen").addClass("show");
    },
    () => {
        $(".dropdown-departemen").removeClass("show");
    }
);

$(".dropdownku").hover(
    function (e) {
        $(".dropdown-departemen").addClass("show");
    },
    () => {
        $(".dropdown-departemen").removeClass("show");
    }
);
