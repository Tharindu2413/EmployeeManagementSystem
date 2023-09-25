@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Company Details: {{ $company->name }}</h1>
    <ul>
        <li><strong>Name:</strong> {{ $company->name }}</li>
        <li><strong>Owner:</strong> {{ $company->owner->name }}</li>
        <li><strong>Description:</strong> {{ $company->description }}</li>
    </ul>
    <a class="btn btn-primary" href="{{ route('companies.index') }}">Back</a>
</div>
@endsection
