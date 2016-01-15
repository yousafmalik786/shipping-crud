@include('common.header');
<div class="container login_container">

    <form id="login_form" class="login_form" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="email" class="sr-only">Email address</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required><br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
    <div class="alert alert-success" style="display: none"></div>
    <div class="alert alert-danger" style="display: none"></div>

</div> <!-- /container -->
@include('common.footer');

<script type="text/javascript">
    $('#login_form').on('submit',function(e){
        e.preventDefault();
        $('.login_container .alert-success').hide();
        $('.login_container .alert-danger').hide();
        var inputData = $(this).serialize();
        $.ajax({
            url:'/user/login',
            method:'POST',
            data :inputData,
            success: function(response){
                response = JSON.parse(response);
                if(response.result == 'success'){
                    $('.login_container .alert-success').text('Login successfull');
                    $('.login_container .alert-success').show();
                    setTimeout(function(){
                        window.location.href = '/orders';
                    },1500);
                }else {
                    $('.login_container .alert-danger').html(response.errors);
                    $('.login_container .alert-danger').show();
                }
            },
            error : function(error){
                console.log(error);
            }

        });
    });
</script>
