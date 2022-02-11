 @extends('include.master')

@section('content')
<div class="container mt-5 mb-5">
    <div class="flex-boxs">
        <div class="items" style="background-image: url({{asset('staticimg/download.jpg')}})">
           <p>Number of {{$user}}users has Registered </p>
        </div>

        <div class="items" style="background-image: url({{asset('staticimg/download2.jpg')}})">
            <p>The number of {{$cus}} Customers banking with us</p>

        </div>
        <div class="items" style="background-image: url({{asset('staticimg/color-chart-graphic-design-pantone-png-favpng-VF8iNMaHnQ9RBtEygp7uAZEGV.jpg')}})">
            <p>The amount of <b>${{$total}}</b> is currently avialable</p>
        </div>

        <div class="items" style="background-image: url({{asset('staticimg/images1.jpg')}})">
            <p>The amount of <b>${{$w}}</b> has been withdran</p>
        </div>
        <div class="items" style="background-image: url({{asset('staticimg/world.jpg')}})">
            <p>The amount of <b>${{$dep}}</b> has been deposited so far</p>
        </div>
        <div class="items" style="background-image: url({{asset('staticimg/preview.jpg')}})">
            <p>The amount of <b>${{$transfer}}</b> has been transfered so far</p>
        </div>

        </div>
</div>
@endsection
