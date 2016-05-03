<!-- Modal -->
<div class="modal fade" id="addHistoryComment" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="error-messages">
                    @include('common.errors')
                </div>

                <form action="#" method="POST" class="form-horizontal" enctype="multipart/form-data" id="addHistoryComment-form">
                    {{ csrf_field() }}

                    <!-- contact employee -->
                    <div class="form-group">
                        <label for="history-employee_id" class="col-sm-3 control-label">Контактна особа</label>

                        <div class="col-sm-6">
                            <select class="form-control autoload-employee" id="history-employee_id" name="employee_id">
                                <option value="" selected="selected">Контакне лице</option>
                            </select>
                        </div>
                    </div>

                    <!-- history price -->
                    <div class="form-group">
                        <label for="history-price" class="col-sm-3 control-label">Прайс</label>

                        <div class="col-sm-6">
                            <input type="file" name="price" id="history-price" class="form-control" value="{{ old('price') }}">
                        </div>
                    </div>

                    <!-- history comment -->
                    <div class="form-group">
                        <label for="history-text" class="col-sm-3 control-label">Коментар</label>

                        <div class="col-sm-6">
                            <textarea rows="10" cols="45" name="text" id="history-text" class="form-control">{{ old('text') }}</textarea>
                        </div>
                    </div>

                    <!-- history reminder -->
                    <div class="form-group">
                        <label for="history-reminder" class="col-sm-3 control-label">Нагадування</label>

                        <div class="col-sm-6">
                            <input type="text" name="reminder" id="history-reminder" class="form-control" value="{{ old('reminder') }}">
                        </div>
                    </div>

                    <!-- history record -->
                    <div class="form-group">
                        <label for="history-record" class="col-sm-3 control-label">Запис</label>

                        <div class="col-sm-6">
                            <input type="file" name="record" id="history-record" class="form-control" value="{{ old('record') }}">
                        </div>
                    </div>

                    <input type="hidden" name="company_id" value="{{ $company->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="addHistoryComment-form" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>