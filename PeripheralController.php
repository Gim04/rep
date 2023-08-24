<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Container;
use App\Models\Shelf;
use App\Models\Peripheral;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePeripheralRequest;
use App\Http\Requests\Admin\UpdatePeripheralRequest;

class PeripheralController extends Controller
{
    function __construct()
    {
        $this->middleware('can:peripheral list', ['only' => ['index', 'show']]);
        $this->middleware('can:peripheral create', ['only' => ['create', 'store']]);
        $this->middleware('can:peripheral edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:peripheral delete', ['only' => ['destroy']]);
    }

    public function index(Manufacturer $manufacturers)
    {
        $peripherals = (new Peripheral)->newQuery();

        if (request()->has('search')) {
            $peripherals->where('model', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $peripherals->orderBy($attribute, $sort_order);
        } else {
            $peripherals->latest();
        }

        $peripherals = $peripherals->paginate(5);

        return view('items.peripheral.index', compact('peripherals', 'manufacturers'));
    }   
    
    public function create(Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        $position = ['Shelf', 'Container'];
        return view('items.peripheral.create', compact('position', 'manufacturers', 'containers', 'shelves'));
    }
   
    public function store(StorePeripheralRequest $request)
    {

        $input = $request->all();

        if ($icon = $request->file('icon')) {
            $destinationPath = 'photo/';
            $productImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $productImage);
            $input['icon'] = "photo/$productImage";
        } 

        Peripheral::create($input);
    
        return redirect()->route('peripheral.index')
                        ->with('message', 'Peripheral created successfully.');
    }   

    public function show(Peripheral $peripheral)
    {
        return view('items.peripheral.show',compact('peripheral'));
    }

    public function edit(Peripheral $peripheral, Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        return view('items.peripheral.edit',compact('peripheral', 'manufacturers', 'containers', 'shelves'));
    }  

    public function update(UpdatePeripheralRequest $request, Peripheral $peripheral)
    {

        $input = $request->all();  

        if ($icon = $request->file('icon')) {
            $destinationPath = 'photo/';
            $productImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $productImage);
            $input['icon'] = "photo/$productImage";
        }else{
            unset($input['image']);
        } 

        $peripheral->update($input);

        return redirect()->route('peripheral.index')
                        ->with('message', 'peripheral updated successfully.');
    }   

    public function destroy(Peripheral $peripheral)
    {
        $peripheral->delete();
        return redirect()->route('peripheral.index')
                        ->with('message', __('Peripheral deleted successfully'));
    }
}
