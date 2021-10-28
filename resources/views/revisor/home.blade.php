<x-layout>
   
    @if ($announcement)
    
    <div class="container-fluid min-page">
        <div class="row">
            <div class="header-full mt-3 col-12 d-flex flex-column justify-content-center align-items-center">
                <h3 class="text-ligth lead bold " style="font-weight: 800">{{ __('ui.datiinserzionista')}}:</h3>
                <p class="text-ligth lead">{{$announcement->user->name}}</p>
                <p class="text-ligth lead">{{$announcement->user->email}}</p>
            </div>
        </div>

        <div class="row">

            <div class="my-3 col-12  ">
                <div class="row bordino-home-revisore">
                    <div class="col-12  my-3 d-flex flex ">
                        <h2 class="text-accent bordi-dettaglio ">{{$announcement->title}}</h2>
                    </div>
                    <div class=" col-md-5 my-3">
                        
                    </div>
                    <div class="col-12  my-3 d-flex flex ">
                        <h2 class="float-end  bordi-dettaglio text-accent">{{ __('ui.prezzo')}}:{{$announcement->price}}€</h2>
                    </div>
                    <div class=" col-md-5 my-3">
                        
                    </div>
                    <div class="col-12  my-3 d-flex flex ">
                        <h2 class="text-accent  ">{{$announcement->body}}</h2>
                    </div>
                    <div class=" col-md-5 my-3">
                        
                    </div>

                    <div class="col-12  my-3 d-flex flex ">
                        <h2 class="text-accent  ">id: {{$announcement->id}}</h2>
                    </div>
                    <div class=" col-md-5 my-3">
                        
                    </div>
                                        
                </div>
                    
            </div>

        </div>

        <div class="row">
            
                
                   
                        @foreach ($announcement->images as $image)  
                        

                            <div class="col-1"></div>
                            <div class=" my-5 revisore col-11 col-md-3">
                                    <img class="img-fluid" src="{{$image->getUrl(300, 300)}}" alt="foto segnaposto prodotto">
                                    <p class="text-black lead my-5">
                                        <p class="text-black lead" lead>adult: {{$image->adult}} </p>
                                        <p class="text-black lead" lead>spoof: {{$image->spoof}} </p>
                                       <p class="text-black lead" lead> violence: {{$image->violence}} </p>
                                       <p class="text-black lead" lead> medical: {{$image->medical}} </p>
                                       <p class="text-black lead" lead>racy: {{$image->racy}}</p>  <p>
                                        
                                        <p class="text-black lead">Labels:</p>
                                    
                                     <ul>
                                        @if ($image->labels)
                                        @foreach ($image->labels as $label)
                                        <li class="text-black lead">{{$label}}</li>
                                        @endforeach    
                                        @endif
                                     </ul>                
                            </div>
                        @endforeach
                        
 
            
        </div>
        <div class="row">
            <div class="col-12 d-flex flex">
                <div class="mx-auto mb-3">
                    <form action="{{route('revisor.reject' , $announcement->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger"> {{ __('ui.rifiuta')}} </button>
                    </form>
                </div>
                <div class="text-right mx-auto mb-3">
                    <form action="{{route('revisor.accept' , $announcement->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success"> {{ __('ui.accetta')}} </button>
                    </form>
                </div>                        
            </div>
        </div>
    </div>
    @else
    <h3 class="min-page d-flex flex text-accent">{{ __('ui.noannunci')}}.</h3>
    @endif
</x-layout>