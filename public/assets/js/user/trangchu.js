const imgSliders = document.querySelectorAll(".img_slider_js");
autoSlider(0);

// xử lý slider
function autoSlider(showId) {

    imgSliders.forEach(slider => {
        slider.classList.remove("showElement");
    });
    imgSliders[showId].classList.add("showElement");
    if (imgSliders.length <= 1) {
        return false
    }
    showId++;
    if (showId > imgSliders.length - 1) {
        showId = 0;
    }
    setTimeout(autoSlider, 2000, showId);
}