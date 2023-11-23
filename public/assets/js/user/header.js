// biến toàn server
const ROOTFOLDER = "/doan1full/";
// khai báo biến
const search_icon = document.querySelector(".search_btn");
const search_input = document.querySelector(".search_btn input");
const btnCart = document.querySelector(".js_cart");
const mdCart = document.querySelector(".js_bag");
const mdCartClose = document.querySelector(".close_btn");
const eleTotalPay = document.querySelectorAll(".card_sub .num_price");
let inpNumberPros = document.querySelectorAll(".myInput");
let btnPlusPros = document.querySelectorAll(".js_plus");
let btnMinusPros = document.querySelectorAll(".js_minus");
let btnDeletePros = document.querySelectorAll(".js_dlt_pro");



// sự kiện chạy khi load web
if (loadCart().length > 0) {
    loadCartPage();
}
totalPay();

// xử lý sự kiện nút tìm kiếm
search_input.addEventListener("click", (e) => {
    e.stopPropagation();
    e.preventDefault();
});
search_input.addEventListener("blur", (e) => {
    setTimeout(() => {
        search_input.classList.remove("active");
    }, 500);
});
search_input.addEventListener("keydown", (e) => {
    if (e.key == 'Enter') {
        if (search_input.value) {
            window.location.href = ROOTFOLDER + "product?find=" + encodeURIComponent(search_input.value);
        }
    }
});
search_icon.onclick = function (e) {
    e.preventDefault();
    if (search_input.classList.contains("active")) {
        if (search_input.value) {
            window.location.href = ROOTFOLDER + "product?find=" + encodeURIComponent(search_input.value);
        }
    } else {
        search_input.classList.add("active");
        search_input.focus();
    }
};
// loại bỏ dấu trừ trong ô input
inpNumberPros.forEach((element) => {
    element.addEventListener("keydown", (e) => {
        if (e.key === "-") {
            e.preventDefault();
        }
    });
});
// xử lý mở, đóng giỏ hàng
btnCart.addEventListener("click", (e) => {
    e.preventDefault();
    mdCart.style.display = "flex";
});
mdCartClose.addEventListener("click", (e) => {
    mdCart.style.display = "none";
});
document.querySelector(".modal_body-left").addEventListener("click", (e) => {
    e.stopPropagation();
});
document.querySelector(".js_bag").addEventListener("click", (e) => {
    mdCart.style.display = "none";
});
// bấm nút thanh toán
document.querySelector('.js_pay_btn').addEventListener("click", (e) => {
    e.preventDefault();
    if (loadCart().length <= 0) {
        return false;
    }
    window.location.href = ROOTFOLDER + 'payment';
})
// --------------------------FUNCTION---------------------------------------
// cập nhật các nút control sản phẩm và thêm sự kiện cho các nút
function formatPrice(price) {
    let arrPrice = price.toString().split('');
    let lengthPrice = arrPrice.length;
    while (lengthPrice > 3) {
        lengthPrice -= 3;
        arrPrice.splice(lengthPrice, 0, ' ');
    }
    return arrPrice.join('');
}
function loadEleCart() {
    inpNumberPros = document.querySelectorAll(".myInput");
    btnPlusPros = document.querySelectorAll(".js_plus");
    btnMinusPros = document.querySelectorAll(".js_minus");
    btnDeletePros = document.querySelectorAll(".js_dlt_pro");
    btnMinusPros.forEach((btnMinusPro) => {
        btnMinusPro.addEventListener("click", (e) => {
            let inpNumber = e.target.closest(".amount").querySelector(".myInput");
            inpNumber.value = parseInt(inpNumber.value) - 1;
            inpNumber.dispatchEvent(new Event("change"));
            if (parseInt(inpNumber.value) <= 0) {
                let cfDelPro = confirm("Bạn muốn xóa sản phẩm này không?");
                if (cfDelPro) {
                    editCartQua(
                        "delete",
                        e.target.closest(".js_card_item").getAttribute("idctsp")
                    );
                    e.target.closest(".js_card_item").remove();
                } else {
                    inpNumber.value = 1;
                }
            }
            totalPay();
        });
    });
    btnPlusPros.forEach((btnPlusPro) => {
        btnPlusPro.addEventListener("click", (e) => {
            // console.log('tăng số lượng');
            let inpNumber = e.target.closest(".amount").querySelector(".myInput");
            inpNumber.value = parseInt(inpNumber.value) + 1;
            inpNumber.dispatchEvent(new Event("change"));
            totalPay();
        });
    });
    btnDeletePros.forEach((btnDeletePro) => {
        btnDeletePro.addEventListener("click", (e) => {
            let cfDelPro = confirm("Bạn muốn xóa sản phẩm này không?");
            if (cfDelPro) {
                e.target.closest(".js_card_item").remove();
                editCartQua(
                    "delete",
                    e.target.closest(".js_card_item").getAttribute("idctsp")
                );
                totalPay();
            }
        });
    });
    inpNumberPros.forEach((inpQua) => {
        inpQua.addEventListener("change", (e) => {
            editCartQua(
                "change",
                e.target.closest(".js_card_item").getAttribute("idctsp"),
                parseInt(e.target.value)
            );
            totalPay();
        });
    });
}
// tính tổng tiền, kiểm tra tình trạng giỏ hàng, cập số nhỏ ở icon
function totalPay() {
    // vấn đề class total pay
    let total = getTotalPay();
    if (total <= 0) {
        document.querySelector(".empty_sbag").style.display = "block";
        document.querySelector(".value_sbag").style.display = "none";
    } else {
        document.querySelector(".empty_sbag").style.display = "none";
        document.querySelector(".value_sbag").style.display = "block";
    }
    eleTotalPay.forEach((ele) => {
        ele.textContent = formatPrice(total);
    })
    document.querySelector(".js_nb_cart").textContent = loadCart().length;
    // loadCartPage();
}
function getTotalPay() {
    let total = 0;
    let cart = loadCart();
    cart.forEach((item) => {
        total += parseInt(item['gia']) * parseInt(item['soluong']);
    });
    return total;
}
/*
  key: cart
  [
    {
      idchitietsanpham: 1,
      soluong: 2,
      gia: 3
    },
    {
      idchitietsanpham: 1,
      soluong: 2,
      gia: 3
    },
  ]

*/
// xử lý thêm sửa xóa sản phẩm trong giỏ hàng

