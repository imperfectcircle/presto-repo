<x-layout>
    <div class="container-fluid wrapper header-home">
        <div class="row">
            <div class="col-12">
                
            </div>
        </div>
        
        {{-- div spacer --}}
        
        <div class="custom-shape-divider-bottom-1631662188">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>
    <div class="container-fluid min-page d-flex flex-column flex">
        <div class="row beneathNav justify-content-center align-items-end">
            <h2 class='text-accent'>{{ __('ui.richiestarevisore')}}</h2>
        </div>
        <div class="row my-5">
            <div class="col-12 ">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="colorText">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-12 d-flex flex">
                <form method="POST" action="{{route('revisorRequestSubmit')}}">
                    @csrf
                    {{-- <div class="mb-3">
                        <label class="form-label text-black" >{{ __('ui.email')}}</label>
                        <input type="email" class="form-control text-black" name='email' value="{{old('email')}}">
                    </div> --}}
                    <div class="mb-3 d-flex flex flex-column">
                        <label class="form-label text-black">{{ __('ui.motivorevisore')}}</label>
                        <textarea class='text-black' name="message" id="" cols="30" rows="10">{{old('message')}}</textarea>
                    </div>
                    <div class="d-flex flex">
                        <button type="submit" class="btn btn-accent">{{ __('ui.invia')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>