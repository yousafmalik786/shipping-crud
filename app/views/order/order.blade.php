@include('common.header');
<div class="container">
    <div class="row ">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h2>Ship From :</h2>
            <h4><strong>{{$order->sf_first_name}} {{ $order->sf_last_name }}</strong></h4>
            <h4>{{ $order->sf_address }}</h4>
            <h4>{{ $order->sf_country }}</h4>
            <h4><strong>Email: </strong>{{ $order->sf_email }}</h4>
            <h4><strong>Phone: </strong>{{ $order->sf_phone_no }}</h4>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h2>Ship To :</h2>
            <h4><strong>{{ $order->st_first_name }} {{ $order->st_last_name }}</strong></h4>
            <h4>{{ $order->st_address }}</h4>
            <h4>{{ $order->st_country }}</h4>
            <h4><strong>Email: </strong>{{ $order->st_email }}</h4>
            <h4><strong>Phone: </strong>{{ $order->st_phone_no }}</h4>
        </div>
    </div>
    <hr />
    <br />
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Reference No</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Charges</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $order->reference_no }}</td>
                        <td>{{ $order->i_name }}</td>
                        <td>{{ $order->i_description }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->charges }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Shipping Company :</h3>
            <h4><strong>{{ $order->c_company_name }}</strong></h4>
            <h5>{{ $order->c_address }}</h5>
            <h5><strong>Contact Person: </strong>{{ $order->c_contact_person }}</h5>
            <h5><strong>Phone: </strong>{{ $order->c_contact_person_phone }}</h5>
        </div>
    </div>
</div>
@include('common.footer');

