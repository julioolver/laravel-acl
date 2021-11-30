@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>{{$thread->title}}</h2>
        <hr>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <small>Criado por {{$thread->user->name}} a {{ $thread->created_at->diffForHumans()}}</small>
            </div>
            <div class="card-body">
                <small>Criado por {{$thread->body}}</small>
            </div>
            <div class="card-footer">
                <a href="{{route('threads.edit', $thread->slug)}}" class="btn btn-sm btn-primary">Editar</a>
                <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.querySelector('.thread-rm').submit()">Remover</a>
                <form action="{{route('threads.destroy', $thread->slug)}}" class="thread-rm" style="display: none;" method="post">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
    @if ($thread->replies->count())
    <div class="col-12">
        <hr>
        <h5>Respostas</h5>
        <hr>
        @foreach ($thread->replies as $reply)
        <div class="card mb-2">
            <div class="card-body">
                <p>{{$reply->reply}}</p>
            </div>
            <div class="card-footer">
                <small>Respindido por {{$reply->user->name}} a {{ $reply->created_at->diffForHumans()}}</small>
            </div>
        </div>
        @endforeach
        <hr>
    </div>
    @endif
    @auth
    <div class="col-12">
        <hr>
        <form action="{{route('replies.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
                <label>Responder</label>
                <input type="hidden" name="thread_id" value="{{$thread->id}}">
                <textarea name="reply" id="" cols="30" rows="5" class="form-control  @error('reply') is-invalid @enderror"></textarea>
                @error('reply')
                <div class="ivalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <br>
                <button type="submit" class="btn btn-lg btn-success">Responder</button>
            </div>
        </form>
    </div>
    @else
    <div class="col-12 text-center">
        <h5>É preciso estar logado para resonder ao tópico</h5>
    </div>
    @endauth
</div>
@endsection