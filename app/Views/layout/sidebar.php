<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <?php
        $uri = new \CodeIgniter\HTTP\URI(current_url());
        if ($_SERVER['SERVER_NAME'] == 'siap.bprshasanah.com') {
            $page = $uri->getSegment(1);
            $item = $uri->getSegment(2);
        } else {
            $page = $uri->getSegment(3);
            $item = $uri->getSegment(4);
        }
        ?>
        <li class="nav-item <?= in_array($page, ['admin/dashboard'])  ? "menu-open" : ""  ?>">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= in_array($page, ['dashboard'])  ? "active" : ""  ?>">
                <i class="fab fa-dashcube nav-icon"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item <?= in_array($page, ['aset', 'jenis'])  ? "menu-open" : ""  ?>">
            <a href="<?= base_url('admin/aset') ?>" class="nav-link <?= in_array($page, ['aset', 'jenis'])  ? "active" : ""  ?>">
                <i class="fas fa-shopping-cart nav-icon"></i>
                <p>Assets <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= base_url('admin/jenis/index') ?>" class="nav-link <?= in_array($item, ['index', 'create']) && $page == 'jenis'  ? "active" : ""  ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jenis Aset</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/aset/index') ?>" class="nav-link <?= in_array($item, ['index', 'create']) && $page == 'aset'  ? "active" : ""  ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Aset</p>
                    </a>
                </li>
            </ul>
        </li>
        <?php if ($user['user_role'] >= '99') : ?>
            <li class="nav-item <?= in_array($page, ['users'])  ? "menu-open" : ""  ?>">
                <a href="<?= base_url('admin/users') ?>" class="nav-link <?= in_array($page, ['users'])  ? "active" : ""  ?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Users <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('admin/users/create') ?>" class="nav-link <?= in_array($item, ['create']) && $page == 'users'  ? "active" : ""  ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Registrasi User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/users/index') ?>" class="nav-link <?= in_array($item, ['index']) && $page == 'users' ? "active" : ""  ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List User</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?= in_array($page, ['setting'])  ? "menu-open" : ""  ?>">
                <a href="<?= base_url('admin/setting') ?>" class="nav-link <?= in_array($page, ['setting'])  ? "active" : ""  ?>">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>Settings </p>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>