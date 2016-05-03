
$(document).ready(function(){


    /** Ajax*/
    /** add Employee */
    $("#addEmployee-form").submit(function(e){
        e.preventDefault();
        var formData = $("#addEmployee-form").serialize();
        $.ajax({
            type: "POST",
            url : "/employee/add",
            data : formData,
            success : function(data){
                if( data.status == 'error'){
                    return false;
                }
                var markup = formatAddEmployee(data.message);
                $('#employee-fieldset table tbody').append(markup);
                $('#addEmployee').modal('toggle');
                $(this)[0].reset();
            }
        },"html");
    });

    /** add  Physical Address */
    $("#addPhysicalAddress-form").submit(function(e){
        e.preventDefault();
        var formData = $("#addPhysicalAddress-form").serialize();
        $.ajax({
            type: "POST",
            url : "/physical-address/add",
            dataType: 'json',
            data : formData,
            success : function(data){

                if( data.status == 'error'){
                    return false;
                }
                var markup = formatPhysicalAddress(data.message);
                $('#physical-address-fieldset table tbody').append(markup);
                $('#addPhysicalAddress').modal('toggle');
                $('#addPhysicalAddress-form')[0].reset();
            }
        },"html");
    });

    /** add  Building Object */
    $("#addBuildingObject-form").submit(function(e){
        e.preventDefault();
        var formData = $("#addBuildingObject-form").serialize();
        $.ajax({
            type: "POST",
            url : "/building-object/add",
            data : formData,
            success : function(data){
                if( data.status == 'error'){
                    return false;
                }
                var markup = formatBuildingObjects(data.message);

                $('#bilder-object-fieldset table tbody').append(markup);
                $('#addBuildingObject').modal('toggle');
                $(this)[0].reset();
            }
        },"html");
    });

    /** add Company */
    $("#addCompany-form").submit(function(e){
        e.preventDefault();
        var formData = $("#addCompany-form").serialize();
        $.ajax({
            type: "POST",
            url : "/company/add",
            data : formData,
            success : function(data){
                $('#addCompany').modal('toggle');
                $(this)[0].reset();
            }
        },"html");
    });

    /** add Comment to History */
    $("#addHistoryComment-form").submit(function(e){
        e.preventDefault();
        var formData = new FormData($('#addHistoryComment-form')[0]);

        //return false;
        $.ajax({
            type: "POST",
            url : "/history/add",
            data : formData,
            success : function(data){
                if( data == 'error'){
                    return false;
                }
                $('#addHistoryComment').modal('toggle');
                $("#addHistoryComment-form")[0].reset();
            },
            processData: false, // Don't process the files
            contentType: false // Set content type to false as jQuery will tell the server its a query string request
        },"html");
    });
    /** end Ajax */


    /** Select 2.*/
    /** Autoload user */
    $(".autoload-employee").select2({
        width: '100%',
        ajax: {
            url: "/employee/autoload-employee",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var company_id = $('input[name=company_id]').val();
                return {
                    q: params.term, // search term
                    company_id: company_id,
                    employee: params.page
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });

    function formatRepo (repo) {
        if (repo.loading) return repo.text;

        var markup = "<div class='select2-result-repository clearfix'><div>" + repo.value + "</div></div>";
        return markup;
    }

    function formatRepoSelection (repo) {
        return repo.value || repo.value;
    }

    /** Tpl to Append Employee  */
    function formatAddEmployee (data) {
        var index = parseInt($('#employee-fieldset .index').last().text());
        var markup = '<tr>' +
                '<td class="index">' + ++index + '</td>' +
                '<td class="position">' + data.position + '</td>' +
                '<td class="surname">'+ data.surname + '</td>' +
                '<td class="name">' + data.name + '</td>' +
                '<td class="middle_name">' + data.middle_name + '</td>' +
                '<td class="phone">' + data.phone + '</td>' +
                '<td class="email">' + data.email + '</td>' +
                '<td class="birthday">' + data.birthday + '</td>' +
                '<td class="comment">' + data.comment + '</td>' +
            '</tr>';
        return markup;
    }

    /** Tpl to Building Objects  */
    function formatBuildingObjects (data) {
        var index = parseInt($('#bilder-object-fieldset .index').last().text());
        var markup = '<tr>' +
                '<td class="index">' + ++index + '</td>' +
                '<td class="name">' + data.name + '</td>' +
                '<td class="address">' + data.address + '</td>' +
                '<td class="comment">' + data.employee_id + '</td>' +
            '</tr>';
        return markup;
    }

    /** Tpl to Physical Address  */
    function formatPhysicalAddress (data) {
        var index = parseInt($('#physical-address-fieldset .index').last().text());
        var markup = '<tr>' +
                '<td class="index">' + ++index + '</td>' +
                '<td class="address">' + data.address + '</td>' +
            '</tr>';
        return markup;
    }


    /** datepicker */
    $('#history-reminder').datetimepicker({
        locale: 'ru'
    });


});
