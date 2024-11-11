<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo me-3 ms-1">
                <img src="<?= base_url('assets/img/favicon/myplan3.png') ?>" alt="" style="width: 20px;">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder">MyPlan</span>
        </a>


        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->

        <li class="menu-item">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>


        <?php if (in_groups('admin') || in_groups('superadmin')) : ?>
            <li class="menu-item">
                <a href="/admin" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Analytics">User List</div>
                </a>
            </li>
        <?php endif; ?>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Transaksi</span></li>


        <li class="menu-item">
            <a href="/category" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category-alt"></i>
                <div data-i18n="Analytics">Kategori Transaksi</div>
            </a>
        </li>


        <li class="menu-item">
            <a href="/transaction" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer-alt"></i>
                <div data-i18n="Analytics">Transaksi</div>
            </a>
        </li>


        <li class="menu-item">
            <a href="/budget" class="menu-link">
                <i class="menu-icon tf-icons bx bx-wallet-alt"></i>
                <div data-i18n="Analytics">Budgets</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="/goal" class="menu-link">
                <i class="menu-icon tf-icons bx bx-up-arrow-circle "></i><!-- up-arrow-circle -->
                <div data-i18n="Analytics">Goals</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/report" class="menu-link">
                <i class="menu-icon tf-icons bx bx-notepad"></i>
                <div data-i18n="Analytics">Laporan</div>
            </a>
        </li>







        <!-- Logot -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Logout</span></li>

        <li class="menu-item">
            <a
                href="<?= base_url('logout') ?>"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Logout</div>
            </a>
        </li>
    </ul>
</aside>