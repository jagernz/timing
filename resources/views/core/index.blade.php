@extends('layouts.core')

@section('content')

  <br>
  <br>
  <br>
  <hr>

  <div class="row">

    <div class="col-md-3">
      <form class="form-inline" method="post" action="">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $user->id  }}" id="getUserId">
        <input type="hidden" value="{{ $now }}" id="getResTime">
        <input type="hidden" value="{{ $day }}" id="getResDay">
        <button type="button" id="startWork" class="btn btn-primary">Начать работу</button>
      </form>
    </div>

    <div class="col-md-3">
      <form class="form-inline" method="post" action="">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $user->id  }}" id="getUserId">
        <input type="hidden" value="{{ $now }}" id="getResTime">
        <input type="hidden" value="{{ $day }}" id="getResDay">
        <button type="button" id="rest" class="btn btn-danger">Взять перерыв</button>
      </form>
    </div>

    <div class="col-md-3">
      <form class="form-inline" method="post" action="">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $user->id  }}" id="getUserId">
        <input type="hidden" value="{{ $now }}" id="getResTime">
        <input type="hidden" value="{{ $day }}" id="getResDay">
        <button type="button" id="endWork" class="btn btn-warning">Завершить работу</button>
      </form>
    </div>

  </div>

  {{--Модальное окно--}}

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Перерыв в работе</h4>
        </div>

        <div class="modal-body">
          <form method="post" id="myForm">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="message-text" class="control-label">Комментарий о причине перерыва</label>
              <textarea class="form-control" id="message-text" name="comment"></textarea>
            </div>
            <input type="hidden" value="{{ $user->id  }}" id="getUserId">
            <input type="hidden" value="{{ $now }}" id="getResTime">
            <input type="hidden" value="{{ $day }}" id="getResDay">
            <div class="modal-footer">
              <button type="button" class="btn btn-alert" id="saveComment">Отправить комментарий</button>
              <button type="button" class="btn btn-warning" id="continueWork">Продолжить работу</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

@endsection