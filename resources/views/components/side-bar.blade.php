<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                                <li class="nav-divider">
                                    Menu
                                </li>
                                <li class="nav-item">
                                    <x-nav-link  href="/dashboard" :active="request()->is('dashboard')" aria-expanded="false"><i class="fa-solid fa-chart-simple"></i>Dashboard</x-nav-link>
                                </li>
                                <li class="nav-item">
                                    <x-nav-link  href="/accounts-payable" :active="request()->is('acounts-payable')" aria-expanded="false"><i class="fa-solid fa-money-check-dollar"></i>Accounts Payable</x-nav-link>
                                </li>
                                <li class="nav-item">
                                    <x-nav-link  href="/accounts-receivable" :active="request()->is('accounts-receivable')" aria-expanded="false"><i class="fa-solid fa-money-bills"></i>Accounts Receivable</x-nav-link>
                                </li>
                                <li class="nav-item">
                                    <x-nav-link  href="/general-ledger" :active="request()->is('general-ledger')" aria-expanded="false"><i class="fa-solid fa-vault"></i>General Ledger</x-nav-link>
                                </li>
                                <li class="nav-item">
                                    <x-nav-link  href="/budget-management" :active="request()->is('budget-management')" aria-expanded="false"><i class="fa-solid fa-bars-progress"></i>Budget Management</x-nav-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
