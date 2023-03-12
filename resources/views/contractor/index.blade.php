<x-app-layout>
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Lista Kontrahentów</h2>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('contractor.create') }}"> Dodaj nowego kontrahenta</a>
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
             <th>Nazwa</th>
             <th>NIP</th>
             <th>Adres</th>
             <th>Telefon</th>
             <th>Mail</th>
             <th width="280px">Akcja</th>
         </tr>
         @foreach ($contractor as $contractor)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ $contractor->name }}</td>
             <td>{{ $contractor->nip }}</td>
             <td>{{ $contractor->address }}</td>
             <td>{{ $contractor->phone }}</td>
             <td>{{ $contractor->email }}</td>
             <td>
                 <form action="{{ route('contractor.destroy',$contractor->id) }}" method="POST">
    
                     <a class="btn btn-info" href="{{ route('contractor.show',$contractor->id) }}">Pokaż</a>
     
                     <a class="btn btn-primary" href="{{ route('contractor.edit',$contractor->id) }}">Edytuj</a>
    
                     @csrf
                     @method('DELETE')
       
                     <button type="submit" class="btn btn-danger">Usuń</button>
                 </form>
             </td>
         </tr>
         @endforeach
         
        
     </table>
</x-app-layout>