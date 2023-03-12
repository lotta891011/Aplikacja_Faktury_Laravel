<x-app-layout>
    <div class="row">
        <div class="px-6 py-4 text-xl font-medium text-black">
            <h2 class='font-large'>Lista Towarów</h2>
        </div>
        <div class="px-6 py-2 col-lg-12 margin-tb">
            <div class="pull-right hover:text-blue-500">
                 <a class="btn btn-success" href="{{ route('ware.create') }}"> Dodaj nowy towar</a>
            </div>
        </div>
    </div>
    
     @if ($message = Session::get('success'))
         <div>
             <p class="text-green-500 px-6 py-2">{{ $message }}</p>
         </div>
     @endif
    <div class ="p-6">
        <table class="text-sm w-fit text-white dark:text-black ">
            <thead class="text-xs text-black uppercase  dark:bg-gray-700 dark:text-white border-2 border-black">
                <tr>
                    <th class="px-6 py-3">Nr</th>
                    <th class="px-6 py-3">Nazwa</th>
                    <th class="px-6 py-3">Symbol</th>
                    <th class="px-6 py-3">Akcja</th>
                </tr>
            </thead>   
            @foreach ($ware as $ware)
            <tr class="border-2 border-black hover:bg-gray-200">
                <td class="px-6 py-3">{{ ++$i }}</td>
                <td class="px-6 py-3">{{ $ware->name }}</td>
                <td class="px-6 py-3">{{ $ware->symbol }}</td>
                <td class="px-6 py-3">
                    <form action="{{ route('ware.destroy',$ware->id) }}" method="POST">
                        <a class="btn btn-info hover:text-blue-500" href="{{ route('ware.show',$ware->id) }}">Pokaż</a>
                        <a class="btn btn-primary hover:text-blue-500" href="{{ route('ware.edit',$ware->id) }}">Edytuj</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger hover:text-red-500">Usuń</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
   </div>
</x-app-layout>