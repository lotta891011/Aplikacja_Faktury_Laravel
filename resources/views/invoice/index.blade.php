
<x-app-layout>
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Lista Faktur</h2>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('invoice.create') }}"> Dodaj nową fakturę</a>
             </div>
         </div>
     </div>
    
     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <table class="table table-bordered">
         <tr>
             <th>Nr</th>
             <th>ID</th>
             <th>Numer</th>
             <th>NIP Kontrahenta</th>
             <th>Data wystawienia</th>
             <th width="280px">Akcja</th>
         </tr>
         @foreach ($invoices as $invoice)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ $invoice->id }}</td>
             <td>{{ $invoice->number }}</td>
             <td>{{ $invoice->contractor->nip }}</td>
             <td>{{ $invoice->date_of_issue }}</td>
             <td>
                 <form action="{{ route('invoice.destroy',$invoice->id) }}" method="POST">
    
                     <a class="btn btn-info" href="{{ route('invoice.show',$invoice->id) }}">Pokaż</a>
     
                     <a class="btn btn-primary" href="{{ route('invoice.edit',$invoice->id) }}">Edytuj</a>
    
                     @csrf
                     @method('DELETE')
       
                     <button type="submit" class="btn btn-danger">Usuń</button>
                 </form>
             </td>
         </tr>
         @endforeach
     </table>
</x-app-layout>