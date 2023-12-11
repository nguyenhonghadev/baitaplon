<div class="donhang">
            <table class="table-header">
                <tr>
                    <!-- Theo độ rộng của table content -->
                    <th style="width: 5%">Stt </th>
                    <th style="width: 13%">Mã đơn </th>
                    <th style="width: 7%">Khách </th>
                    <th style="width: 20%">Sản phẩm </th>
                    <th style="width: 15%">Tổng tiền </th>
                    <th style="width: 10%">Ngày giờ </th>
                    <th style="width: 10%">Trạng thái </th>
                </tr>
            </table>

            <div class="table-content">
            </div>

            <div class="table-footer">
                <div class="timTheoNgay">
                    Từ ngày: <input type="date"> Đến ngày: <input type="date">

                    <button><i class="fa fa-search"></i> Tìm</button>
                </div>

                <select name="kieuTimDonHang">
                    <option value="ma">Tìm theo mã đơn</option>
                    <option value="khachhang">Tìm theo tên khách hàng</option>
                    <option value="trangThai">Tìm theo trạng thái</option>
                </select>
                <input type="text" placeholder="Tìm kiếm...">
            </div>
        </div>