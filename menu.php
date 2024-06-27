<?php
// Ensure session is started for authentication check if needed
session_start();
?>

    <nav>
        <h2>سیستم مدیریت ساکنین</h2>
        <ul>
            <li><a href="add_family.php">افزودن خانواده</a></li>
            <li><a href="view_families.php">مشاهده خانواده‌ها</a></li>
        </ul>

        <h2>ثبت و رزرو استفاده از امکانات ساختمان</h2>
        <ul>
            <li><a href="add_facility.php">افزودن امکانات</a></li>
            <li><a href="book_facility.php">رزرو امکانات</a></li>
            <li><a href="view_facility.php">مشاهده امکانات</a></li>
            <li><a href="view_bookings_facility.php">مشاهده رزروها</a></li>
        </ul>

        <h2>ثبت و مدیریت تابلو اعلانات</h2>
        <ul>
            <li><a href="add_notice.php">ارسال اطلاعیه</a></li>
            <li><a href="view_notices.php">مشاهده اطلاعیه‌ها</a></li>
        </ul>

        <h2>ثبت و مدیریت درخواست‌ها</h2>
        <ul>
            <li><a href="add_request.php">ثبت درخواست</a></li>
            <li><a href="view_requests.php">مشاهده درخواست‌ها</a></li>
        </ul>

        <h2>ثبت و مدیریت قرار ملاقات‌ها</h2>
        <ul>
            <li><a href="add_visitor.php">ثبت بازدیدکننده</a></li>
            <li><a href="view_visitors.php">مشاهده بازدیدکننده‌ها</a></li>
        </ul>

        <h2>ثبت و مدیریت پرداخت‌ها</h2>
        <ul>
            <li><a href="add_payment.php">افزودن پرداخت</a></li>
            <li><a href="view_payments.php">مشاهده پرداختها</a></li>
        </ul>

        <h2>خروج</h2>
        <ul>
            <li><a href="logout.php">خروج</a></li>
        </ul>
    </nav>
