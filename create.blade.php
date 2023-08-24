<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Computers') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('computer.index')}}" title="{{ __('Add Computer') }}">{{ __('<< Back to Computers') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" action="{{ route('computer.store') }}" enctype="multipart/form-data">
        @csrf

            <div class="py-2">
                <x-admin.form.label for="icon" class="{{$errors->has('icon') ? 'text-red-400' : ''}}">{{ __('Icon') }}</x-admin.form.label>

                    <x-admin.form.input id="icon" class="{{$errors->has('icon') ? 'border-red-400' : ''}}"
                        type="file"
                        name="icon"
                        value="{{ old('icon') }}"
                        />
            </div>  

            <div class="py-2">
            <x-admin.form.label for="model" class="{{$errors->has('model') ? 'text-red-400' : ''}}">{{ __('Model') }}</x-admin.form.label>

            <x-admin.form.input id="model" class="{{$errors->has('model') ? 'border-red-400' : ''}}"
                                type="text"
                                name="model"
                                value="{{ old('model') }}"
                                />
            </div>

            <div class="py-2">
            <x-admin.form.label for="submodel" class="{{$errors->has('submodel') ? 'text-red-400' : ''}}">{{ __('Submodel') }}</x-admin.form.label>

            <x-admin.form.input id="submodel" class="{{$errors->has('submodel') ? 'border-red-400' : ''}}"
                                type="text"
                                name="submodel"
                                value="{{ old('submodel') }}"
                                />
            </div>

            <div class="py">
                <x-admin.form.label for="manufacturer_id" class="{{$errors->has('manufacturer_id') ? 'text-red-400' : ''}}">{{ __('Manifacturer') }}</x-admin.form.label>

                <select name="manufacturer_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                    <option value="" disabled selected>Please select a Manufacturer</option>
                    @foreach ($manufacturers->all() as $manufacturer)
                    <option value="{{$manufacturer->id}}">
                        {!! $manufacturer->name !!}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="py-2">
            <x-admin.form.label for="year" class="{{$errors->has('year') ? 'text-red-400' : ''}}">{{ __('Year') }}</x-admin.form.label>

            <x-admin.form.input id="year" class="{{$errors->has('year') ? 'border-red-400' : ''}}"
                                type="text"
                                name="year"
                                value="{{ old('year') }}"
                                />
            </div>

            <div class="py-2">
            <x-admin.form.label for="serial_number" class="{{$errors->has('model') ? 'text-red-400' : ''}}">{{ __('Serial Number') }}</x-admin.form.label>

            <x-admin.form.input id="serial_number" class="{{$errors->has('serial_number') ? 'border-red-400' : ''}}"
                                type="text"
                                name="serial_number"
                                value="{{ old('serial_number') }}"
                                />
            </div>

            <div class="py-2">
            <x-admin.form.label for="processor" class="{{$errors->has('processor') ? 'text-red-400' : ''}}">{{ __('Processor') }}</x-admin.form.label>

            <x-admin.form.input id="processor" class="{{$errors->has('processor') ? 'border-red-400' : ''}}"
                                type="text"
                                name="processor"
                                value="{{ old('processor') }}"
                                />
            </div>

            <div class="py-2">
        <x-admin.form.label for="power_type" class="{{$errors->has('power_type') ? 'text-red-400' : ''}}">{{ __('Power Type') }}</x-admin.form.label>

        <x-admin.form.input id="power_type" class="{{$errors->has('power_type') ? 'border-red-400' : ''}}"
                            type="text"
                            name="power_type"
                            value="{{ old('power_type') }}"
                            />
        </div>

        <div class="py-2">
        <x-admin.form.label for="power_rating" class="{{$errors->has('power_rating') ? 'text-red-400' : ''}}">{{ __('Power Rating') }}</x-admin.form.label>

        <x-admin.form.input id="power_rating" class="{{$errors->has('power_rating') ? 'border-red-400' : ''}}"
                            type="text"
                            name="power_rating"
                            value="{{ old('power_rating') }}"
                            />
        </div>

            <div class="py-2">
            <x-admin.form.label for="speed" class="{{$errors->has('speed') ? 'text-red-400' : ''}}">{{ __('Speed') }}</x-admin.form.label>

            <x-admin.form.input id="speed" class="{{$errors->has('speed') ? 'border-red-400' : ''}}"
                                type="text"
                                name="speed"
                                value="{{ old('speed') }}"
                                />
            </div>

            <div class="py-2">
            <x-admin.form.label for="bit" class="{{$errors->has('bit') ? 'text-red-400' : ''}}">{{ __('Bits') }}</x-admin.form.label>

            <x-admin.form.input id="bit" class="{{$errors->has('bit') ? 'border-red-400' : ''}}"
                                type="text"
                                name="bit"
                                value="{{ old('bit') }}"
                                />
            </div>

            
            <div class="py-2">
            <x-admin.form.label for="keyboard" class="{{$errors->has('keyboard') ? 'text-red-400' : ''}}">{{ __('keyboard') }}</x-admin.form.label>
            <x-admin.form.input id="keyboard" class="{{$errors->has('keyboard') ? 'border-red-400' : ''}}"
                                type="text"
                                name="keyboard"
                                value="{{ old('keyboard') }}"
                                />
            </div>

            <div class="py-2">
            <x-admin.form.label for="monitor" class="{{$errors->has('monitor') ? 'text-red-400' : ''}}">{{ __('monitor') }}</x-admin.form.label>

            <x-admin.form.input id="monitor" class="{{$errors->has('monitor') ? 'border-red-400' : ''}}"
                                type="text"
                                name="monitor"
                                value="{{ old('monitor') }}"
                                />
            </div>


            <div class="py-2">
            <x-admin.form.label for="description" class="{{$errors->has('description') ? 'text-red-400' : ''}}">{{ __('Description') }}</x-admin.form.label>

            <x-admin.form.input id="description" class="{{$errors->has('description') ? 'border-red-400' : ''}}"
                                type="text"
                                name="description"
                                value="{{ old('description') }}"
                                />
            </div>

            <div class="py-2">
            <x-admin.form.label for="inventory_number" class="{{$errors->has('inventory_number') ? 'text-red-400' : ''}}">{{ __('Inventory Number') }}</x-admin.form.label>

            <x-admin.form.input id="inventory_number" class="{{$errors->has('inventory_number') ? 'border-red-400' : ''}}"
                                type="text"
                                name="inventory_number"
                                value="{{ old('inventory_number') }}"
                                />
            </div>

            <div class="py-2">
                <label for="bool_position" class="inline-flex items-center">
                    <select id="bool_position" name="bool_position" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                        <option value="" disabled selected>Please select the position</option>
                        <option value="1">Container</option>
                        <option value="0">Shelf</option>
                    </select>

                </label>
            </div>

            <div class="py-2">
                <x-admin.form.label for="position_id" class="{{$errors->has('position_id') ? 'text-red-400' : ''}}">{{ __('Position Code') }}</x-admin.form.label>

                <select id="position_select" name="position_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                    <option value="" disabled selected>Please select the position</option>
                </select>
            </div>

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Create') }}</x-admin.form.button>
            </div>

            <script type = "text/javascript">
                @php
                    $host = 'localhost';
                    $username = 'root';
                    $password = '';
                    $database = 'my_app';

                    $conn = new mysqli($host, $username, $password, $database);
                
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $sql = "SELECT id, code FROM containers";
                    $result = $conn->query($sql);

                    $containers = array();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $containers[] = $row;
                        }
                    }

                    $sql2 = "SELECT id, code FROM shelves";
                    $result = $conn->query($sql2);

                    $shelves = array();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $shelves[] = $row;
                        }
                    }

                    $conn->close();
                @endphp
                
                const shelves = @php echo json_encode($shelves); @endphp;
                const containers = @php echo json_encode($containers); @endphp;
                document.addEventListener('DOMContentLoaded', function () {
                    const position = document.getElementById('bool_position');
                    const positionSelect = document.getElementById('position_select');
                    var option = document.createElement("option");
                    
                                    
                        
                    position.addEventListener('change', function () {
                        positionSelect.innerHTML = '<option value="" disabled selected>Please select the position code</option>';
                        if (position.value == 0) {
                            shelves.forEach(element => {
                                var option = document.createElement("option");
                                option.value = element.id;
                                option.text = element.code;
                                positionSelect.appendChild(option);
                            });
                        };
                        if (position.value == 1) {
                            containers.forEach(element => {
                                var option = document.createElement("option");
                                option.value = element.id;
                                option.text = element.code;
                                positionSelect.appendChild(option);
                            });
                        };
                    });
                })
            </script>
        </form>
    </div>
</x-admin.wrapper>