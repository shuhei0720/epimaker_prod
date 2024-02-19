@props(['width'])

<img {{$attributes->merge(['width' => $width.'%'])}} src="{{asset('img/すべらない話.png')}}">