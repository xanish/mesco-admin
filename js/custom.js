$(document).ready(function() {
    $('#donors').DataTable();
    $('#collectors').DataTable();
    $('#collection_list').DataTable();
    $('#collections').DataTable();
    $('#visit').DataTable();
    $("#select-all").change(function(){
        $(".checkbox").prop('checked', $(this).prop("checked"));
    });
    $("#select-all-2").change(function(){
        $(".checkbx").prop('checked', $(this).prop("checked"));
    });
});

function toggle(source) {
    checkboxes = document.getElementsByName('chk[]');
    for(var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
}

function deleteMultiEntry(dbName) {
    var val = [];
    $(':checkbox:checked').each(function(i) {
        val[i] = $(this).val();
    });
    if(val == '') {
        alert('Please select rows to delete!');
        return false;
    }
    var dataString = 'id=' + val + '&dbName=' + dbName;
    console.log(dataString);
    var answer = confirm ("Are you sure?")
    if (answer) {
        $.ajax({
            url: "php/delete-multiple-entries.php",
            type: "POST",
            data: dataString,
            cache: false,
            success: function (html) {
                if (html == '') {
                    alert("Please try again!");
                }
                else {
                    location.reload();
                }
            }
        });
    }
    else {

    }
}


function UpdateCollector(id) {
    var collector_name = document.getElementById('colname');
    collector_name = collector_name.options[ collector_name.selectedIndex ].value;
    var dataString = '_id=' + id + '&collector_name=' + collector_name;
    console.log(dataString);
    var answer = confirm ("Are you sure?")
    if (answer) {
        $.ajax({
            url: "php/update-visit-list.php",
            type: "POST",
            data: dataString,
            cache: false,
            success: function (html) {
                location.reload();
            }
        });
    }
    else {

    }
}


function UpdateDate(id) {
    var date = document.getElementById('date').value;
    var dataString = '_id=' + id + '&date=' + date;
    console.log(dataString);
    var answer = confirm ("Are you sure?")
    if (answer) {
        $.ajax({
            url: "php/update-visit-list-date.php",
            type: "POST",
            data: dataString,
            cache: false,
            success: function (html) {
                location.reload();
            }
        });
    }
    else {

    }
}

function RemoveDonors(id) {
    var _user_id = [];
    $(':checkbox:checked').each(function(i) {
        _user_id[i] = $(this).val();
    });
    if(_user_id == '') {
        alert('Please select rows to delete!');
        return false;
    }
    var dataString = '_id=' + id + '&_user_id=' + _user_id;
    console.log(dataString);
    var answer = confirm ("Do you want to remove the donor(s)?")
    if (answer) {
        $.ajax({
            url: "php/remove-donor-from-list.php",
            type: "POST",
            data: dataString,
            cache: false,
            success: function (html) {
                location.reload();
            }
        });
    }
    else {

    }
}

function AddDonors(id) {
    var _user_id = [];
    $(':checkbox:checked').each(function(i) {
        _user_id[i] = $(this).val();
    });
    if(_user_id == '') {
        alert('Please select rows to delete!');
        return false;
    }
    var dataString = '_id=' + id + '&_user_id=' + _user_id;
    console.log(dataString);
    var answer = confirm ("Do you want to add the donor(s)?")
    if (answer) {
        $.ajax({
            url: "php/add-donors-to-list.php",
            type: "POST",
            data: dataString,
            cache: false,
            success: function (html) {
                location.reload();
            }
        });
    }
    else {

    }
}
