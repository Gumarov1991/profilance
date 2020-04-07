@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <form method="POST" action="{{ route('create.short.link') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="link" id="link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}"
                           placeholder="Enter URL" value="{{ old('link') }}" required>
                    <div class="input-group-append">
                        <input class="btn btn-success" type="submit" value="Generate">
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">

            @if ($errors->has('link'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('link') }}
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Short Link</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>

                @foreach($shortLinks as $shortLink)
                    <tr>
                        <td>{{ $shortLink->id }}</td>
                        <td><a href="{{ route('short.link', $shortLink->token) }}"
                               target="_blank">{{ route('short.link', $shortLink->token) }}</a></td>
                        <td>{{ $shortLink->link }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
