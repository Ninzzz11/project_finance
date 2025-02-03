<x-app-layout>
    <x-slot:header>
        Account Settings
    </x-slot:header>

    <div class="row">

        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row align-items-center">
                        <img src="{{ asset('assets/images/profile.jpg') }}" alt="user-profile" class="img-thumbnail rounded-circle" width="80" height="80">
                        <div class="d-flex flex-column ml-3">
                            <h3 class="card-title mb-1">{{ Auth::User()->username }}</h3>
                            <p class="card-text">{{ Auth::User()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
