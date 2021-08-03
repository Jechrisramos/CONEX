<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Styles -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<!-- favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon_io/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon_io/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon_io/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('favicon_io/site.webmanifest')}}">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

<!-- Bootstrap --> <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<!-- Custom Styles -->
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script> 

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>

<!-- tinyMCE - Scripts --> 
{{-- this is for the WYSIWYG Text Editor --}}
<script src="https://cdn.tiny.cloud/1/r20vgxmhcx9pj3jgidw6vwc2bc863rsy22vd0zn3rtqtiuil/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

{{-- WYSIWYG https://www.tiny.cloud/ --}}
<script src="https://cdn.tiny.cloud/1/r20vgxmhcx9pj3jgidw6vwc2bc863rsy22vd0zn3rtqtiuil/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>