var tmp = [];
var statusArr = [];
var data;
var old;

function statusBtn(id) {

    stringId = id.toString();
    console.log('id', stringId);
    data = $('.select-' + id).val();
    old = $('.approve-user-data').val()

    if ($('.check-all').is(':checked')) {

        tmp = $('.user-ids').map((i, el) => el.innerText.trim()).get();
        $(".select-" + id).change(function() {

            if ($(".select-" + id).not(':checked')) {

                stringId = id.toString();
                deletedIndex = tmp.indexOf(stringId)
                $(".check-all").prop('checked', false);
                tmp.splice(deletedIndex, 1)
                $('.approve-user-data').val(tmp);

            }
            if ($(".select-" + id).is(':checked')) {

                tmp.push(data)
                $('.approve-user-data').val(tmp);

            }

        })
        $('.approve-user-data').val(tmp);

    } else {

        if ($(".select-" + id).is(':checked')) {

            tmp.push(data);


        } else if ($(".select-" + id).not(':checked')) {

            tmp.splice($.inArray(data, tmp), 1);

            if (tmp.length == 0) {

                tmp.pop()

                $('.approve-user-data').val('')

            }
        }
    }

    $('.approve-user-data').val(tmp);


}