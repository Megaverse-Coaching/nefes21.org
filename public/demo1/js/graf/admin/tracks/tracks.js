"use strict";

// Class definition
var GrafTrackPages = function () {


    var initScripts = () => {
        Inputmask({"mask" : "99:99:99"}).mask("#trackDuration");
        if($("#kt_slider_soft_limits").length){
            var slider = document.querySelector("#kt_slider_soft_limits");

            noUiSlider.create(slider, {
                start: 10,
                connect: true,
                range: {
                    min: 0,
                    max: 100
                },
                pips: {
                    mode: "values",
                    values: [20, 80],
                    density: 4
                },
                format: wNumb({
                    decimals: 0
                })
            });

            slider.noUiSlider.on('change', function (values, handle) {
                $(":input[name='volume']").val(values);
            });

        }

        $(document).ready(function() {
            var objectUrl;

            $("#audio").on("canplaythrough", function(e){
                var seconds = e.currentTarget.duration;
                var duration = moment.duration(seconds, "seconds");

                var time = "";
                var hours = duration.hours();
                if (hours > 0) { time = hours + ":" ; }

                time = time + duration.minutes() + ":" + duration.seconds();
                $("#trackDuration").attr("value", `${time}`);
                $("input[name='duration']").attr("value", `${seconds}`);

                URL.revokeObjectURL(objectUrl);
            });

            $("#file").change(function(e){
                var file = e.currentTarget.files[0];

                $("#filename").text(file.name);
                $("#filetype").text(file.type);
                $("#filesize").text(file.size);

                objectUrl = URL.createObjectURL(file);
                $("#audio").prop("src", objectUrl);
            });

            $('input[type=checkbox][name=isValid]').change(function() {
                ($(this).is(':checked')) ? $(this).val(1).attr('checked', true): $(this).val(0).removeAttr('checked');
                ($(this).is(':checked')) ? $("span.isValid").html('Onaylı'): $("span.isValid").html('Onaylanmadı');

            });
            $('input[type=checkbox][name=isFree]').change(function() {
                ($(this).is(':checked')) ? $(this).val(1).attr('checked', true): $(this).val(0).removeAttr('checked');
                ($(this).is(':checked')) ? $("span.isFree").html('Premium'): $("span.isFree").html('Free');

            });
            $('input[type=checkbox][name=status]').change(function() {
                ($(this).is(':checked')) ? $(this).val(1).attr('checked', true): $(this).val(0).removeAttr('checked');
                ($(this).is(':checked')) ? $("span.status").html('Yayında'): $("span.status").html('Taslak');

            });
        });
        $('#floatingContentDescription').maxlength({
            warningClass: "badge badge-primary",
            limitReachedClass: "badge badge-success"
        });
    };

    var initForm = () => {


    };


    return {
        // Public functions
        init: function () {
            initScripts();
            initForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    GrafTrackPages.init();
});
