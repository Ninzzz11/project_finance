<x-app-layout>
    <x-slot:header>
        Accounts Receivable
    </x-slot:header>
            <form method="POST" action="/accounts-receivable/{{ $view->id }}">
                @csrf
                @method('DELETE')
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header p-4">
                                <a class="pt-2 d-inline-block" href="#"><h2>Far East Cafe</h2></a>
                                <div class="float-right">
                                    <h3 class="mb-0">Invoice #{{ $view->invoice_no }}</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <h6 class="mb-2">Customer:</h6>
                                        <h3 class="text-dark mb-1">{{ $view->customer}}</h3>
                                    </div>
                                    @if(session()->has('success'))
                                    <div class="col-sm-6">
                                        <div class="alert alert-success" role="alert">
                                            <h5><i class="fa-solid fa-check-to-slot"></i>{{ session()->get('success') }}</h5>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row mb-4 p-0">
                                    <div class="col-xl">
                                        <div class="form-row">
                                            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label class="label1" for="terms">Terms</label>
                                                <h3 class="text-dark mb-1">{{ $view->terms }}</h3>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label class="label1" for="startdate">Invoice date</label>
                                                <h3 class="text-dark mb-1">{{ $view->start_date }}</h3>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label class="label1" for="deuDate">Due date</label>
                                                <h3 class="text-dark mb-1">{{ $view->due_date }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped" id="calculationTable">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th class="left w-50">Description</th>
                                                <th class="right">Unit Cost</th>
                                                <th class="center">Qty</th>
                                                <th class="right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr>
                                                <td class="center">2</td>
                                                <td class="left"><input class="form-control" type="text" value="Custom Services"></td>
                                                <td class="left"><input class="form-control" type="text" value="Instalation and Customization (cost per hour)"></td>
                                                <td class="right"><input class="form-control" type="text" value="$110,00"></td>
                                                <td class="center"><input class="form-control" type="text" value="20"></td>
                                                <td class="right">$22.000,00</td>
                                            </tr> --}}
                                            @foreach ($view->services as $service)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $service->description }}</td>
                                                <td>₱{{ $service->amount }}</td>
                                                <td>{{ $service->quantity }}</td>
                                                <td>₱{{ $service->total }}</td>
                                            </tr>
                                             @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5 ml-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">Total</strong>
                                                    </td>
                                                    <td class="right">
                                                        {{ $view->grand_total }}
                                                    </td>
                                                </tr>
                                                {{-- <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">VAT (10%)</strong>
                                                    </td>
                                                    <td class="right"></td>
                                                </tr> --}}
                                                {{-- <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">Total</strong>
                                                    </td>
                                                    <td class="right">
                                                        <strong class="text-dark"></strong>
                                                    </td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xl d-flex bd-highlight p-2">
                                    <div class="flex-grow-1 pl-2"><button class="btn btn-danger mr-2" type="submit">Delete</button></div>
                                    <div><a href="/accounts-receivable/edit/{{ $view->id }}" class="btn btn-primary1 mr-3 px-4">Edit</a></div>
                                    <div><a href="/accounts-receivable" class="btn btn-light">Go back</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <script src="{{ asset('assets/libs/js/invoice_create.js')}}"></script>

</x-app-layout>
