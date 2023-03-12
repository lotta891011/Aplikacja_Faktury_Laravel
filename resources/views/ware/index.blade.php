
<x-app-layout>
    <div class="row">
        <div class="p-10 text-xl font-medium text-blac">
                 <h2 class='font-large'>Lista Towarów</h2>
        </div>
        <div class="p-6 col-lg-12 margin-tb">
            
            <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('dashboard') }}"> Powrót</a>
             </div>
            <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('ware.create') }}"> Dodaj nowy towar</a>
            </div>
        </div>
    </div>
    
     @if ($message = Session::get('success'))
         <div class="text-green">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
     <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
             <th class="px-6 py-3">Nr</th>
             <th class="px-6 py-3">Nazwa</th>
             <th class="px-6 py-3">Symbol</th>
             <th class="px-6 py-3">Akcja</th>
         </tr>
         </thead>   
         @foreach ($ware as $ware)
         <tr>
             <td class="px-6 py-3">{{ ++$i }}</td>
             <td class="px-6 py-3">{{ $ware->name }}</td>
             <td class="px-6 py-3">{{ $ware->symbol }}</td>
             <td class="">
                 <form action="{{ route('ware.destroy',$ware->id) }}" method="POST">
    
                     <a class="btn btn-info" href="{{ route('ware.show',$ware->id) }}">Pokaż</a>
     
                     <a class="btn btn-primary" href="{{ route('ware.edit',$ware->id) }}">Edytuj</a>
    
                     @csrf
                     @method('DELETE')
       
                     <button type="submit" class="btn btn-danger">Usuń</button>
                 </form>
             </td>
         </tr>
         @endforeach
         
        
     </table>
   
</x-app-layout>