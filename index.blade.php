@if (auth()->user()->is_admin)
<x-admin.wrapper>
        <x-slot name="title">
            {{ __('Computers') }}
        </x-slot>

        @can('computer create')
        <x-admin.add-link href="{{ route('computer.create') }}">
            {{ __('Add Computer') }}
        </x-admin.add-link>
        @endcan

        <div class="py-2">
            <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
                <x-admin.grid.search action="{{ route('computer.index') }}" />
                <x-admin.grid.table>
                    <x-slot name="head">
                        <tr>
                            <x-admin.grid.th>
                                {{ __('Icon') }}
                            </x-admin.grid.th>
                            <x-admin.grid.th>
                                @include('admin.includes.sort-link', ['label' => 'Model', 'attribute' => 'model'])
                            </x-admin.grid.th> 
                            <x-admin.grid.th>
                                @include('admin.includes.sort-link', ['label' => 'Submodel', 'attribute' => 'submodel'])
                            </x-admin.grid.th>
                            <x-admin.grid.th>
                                @include('admin.includes.sort-link', ['label' => 'Manufacturer', 'attribute' => 'manufacturer_id'])
                            </x-admin.grid.th>
                            <x-admin.grid.th>
                                @include('admin.includes.sort-link', ['label' => 'Year', 'attribute' => 'Year'])
                            </x-admin.grid.th>
                            @canany(['computer edit', 'computer delete'])
                            <x-admin.grid.th>
                                {{ __('Actions') }}
                            </x-admin.grid.th>
                            @endcanany
                        </tr>
                    </x-slot>
                    <x-slot name="body">
                    @foreach($computers as $computer)
                        <tr>
                            <x-admin.grid.td>
                                <div class="text-sm text-gray-900">
                                    <a href="{{route('computer.show', $computer->id)}}" class="no-underline hover:underline text-cyan-600"><img style="width: 100px" src="{{ asset($computer->icon) }}" alt="" class="image"></a>
                                </div>
                            </x-admin.grid.td>
                            <x-admin.grid.td>
                                <div class="text-sm text-gray-900">
                                    <a href="{{route('computer.show', $computer->id)}}" class="no-underline hover:underline text-cyan-600">{{ $computer->model }}</a>
                                </div>
                            </x-admin.grid.td>
                            <x-admin.grid.td>
                                <div class="text-sm text-gray-900">
                                    <a href="{{route('computer.show', $computer->id)}}" class="no-underline hover:underline text-cyan-600">{{ $computer->submodel }}</a>
                                </div>
                            </x-admin.grid.td>
                            <x-admin.grid.td>
                                <div class="text-sm text-gray-900">
                                    <a href="{{route('computer.show', $computer->id)}}" class="no-underline hover:underline text-cyan-600">{{ $computer->manufacturers->name }}</a>
                                </div>
                            </x-admin.grid.td>
                            <x-admin.grid.td>
                                <div class="text-sm text-gray-900">
                                    <a href="{{route('computer.show', $computer->id)}}" class="no-underline hover:underline text-cyan-600">{{ $computer->year }}</a>
                                </div>
                            </x-admin.grid.td>
                            @canany(['computer edit', 'computer delete'])
                            <x-admin.grid.td>
                                <form action="{{ route('computer.destroy', $computer->id) }}" method="POST">
                                    <div class="flex">
                                        @can('computer edit')
                                        <a href="{{route('computer.edit', $computer->id)}}"  class="btn btn-square btn-ghost">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>
                                        @endcan

                                        @can('computer delete')
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-square btn-ghost" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                            </svg>
                                        </button>
                                        @endcan
                                    </div>
                                </form>
                            </x-admin.grid.td>
                            @endcanany
                        </tr>
                        @endforeach
                        @if($computers->isEmpty())
                            <tr>
                                <td colspan="2">
                                    <div class="flex flex-col justify-center items-center py-4 text-lg">
                                        {{ __('No Result Found') }}
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </x-slot>
                </x-admin.grid.table>
            </div>
            <div class="py-8">
                {{ $computers->appends(request()->query())->links() }}
            </div>
        </div>
    </x-admin.wrapper>
