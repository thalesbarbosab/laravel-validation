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
    <form action="{{route('customers.update',$customer->id)}}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{$customer->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="ex. Paulo da Silva" value="{{$customer->name}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="text" name="email" class="form-control" placeholder="ex. name@example.com" value="{{$customer->email}}">
        </div>
        <div class="mb-3">
            <label class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" placeholder="ex. 118632112221" value="{{$customer->cpf}}">
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-outline btn-primary" type="submit">Submit</button>
        </div>
    </form>
@endsection
