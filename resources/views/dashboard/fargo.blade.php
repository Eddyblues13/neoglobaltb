@include('dashboard.header')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        <b>Error!</b> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session('status'))
    <div class="alert alert-success" role="alert">
        <b>Success!</b> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container-fluid">
        <h2 class="text-black font-w600 mb-0 me-auto mb-2 pe-3">Wells Fargo Withdrawal</h2>

        <div class="row">
            <div class="col-xl-4">
                <div class="row">

                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Balance: {{Auth::user()->currency}}{{number_format($balance, 2, '.',
                            ',')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <p>You're about to transfer from your account's available balance via Wells Fargo. This
                                    action cannot be reversed. Please make sure your account information is accurate.
                                </p>
                                <div id="response_code"></div>
                                <form action="{{route('wellsfargo.transfer')}}" method="POST">
                                    @csrf
                                    <p id="server"></p>
                                    <div id="content-one">
                                        <div class="form-group mb-3">
                                            <label>Amount</label>
                                            <input id="wf_amount" type="number" name="amount" class="form-control"
                                                placeholder="Enter Amount" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Wells Fargo Account Email</label>
                                            <input id="wf_email" type="email" name="email" class="form-control"
                                                placeholder="{{Auth::user()->email}}" required>
                                        </div>
                                        <input type="hidden" name="method" value="wells_fargo">

                                        <button type="submit" class="btn btn-primary w-100">Proceed</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
@include('dashboard.footer')