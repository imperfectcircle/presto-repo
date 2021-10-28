<x-layout>    
    <div class="container-fluid ">
        <div class="row">
            <div class="header-megafono mt-3 col-12 d-flex flex-column justify-content-center align-items-center">
                <h3 class="text-ligth lead bold " style="font-weight: 800">{{ __('ui.datiinserzionista')}}:</h3>
                <p class="text-ligth">{{$announcement->user->name}}</p>
                <p class="text-ligth">{{$announcement->user->email}}</p>
                
            </div>
        </div>
        <div class="row py-5 my-5">
            
            
            
            
            
            
            
            
            
            <div class="my-3 col-12 col-md-6 d-flex justify-content-center">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($announcement->images as $image)    
                        <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}">
                            <img class="img-fluid" src="{{$image->getUrl(300, 300)}}" alt="foto segnaposto prodotto">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            
            
            
            <div class="my-3 col-12 col-md-6 ">
                <div class="row">
                    <div class="col-12 col-md-7 my-3 d-flex flex bordi-dettaglio">
                        <h2 class="text-accent">{{$announcement->title}}</h2>
                    </div>
                    <div class=" col-md-5 my-3">
                        
                    </div>
                    <div class="col-12 col-md-7 my-3 d-flex flex bordi-dettaglio">
                        <h2 class="float-end text-accent">{{ __('ui.prezzo')}}:{{$announcement->price}}€</h2>
                    </div>
                    <div class=" col-md-5 my-3">
                        
                    </div>
                    <div class="col-12 col-md-7 my-3 d-flex flex bordi-dettaglio">
                        <p class="text-black lead">{{$announcement->body}}</p>
                    </div>
                    <div class=" col-md-5 my-3">
                        
                    </div>
                    
                    
                    
                </div>
                
                
                
            </div>
            
            
            
            
        </div>
        
    </div>
</div> 
</x-layout>