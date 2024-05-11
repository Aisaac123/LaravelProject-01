<div class="trash-icon">
    <a href="{{route('comment.delete', ['id' => $comment->id])}}">
        <img src="{{asset('/shared/trash_hover.png')}}" alt="" style="cursor: pointer">
        <img src="{{asset('/shared/trash.png')}}" alt="" style="cursor: pointer">
    </a>
</div>
