<div class="search-box m-0 p-0">
    <div class="search-title">
        <h5 class="animated-link mb-3 m-0 p-0" style="cursor: default">Search another friend!</h5>
    </div>
    <form action="{{route('user.get-by-search')}}" method="post" class="m-0 p-0">
        @csrf
        <div class="m-0 p-0 d-flex">
            <div class="col-md-10">
                <input id="search-text" type="text"
                       class="form-control"
                       name="search-text" required autofocus
                       placeholder="Search users here...">
            </div>
            <div class="col-md-2 d-flex justify-content-end">
                <input id="searchBox" type="submit"
                       class="btn btn-dark"
                       value="  Search!  ">
            </div>
        </div>
    </form>
</div>
