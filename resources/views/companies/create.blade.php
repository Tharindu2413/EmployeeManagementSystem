@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Company</h1>
    <form method="POST" action="{{ route('companies.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Company Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Company Description:</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
