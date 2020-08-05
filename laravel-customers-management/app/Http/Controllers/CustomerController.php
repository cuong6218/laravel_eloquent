<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function getAll(){
//        $customers = Customer::all();
        $customers = Customer::select('*')->orderBy('id', 'desc')->get();
            return view('customers.list', compact('customers'));
        }
        public function showFormAdd(){
            return view('customers.add');
        }
        public function addCustomer(Request $request, Customer $customer){
            $customer->name = $request->name;
            $customer->dob = $request->dob;
            $customer->email = $request->email;
            $customer->save();
            return redirect()->route('customers.view');
        }
        public function deleteCustomer($id){
            Customer::destroy($id);
            return redirect()->route('customers.view');
        }
        public function showEditForm(){
        return view('customers.edit');
        }

    }

