<!-- Modal -->
<div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <form action="/Company/add" method="POST" class="form-horizontal" id="addCompany-form">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="addCompany-form" class="btn btn-primary">Додати компанію</button>
            </div>
        </div>
    </div>
</div>