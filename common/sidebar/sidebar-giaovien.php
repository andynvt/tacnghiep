<ul class="nav" id="sidebar-giaovien">
    <li class="nav-item">
        <a class="nav-link" href="../giao-vien/index.php?menu=1&page=1">
            <i class="material-icons">face</i>
            <p>Học Sinh</p>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../giao-vien/index.php?menu=2&page=1">
            <i class="material-icons">face</i>
            <p>Lịch sử chuyển lớp</p>
        </a>
    </li>
    <li class="nav-item active-pro">
        <a class="nav-link" href="../giao-vien/index.php?menu=0">
            <i class="material-icons">account_circle</i>
            <?php
            $user = $_SESSION["user"];
            $username = $user["emp_name"]
            ?>
            <p><?= $username ?></p>
        </a>
    </li>
</ul>