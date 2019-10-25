@if(session('message'))
<div class="alert alert-info alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button>
    {{ session('message')}}
</div>
@endif


@if(session('error'))
<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button>
    {{ session('error')}}
</div>
@endif


@if(session('success'))
<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button>
    {{ session('success')}}
</div>
@endif