@include('common.header');
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <h2>Shipping - Orders</h2>
        </div>
        <div class="col-xs-6">
            <h3 class="create-new"><a href="/orders/create">Create New</a></h3>
            <h3 class="logout"><a href="/logout">Log Out</a></h3>
        </div>
    </div>
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
                        <tr id="record_{{ $order->id }}">
                            <td>{{ $order->reference_no }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->description }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->charges }}</td>
                            <td>{{ ($order->created_on)?date('m-d-Y',strtotime($order->created_on)):'' }}</td>
                            <td>
                                <a href="/order/{{ $order->id }}" title="view">&nbsp;<i class="fa fa-eye"></i></a>
                                <a href="/orders/update/{{ $order->id }}" title="update">&nbsp;&nbsp;<i class="fa fa-pencil-square-o"></i></a>
                                <a href="javascript:void(0)" title="delete" onclick="deleteOrder({{ $order->id }});">&nbsp; <i class="fa fa-times"></i></a>
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

<script type="text/javascript">
    function deleteOrder(id){
        if(confirm("Are you sure, you want to delete this record?") == true){
            $.ajax({
                url:'/orders/delete/'+id,
                method:'POST',
                success: function(response){
                    response = JSON.parse(response);
                    if(response.result == 'success'){
                        $('#record_'+id).remove();
                        alert('Record deleted successfully');
                    }else {
                        alert(response.errors);
                    }
                },
                error : function(error){
                    console.log(error);
                }

            });
        }

    }
</script>