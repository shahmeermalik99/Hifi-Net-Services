@extends('master1')
@section('content')
    <br>
    <br>
    <div class="container1">
        <center>
            <h1><b> HIFI NET SERVICES </b></h1>
            <p>Govt College Satellite Town Gujranwala</p>
            <h3><u> ONLINE PAYMENT </u></h3>
        </center>
    </div>
    <div class="container" style="padding-top: 22px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline9-list mt-b-30">
                <div class="sparkline9-hd">
                    <div class="main-sparkline9-hd">
                    </div>
                    <br>
                    <br>
                </div>
                <center>
                    <div class="sparkline9-graph">
                        <div class="static-table-list">
                            <div class="table-responsive">
                                {{-- <h4>I want to pay 768 USD</h4> --}}
                                {{-- <form method="post" action="{{ route('payment') }}">
                                    @csrf
                                    <input type="text" name="amount" id="amount">
                                    <div>
                                        <div id="paypal-button-container"></div>
                                    </div>
                                </form> --}}
                                <div class="form-group col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ Auth::user()->name }}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>PPPOE (Alloted User Name)</label>
                                    <input type="text" autofocus class="form-control" name="alloted_name"
                                        value="{{ Auth::user()->id . 'FF04S' }}" readonly>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="">Email </label>
                                    <input type="email" style="height: 30px;font-size:14px;width: 100%;" name="email"
                                        class="form-control" value="{{ Auth::user()->email }}" readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>CNIC Number</label>
                                    <input class="form-control" name="cnic" value="{{ Auth::user()->cnic }}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Contact Number</label>
                                    <input type="text" name="contact" class="form-control"
                                        value="{{ Auth::user()->contact }}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Total Balance</label>
                                    <input type="text" name="balance" id="balance" class="form-control"
                                        value="{{ $account->balance }}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="required">Paid Amount</label>
                                    <input type="number" name="amount" id="amount" class="form-control"
                                        placeholder="Enter Amount" onchange=" getbalance();" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="required">New Balance</label>
                                    <input id="total_balance" name="total_balance" class="form-control" onchange="getbalance();" readonly>
                                </div>
                                <br><br><br>
                                <div>
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>

            </div>
        </div>
    </div>
    <script
        src="https://www.paypal.com/sdk/js?client-id=AacSC55rZReivUoHpvstAVKwm-cc_97OEC3b0LRns3XDhtASngHHHjRbyNDWiE0ij-LOCKNMuUvGya43&currency=USD">
    </script>
    <script>

        paypal.Buttons({
            // onClick is called when the button is clicked
            // onClick: function() {

            //     // Show a validation error if the checkbox is not checked

            //         this.set('amount' , document.getElementById('amount').value);

            // },

            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: document.getElementById('amount')
                                .value // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    if (transaction.status == "COMPLETED") {
                        // return route('transcation' , transaction.id);
                        // alert(`Transaction ${transaction.status}: ${transaction.id}`);
                        $.ajax({
                            url: "{{ route('transcation') }}",
                            type: "POST",
                            data: {
                                id: `${transaction.id}`,
                                amount: document.getElementById('amount').value,
                                balance: document.getElementById('total_balance').value,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(result) {
                                if (response.status == 200) {
                                    alert(`Transaction ${transaction.status}: ${transaction.id}`);
                                }
                            }
                        });

                    }

                });
            }
        }).render('#paypal-button-container');
    </script>

    <script>
        getbalance = function() {
            var num1 = Number(document.getElementById('balance').value);
            var num2 = Number(document.getElementById('amount').value);

            num3 = num1 - num2;
            document.getElementById('total_balance').value = num3;

        }
    </script>
@endsection
