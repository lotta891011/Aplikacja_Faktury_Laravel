<x-app-layout>
     <div class="row">
        <div class="px-6 py-4 text-xl font-medium text-black">
            <h2>Lista Kontrahentów</h2>
        </div>
        <div class="px-6 py-2 col-lg-12 margin-tb">
            <a class="pull-right hover:text-blue-500 btn btn-success" href="{{ route('contractor.create') }}"> Dodaj nowego kontrahenta</a>
        </div> 
     </div>
    
     @if ($message = Session::get('success'))
         <div class="alert alert-success text-green-500 px-6 py-2">
             <p>{{ $message }}</p>
         </div>
     @endif
    <div  class ="p-6">
        <table class="text-sm w-fit text-white dark:text-black ">
            <thead class="text-xs text-black uppercase  dark:bg-gray-700 dark:text-white border-2 border-black">
                <tr>
                    <th class="px-6 py-3">Nr</th>
                    <th class="px-6 py-3">Nazwa</th>
                    <th class="px-6 py-3">NIP</th>
                    <th class="px-6 py-3">Adres</th>
                    <th class="px-6 py-3">Telefon</th>
                    <th class="px-6 py-3">Mail</th>
                    <th class="px-6 py-3">Akcja</th>
                </tr>
            </thead>    
            @foreach ($contractor as $contractor)
            <tr class="border-2 border-black hover:bg-gray-200">
                <td class="px-6 py-3">{{ ++$i }}</td>
                <td class="px-6 py-3">{{ $contractor->name }}</td>
                <td class="px-6 py-3">{{ $contractor->nip }}</td>
                <td class="px-6 py-3">{{ $contractor->address }}</td>
                <td class="px-6 py-3">{{ $contractor->phone }}</td>
                <td class="px-6 py-3">{{ $contractor->email }}</td>
                <td class="px-6 py-3">
                    <form action="{{ route('contractor.destroy',$contractor->id) }}" method="POST">
        
                        <a class="btn btn-info hover:text-blue-500" href="{{ route('contractor.show',$contractor->id) }}">Pokaż</a>
        
                        <a class="btn btn-primary hover:text-blue-500" href="{{ route('contractor.edit',$contractor->id) }}">Edytuj</a>
        
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