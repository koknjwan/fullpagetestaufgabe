$(document).ready(function () {
    $("#fullpage").fullpage({
        autoScrolling: true,
        scrollHorizontally: true,
        controlArrows: false,
        keyboardScrolling: false,
        fadingEffect: true,
        menu: true,
        navigation: true,
        navigationTooltips: ["Fragebogen", "Fragen", "Abgesagt"],
        showActiveTooltip: true,
        slidesNavigation: true,
        slidesNavPosition: "top",
        cards: true,
    });
    $.fn.fullpage.setAllowScrolling(false);
});

$("#go-to-question-1").click(function () {
    fullpage_api.moveSectionDown();
});

function nextQuestion() {
    fullpage_api.moveSlideRight();
}

function cancellation() {
    fullpage_api.moveTo("cancellation");
}
