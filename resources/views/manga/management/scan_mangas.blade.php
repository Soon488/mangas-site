@extends('layouts.management')

@section('title', "$scan->name's Mangas")

@section('content')

    <div class="text-center text-light mb-3">
        <h4>
            {{ $scan->name }}'s Mangas
        </h4>
    </div>

    @if (empty($scan->mangas->first()))
        <div class="text-center">
            <h5>
                There are not any manga.
            </h5>
        </div>
    @else
        <div class="list-group">
            @foreach ($scan->mangas as $manga)
                <div class="list-group-item list-group-item-action flex-column align-items-start bg-light-1">
                    <div class="d-flex w-100 justify-content-between">
                        <a href="{{ route('app.manga.main', $manga->id) }}" class="h5 mb-1 text-decoration-none text-dark">
                            {{$manga->name}}
                        </a>
                        <small class="text-black-50">Last Updated At: {{$manga->updated_at->format('Y-m-d H:i')}}</small>
                    </div>
                    <div>
                        <div>Total Views:</div>
                        <div>Month Views:</div>
                        <div>Week Views:</div>
                        <div class="mb-1 row">
                            <div class="col-9">Today Views:</div>
                            <div class="col-3 d-flex justify-content-end">
                                <form action="#" method="post" class="d-inline">
                                    @method('put')
                                    @csrf
                                    <a href="#" class="text-light btn fa d-inline"><i class="fas fa-edit text-info"></i></a>
                                    @can('removeManga', $scan)
                                        <button type="submit" class="text-light btn fa d-inline"><i class="fa-solid fa-x text-danger"></i></button>
                                    @endcan
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="d-flex justify-content-center mb-4">
        {{ $scan->mangas->links() }}
    </div>

@endsection