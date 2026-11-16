@extends('layout')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<h3> Add Student </h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
@csrf

<div class="form-group">
    <label for="name">Name: </label>
    <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
</div>

<div class="form-group">
    <label for="email">Email: </label>
    <input type="text" class="form-control" name="email" value="{{ old('email') }}" />
</div>

<div class="form-group">
    <label for="phone">Phone: </label>
    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" />
</div>

<div class="form-group">
    <label for="section">Section: </label>
    <input type="text" class="form-control" name="section" value="{{ old('section') }}" />
</div>

<div class="form-group">
    <label for="image">Image: </label>
    <input type="file" class="form-control" name="image" />
</div>

<button type="submit" class="btn btn-primary"> Add Student </button>
</form>

@endsection
