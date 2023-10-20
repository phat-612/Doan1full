// khai báo biến
const search_icon = document.querySelector(".search_btn");
const search_input = document.querySelector(".search_btn input");
const btnCart = document.querySelector(".js_cart");
const mdCart = document.querySelector(".bg_shopping_bag");
const mdCartClose = document.querySelector(".close_btn");
const eleTotalPay = document.querySelector(".card_sub .num_price");
let inpNumberPros = document.querySelectorAll(".myInput");
let btnPlusPros = document.querySelectorAll(".js_plus");
let btnMinusPros = document.querySelectorAll(".js_minus");
let btnDeletePros = document.querySelectorAll(".js_dlt_pro");
// code ví dụ render ra sản phẩm giỏ hàng

if (loadCart().length > 0) {
    loadCartPage();
} else {
    console.log('khong co san pham');
}

// sự kiện chạy khi load web
totalPay();
// xử lý sự kiện nút tìm kiếm
search_input.addEventListener("click", (e) => {
    e.stopPropagation();
    e.preventDefault();
});
search_input.addEventListener("blur", (e) => {
    search_input.classList.remove("active");
});
search_icon.onclick = function (e) {
    e.preventDefault();
    if (search_input.classList.contains("active")) {
        window.location.href =
            "sanpham?timkiem=" + encodeURIComponent(search_input);
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
// xử lý mở giỏ hàng
btnCart.addEventListener("click", (e) => {
    e.preventDefault();
    mdCart.style.display = "block";
});
mdCartClose.addEventListener("click", (e) => {
    mdCart.style.display = "none";
});
document.querySelector(".shopping_bag").addEventListener("click", (e) => {
    e.stopPropagation();
});
document.querySelector(".bg_shopping_bag").addEventListener("click", (e) => {
    mdCart.style.display = "none";
});
// xử lý trong model giỏ hàng
console.log('thêm sự kiện cho các nút');

// thay đổi trong localStorage

// function
function loadEleCart() {
    inpNumberPros = document.querySelectorAll(".myInput");
    btnPlusPros = document.querySelectorAll(".js_plus");
    btnMinusPros = document.querySelectorAll(".js_minus");
    btnDeletePros = document.querySelectorAll(".js_dlt_pro");
    btnMinusPros.forEach((btnMinusPro) => {
        btnMinusPro.addEventListener("click", (e) => {
            let inpNumber = e.target.closest(".amount").querySelector(".myInput");
            inpNumber.value = parseInt(inpNumber.value) - 1;
            if (parseInt(inpNumber.value) <= 0) {
                let cfDelPro = confirm("Bạn muốn xóa sản phẩm này không?");
                if (cfDelPro) {
                    e.target.closest(".card_item").remove();
                } else {
                    inpNumber.value = 1;
                }
                inpNumber.dispatchEvent(new Event("change"));
            }
            totalPay();
        });
    });
    btnPlusPros.forEach((btnPlusPro) => {
        btnPlusPro.addEventListener("click", (e) => {
            console.log('nut cong');
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
                e.target.closest(".card_item").remove();
                totalPay();
            }
        });
    });
    inpNumberPros.forEach((inpQua) => {
        inpQua.addEventListener("change", (e) => {
            console.log('da thay doi gia tri');
            editCartQua(
                "change",
                e.target.closest(".card_item").getAttribute("idctsp"),
                parseInt(e.target.value)
            );
        });
    });
}
function totalPay() {
    // vấn đề class total pay
    let eleAmountPrices = document.querySelectorAll(".amount_price");
    let quaPro = eleAmountPrices.length;
    let total = 0;
    eleAmountPrices.forEach((eleAmountPrice) => {
        let nbPro = parseInt(eleAmountPrice.querySelector(".myInput").value);
        let nbPrice = parseInt(
            eleAmountPrice.querySelector(".num_price").textContent
        );
        total += nbPro * nbPrice;
    });
    if (total <= 0) {
        document.querySelector(".empty_sbag").style.display = "block";
        document.querySelector(".value_sbag").style.display = "none";
    } else {
        document.querySelector(".empty_sbag").style.display = "none";
        document.querySelector(".value_sbag").style.display = "block";
    }
    eleTotalPay.textContent = total;
    document.querySelector(".js_nb_cart").textContent = quaPro;
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
function addCart(idchitietsanpham, soluong, gia) {
    let cart = loadCart();
    console.log(cart);
    cart.push({
        idchitietsanpham,
        soluong,
        gia,
    });
    saveCart(cart);
}
function editCartQua(action, idchitietsanpham, soluong = 1) {
    let cart = loadCart();
    if (action == "change") {
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
function saveCart(cart) {
    localStorage.setItem("cart", JSON.stringify(cart));
}
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
    cartDB.forEach((pro, ind) => {
        let htmlIn = `<div class="card_item" idctsp="${pro["id"]}">
    <div class="photo_product">
      <img src="./access/img/product/aothuntruoc.jpg" alt="">
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
          <span class="num_price">${pro["gia"]}</span>
          <span>vnđ</span>
        </div>
      </div>
    </div>
  </div>`;
        document.querySelector(".value_sbag").innerHTML += htmlIn;
    });
    loadEleCart();
    totalPay();
    console.log('load cart page thành công');
}
async function getDataCart() {
    let dataCart = loadCart();
    let myHeaders = new Headers();
    myHeaders.append("Cookie", "PHPSESSID=3b59oun5flimj73i29lj8dnhau");

    let formdata = new FormData();
    dataCart.forEach((pro, ind) => {
        formdata.append(`cart[${ind}][idchitietsanpham]`, pro['idchitietsanpham']);
        formdata.append(`cart[${ind}][soluong]`, pro['soluong']);
        formdata.append(`cart[${ind}][gia]`, pro['gia']);
    })
    let requestOptions = {
        method: 'POST',
        headers: myHeaders,
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