@else
<link rel="stylesheet" href="{{ asset('css/computersi.css') }}" />
<x-app-layout>
      <div class="product-2">
        <div class="title">
          <div class="section-title">
            <div class="content7">
              <b class="heading2">Computers</b>
            </div>
          </div>
          <div class="button5">
            <div class="button7">View all</div>
          </div>
        </div>
        <div class="content4">
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
        
        $sql = "SELECT id, year, model, submodel, icon, manufacturer_id FROM computers";
        $sql2 = "SELECT id, name FROM manufacturers";

        $result = $conn->query($sql);
        $computers = array();

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $computers[] = $row;
          }
        }
        
        $result2 = $conn->query($sql2);
        $manufacturers = array();

        if ($result2->num_rows > 0) {
          while ($row = $result2->fetch_assoc()) {
            $manufacturers[] = $row;
          }
        }

        $conn->close();
      ?>

      const computers = <?php echo json_encode($computers); ?>;
      const manufacturers = <?php echo json_encode($manufacturers); ?>;


      document.addEventListener('DOMContentLoaded', function () {

        let computerView = 12;
        let currentIndex = 0;
        let ViewAll = document.querySelector('.button5');
        const content4 = document.querySelector('.content4');

        function displayComputers() {
          let totalHeight = computerView * 143;
          document.querySelector('.product-2').style.height = `${totalHeight}px`;
          let height = 970 + totalHeight;
          document.querySelector('.home').style.height = `${height}px`
          let items = 4;

          if (window.matchMedia("(max-width: 1657px)").matches) {
            items = 3;
            document.querySelector('.content4').style.maxWidth = `1000px`;
            let totalHeight = computerView * 165;
            document.querySelector('.product-2').style.height = `${totalHeight}px`;
            let height = 1100 + totalHeight;
            document.querySelector('.home').style.height = `${height}px`
     
          }

          if (window.matchMedia("(max-width: 1112px)").matches) {
            items = 2;
            document.querySelector('.content4').style.maxWidth = `600px`;

            let totalHeight = computerView * 240;
            document.querySelector('.product-2').style.height = `${totalHeight}px`;
            let height = 1000 + totalHeight;
            document.querySelector('.home').style.height = `${height}px`
          }

          if (window.matchMedia("(max-width: 740px)").matches) {
            items = 1;
            document.querySelector('.content4').style.maxWidth = `300px`;
            let totalHeight = computerView * 445;
            document.querySelector('.product-2').style.height = `${totalHeight}px`;
            let height = 1000 + totalHeight;
            document.querySelector('.home').style.height = `${height}px`
          }

          for (let i = currentIndex; i <Math.ceil(computerView/items); i++) {
            const content5 = document.createElement('div');
            content5.classList.add('content5');
            content4.appendChild(content5);
            currentIndex = i*items;

            for (let i = currentIndex; i < Math.floor(currentIndex+items); i++) {
              const computer = computers[i];

              const product = document.createElement('div');
              product.classList.add('product');
              if (window.matchMedia("(max-width: 1112px)").matches) {
                product.style.width = "50%";
              }
              if (window.matchMedia("(max-width: 740px)").matches) {
                product.style.width = "100%";
              }

              const content3 = document.createElement('div');
              content3.classList.add('content3');

              const header1 = document.createElement('div');
              header1.classList.add('header1');

              const heading1 = document.createElement('div');
              heading1.classList.add('heading1');
              for (let j = currentIndex; j < manufacturers.length; j++) {
                const manufacturer = manufacturers[j];
                if (computer.manufacturer_id == manufacturer.id) {
                  heading1.textContent = manufacturer.name;
                }
              }

              
              const text1 = document.createElement('div');
              text1.classList.add('text1');
              text1.innerHTML = `<p> ${computer.model} ${computer.submodel}</p>`;

              const year = document.createElement('div');
              year.classList.add('year');
              year.textContent = new Date(computer.year).getFullYear();

              const button3 = document.createElement('a');
              button3.classList.add('button3');
              button3.href = `computer/${computer.id}`;
              

              const button7 = document.createElement('div');
              button7.classList.add('button7');
              button7.textContent = 'View';

              const imagePreview = document.createElement('div');
              imagePreview.classList.add('placeholder-image');
              imagePreview.innerHTML = `<img src="{{ asset('${computer.icon}') }}">`;

              product.appendChild(imagePreview);
              product.appendChild(content3);
              product.appendChild(button3);

              content3.appendChild(header1);
              content3.appendChild(year);

              header1.appendChild(heading1);
              header1.appendChild(text1);

              button3.appendChild(button7);

              content5.appendChild(product);
            }
          }
        }
        displayComputers();

        ViewAll.addEventListener('click', () => {
          computerView = computers.length;
          currentIndex = 3;
          if (window.matchMedia("(max-width: 1757px)").matches) {
            currentIndex = 4;
          }
          if (window.matchMedia("(max-width:  1112px)").matches) {
            currentIndex = 5;
          }
          if (window.matchMedia("(max-width: 740px)").matches) {
            currentIndex = 12;
          }
          displayComputers();
        });
      })
    </script>
@endif
