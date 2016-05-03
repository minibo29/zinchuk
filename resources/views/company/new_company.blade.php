@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Клієнтська База
                </div>
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Company Form -->
                <form action="/Company/add" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Company Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Наза</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>

                    <!-- Company Form of -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">ПП</label>

                        <div class="col-sm-6">
                            <input type="text" name="form_of" id="task-name" class="form-control" value="{{ old('form_of') }}">
                        </div>
                    </div>

                    <!-- Company Address -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Адресф</label>

                        <div class="col-sm-6">
                            <input type="text" name="address" id="task-name" class="form-control" value="{{ old('address') }}">
                        </div>
                    </div>

                    <!-- Company phone -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Телефон</label>

                        <div class="col-sm-6">
                            <input type="text" name="phone" id="task-name" class="form-control" value="{{ old('phone') }}">
                        </div>
                    </div>

                    <!-- Company rating -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Рейтинг</label>

                        <div class="col-sm-6">
                            <input type="text" name="rating" id="task-name" class="form-control" value="{{ old('rating') }}">
                        </div>
                    </div>

                    <!-- Add Company Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Додати компанію
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection