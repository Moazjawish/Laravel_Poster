@props(['active' => false])
<a class="{{$active ? 'mr-2 rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white hover:bg-gray-700 hover:text-white'
: 'rounded-md px-3 mr-2 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white'}}"
aria-current="{{$active ? 'page' : null}}"
{{$attributes}}
>{{$slot}}</a>
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
<!-- class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" -->
