autoSlider(1);

// xử lý slider
function autoSlider(showId) {
    imgSliders.forEach(slider => {
        slider.classList.remove("showElement");
    });
    imgSliders[showId].classList.add("showElement");
    showId++;
    if (showId > imgSliders.length - 1) {
        showId = 0;
    }
    setTimeout(autoSlider, 2000, showId);
}