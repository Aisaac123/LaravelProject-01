@foreach($images as $image)
    @component('components.card', ['image' => $image, 'showdesc' => $showdescs])
    @endcomponent
@endforeach
