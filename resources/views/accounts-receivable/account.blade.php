<x-app-layout>
    <x-slot:header>
        Account Receivables
    </x-slot:header>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Edit Account</h5>
            <div class="card-body">
                <form action="/accounts-receivable/account/edit/{{ $accounts->id }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control form-control-md" name="full_name" value="{{ $accounts->full_name }}" required>
                        <x-error name="full_name"/>
                        <div class="invalid-feedback">
                            Please provide a full name.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$accounts->email}}" required>
                        <x-error name="email"/>
                        <div class="invalid-feedback">
                            Please provide a email.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact No</label>
                        <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{$accounts->contact_no}}" required>
                        <x-error name="contact_no"/>
                        <div class="invalid-feedback">
                            Please provide a contact number.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required>{{$accounts->address}}</textarea>
                        <x-error name="address"/>
                        <div class="invalid-feedback">
                            Please provide a address.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                            <button form="delete-account" type="button" class="btn btn-space btn-danger">Delete</button>
                        </div>
                        <div class="col-sm-6 pl-0">
                            <p class="text-right">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                <a href="/accounts-receivables" class="btn btn-space btn-light">Cancel</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <form action="/accounts-receivable/account/{{$accounts->id}}" method="POST" id="delete-account">
        @csrf
        @method('DELETE')
    </form>

</x-app-layout>
