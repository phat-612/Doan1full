autoSlider(1);

// xử lý slider
function autoSlider(showId) {
    imgSliders.forEach(slider => {
        slider.classList.remove("active");
    });
    imgSliders[showId].classList.add("active");
    showId++;
    if (showId > imgSliders.length - 1) {
        showId = 0;
    }
    setTimeout(autoSlider, 2000, showId);
}