<div class="modal fade" id="addBuildingObject" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <form action="#" method="POST" class="form-horizontal" id="addBuildingObject-form">
                    {{ csrf_field() }}

                    <!-- Building Object name -->
                    <div class="form-group">
                        <label for="BuildingObject-name" class="col-sm-3 control-label">Назва</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="BuildingObject-name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <!-- Building Object Address -->
                    <div class="form-group">
                        <label for="BuildingObject-address" class="col-sm-3 control-label">Адреса</label>

                        <div class="col-sm-6">
                            <input type="text" name="address" id="BuildingObject-address" class="form-control" value="{{ old('address') }}">
                        </div>
                    </div>
                    <!-- Building Object contact employee -->
                    <div class="form-group">
                        <label for="BuildingObject-employee_id" class="col-sm-3 control-label">Контакна особа</label>

                        <div class="col-sm-6">
                            <select class="form-control autoload-employee" id="BuildingObject-employee_id" name="employee_id">
                                <option value="" selected="selected">Контакне лице</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="company_id" value="{{ $company->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="addBuildingObject-form" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>