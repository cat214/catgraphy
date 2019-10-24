@if(session('message'))
<div class="message">
    {{ session('message')}}
</div>
@endif


@if(session('error'))
<div class="message">
    {{ session('error')}}
</div>
@endif


@if(session('success'))
<div class="message">
    {{ session('success')}}
</div>
@endif