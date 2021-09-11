@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</td>
                <th scope="col">Nome</td>
                <th scope="col">Participantes</td>
                <th scope="col">Ações</td>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td scropt="row">{{$event->id}}</td>
                <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                <td>{{count($event->users)}}</td>
                <td>
                    <a href="/events/edit/{{$event->id}}" class="btn btn-info edit-btn">
                        <ion-icon name="create-outline"></ion-icon>Editar
                    </a>
                    <form action="/events/{{$event->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon> Excluir
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não possui eventos, <a href="/events/create">Crie um evento</a></p>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que participo</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($eventsAsParticipant) > 0)

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</td>
                <th scope="col">Nome</td>
                <th scope="col">Participantes</td>
                <th scope="col">Ações</td>
            </tr>
        </thead>
        <tbody>
            @foreach($eventsAsParticipant as $event)
            <tr>
                <td scropt="row">{{$event->id}}</td>
                <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                <td>{{count($event->users)}}</td>
                <td>
                    <form action="/events/leave/{{$event->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>Sair do evento
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <p>Você não está participando de nenhum evento! Veja os eventos <a href="/">disponíveis</a></p>

    @endif
</div>

@endsection