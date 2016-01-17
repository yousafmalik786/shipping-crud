@include('common.header');
<div class="container create_order_container">
    <h3>Update Order </h3>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <form id="orderUpdate" class="form-horizontal" role="form">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#shipFrom">
                                    Ship From</a>
                            </h4>
                        </div>
                        <div id="shipFrom" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="frist_name">First Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->sf_first_name}}" class="form-control" name="frist_name" id="frist_name" placeholder="Enter first name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="last_name">Last Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ $order->sf_last_name }}" class="form-control" name="last_name" id="last_name" placeholder="Enter last name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ $order->sf_email }}" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="phone_no">Phone No:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ $order->sf_phone_no }}" class="form-control" name="phone_no" id="phone_no" placeholder="Enter phone number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="address">Address:</label>
                                    <div class="col-sm-9">
                                        <textarea  class="form-control" id="address" name="address" placeholder="Address">{{ $order->sf_address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="city">City:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ $order->sf_city }}" class="form-control" name="city" id="city" placeholder="City">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="frist_name">Zip:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->sf_zip}}" class="form-control" name="zip" id="zip" placeholder="Zip code">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="country">Country:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ $order->sf_country }}"  class="form-control" name="country" id="country" placeholder="Country">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#shipTo">
                                    Ship To</a>
                            </h4>
                        </div>
                        <div id="shipTo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="frist_name">First Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->st_first_name}}" class="form-control" name="frist_name" id="frist_name" placeholder="Enter first name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="last_name">Last Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->st_last_name}}" class="form-control" name="last_name" id="last_name" placeholder="Enter last name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->st_email}}" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="phone_no">Phone No:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->st_phone_no}}" class="form-control" name="phone_no" id="phone_no" placeholder="Enter phone number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="address">Address:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="address" name="address" placeholder="Address">
                                            {{$order->st_address}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="city">City:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->st_city}}" class="form-control" name="city" id="city" placeholder="City">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="frist_name">Zip:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->st_zip}}"  class="form-control" name="zip" id="zip" placeholder="Zip code">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="country">Country:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->st_country}}" class="form-control" name="country" id="country" placeholder="Country">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#itemDetail">
                                    Item/Package Detail</a>
                            </h4>
                        </div>
                        <div id="itemDetail" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="name">Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->i_name}}" class="form-control" name="name" id="name" placeholder="Item name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="frist_name">Description:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->i_description}}" class="form-control" name="description" id="description" placeholder="Item description">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="frist_name">Charges:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->charges}}" class="form-control" name="charges" id="charges" placeholder="Cost / charges">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="frist_name">Quantity:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->quantity}}" class="form-control" name="quantity" id="quantity" placeholder="Quantity">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#companyInfo">
                                    Shipping Company</a>
                            </h4>
                        </div>
                        <div id="companyInfo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="company_name">Company Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->c_company_name}}" class="form-control" name="company_name" id="company_name" placeholder="Company name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="address">Address:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->c_address}}" class="form-control" name="address" id="address" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="contact_person">Contact Person:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->c_contact_person}}" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="contact_person_phone">Contact Person Phone:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$order->c_contact_person_phone}}" class="form-control" name="contact_person_phone" id="contact_person_phone" placeholder="Contact Person Phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-10">
                        <input type="hidden" id="order_id" name="order_id" value="{{$order->o_id}}" />
                        <button type="submit" class="btn btn-default">Update</button>
                    </div>
                </div>
            </form>
            <div class="alert alert-success" style="display: none"></div>
            <div class="alert alert-danger" style="display: none"></div>
        </div>
    </div>
</div>
@include('common.footer');

<script type="text/javascript">
    $('#orderUpdate').on('submit',function(e){
        e.preventDefault();
        //disable submit button
        $('#orderUpdate :submit').prop('disabled', true);
        $('.create_order_container .alert-success').hide();
        $('.create_order_container .alert-danger').hide();
        var shipFrom = $('#shipFrom input,textarea').serializeArray();
        shipFrom = JSON.stringify(shipFrom);
        var shipTo = $('#shipTo input,textarea').serializeArray();
        shipTo = JSON.stringify(shipTo);
        var itemDetail = $('#itemDetail input').serializeArray();
        itemDetail = JSON.stringify(itemDetail);
        var companyInfo = $('#companyInfo input').serializeArray();
        companyInfo = JSON.stringify(companyInfo);
        var order_id = $('#order_id').val();
        var data = "shipFrom="+shipFrom+"&shipTo="+shipTo;
        data += "&itemDetail="+itemDetail+"&companyInfo="+companyInfo;
        data += "&action=update&order_id="+order_id;
        $.ajax({
            url:'/orders/save',
            method:'POST',
            data :data,
            success: function(response){
                $('#orderUpdate :submit').prop('disabled', false);
                response = JSON.parse(response);
                if(response.result == 'success'){
                    $('.create_order_container .alert-success').text('Order updated created.');
                    $('.create_order_container .alert-success').show();
                    setTimeout(function(){
                        window.location.href = '/orders';
                    },1500);
                }else {
                    $('.create_order_container .alert-danger').html(response.errors);
                    $('.create_order_container .alert-danger').show();
                }
            },
            error : function(error){
                console.log(error);
            }

        });
    });
</script>
