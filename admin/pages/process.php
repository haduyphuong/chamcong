<?php require_once "../src/db.php";
global $conn;
if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Lấy ID từ button
    $currentMonth = date('m');
    $currentYear = date('Y');

    // Truy vấn dữ liệu dựa trên ID
    $query = "SELECT nv.username,nv.Ma_nv,nv.Ma_bo,nv.Ma_nhom,nv.chucdanh, DATE(pcl.ngay) AS ngay, clv.Tenca, clv.Gio_bat_dau, clv.Gio_ket_thuc, pcl.id FROM users nv JOIN phan_ca_lam pcl ON nv.Ma_nv = pcl.Ma_nv JOIN ca_lam_viec clv ON pcl.id_calam = clv.ID WHERE nv.ID_bophan = $id AND MONTH(pcl.ngay) = $currentMonth AND YEAR(pcl.ngay) = $currentYear";
    $result = $conn->query($query);
    echo "<script>console.log(" . json_encode($result) . ");</script>";
    function getRandomColor()
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
    if ($result->num_rows > 0) {
        while ($row1 = $result->fetch_assoc()) {
            $username = $row1['username'];
            $maNV = $row1['Ma_nv'];
            $maBo = $row1['Ma_bo'];
            $maNhom = $row1['Ma_nhom'];
            $chucDanh = $row1['chucdanh'];
            $ngay = date('j', strtotime($row1['ngay'])); // Chỉ lấy ngày
            $tenca = $row1['Tenca'];
            $gio_bat_dau = date('H:i', strtotime($row1['Gio_bat_dau']));
            $gio_ket_thuc = date('H:i', strtotime($row1['Gio_ket_thuc']));

            if (!isset($colorMap[$tenca])) {
                $colorMap[$tenca] = getRandomColor(); // Gán màu ngẫu nhiên cho tên ca
            }

            // Lưu trữ dữ liệu ca làm việc vào mảng
            $shifts[$username][$ngay] = [
                'tenca' => $tenca,
                'gio_bat_dau' => $gio_bat_dau,
                'gio_ket_thuc' => $gio_ket_thuc,
                'maNV' => $maNV,
                'maBo' => $maBo,
                'maNhom' => $maNhom,
                'chucDanh' => $chucDanh,
            ];
        }
    }

    $daysInMonth = date('t', strtotime("$currentYear-$currentMonth-01"));
    $dates = range(1, $daysInMonth);
    $s = 0;
    if ($result != null) {
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead><tr><th rowspan='2' style='padding-left:5px;vertical-align: middle;background: lightgreen; width:8%'>STT</th>";
        echo "<th class='manv' rowspan='2' style='vertical-align: middle;background: lightgreen;'>Mã NV";
        echo "</th><th class='namenv' rowspan='2' style='vertical-align: middle;background: lightgreen;'>Tên</th>";
        echo "<th class='manv' rowspan='2' style='vertical-align: middle;background: lightgreen;'>Mã bộ</th>";
        echo "<th class='manv' rowspan='2' style='vertical-align: middle;background: lightgreen;'>Nhóm</th>";
        echo "<th class='manv' rowspan='2' style='vertical-align: middle;background: lightgreen;'>Chức danh</th>";
        foreach ($dates as $date) {
            echo "<th class='thdate'>" . $date . "</th> ";
        }
        echo "</tr><tr>";
        foreach ($dates as $date) {
            echo "<th style='padding-left: 2px' class='date thdate'>
                                    " . date('D', mktime(0, 0, 0, $currentMonth, $date, $currentYear)) . "</th>";
        }
        echo "</tr></thead><tbody>";
        foreach ($shifts as $username => $shiftsData) {
            echo "<tr><td>" . $s += 1 . "</td><td>" . $shiftsData[array_key_first($shiftsData)]['maNV'] ?? '' . "</td>";
            echo "<td class='tdname'>" . $username . "</td>";
            echo "<td> " . $shiftsData[array_key_first($shiftsData)]['maBo'] ?? '' . " </td>";
            echo "<td> " . $shiftsData[array_key_first($shiftsData)]['maNhom'] ?? '' . " </td>";
            echo "<td> " . $shiftsData[array_key_first($shiftsData)]['chucDanh'] ?? '' . " </td>";
            foreach ($dates as $date) {
                if (isset($shiftsData[$date])) {
                    $tenca = $shiftsData[$date]['tenca'];
                    $color = $colorMap[$tenca];
                    echo "<td style='background-color:" . $color . "' class='font-weight-bold'>" . $shiftsData[$date]['tenca'] . "</td>";
                } else {
                    echo "<td class='text-secondary'>K</td>";
                }
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<style>
                                table {
                                    width: 100%;
                                    /* Đặt chiều rộng bảng là 100% */
                                    table-layout: fixed;
                                    /* Tự động điều chỉnh chiều rộng các cột */
                                }

                                td {
                                    /* overflow: hidden; Ẩn phần thừa */
                                    text-overflow: ellipsis;
                                    /* Hiển thị dấu ba chấm nếu nội dung quá dài */
                                    white-space: nowrap;
                                    /* Không xuống dòng */
                                }

                                th.namenv {
                                    width: 20%;
                                    /* Chiều rộng cố định cho cột tên nhân viên */
                                }

                                th.manv {
                                    width: 18%;
                                    /* Chiều rộng cố định cho cột tên nhân viên */
                                }

                                th.namenv,
                                th.thdate {
                                    background: #e9984c;
                                }

                                th {
                                    width: 8%;
                                    /* Đặt chiều rộng cho cột ngày */
                                }

                                td,
                                th {
                                    text-align: center;
                                    /* Căn giữa nội dung trong ô */
                                }

                                td.tdname {
                                    white-space: normal;
                                    /* Cho phép nội dung xuống dòng trong cột tên */
                                }
                            </style>";

    } else {
        echo "Không tìm thấy dữ liệu với ID: $id";
    }

} else {
    echo "Chưa chọn ID!";
}
?>