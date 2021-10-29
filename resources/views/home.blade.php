<x-layout>
    <div class="container-fluid wrapper header-home d-flex justify-content-start">
        <div class="row full align-items-center">
            <div class="col-12 d-flex flex">
                <div class="row full"> 
                    @guest
                    <div class="col-8 offset-2">
                        <h3 class="text-grey">{{ __('ui.registrati2')}} <p></p> {{ __('ui.registrati3')}} </h3>
                        <a href="#"><button id="signupcta" type="menu" class="btn btn-accent"><i class="far fa-plus-square"></i> {{ __('ui.registrati')}}</button></a>   
                       </div>  
                    @endguest  
                    @auth
                    @if (Auth::user()->is_revisor==1)
                    <div class="col-8 offset-2">
                        <h3 class="text-grey"> {{ __('ui.guadagna')}} <p></p> {{ __('ui.guadagna2')}}</h3>
                        <a href="{{route('revisor.home')}}"><button type="menu" class="btn btn-accent"><i class="far fa-plus-square"></i> {{ __('ui.revisore')}}</button></a>   
                    </div>
                    @else
                    <div class="col-8 offset-2">
                        <h3 class="text-grey">{{ __('ui.inserisci2')}}  <p></p> {{ __('ui.inserisci3')}}</h3>
                        <a href="{{route('createAnnouncement')}}"><button type="menu" class="btn btn-accent"><i class="far fa-plus-square"></i> {{ __('ui.nuovoannuncio')}}</button></a>   
                       </div>
                    @endif
                    @endauth
                                      
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
    
    {{-- if error --}}
    
    @if (session('access.denied.revisor.only'))
    <div class="box alert alert-danger mb-3">Accesso riservato agli utenti revisori</div>     
    @endif
    @if ($errors->any())
    <div class="box alert alert-danger mb-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li class='colorText'>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    {{-- if messaggi --}}
    
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    
    
    {{-- barra di ricerca --}}
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12">
                <form action="{{route('search')}}" method='GET'>
                    @csrf
                    <div class="col-12 d-flex justify-content-center align-items-end">
                        <h3 class='text-accent' for="">{{ __('ui.cercaannunci')}}</h3>
                    </div>
                    <div class="mt-1 d-flex offset-md-3 align-items-end">
                        <input type="text" class="form-control" placeholder="{{ __('ui.ricerca')}}" name='q'>
                        <button type="submit" class="btn btn-accent mx-2">{{ __('ui.cerca')}}</button>
                        <div class="offset-md-4"></div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    
    
    
    
    {{-- card interattive --}}
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-4 card-coustom ">
                <div class="card_custom">
                    <div class="card shadow-lg">
                        <div class="imgBx d-flex align-items-start justify-content-center">
                            <lord-icon
                            src="https://cdn.lordicon.com/qoozyitg.json"
                            trigger="morph"
                            colors="primary:#000000,secondary:#ffffff"
                            style="width:250px;height:250px">
                        </lord-icon>
                            
                        </div>
                        <div class="contentBx">
                            <h2>{{ __('ui.sport')}}</h2>
                            <a href="http://127.0.0.1:8000/category/sport/1/announcements">{{ __('ui.dettaglio')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-lg-4 card-coustom">
                <div class="card_custom">
                    <div class="card shadow-lg">
                        <div class="imgBx d-flex align-items-center justify-content-center">
                            <lord-icon
                                src="https://cdn.lordicon.com/wxnxiano.json"
                                trigger="morph"
                                colors="primary:#000000,secondary:#ffffff"
                                style="width:250px;height:250px">
                            </lord-icon>
 

                        </div>
                        <div class="contentBx">
                            <h2>{{ __('ui.libri')}}</h2>
                            <a href="http://127.0.0.1:8000/category/libri/10/announcements">{{ __('ui.dettaglio')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-lg-4 card-coustom">
                <div class="card_custom">
                    <div class="card shadow-lg">
                        <div class="imgBx d-flex align-items-center justify-content-center">
                            <lord-icon
                                src="https://cdn.lordicon.com/qhgmphtg.json"
                                trigger="morph"
                                colors="primary:#000000,secondary:#ffffff"
                                style="width:250px;height:250px">
                            </lord-icon>
                        </div>
                        <div class="contentBx">
                            <h2>{{ __('ui.elettronica')}}</h2>
                            <a href="http://127.0.0.1:8000/category/elettronica/3/announcements">{{ __('ui.dettaglio')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex flex mb-5">
                <h2 class="text-accent">{{ __('ui.ultimicinque')}}</h2>
                <p class="lead"></p>
            </div>
        </div>
    </div>



    {{-- ultimi 5 annunci caricati --}}
    <div class="container-fluid">
        <div class="row">
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center my-3 card-coustom-articoli">
                <div class="card card-coustom-articoli shadow-lg" style="width: 18rem;">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($announcement->images as $image)    
                                <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}">
                                        <img class="img-fluid" src="{{$image->getUrl(300, 300)}}" alt="foto segnaposto prodotto">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title cardtxt">{{$announcement->title}}</h5>
                        <p class="card-text cardtxt">{{Str::limit($announcement->body, 50)}}</p>
                        <p class="card-text cardtxt">{{$announcement->updated_at->format('d/m/Y')}} - {{$announcement->user->name}}</p>
                        <a href="{{route('public.announcements.category', [$announcement->category->name, $announcement->category->id])}}" class="btn btn-accent">{{$announcement->category->name}}</a>
                        <a class="btn btn-accent" href="{{route('detail.announcement', compact('announcement'))}}">{{ __('ui.dettaglio')}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>
