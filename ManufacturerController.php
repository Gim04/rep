<?php 
namespace App\Http\Controllers;  

use App\Models\Country;
use App\Models\Manufacturer;
use App\Models\Computer;
use App\Models\Keyboard;
use App\Models\Monitor;
use App\Models\Joystick;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreManufacturerRequest;
use App\Http\Requests\Admin\UpdateManufacturerRequest;

class ManufacturerController extends Controller
{ 
    function __construct()
    {
        $this->middleware('can:manufacturer list', ['only' => ['index', 'show']]);
        $this->middleware('can:manufacturer create', ['only' => ['create', 'store']]);
        $this->middleware('can:manufacturer edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:manufacturer delete', ['only' => ['destroy']]);
    }

    public function index(Manufacturer $manufacturers, Monitor $monitors, Joystick $joysticks)
    {
        $manufacturers = (new Manufacturer)->newQuery();
        $computers = (new Computer)->newQuery(); 
        $keyboards = (new Keyboard)->newQuery(); 

        if (request()->has('search')) {
            $manufacturers->where('model', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $manufacturers->orderBy($attribute, $sort_order);
        } else {
            $manufacturers->latest();
        }

        $manufacturers = $manufacturers->paginate(5);

        return view('items.manufacturer.index', compact('manufacturers','computers','keyboards'));
    }   
    
    public function create(Manufacturer $manufacturers, )
    {
        $position = ['Shelf', 'Container'];
        return view('manufacturer.create', compact('manufacturers', 'country'));
    }
   
    public function store(StoreManufacturerRequest $request)
    {
        Manufacturer::create($request->all());
    
        return redirect()->route('manufacturer.index')
                        ->with('message', 'Manufacturer created successfully.');
    }   

    public function show(Manufacturer $manufacturer)
    {
        $computers = (new Computer)->newQuery(); 
        $keyboards = (new Keyboard)->newQuery(); 
        return view('items.manufacturer.show',compact('manufacturer','computers','keyboards'));
    }

    public function edit(Manufacturer $manufacturer, Country $country)
    {
        return view('manufacturer.edit',compact('manufacturer', 'country'));
    }  

    public function update(UpdateManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer->update($request->all());

        return redirect()->route('manufacturer.index')
                        ->with('message', 'Manufacturer updated successfully.');
    }   

    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();
        return redirect()->route('manufacturer.index')
                        ->with('message', __('Manufacturer deleted successfully'));
    }
}