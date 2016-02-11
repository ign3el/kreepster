@extends('master')
@section('title', 'Admins')

@section('content')


<body>
<section id="main" class="column">
<div class="table-responsive">
<button class="btn btn-lg btn-primary btn-block" onClick="location.href='/admin/register'">Register a New Admin</button>
<table class="table table-bordered table-striped table-condensed table-hover fsop" width="744">
{{Session::put('backUrl',Request::fullUrl())}}
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
@endif
</div>

</table>
</div>		
</section>
@endsection