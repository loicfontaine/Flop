@extends("template")


@section("content")
<div class="title m-b-md">
    @can('isAdmin')
    {{Auth::user()->nickname}} est un admin
    @endcan

    @can('isUser')
    {{Auth::user()->nickname}} est un user
    @endcan
    All Auth info:
    <br>
    {{Auth::user()}}


</div>
@endsection