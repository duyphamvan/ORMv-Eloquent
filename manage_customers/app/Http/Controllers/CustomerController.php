<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCustomerRequest;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customers.list', compact('customers'));
    }

    public function  read($id)
    {
        $customer = Customer::where('id',$id)->first();
        return view('customers.read', compact('customer'));
    }

    public function create()
    {
       return view('customers.create');
    }
    public function store(FormCustomerRequest $request){
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->address = $request->input('address');
        $customer->save();
        Session::flash('success', 'Cập nhật khách hàng thành công');
        return redirect()->route('customers.index');
    }



    public function edit($id)
    {
        $customer = Customer::where('id',$id)->first();
        return view('customers.edit',compact('customer'));
    }

    public function update(Request $request,$id)
    {
        $cutomer = Customer::where('id',$id)->first();
        $cutomer->name = $request->input('name');
        $cutomer->phone = $request->input('phone');
        $cutomer->email = $request->input('email');
        $cutomer->address = $request->input('address');
        $cutomer->save();
        Session::flash('success', 'Cập nhật khách hàng thành công');
        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $customer = Customer::where('id',$id)->first();
        $customer->delete();
        Session::flash('success','Delete Success');
        return redirect()->route('customers.index');
    }

}
