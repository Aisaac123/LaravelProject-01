@if(Auth::user()->image)
    <div >
        <img src="{{ url('user/image/'.Auth::user()->image)  }}" alt="" class="user_image card">
    </div>
@endif
