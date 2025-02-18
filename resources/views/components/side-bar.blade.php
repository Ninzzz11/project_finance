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
                                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard')}}" aria-expanded="false"><i class="fa-solid fa-chart-simple"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/accounts-payable" :active="request()->is('accounts-payable')" aria-expanded="false"><i class="fa-solid fa-money-check-dollar"></i>Accounts Payable</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/accounts-receivable" :active="request()->is('accounts-receivable')" aria-expanded="false"><i class="fa-solid fa-money-bills"></i>Accounts Receivable</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle {{ Request::is('collection*') ? 'active' : '' }}" href="#" role="button" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-boxes-stacked"></i> Collection
                                    </a>
                                    <x-sub-menu :active="Request::is('collectio*')" id="submenu-3">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link {{ Request::is('collection/payment-collection') ? 'active' : '' }}" href="{{ route('payment-collection') }}">Payment Collection</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ Request::is('collection/payment-records') ? 'active' : '' }}" href="{{ route('payment-records') }}">Payment Records</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link">Payment Reminder</a>
                                            </li>
                                        </ul>
                                    </x-sub-menu>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/general-ledger" :active="request()->is('general-ledger')" aria-expanded="false"><i class="fa-solid fa-vault"></i>General Ledger</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/budget-management" :active="request()->is('budget-management')" aria-expanded="false"><i class="fa-solid fa-bars-progress"></i>Budget Management</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/payment-reminder" :active="request()->is('payment-reminder')" aria-expanded="false"><i class="fa-solid fa-envelope"></i>Payment Reminder</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
