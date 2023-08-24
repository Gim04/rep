@if (auth()->user()->is_admin)
<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Computers') }}
    </x-slot>

    <div class="d-print-none with-border">
        <x-admin.breadcrumb href="{{route('computer.index')}}" title="{{ __('View computer') }}">{{ __('<< Back to all computers') }}</x-admin.breadcrumb> 
    </div>
    <div class="w-full py-2">
        <div class="min-w-full border-b border-gray-200 shadow">
            <table class="table-fixed w-full text-sm">
                <tbody class="bg-white">
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Icon') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500"><img style="width: 100px" src="{{ asset($computer->icon) }}" alt="" class="image"></td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Model') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->model}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Submodel') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->submodel}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Manufacturer') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->manufacturers->name}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Year') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->year}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Serial Number') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->serial_number}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Processor') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->processor}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Power Type') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->power_type}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Power Rating') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->power_rating}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Speed') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->speed}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Bits') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->bit}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Keyboard') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->keyboard}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Monitor') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->monitor}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Description') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->description}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Inventory Number') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->inventory_number}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Position') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->bool_position ? 'Container' : 'Shelf'}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Position Code') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$computer->bool_position ? $computer->containers->code : $computer->shelves->code}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-admin.wrapper>
@else
<link rel="stylesheet" href="{{ asset('css/computerss.css') }}" />
<style>
  .footer-10 {
    position: relative!important;
  }
  .mt-6 {
  margin-top:0 !important;
  }
  .heading1 {
  font-size: 30px !important;
  }
  @media (max-width: 930px) {

  .header-102 {
    top: 65px;
  }

  .home {
    height: 1240px!important;
  }
  }
  @media (max-width: 1060px) {

  .column2 {
    display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: flex-start;
  top: 500px;
  position: absolute;
  }
  .content3 {
    display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: flex-start;
  position: absolute;
  left: 10;

  }

  .up{
  width: 40vw!important;
  }
  .do {
  position: relative;
  left:-80vw;
  top:300px;
  width: 40vw!important;

  }
  .placeholder-image {
  max-width: 646px!important;
  }
  .column7{
  width:100%;
  }

  }
</style>
<x-app-layout>

      <div class="header-102">
        <div class="container" style="max-width:100%;">
          <div class="column2">
            <div class="content3">
<div style="width: 24.5vw;" class="up">
<b class="heading1">Basic Info</b>
<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
              
              <div class="text1">
                <strong>Manufacturer: </strong> {{$computer->manufacturers->name}} <br>
                <strong>Model: </strong> {{$computer->model}} <br>
                <strong>Submodel: </strong> {{$computer->submodel}} <br>
                <strong>Year: </strong> {{$computer->year}} <br>
                <strong>Serial Number: </strong> {{$computer->serial_number}} <br>
              </div>
</div>
</div>
<div style="width: 24.5vw;" class="up">
              <b class="heading1">Additional</b>
<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
              <div class="text1">
                <strong>Power Type: </strong> {{$computer->power_type}} <br>
                <strong>Power Rating: </strong> {{$computer->power_rating}} <br>
                <strong>Speed: </strong> {{$computer->speed}} <br>
                <strong>Bits: </strong> {{$computer->bit}} <br>
                <strong>Description: </strong> {{$computer->description}} <br>
                <strong>Issues: </strong> 
              </div>
</div>
</div>
<div style="width: 24.5vw;" class="do">
              <b class="heading1">Position Info</b>
<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
              <div class="text1">
                <strong>Inventory Number: </strong> {{$computer->inventory_number}} <br>
                <strong>Position: </strong> {{$computer->bool_position ? 'Container' : 'Shelf'}} <br>
                <strong>Position Code: </strong> {{$computer->position_id}} <br>
              </div>
</div>
</div>
<div style="width: 24.5vw;" class="do">
              <b class="heading1">Has</b>
<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
              <div class="text1">
                <strong>Keyboard: </strong> {{$computer->keyboard}} <br>
                <strong>Monitor: </strong> {{$computer->monitor}} <br>
                <strong>Other Pheripherals: </strong> {{$computer->year}} <br>
              </div>
</div>
</div>
            </div>
          </div>
          <div class="column7">
            <img
              class="placeholder-image"
              alt=""
              src="{{ asset($computer->icon) }}"
            />

              <div class="content5">
                <div class="slider-buttons">
                  <div class="button8">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg>
                  </div>
                  <div class="button8">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
</svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
    <script type = "text/javascript">

      <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'my_app';

        $conn = new mysqli($host, $username, $password, $database);
      
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT id, item_id, path FROM images where category_id =0";

        $result = $conn->query($sql);
        $computers = array();

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $images[] = $row;
          }
        }

        $conn->close();
      ?>

      const images= <?php echo json_encode($images); ?>;


      document.addEventListener('DOMContentLoaded', function () {
      const button = document.querySelector('.button8');
      let i = 0;

        button.addEventListener('click', () => {
          if (i < images.length-1) {
            document.querySelector('.placeholder-image').src = `../${images[i].path}`;
            i++;
          }else {
            document.querySelector('.placeholder-image').src = `../${images[i].icon}`;
            i = 0;
          }
        });
      })
    </script>
@endif


