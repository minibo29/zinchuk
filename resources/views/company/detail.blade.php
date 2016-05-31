@extends('layouts.app')
@section('content')

<div class="container">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        {{ $company->name }}
      </div>
    </div>

    <div class="panel-body">

      <!--   Low Address  -->
      <fieldset>
        <label>Юредична адреса:</label>
        {{ $company->address }}
      </fieldset>

      <!--   Physical Address  -->
      <fieldset class="physical-address">
        <legend><a data-toggle="collapse" data-target="#physical-address-fieldset" href="#" aria-expanded="false">Фізична адреса:</a></legend>
        <div id="physical-address-fieldset" class="panel-collapse collapse fade">
          <table class="table table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>Адреса</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($company->getPhysicalAddress as $index => $PhysicalAddress)
              <tr>
                <td class="index">{{++$index}}</td>
                <td class="address">{{ $PhysicalAddress->address }}</td>
              </tr>
            @endforeach

            </tbody>
          </table>
          <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#addPhysicalAddress"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Додати нового користувача</button>
        </div>
      </fieldset>

      <!--   building object  -->
      <fieldset>
        <legend>
          <a data-toggle="collapse" data-target="#bilder-object-fieldset" href="#" aria-expanded="false">Об'єкти: </a>
        </legend>
        <div id="bilder-object-fieldset" class="panel-collapse collapse fade">
          <table class="table table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>Назва</th>
              <th>Адреса</th>
              <th>Контактна особа</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($company->getBuildingObjects as $index => $BuildingObject)
                <tr>
                  <td class="index">{{++$index}}</td>
                  <td class="name">{{ $BuildingObject->name }}</td>
                  <td class="address">{{ $BuildingObject->address }}</td>
                  <td class="employee_id">{{ $BuildingObject->getEmployee->surname }} {{ $BuildingObject->getEmployee->name }} {{ $BuildingObject->getEmployee->middle_name }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#addBuildingObject"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Додати нового користувача</button>
        </div>
      </fieldset>

      <!--  employees block--->
      <fieldset class="employee" >
        <legend> <a data-toggle="collapse" data-target="#employee-fieldset" href="#" aria-expanded="false">Працівники:</a></legend>
        <div id="employee-fieldset" class="panel-collapse collapse fade">
          <table class="table table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>Посада</th>
              <th>Призвище</th>
              <th>Ім’я</th>
              <th>По-батькові</th>
              <th>Телефон</th>
              <th>Електронна пошта</th>
              <th>Дата народження</th>
              <th>Коментар</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($company->getEmployees as $index => $employee)
              <tr>
                <td class="index">{{++$index}}</td>
                <td class="position">{{ $employee->position }}</td>
                <td class="surname">{{ $employee->surname }}</td>
                <td class="name">{{ $employee->name }}</td>
                <td class="middle_name">{{ $employee->middle_name }}</td>
                <td class="phone">{{ $employee->phone }}</td>
                <td class="email">{{ $employee->email }}</td>
                <td class="birthday">{{ $employee->birthday }}</td>
                <td class="comment">{{ $employee->comment }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#addEmployee"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Додати нового користувача</button>
        </div>
      </fieldset>
    <!--  end employees block--->

      <div class="histoty"><a href="{{url('/history/'.$company->id)}}">Історія</a></div>
    </div>
  </div>
</div>

<!-- modal --->
@include('modal.addEmployee')
@include('modal.addPhysicalAddress')
@include('modal.addBuildingObject')

@endsection