<x-layout>
    <x-slot name="title">Login</x-slot>
    <div class="container-fluid register-sheet flex">
        <div class="row">
            <div class="col-12 header-full"></div>       
        </div>
        <div class="row w-100 my-3">
            <div class="px-1 col-12 shadow card-1 flex-column d-flex justify-content-center align-items-center">
                <h3 class="bold">Accedi al tuo Account.</h3>
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="mb-2">
                        <input type="email" name="email" value="{{old('email')}}" placeholder="Indirizzo email">
                    </div>
                    <div class="mb-2">
                        <input type="password" name="password" value="{{old('password')}}" placeholder="Password">
                    </div>                   
                    <button class="btn-accent mb-3" type="submit">Accedi</button>
                </form>
                <p>Se non hai un account,<a class="link-reg" href="{{route('register')}}"> Registrati</a></p>
                
            </div>           
        </div>
    </div>
</x-layout>