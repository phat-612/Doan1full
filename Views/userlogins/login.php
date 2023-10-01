<div class="card_login">
    <form action="api/sendOtp" method="post">
        <h2>Lịch sử mua hàng</h2>
        <div class="row_form">
            <i class="fa-solid fa-envelope email"></i>
            <input type="email" name="email" id="inp_email" placeholder="Nhập email mua hàng">
        </div>
        <p class="error_message" style="<?php echo isset($_GET['error']) ? "display:block" : ''?>">Email không tồn tại!</p>
        <button class="submit" type="submit">Tiếp tục</button>
    </form>
</div>