@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="company_id">Select Company</label>
            <select class="form-control" id="company_id" name="company_id" required>
                <option value="">Select Company</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" name="position" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Create Employee</button>
    </form>
</div>
@endsection
