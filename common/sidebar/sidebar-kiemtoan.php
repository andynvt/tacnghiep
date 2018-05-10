<ul class="nav" id="sidebar-kiemtoan">
    <li class="nav-item">
        <a class="nav-link" href="../kiem-toan/index.php?menu=1&page=1">
            <i class="material-icons">attach_money</i>
            <p>Quản lý phí thu</p>
        </a>
    </li> <li class="nav-item">
        <a class="nav-link" href="../kiem-toan/index.php?menu=2&page=1">
            <i class="material-icons">attach_money</i>
            <p>Quản lý phí chi</p>
        </a>
    </li>
    <li class="nav-item active-pro">
        <a class="nav-link" href="../kiem-toan/index.php?menu=0">
            <i class="material-icons">account_circle</i>
            <?php
            $user = $_SESSION["user"];
            $username = $user["emp_name"]
            ?>
            <p><?= $username ?></p>
        </a>
    </li>
</ul>
