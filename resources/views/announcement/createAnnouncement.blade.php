<x-layout>
    <x-slot name="title">Nuovo Annuncio</x-slot>
    <div class="container-fluid wrapper header-home d-flex justify-content-start">
        <div class="row row full">
            <div class="col-12 d-flex flex">
                <div class="row row full"> 
                   
                    <div class="col-8 offset-2">
                        <h3 class="text-grey">Compila il form</h3>
                        <a href="#form-annuncio"><button type="menu" class="btn btn-accent"><i class="far fa-caret-square-down"></i> Inserisci annuncio</button></a>   
                       </div>
                            
                </div>
                
            </div>
        </div>
        
        {{-- div spacer --}}
        
        <div class="custom-shape-divider-bottom-1631662188">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>
    <div class="header-creaArticolo d-flex justify-content-center align-items-end beneathNav" id="form-annuncio">
        <h2 class='text-accent'>{{ __('ui.nuovoannuncio')}}</h2>
    </div>
    <div>
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
    <div class="container-fluid my-5">
        <div class="row flex">
            <div class="col-12 col-md-6 card-article shadow rounded">
                
                <form class="pt-3 justify-content-center align-items-center" method="POST" action="{{route('storeAnnouncement')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="uniqueSecret" value="{{ $uniqueSecret }}">
                    <div class="my-3">
                        <input name="title" type="text" class="form-control" value="{{old('title')}}" placeholder="Titolo">
                    </div>
                    <select class="form-select mb-3" name="category" id="category">
                        @foreach ($categories as $category)
                        <option class='text-black' value="{{$category->id}}">
                            {{$category->name}}
                        </option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <textarea name="body" class="form-control" placeholder="Articolo" rows="3">{{old('body')}}</textarea>
                    </div> 
                    <div class="my-3">
                        <input name="price" type="text" class="form-control" value="{{old('price')}}" placeholder="Prezzo">
                    </div>
                    <div class="form-group row">
                        <label for="images" class="col-md-12 col-form-label text-black">{{ __('ui.inseriscifoto')}}</label>
                        <div class="col-md-12">
                            <div class="dropzone" id="drophere"></div>
                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-accent">{{ __('ui.pubblica')}}</button>
                    </div>
                    
                </form>                      
            </div>
        </div>
    </div>
</x-layout>