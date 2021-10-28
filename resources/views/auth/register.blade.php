<x-layout>
    <x-slot name="title">Registrati</x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 header-full"></div>       
        </div>
        <div class="row my-3">
            <div class="px-1 col-12 shadow card-1 flex-column d-flex justify-content-center align-items-center">
                <h3 class="bold">Registrati da qui.</h3>
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="mb-2">
                        <input type="text" name="name" value="{{old('name')}}" placeholder="Nome e Cognome">
                    </div>
                    <div class="mb-2">
                        <input type="email" name="email" value="{{old('email')}}" placeholder="Indirizzo email">
                    </div>
                    <div class="mb-2">
                        <input type="password" name="password" value="{{old('password')}}" placeholder="Password">
                    </div>
                    <div class="mb-2">
                        <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Conferma password">
                    </div>

                    <button class="btn-accent mb-3" type="submit"><p class="text-accent">registrati</p></button>
                </form>
            </div>           
        </div>
    </div>
</x-layout>