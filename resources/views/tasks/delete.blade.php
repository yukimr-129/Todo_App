@extends('layout')

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">タスクを削除する</div>
          <div class="panel-body">
              <div class="form-group">
                <label for="title">タイトル</label>
                <p>{{$task->title}}</p>
              </div>
              <div class="form-group">
                <label for="status">状態</label>
                  <p>{{$task->status_label}}</p>
              </div>
              <div class="form-group">
                <label for="due_date">期限</label>
                <p>{{$task->formatted_due_date}}</p>
              </div>
              <div class="text-right">
                  <form action="{{route('task.destroy', ['id' => $task->folder_id, 'task_id' => $task->id ])}}" method="post">
                      @csrf
                    <input type="submit" value="削除" class="btn btn-primary">
                  </form>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection

{{-- @section('scripts')
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
  <script>
    flatpickr(document.getElementById('due_date'), {
      locale: 'ja',
      dateFormat: "Y/m/d",
      minDate: new Date()
    });
  </script>
@endsection --}}