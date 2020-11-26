@extends('layouts.app')

@section('content')
<div class="row mt-3">
    @foreach ($data as $item)
        <div class="col-md-6">
            <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="/storage/{{ $item->image }}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5>
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <th scope="row">Год: </th>
                                <td>{{ $item->year }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Автор: </th>
                                <td>{{ $item->author }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Студия: </th>
                                <td>{{ $item->studio }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @if(Auth::check())
                    <div class="btn-group">
                        <a type="button" href="/id/{{ $item->id }}/" class="btn btn-sm btn-outline-secondary">Редактировать</a>
                        <a type="button" href="/id/{{ $item->id }}/delete" class="btn btn-sm btn-outline-secondary">Удалить</a>
                    </div>
                    @endif
                </div>
                </div>
            </div>
            </div>
        </div>
    @endforeach
</div>
{{ $data->links('paginator') }}
@endsection