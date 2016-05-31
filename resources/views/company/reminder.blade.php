@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Клієнтська База
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($companies) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Компанії
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ПП</th>
                                    <th>Назва</th>
                                    <th>Адреса</th>
                                    <th>Телефон</th>
                                    <th>Сонтактна особа</th>
                                    <th>Рейтинг</th>
                                    <th>Нагадування</th>
                                    <th>Коментар</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $index => $company)
                                    <tr>
                                        <td scope="row"><div>{{++$index}} </div></td>
                                        <td class="table-text"><div>{{ $company->form_of }}</div></td>
                                        <td class="table-text"><div><a href="/company/{{ $company->id }}">{{ $company->name }}</a></div></td>
                                        <td class="table-text"><div>{{ $company->address}}</div></td>
                                        <td class="table-text"><div>{{ $company->getEmployee->phone}}</div></td>
                                        <td class="table-text"><div>{{ $company->getEmployee->name}} {{ $company->getEmployee->middle_name}} {{ $company->getEmployee->surname}} </div></td>
                                        <td class="table-text"><div>{{ $company->rating}}</div></td>
                                        <td class="table-text"><div>{{ $company->reminder}}</div></td>
                                        <td class="table-text"><div>{{ $company->comment}}</div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection