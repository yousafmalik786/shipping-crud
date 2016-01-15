@include('common.header');
<div class="container">
    <h2>Shipping - Orders </h2>
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Order No</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Quanity</th>
                        <th>Charges</th>
                        <th>Created On</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($orders) > 0)
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->reference_no }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->description }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->charges }}</td>
                            <td>{{ ($order->created_on)?date('m-d-Y',strtotime($order->created_on)):'' }}</td>
                            <td>
                                <a href="/order/{{ $order->id }}">&nbsp;<i class="fa fa-eye"></i></a>
                                <a href="/order/update/{{ $order->id }}">&nbsp;&nbsp;<i class="fa fa-pencil-square-o"></i></a>
                                <a href="javascript:void(0)" onclick="deleteOrder({{ $order->id }});">&nbsp; <i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div><!--end of .table-responsive-->
        </div>
    </div>
</div>
@include('common.footer');
