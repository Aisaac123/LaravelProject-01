@foreach($images as $image)
    @component('components.posts.cards.card', ['image' => $image, 'showdesc' => $showdesc])
    @endcomponent
@endforeach
