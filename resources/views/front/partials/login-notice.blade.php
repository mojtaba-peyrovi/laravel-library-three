<style type="text/css">
	.lead{
        color: white;
        font-size: 12px;
    }
    .login-notice {
    	background-color:rgba(255, 80, 80,0.8)
    }
</style>
@if(! Auth::check())
<nav class="navbar navbar-expand-lg login-notice">
    <div class="lead">
        You are not logged in yet. if you want to enjoy full website functionality, please login or register as a new user, thank you!

    </div>
</nav>
@endif
