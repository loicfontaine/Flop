@extends("template")


@section("content")
<div class="title m-b-md">
    Laravel
    @can('isAdmin')
    tu es admin
    @endcan

    @can('isUser')
    tu es user
    @endcan
</div>
@endsection