<x-app-layout>
    <div class="px-10 py-3 text-xl ">
        <div class="pull-right hover:text-blue-500">
            <a class="btn btn-primary" href="{{ route('contractor.index') }}"> Powrót</a>
        </div>
    </div>
    <div class="m-10 px-6 py-4 text-xl font-medium w-fit rounded-lg text-black border-2 border-black"> 
        <div class="p-2 text-xl font-medium text-black">
            <h2 class='font-large'>Edytuj Kontrahenta</h2>
        </div>
       @if ($errors->any())
           <div class="alert alert-danger">
           There were some problems with your input.<br><br>
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       @endif
     
       <form action="{{ route('contractor.update',$contractor->id) }}" method="POST">
           @csrf
           @method('PUT')
      
            <div class="row">
               <div class="p-2">
                   <div class="form-group">
                       <strong>Nazwa:</strong>
                       <input type="text" name="name" value="{{ $contractor->name }}" class="form-control" placeholder="Nazwa">
                   </div>
               </div>
               <div class="p-2">
                    <div class="form-group">
                        <strong>NIP:</strong>
                        <input type="text" name="nip" value="{{ $contractor->nip }}" class="form-control" placeholder="NIP">
                    </div>
                </div>
                <div class="p-2">
                    <div class="form-group">
                        <strong>Adres:</strong>
                        <input type="text" name="address" value="{{ $contractor->address }}" class="form-control" placeholder="Adres">
                    </div>
                </div>
                <div class="p-2">
                    <div class="form-group">
                        <strong>Telefon:</strong>
                        <input type="text" name="phone" value="{{ $contractor->phone }}" class="form-control" placeholder="Telefon">
                    </div>
                </div>
               <div class="p-2">
                    <div class="form-group">
                        <strong>Mail:</strong>
                        <input type="text" name="email" value="{{ $contractor->email }}" class="form-control" placeholder="Mail">
                    </div>
                </div>
               <div class="p-2  hover:text-green-500 text-center">
                 <button type="submit" class="btn btn-primary">Zatwierdź</button>
               </div>
           </div>
       </form>
    </div>
</x-app-layout>