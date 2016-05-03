@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Історія Переговорів {{$company->name}}
                </div>
            </div>

            <!--  -->
            <div class="panel-body">
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#addHistoryComment"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Додати новий коментар</button>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Дата</th>
                        <th>Контактна особа</th>
                        <th>Прайс</th>
                        <th>Коментар</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($company->getHistory as $index => $comment)
                        <tr>
                            <td scope="index"><div>{{++$index}} </div></td>
                            <td class="created_at"><div>{{ $comment->created_at }}</div></td>
                            <td class="employee_id">{{ $comment->getEmployee->surname }} {{ $comment->getEmployee->name }} {{ $comment->getEmployee->middle_name }}</td>
                            <td class="price">@if ($comment->price)<div><a href="{{url($comment->price)}}" target="_blank"> <span class="glyphicon glyphicon-cloud" aria-hidden="true"></span></a></div>@endif</td>
                            <td class="text"><div>{{ $comment->text}}</div></td>
                            <td class="record">@if ($comment->record)<div><a href="{{url($comment->record)}}" target="_blank"> <span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span></a></div>@endif</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- modal --->
    @include('modal.addHistoryComment')

@endsection