@extends('layout')
@section('content')

<h3> Edit Student </h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="form-group">
    <label for="name">Name: </label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $student->name) }}" />
</div>

<div class="form-group">
    <label for="email">Email: </label>
    <input type="text" class="form-control" name="email" value="{{ old('email', $student->email) }}" />
</div>

<div class="form-group">
    <label for="phone">Phone: </label>
    <input type="text" class="form-control" name="phone" value="{{ old('phone', $student->phone) }}" />
</div>

<div class="form-group">
    <label for="section">Section: </label>
    <input type="text" class="form-control" name="section" value="{{ old('section', $student->section) }}" />
</div>

<div class="form-group">
    <label>Current image: </label><br>
    <img src="/image/{{ $student->image }}" width="96" height="96" />
</div>

<div class="form-group">
    <label for="image">New image (optional): </label>
    <input type="file" class="form-control" name="image" />
</div>

<button type="submit" class="btn btn-primary"> Update Student </button>
<a href="{{ route('students.index') }}" class="btn btn-secondary"> Cancel </a>
</form>

@endsection
