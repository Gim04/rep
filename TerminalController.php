<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Container;
use App\Models\Shelf;
use App\Models\Terminal;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTerminalRequest;
use App\Http\Requests\Admin\UpdateTerminalRequest;
class TerminalController extends Controller
{
    function __construct()
    {
        $this->middleware('can:terminal list', ['only' => ['index', 'show']]);
        $this->middleware('can:terminal create', ['only' => ['create', 'store']]);
        $this->middleware('can:terminal edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:terminal delete', ['only' => ['destroy']]);
    }

    public function index(Manufacturer $manufacturers)
    {
        $terminals = (new Terminal)->newQuery();

        if (request()->has('search')) {
            $terminals->where('model', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $terminals->orderBy($attribute, $sort_order);
        } else {
            $terminals->latest();
        }

        $terminals = $terminals->paginate(5);

        return view('items.terminal.index', compact('terminals', 'manufacturers'));
    }   
    
    public function create(Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        $position = ['Shelf', 'Container'];
        return view('items.terminal.create', compact('position', 'manufacturers', 'containers', 'shelves'));
    }
   
    public function store(StoreTerminalRequest $request)
    {

        $input = $request->all();

        if ($icon = $request->file('icon')) {
            $destinationPath = 'photo/';
            $productImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $productImage);
            $input['icon'] = "photo/$productImage";
        } 

        Terminal::create($input);
    
        return redirect()->route('terminal.index')
                        ->with('message', 'Terminal created successfully.');
    }   

    public function show(Terminal $terminal)
    {
        return view('items.terminal.show',compact('terminal'));
    }

    public function edit(Terminal $terminal, Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        return view('items.terminal.edit',compact('terminal', 'manufacturers', 'containers', 'shelves'));
    }  

    public function update(UpdateTerminalRequest $request, Terminal $terminal)
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

        $terminal->update($input);

        return redirect()->route('terminal.index')
                        ->with('message', 'terminal updated successfully.');
    }   

    public function destroy(Terminal $terminal)
    {
        $terminal->delete();
        return redirect()->route('terminal.index')
                        ->with('message', __('Terminal deleted successfully'));
    }
}
