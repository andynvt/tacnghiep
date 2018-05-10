<ul class="nav" id="sidebar-baomau">
    <li class="nav-item">
        <a class="nav-link" href="../bao-mau/index.php?menu=1&page=1">
            <i class="material-icons">person</i>
            <p>Quản lý học sinh</p>
        </a>
    </li>
    <li class="nav-item active-pro">
        <a class="nav-link" href="../bao-mau/index.php?menu=0">
            <i class="material-icons">account_circle</i>
            <?php
            $user = $_SESSION["user"];
            $username = $user["emp_name"]
            ?>
            <p><?= $username ?></p>
        </a>
    </li>
</ul>
