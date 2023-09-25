@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Company: {{ $company->name }}</h1>
    <form method="POST" action="{{ route('companies.update', $company->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Company Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <input type="text" name="description" class="form-control" value="{{ $company->description }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
