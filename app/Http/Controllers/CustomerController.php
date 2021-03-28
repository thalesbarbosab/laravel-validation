<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $customers =  $this->customer->all()->sortBy('name');
        return view('customer.index',['customers'=>$customers]);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(CustomerRequest $request)
    {
        $this->customer->create($request->all());
        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
        $customer =  $this->customer->findOrFail($id);
        return view('customer.edit',['customer'=>$customer]);
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = $this->customer->findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $customer = $this->customer->findOrFail($id);
        $customer->delete();
        return back();
    }
}
