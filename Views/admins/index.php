<div class="Home-form">
    <div class="left-box">
        <div class="mini-left-box">
            <div id="title">Sản Phẩm</div>
            <div id="number"><?php echo $quaProduct?></div>
        </div>
        <div class="mini-left-box">
            <div id="title">Chờ Xử Lý</div>
            <div id="number"><?php echo $numberOrder?></div>
        </div>
        <div class="mini-left-box">
            <div id="title">Tài Khoản</div>
            <div id="number"><?php echo $numberCustomers?></div>
        </div>
    </div>
    <div class="right-box">
        <div class="sel-date-box">
            <div>Từ Ngày</div>
            <input type="date" name="" id="" class="js_date_start" />
        </div>
        <div class="sel-date-box">
            <div>Đến Ngày</div>
            <input type="date" name="" id="" class="js_date_end" disabled/>
        </div>
        <div class="bt">
            <center><button class="js_filter">Đến</button></center>
        </div>
        <div class="mini-right-box">
            <div id="title">Doanh Thu</div>
            <div id="number"><?php echo $totalRevenue ?></div>
        </div>
        <div class="mini-right-box">
            <div id="title">Số Đơn Hàng</div>
            <div id="number"><?php echo $numberOrderSS ?></div>
        </div>
    </div>
</div>