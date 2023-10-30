const formOrder = document.querySelector('.js_form_order');


if (loadCart().length > 0) {
    loadProductPayment();
}

// xử lý submit form đặt hàng
formOrder.addEventListener('submit', (e) => {
    e.preventDefault();
    let cart = loadCart();
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
        body: formData,
        redirect: 'follow'
    };

    fetch("api/addOrder", requestOptions)
        .then(res => {
            if (res.status == 200) {
                showModalSuccess();
            } else {
                alert("Đặt hàng thất bại");
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
                <p class="num_price">${pro["gia"]}<span>vnđ</span></p>
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
function showModalSuccess() {
    let modal = document.querySelector(".modal");
    modal.style.display = "block";
    setTimeout(function () {
        modal.style.display = "none";
    }, 2000);
};
