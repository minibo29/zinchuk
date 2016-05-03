<!-- Modal -->
<div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <form action="/employee/add" method="POST" class="form-horizontal" id="addEmployee-form">
                    {{ csrf_field() }}

                    <!-- employee position -->
                    <div class="form-group">
                        <label for="employee-position" class="col-sm-3 control-label">Посада</label>

                        <div class="col-sm-6">
                            <input type="text" name="position" id="employee-position" class="form-control" value="{{ old('position') }}">
                        </div>
                    </div>

                    <!-- employee name -->
                    <div class="form-group">
                        <label for="employee-name" class="col-sm-3 control-label">Ім’я</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="employee-name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>

                    <!-- employee middle_name -->
                    <div class="form-group">
                        <label for="employee-middle_name" class="col-sm-3 control-label">По Батькові</label>

                        <div class="col-sm-6">
                            <input type="text" name="middle_name" id="employee-middle_name" class="form-control" value="{{ old('middle_name') }}">
                        </div>
                    </div>

                    <!-- employee surname -->
                    <div class="form-group">
                        <label for="employee-surname" class="col-sm-3 control-label">Фамілія</label>

                        <div class="col-sm-6">
                            <input type="text" name="surname" id="employee-surname" class="form-control" value="{{ old('surname') }}">
                        </div>
                    </div>

                    <!-- employee phone -->
                    <div class="form-group">
                        <label for="employee-phone" class="col-sm-3 control-label">Телефон</label>

                        <div class="col-sm-6">
                            <input type="text" name="phone" id="employee-phone" class="form-control" value="{{ old('phone') }}">
                        </div>
                    </div>

                    <!-- employee email -->
                    <div class="form-group">
                        <label for="employee-email" class="col-sm-3 control-label">Електронна пошта</label>

                        <div class="col-sm-6">
                            <input type="email" name="email" id="employee-email" class="form-control" value="{{ old('email') }}">
                        </div>
                    </div>

                    <!-- employee birthday -->
                    <div class="form-group">
                        <label for="employee-birthday" class="col-sm-3 control-label">Бень Народження</label>

                        <div class="col-sm-6">
                            <input type="text" name="birthday" id="employee-birthday" class="form-control" value="{{ old('birthday') }}">
                        </div>
                    </div>

                    <!--employee comment-->
                    <div class="form-group">
                        <label for="employee-comment" class="col-sm-3 control-label">Соментар</label>

                        <div class="col-sm-6">
                            <textarea  name="comment" id="employee-comment" class="form-control" rows="3" maxlength="255">{{ old('birthdate') }}</textarea>
                        </div>
                    </div>

                    <input type="hidden" name="company_id" value="{{ $company->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="addEmployee-form" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>