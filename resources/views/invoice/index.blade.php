
<x-app-layout>
     <div class="row">
         <div class="">
             <div class="px-6 py-4 text-xl font-medium text-black">
                 <h2>Lista Faktur</h2>
             </div>
             <div class="px-6 py-2 col-lg-12 margin-tb hover:text-blue-500">
                 <a class="btn btn-success" href="{{ route('invoice.create') }}"> Dodaj nową fakturę</a>
             </div>
         </div>
     </div>
    
     @if ($message = Session::get('success'))
         <div class="text-green-500 px-6 py-2">
             <p>{{ $message }}</p>
         </div>
     @endif
    <div class ="p-6">
        <table class="text-sm w-fit text-white dark:text-black">
            <thead class="text-xs text-black uppercase  dark:bg-gray-700 dark:text-white border-2 border-black">
                <tr>
                    <th class="px-6 py-3">Nr</th>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Numer</th>
                    <th class="px-6 py-3">NIP Kontrahenta</th>
                    <th class="px-6 py-3">Data wystawienia</th>
                    <th class="px-6 py-3">Akcja</th>
                </tr>
            </thead>    
            @foreach ($invoices as $invoice)
            <tr class="border-2 border-black hover:bg-gray-200">
                <td class="px-6 py-3">{{ ++$i }}</td>
                <td class="px-6 py-3">{{ $invoice->id }}</td>
                <td class="px-6 py-3">{{ $invoice->number }}</td>
                <td class="px-6 py-3">{{ $invoice->contractor->nip }}</td>
                <td class="px-6 py-3">{{ $invoice->date_of_issue }}</td>
                <td class="px-6 py-3">
                    <form action="{{ route('invoice.destroy',$invoice->id) }}" method="POST">
        
                        <a class="btn btn-info hover:text-blue-500" href="{{ route('invoice.show',$invoice->id) }}">Pokaż</a>
        
                        <a class="btn btn-primary hover:text-blue-500" href="{{ route('invoice.edit',$invoice->id) }}">Edytuj</a>
        
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