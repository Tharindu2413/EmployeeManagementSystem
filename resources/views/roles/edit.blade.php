@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Add New User Role</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible alert-alt fade show" role="alert">
                                <strong>Error!</strong> Please Check your inputs.
                            </div>
                        @endif

                        {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                        <div class="mb-3">
                            <label for="name" class="form-label"><strong>Name:</strong></label>
                            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                        </div>
                        <div class="mb-3">
                            <label for="permission" class="form-label"><strong>Permission:</strong></label>
                            <br />
                            <ul class="list-group">
                                @foreach ($permission as $value)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'form-check-input']) }}
                                            <label class="form-check-label">
                                                {{ $value->name }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
