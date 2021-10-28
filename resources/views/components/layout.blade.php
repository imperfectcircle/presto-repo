<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    
<link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>{{$title ?? ''}}</title>
</head>
<body>

    <x-navbar></x-navbar>
    <div id='scrollTop' class="scrollTop">
        <lord-icon src="https://cdn.lordicon.com/koyivthb.json" trigger="loop" colors="primary:#2d3142,secondary:#219EBC" style="width:70px;height:70px">
        </lord-icon>
    </div>
    {{$slot}}
    <x-footer></x-footer>
<script src="{{asset('js/app.js')}}"></script>  
<script src="https://kit.fontawesome.com/fb6044fe64.js" crossorigin="anonymous"></script>
<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>  
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js" integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>