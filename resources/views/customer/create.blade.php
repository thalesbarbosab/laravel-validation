@extends('layouts.app')
@section('title')
    <title>Customers</title>
@endsection
@section('body')
    <br>
    <div class="mb-3">
        <a href="{{route('customers.index')}}" class="btn btn-dark">return to all customers</a>
    </div>
    <h3>Create Customer</h3>
    <form action="{{route('customers.store')}}" method="POST">
        @method('POST')
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="ex. Paulo da Silva" value="{{old('name')}}">
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="ex. name@example.com"  value="{{old('email')}}">
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror" placeholder="ex. 118632112221"  value="{{old('cpf')}}">
            @if ($errors->has('cpf'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('cpf') }}</strong>
                </span>
            @endif
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-outline btn-primary" type="submit">Submit</button>
        </div>
    </form>
@endsection
