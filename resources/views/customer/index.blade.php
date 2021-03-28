@extends('layouts.app')
@section('title')
    <title>Customers</title>
@endsection
@section('body')
    <br>
    <div class="mb-3">
        <a href="{{route('customers.index')}}" class="btn btn-dark">return to index</a>
        <a href="{{route('customers.create')}}" class="btn btn-primary">create new customer</a>
    </div>
    <h3>Customers</h3>
    <div class="mb-3">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">CPF</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @if(count($customers)==0)
                    <td colspan="5">There are no customers data, click on "create new customer" button to continue.</td>
                @else
                    @foreach ($customers as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->cpf}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <a href="{{route('customers.edit',$item->id)}}" class="btn btn-primary btn-outline btn-sm">edit</a>
                                <form method="POST" action="{{ route('customers.destroy', $item->id) }}" style="display: inline" onsubmit="return confirm('confirm delete this customer?');" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-outline btn-sm"><i class="far fa-trash-alt"></i>delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@endsection
