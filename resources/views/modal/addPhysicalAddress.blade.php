<!-- Modal -->
<div class="modal fade" id="addPhysicalAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <form action="/employee/add" method="POST" class="form-horizontal" id="addPhysicalAddress-form">
                    {{ csrf_field() }}

                    <!-- Physical Address to Company -->
                    <div class="form-group">
                        <label for="PhysicalAddress-address" class="col-sm-3 control-label">Адреса</label>

                        <div class="col-sm-6">
                            <input type="text" name="address" id="PhysicalAddress-address" class="form-control" value="{{ old('address') }}">
                        </div>
                    </div>

                    <input type="hidden" name="company_id" value="{{ $company->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="addPhysicalAddress-form" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>