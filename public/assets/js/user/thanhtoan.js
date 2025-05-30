/*
back-end
*/
if (loadCart().length <= 0) {
    window.location.href = "product";
}

const formOrder = document.querySelector('.js_form_order');


if (loadCart().length > 0) {
    loadProductPayment();
}

// xử lý submit form đặt hàng
formOrder.addEventListener('submit', (e) => {
    e.preventDefault();
    let cart = loadCart();
    if (cart.length <= 0) {
        alert('Không có sản phẩm trong giỏ hàng');
        return false;
    }
    let formData = new FormData(e.target);
    cart.forEach((item, index) => {
        formData.append(`chitietdonhang[${index}][idchitietsanpham]`, item['idchitietsanpham']);
        formData.append(`chitietdonhang[${index}][soluong]`, item['soluong']);
        formData.append(`chitietdonhang[${index}][gia]`, item['gia']);
    })
    formData.append('tongtien', getTotalPay());
    // console.log(formData.get('chitietdonhang[0]'));
    let requestOptions = {
        method: 'POST',
        body: formData
    };

    fetch("api/addOrder", requestOptions)
        .then(res => {
            if (res.status == 200) {
                saveCart([]);
                showModalfStatus(true);
                setTimeout(() => {
                    window.location.href = ROOTFOLDER;
                }, 2000);
            } else {
                showModalfStatus(false);
            }
        })
    // in form dữ liệu test
    // for (var pair of formData.entries()) {
    //     console.log(pair[0] + ": " + pair[1]);
    // }
})
// FUNCTION
async function loadProductPayment() {
    let cartDB = await getDataCart();
    let cartLC = loadCart();
    cartDB.forEach((pro, ind) => {
        let htmlIn = `
            <div class="nd_giohang js_card_item" idctsp="${pro["id"]}">
            <div class="photo_product">
                <img src="${ROOTFOLDER + pro['hinhanh']}" alt="">
            </div>
            <div class="cont_bag">
            <div class="card_title">
                <h1 class="title_product">${pro["ten"]}</h1>
            </div>
            <div class="detail_product">
                <span class="size">Size <span>${pro["kichthuoc"]}</span></span>
                <span class="color">&#47; Màu <span>${pro["mausac"]}</span></span>
            </div>
            <div class="amount_price">
                <div class="amount">
                <div class="js_minus amount_icon"><i class="fa-solid fa-minus"></i></div>
                <div><input type="number" class="myInput" value="${cartLC[ind]['soluong']}" min="0"></div>
                <div class="js_plus amount_icon"><i class="fa-solid fa-plus"></i></div>
                </div>
            <div class="price_item">
                <p class="num_price">${formatPrice(pro["gia"])}<span>vnđ</span></p>
            </div>
            </div>
            </div>
        </div>
        `;
        document.querySelector(".right_wrap .container_product").innerHTML += htmlIn;
        loadEleCart();

    });
}
// thong bao đặt hàng thành công
function showModalfStatus(status) {
    let modal = document.querySelector(".js_check");
    modal.style.display = "flex";
    if (status) {
        modal.querySelector('img').src = `${ROOTFOLDER}public/assets/img/core/congratulation.png`;
        modal.querySelector('p').textContent = 'đặt hàng thành công';
    } else {
        modal.querySelector('img').src = `${ROOTFOLDER}public/assets/img/core/cancel.jpg`;
        modal.querySelector('p').textContent = 'đặt hàng thất bại';
    }
    setTimeout(function () {
        modal.style.display = "none";
    }, 2000);
};
function saveProfiles() {

}