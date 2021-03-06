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
                                    <th><a href="?order=name&type={{ ( $order == 'name' && $type == 'asc' ) ? 'desc' : 'asc' }}">Назва <span class="glyphicon {{ ( $order == 'name' && $type == 'asc' ) ? 'glyphicon-sort-by-alphabet-alt' : 'glyphicon-sort-by-alphabet' }}" aria-hidden="true"></span></a></th>
                                    <th><a href="?order=address&type={{ ( $order == 'address' && $type == 'asc' ) ? 'desc' : 'asc' }}">Адреса <span class="glyphicon {{ ( $order == 'address' && $type == 'asc' ) ? 'glyphicon-sort-by-alphabet-alt' : 'glyphicon-sort-by-alphabet' }}" aria-hidden="true"></span></a></th>
                                    <th><a href="?order=rating&type={{ ( $order == 'rating' && $type == 'asc' ) ? 'desc' : 'asc' }}">Рейтинг<span class="glyphicon {{ ( $order == 'rating' && $type == 'asc' ) ? 'glyphicon-sort-by-attributes' : 'glyphicon-sort-by-attributes-alt' }}" aria-hidden="true"></span></a></th>
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
                                        <td class="table-text"><div>{{ $company->rating}}</div></td>
                                        <td class="table-text"><div>comment</div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <div>
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#addCompany"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Додати нову компанію</button>
            </div>
        </div>
    </div>

    @include('modal.addCompany')
@endsection