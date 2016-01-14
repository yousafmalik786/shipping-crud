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
                    <tr>
                        <td>SPR-145</td>
                        <td>Argentina</td>
                        <td>Spanish (official), English, Italian, German, French</td>
                        <td>1</td>
                        <td>31.3</td>
                        <td>10-08-2014</td>
                        <td>
                            <a href="/order/1">&nbsp;<i class="fa fa-eye"></i></a>
                            <a href="/order/update/1">&nbsp;&nbsp;<i class="fa fa-pencil-square-o"></i></a>
                            <a href="javascript:void(0)" onclick="deleteOrder(1);">&nbsp; <i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div><!--end of .table-responsive-->
        </div>
    </div>
</div>
@include('common.footer');
