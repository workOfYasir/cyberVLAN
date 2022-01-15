$(document).ready(function () {
    console.log('ok');
    $(document).on("change", "#specialism1", function () {
        var e = [];
        console.log('ok');
        $("input:checkbox[name=speciallism]:checked").each(
            function () {
                e.push($(this).val());
            }
        ),
        console.log(e);
            e.length > 0
                ? window.livewire.emit("changeFilter", "types", e)
                : window.livewire.emit("resetFilter");
    }),
    $(document).on("change", ".salery", function () {
        var e = [];
        console.log('ok');
        $("input:radio[name=salery]:checked").each(
            function () {
                e.push($(this).val());
            }
        ),
        console.log(e);
            e.length > 0
                ? window.livewire.emit("changeFilter", "salery", e)
                : window.livewire.emit("resetFilter");
    }),
    $(document).on("click", ".filter-clear", function () {
        console.log('ok');
        window.livewire.emit("resetFilter");
        $("#specialism1").each(function () {
            $(this).prop("checked", !1);
        });
        $(".salery").each(function () {
            $(this).prop("checked", !1);
        });
    });
});