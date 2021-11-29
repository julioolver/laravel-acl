@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Editar Tópico</h2>
        <hr>
    </div>
    <div class="col-12">
        <form action="{{route('threads.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label>Canal do Tópico</label>
                <select name="channel_id" id="channel_id" class="form-control">
                    @foreach ($channels as $channel)
                    <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Conteúdo Tópico</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="ivalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Conteúdo Tópico</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                @error('body')
                    <div class="ivalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-lg btn-success">Criar Tópico</button>
        </form>
    </div>
</div>
@endsection