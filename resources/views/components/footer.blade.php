<footer class="footer bg-prymary">
    <div class="container container-fluid pb-3">
        <div class="row pt-5">
            
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-12 d-flex flex">
                        <h4>{{ __('ui.categorie')}}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 d-flex flex-column flex align-items-end">
                        <ul>

                            @foreach ($categories as $category)
                            @if ($category->id<=5)
                            <li>
                            <a class="ancoder-nav display-6 nav-link text-black " href="{{route('public.announcements.category', [$category->name, $category->id])}}">
                                <p class="text-ligth small-footer mb-0">{{$category->name}}</p>
                            </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div> 
                    <div class="col-6 d-flex flex-column flex align-items-start">
                        <ul>

                            @foreach ($categories as $category)
                            @if ($category->id>5)
                            <li>
                                <a class="ancoder-nav display-6 nav-link text-black  " href="{{route('public.announcements.category', [$category->name, $category->id])}}">
                                    <p class="text-ligth small-footer mb-0">{{$category->name}}</p>
                                </a>
                            </li>
                            @endif
                            @endforeach
                            
                        </ul>
                        </div>
                </div>    
            </div>
            <div class="col-12 col-md-6 d-flex flex-column flex">
                <h4>{{ __('ui.entrainfamiglia')}}</h4>
                        <p class="text-ligth small-footer">{{ __('ui.iscriviti')}}</p>
                        <form class="d-flex " method="POST" action="">
                            <div>
                                <input class="form-newsletter bg-transparent" name="email" type="email" placeholder="{{ __('ui.email')}}">
                            </div>
                            <div class="d-flex justify-content-end align-items-end">
                                <a class="btn-newsletter" type="submit"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </form>
            </div>
        </div>
        <div class="row px-0 my-3">
                    <div class="pb-2 px-0 d-flex justify-content-center align-items-center copyrigth col-12">
                        <p class="text-ligth">{{ __('ui.copyright')}}</p> 
                    </div>
        </div>
        <div class="row px-0 mx-3 pt-2 my-3">
                    <div class="pb-2 box-indirizzo col-12 col-sm-6 col-md-6">
                    <div class="d-flex flex-column justify-content-center align-items-center indirizzo">
                        <h4><i class="fas fa-code"></i> Presto.it</h4>
                        <p class="text-ligth small-footer">Via Giovanni XXIII 33</p> 
                        <p class="text-ligth small-footer">37040-Pressana-VR</p> 
                        <p class="text-ligth small-footer">p.iva 04399630248</p>
                    </div>
                    </div> 
             
                    <div class="d-flex justify-content-center align-items-center brand-footer col-12 col-sm-6 col-md-6">
                        <div class="w-100 icons-social d-flex justify-content-between align-item-center">
                        <a href="http://" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook fa-2x"></i></a> 
                        <a href="http://" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="http://" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter fa-2x"></i></a>
                        <a href="http://" target="_blank" rel="noopener noreferrer"><i class="fas fa-envelope fa-2x"></i></a>
                        </div>
                    </div> 
                
            
        </div>
    </div>  
</footer>
<x-login/>
<x-register/>