<x-layout>
    <div class="container-fluid wrapper header-home">
        <div class="row">
            <div class="col-12">
                
            </div>
        </div>
    </div>
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12">
                <h1 class='text-accent d-flex justify-content-center'>{{ __('ui.risultatiricerca')}}  : {{$q}} </h1>
            </div>
        </div>
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
    </div>
</x-layout>