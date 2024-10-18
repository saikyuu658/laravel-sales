@props(['id', 'text', 'dataId', 'class'=>'', 'style' => ''])


<p id="{{$id}}" class="text-[#06c] font-sans font-medium cursor-pointer {{$class}}" style="{{$style}}" data-id="{{$dataId}}"> {{$text}} </p>