// chỉnh sửa giỏ hàng (đổi số lượng hoặc xóa)
function editCartQua(action, idchitietsanpham = -1, soluong = 1) {
    let cart = loadCart();
    if (action == "change" && idchitietsanpham != -1) {
        cart.forEach((pro) => {
            if (pro.idchitietsanpham == idchitietsanpham) {
                pro.soluong = soluong;
                return;
            }
        });
        saveCart(cart);
    } else if (action == "delete") {
        cart = cart.filter((pro) => pro.idchitietsanpham != idchitietsanpham);
        saveCart(cart);
    }
}
// lưu giỏ hàng (chuyển từ mảng thành chuỗi)
function saveCart(cart) {
    localStorage.setItem("cart", JSON.stringify(cart));
}
// lấy dữ liệu trong giỏ hàng (chuyển từ chuỗi sang mảng)
function loadCart() {
    let cart = localStorage.getItem("cart");
    if (cart) {
        return (cart = JSON.parse(cart));
    } else {
        return (cart = []);
    }
}
// load sản phẩm ra trang giỏ hàng
async function loadCartPage() {
    let cartDB = await getDataCart();
    let cartLC = loadCart();
    cartDB = checkDataCart(cartLC, cartDB);
    cartLC = loadCart();
    // clear cart element
    document.querySelector(".value_sbag").innerHTML = '';
    cartDB.forEach((pro, ind) => {
        let htmlIn = `<div class="card_item js_card_item" idctsp="${pro["id"]}">
    <div class="photo_product">
      <img src="${ROOTFOLDER + pro['hinhanh']}" alt="">
    </div>
    <div class="cont_right">
      <div class="card_title_dlt">
        <h1 class="title_product">${pro["ten"]}</h1>
        <span class="js_dlt_pro dlt_product">xóa</span>
      </div>
      <div class="detail_product">
        <span class="size">Size <span>${pro["kichthuoc"]}</span></span>
        <span class="color">&#47; Màu <span>${pro["mausac"]}</span></span>
      </div>
      <div class="amount_price">
        <div class="amount">
          <div class="js_minus amount_icon"><i class="fa-solid fa-minus"></i></div>
          <div><input type="number" class="myInput" value="${cartLC[ind]['soluong']}" min="0" ></div>
          <div class="js_plus amount_icon"><i class="fa-solid fa-plus"></i></div>
        </div>
        <div class="price_item">
          <span class="num_price">${formatPrice(pro["gia"])}</span>
          <span>vnđ</span>
        </div>
      </div>
    </div>
  </div>`;
        document.querySelector(".value_sbag").innerHTML += htmlIn;
    });
    loadEleCart();
    totalPay();
}
// lấy dữ liệu các sản phẩm trong giỏ hàng từ db
async function getDataCart() {
    let dataCart = loadCart();

    let formdata = new FormData();
    dataCart.forEach((pro, ind) => {
        formdata.append(`cart[${ind}][idchitietsanpham]`, pro['idchitietsanpham']);
        formdata.append(`cart[${ind}][soluong]`, pro['soluong']);
        formdata.append(`cart[${ind}][gia]`, pro['gia']);
    })
    let requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };

    try {
        let response = await fetch("http://localhost/doan1full/api/getDataCart", requestOptions);
        let result = await response.json();
        return result;
    } catch (e) {
        return [];
    }
}
// kiểm tra dữ liệu giỏ hàng với dữ liệu db
function checkDataCart(dataLC, dataDB) {
    let arrLength = dataLC.length;
    for (let i = 0; i < arrLength; i++) {
        if (dataDB[i].length != undefined) {
            dataDB.splice(i, 1);
            dataLC.splice(i, 1);
            continue;
        }
        // kiểm tra giá
        if (dataDB[i]['gia'] != dataLC[i]['gia']) {
            dataLC[i]['gia'] = dataDB[i]['gia'];
        }
        // kiểm tra số lượng
        if (dataDB[i]['soluong'] < dataLC[i]['soluong']) {
            dataLC[i]['soluong'] = parseInt(dataDB[i]['soluong'])
            alert('Số lượng một số sản phẩm đã bị thay đổi do tồn kho bị giới hạn')
        }
    }
    saveCart(dataLC);
    return dataDB;
}
