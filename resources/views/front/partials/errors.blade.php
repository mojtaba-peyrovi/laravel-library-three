<style media="screen">
    .error {
        width: 20%;
        position: fixed;
        top: 150px;
        right: 20px;
        z-index: 10;
        background: rgb(255, 128, 128);
        color: black;
        opacity: 0.6;
        text-align: center;
        padding: 15px;
        border-radius: 5px;
    }
</style>
@if ($errors->any())
    <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
            <li class="error">
                <i class="fa fa-times-circle" aria-hidden="true" style="margin-top:5px; margin-bottom:-5px;"></i>
                {{ $error }}
            </li>
        @endforeach
    </ul>
@endif
