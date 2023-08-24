<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Container;
use App\Models\Shelf;
use App\Models\Mouse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMouseRequest;
use App\Http\Requests\Admin\UpdateMouseRequest;

class MouseController extends Controller
{
    function __construct()
    {
        $this->middleware('can:mouse list', ['only' => ['index', 'show']]);
        $this->middleware('can:mouse create', ['only' => ['create', 'store']]);
        $this->middleware('can:mouse edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:mouse delete', ['only' => ['destroy']]);
    }

    public function index(Manufacturer $manufacturers)
    {
        $mice = (new Mouse)->newQuery();

        if (request()->has('search')) {
            $mice->where('model', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $mice->orderBy($attribute, $sort_order);
        } else {
            $mice->latest();
        }

        $mices = $mice->paginate(5);

        return view('items.mouse.index', compact('mice', 'manufacturers'));
    }   
    
    public function create(Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        $position = ['Shelf', 'Container'];
        return view('items.mouse.create', compact('position', 'manufacturers', 'containers', 'shelves'));
    }
   
    public function store(StoreMouseRequest $request)
    {

        $input = $request->all();

        if ($icon = $request->file('icon')) {
            $destinationPath = 'photo/';
            $productImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $productImage);
            $input['icon'] = "photo/$productImage";
        } 

        Mouse::create($input);
    
        return redirect()->route('mouse.index')
                        ->with('message', 'Mouse created successfully.');
    }   

    public function show(Mouse $mouse)
    {
        return view('items.mouse.show',compact('mouse'));
    }

    public function edit(Mouse $mouse, Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        return view('items.mouse.edit',compact('mouse', 'manufacturers', 'containers', 'shelves'));
    }  

    public function update(UpdateMouseRequest $request, Mouse $mouse)
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

        $mouse->update($input);

        return redirect()->route('mouse.index')
                        ->with('message', 'mouse updated successfully.');
    }   

    public function destroy(Mouse $mouse)
    {
        $mouse->delete();
        return redirect()->route('mouse.index')
                        ->with('message', __('Mouse deleted successfully'));
    }
}
