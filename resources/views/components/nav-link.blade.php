@props(['route'])
<a  {{$attributes}} href={{url($route)}}
 class="{{ request()->Is($route) ? 'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium' : 'text-gray-300 hover:bg-gray-700
  hover:text-white px-3 py-2 rounded-md text-sm font-medium' }}">{{$slot}}</a>
