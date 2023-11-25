let seaParams = {};
let detailProduct;
const mainImg = document.querySelector('.main_img img');

const eleColor = document.querySelector('.choose.ccolor');
const eleSize = document.querySelector('.choose.csize');
const inpNumberCart = document.querySelector('.myInput_ct');
const eleDescCtrl = document.querySelector('.js_desc_ctrl');
const eleDescContent = document.querySelector('.js_desc_content');
// lấy mảng 
let searchParams = new URLSearchParams(window.location.search);
searchParams.forEach(function (value, key) {
    seaParams[key] = value;
});

// kiểm tra id sản phẩm
if (!seaParams.hasOwnProperty('id')) {
    window.location.href = ROOTFOLDER + 'product';
}
// lấy dữ liệu sản phẩm
let formdata = new FormData();
formdata.append("id", seaParams['id']);

let requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow'
};

fetch("/doan1full/api/getDetailProduct", requestOptions)
    .then(res => res.json())
    .then(result => {
        detailProduct = result;
        loadPage();
    });
// FUNCTION
// kiểm tra sản phẩm trong giỏ, nếu có thì cộng dồn vào
function addCart(idchitietsanpham, soluong, gia) {
    let cart = loadCart();
    for (let i = 0; i < cart.length; i++) {
        if (cart[i]['idchitietsanpham'] == idchitietsanpham) {
            cart[i]['soluong'] += parseInt(soluong)
            saveCart(cart);
            return true;
        }
    }
    cart.push({
        idchitietsanpham,
        soluong,
        gia,
    });
    saveCart(cart);
    return true;
}
function loadPage() {
    // nav
    document.querySelector('.tag_comeback li:last-child a').textContent = detailProduct['ten'];
    // load ảnh
    let imgs = detailProduct['hinhanh'];
    imgs.forEach(img => {
        document.querySelector('.left_img').innerHTML += `
            <div class="left_img_item">
                <img src="${"/doan1full/" + img}" alt="" class="detail">
            </div>
        `
    });
    mainImg.src = "/doan1full/" + imgs[0];
    // chọn xem ảnh sản phẩm
    let leftImgs = document.querySelectorAll('.left_img_item');
    leftImgs.forEach((img) => {
        img.addEventListener('click', (e) => {
            mainImg.src = e.target.src;
        })
    })
    // tên
    document.querySelector('.title_product').textContent = detailProduct['ten'];
    // giá
    document.querySelector('.js_price_pro').innerHTML = formatPrice(detailProduct['gia']) + ` vnđ`;
    // chi tiết
    let ctsp = detailProduct['chitietsanpham'];
    let listColor = new Set();
    let listSize = new Set();
    console.log(ctsp);
    ctsp.forEach(e => {
        listColor.add(e.mausac);
        listSize.add(e.kichthuoc);
    });
    // chi tiết màu sắc
    listColor.forEach(color => {
        eleColor.innerHTML += `<span class="select color">${color}</span>`
    })
    // chi tiết kích thước
    listSize.forEach(size => {
        eleSize.innerHTML += `<span class="select size">${size}</span>`
    })
    // xư lý chọn
    let eleColors = document.querySelectorAll('.select.color');
    let eleSizes = document.querySelectorAll('.select.size');
    eleColors.forEach(color => {
        color.addEventListener('click', (e) => {
            eleColors.forEach(color => {
                if (color == e.target && !e.target.classList.contains('bold_border') && !e.target.classList.contains('disabled')) {
                    e.target.classList.add('bold_border');
                    let tempSize1 = ctsp.filter((item) => item['mausac'] == e.target.textContent);
                    let tempSize = {};
                    tempSize1.forEach(item => {
                        tempSize[item['kichthuoc']] = item['soluong'];
                    });
                    eleSizes.forEach(item => {
                        // không tồn tại size theo màu
                        if (Object.keys(tempSize).includes(item.textContent)) {
                            // hết size theo màu
                            if (tempSize[item.textContent] > 0) {
                                item.classList.remove('disabled');
                                item.style.opacity = '1';
                            } else {
                                item.classList.add('disabled');
                                item.style.opacity = '0.5';
                            }
                        } else {
                            item.classList.add('disabled');
                            item.style.opacity = '0.5';
                        }

                    })


                } else if (color == e.target && e.target.classList.contains('bold_border')) {
                    eleSizes.forEach(item => {
                        item.classList.remove('disabled');
                        item.style.opacity = '1';

                    })
                    color.classList.remove('bold_border');
                }
                else {
                    color.classList.remove('bold_border');
                }
            })
        })
    })
    eleSizes.forEach(size => {
        size.addEventListener('click', (e) => {
            eleSizes.forEach(size => {
                if (size == e.target && !e.target.classList.contains('bold_border') && !e.target.classList.contains('disabled')) {
                    e.target.classList.add('bold_border');
                    let tempColor1 = ctsp.filter((item) => item['kichthuoc'] == e.target.textContent);
                    let tempColor = {}
                    tempColor1.forEach(item => {
                        tempColor[item['mausac']] = [item['soluong']];
                    })
                    console.log(Object.keys(tempColor));
                    eleColors.forEach(item => {
                        if (Object.keys(tempColor).includes(item.textContent)) {
                            if (tempColor[item.textContent] > 0) {
                                item.classList.remove('disabled');
                                item.style.opacity = '1';
                            } else {
                                item.classList.add('disabled');
                                item.style.opacity = '0.5';
                            }

                        } else {
                            item.classList.add('disabled');
                            item.style.opacity = '0.5';

                        }
                    })
                } else if (size == e.target && e.target.classList.contains('bold_border')) {
                    eleColors.forEach(item => {
                        item.classList.remove('disabled');
                        item.style.opacity = '1';
                    })
                    size.classList.remove('bold_border');
                }
                else {
                    size.classList.remove('bold_border');
                }
            })
        })
    })
    // mô tả
    eleDescCtrl.addEventListener('click', (e) => {
        eleDescContent.classList.toggle('showElement');
    });
    eleDescContent.textContent = detailProduct['mota'];
    // nút handle số lượng
    inpNumberCart.addEventListener("keydown", (e) => {
        if (e.key === "-") {
            e.preventDefault();
        }
    });
    inpNumberCart.addEventListener("change", (e) => {
        if (inpNumberCart < 1) {
            inpNumberCart = 1
        }
    });
    document.querySelector('.js_minus_ct').addEventListener('click', () => {
        inpNumberCart.value = parseInt(inpNumberCart.value) - 1 <= 0 ? 1 : parseInt(inpNumberCart.value) - 1;
    })
    document.querySelector('.js_plus_ct').addEventListener('click', () => {
        inpNumberCart.value = parseInt(inpNumberCart.value) + 1;
    })
    // nút đặt hàng
    document.querySelector('.js_btn_add_cart').addEventListener('click', () => {
        let color = document.querySelector('.select.color.bold_border');
        let size = document.querySelector('.select.size.bold_border');
        let sl = parseInt(inpNumberCart.value);
        if (color && size) {
            ctsp.forEach(ct => {
                if (color.textContent == ct['mausac'] && size.textContent == ct['kichthuoc']) {
                    addCart(ct['id'], sl, detailProduct['gia']);
                    loadCartPage();
                    alert('Thêm sản phẩm thành công');
                }
            })
        } else {
            alert('Vui lòng chọn màu sắc và kích thước');
        }

    })
}






