@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee List</h1>
    <a class="btn btn-primary" href="{{ route('employees.create') }}">Create Employee</a>
     <!-- row -->
     @if ($message = Session::get('deleted'))
     <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show" id="myAlert">
   
         Deleted! {{ $message }}.
     </div>
     @elseif ($message = Session::get('success'))
     <div class="alert alert-success solid alert-right-icon alert-dismissible fade show" id="myAlert">
         
         Success! {{ $message }}.
     </div>
     @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Company</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->company->name }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
