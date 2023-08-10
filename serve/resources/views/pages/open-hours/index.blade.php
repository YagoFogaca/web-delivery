@extends('layouts.platform-store.index')

@section('content')
    <section class="container-form-create">
        <h4 style="text-align: center">Editar o horario de funcionamento</h4>
        <form name='form-open-hours'>
            @method('PUT')
            @csrf
            <article class="cards-open-hours">
                @foreach ($open_hours as $openHour)
                    <div class="card-open-hours">
                        <div class="info-day">
                            <span class="day">{{ $openHour['day'] }}</span>
                        </div>
                        <div class="input-group">
                            <input type="hidden" name="{{ $openHour['day'] }}" value="{{ $openHour['day'] }}">
                            <input type="time" class="form-control" value="{{ $openHour['start_time'] }}"
                                name="start_time_{{ $openHour['day'] }}">
                            <span class="input-group-text">até</span>
                            <input type="time" class="form-control" value="{{ $openHour['end_time'] }}"
                                name="end_time_{{ $openHour['day'] }}">
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                {{ $openHour['active'] ? 'checked' : '' }} name="active_{{ $openHour['day'] }}">
                            <label class="form-check-label" for="flexSwitchCheckChecked">Ativar</label>
                        </div>
                    </div>
                @endforeach
            </article>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </section>
@endsection
