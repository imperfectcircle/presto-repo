<x-layout>
    <div class="container-fluid header-home">
        <div class="row">
            <div class="col-12">
                
            </div>
        </div>
        
        {{-- div spacer --}}
        
        {{-- <div class="custom-shape-divider-bottom-1631662188">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div> --}}
    </div>
        <div class="row">
            <div class="col-12 d-flex flex">
                <h2 class='text-accent mt-3'>{{ __('ui.annuncicategoria')}}: {{$category->name}}</h2>
            </div>
        </div>
    </div>
    

{{-- if error --}}
    <div class="container-fluid">
        <div class="row">
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center my-3">
                <div class="card" style="width: 18rem;">
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
                        <p class="card-text cardtxt">{{$announcement->body}}</p>
                        <p class="text-black cardtxt">{{$announcement->price}}</p>
                        <p class='cardtxt'>{{$announcement->updated_at->format('d/m/Y')}} - {{$announcement->user->name}}</p>
                        <a class="btn btn-accent" href="{{route('public.announcements.category', [$announcement->category->name, $announcement->category->id])}}">{{$announcement->category->name}}</a>
                        <a class="btn btn-accent" href="{{route('detail.announcement', compact('announcement'))}}">Dettaglio</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        <div class="row">
            <div class="col-12">
                {{-- {{$announcements->links()}} --}}
            </div>
        </div>
    </div>

</x-layout>
