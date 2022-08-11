/* const inputs = document.getElementsByClassName('eingabe');
const button = document.getElementById('absenden') */

// 1.Variante zusätzliche Sicherung das beim kompletten Ausfüllen der Felder, das 
// Formular abgeschickt wird. Hier springt das disabeld Button beim Wechsel der Input Felder.

/* $(document).ready(function() {
    $('.eingabe').on('keyup', (e) => {
        const value = e.currentTarget.value;
        const input = $('.eingabe');
        const submitButton = $('#absenden');

        if (value === "") {
            submitButton.prop('disabled', true);
        } else {
            submitButton.prop('disabled', false);
        }
    });
}); */

// 2.Variation soll das einzelne disabled springen verhindern!

// diese ist fast gut...

/* $(function() {
    $('#absenden').attr('disabled', true);

    $('.eingabe').change(function() {
        if ($('.eingabe').val() != '') {
            $('#absenden').attr('disabled', false);
        } else {
            $('#absenden').attr('disabled', true);
        }
    });
}); */

// diese Variante gefällt mir aber das textarea erkennt er leider nicht und der button ist bereits aktiv obwohl im Feld nichts steht....

/* $(document).ready(() => {

    document.onkeyup = (e) => {
        if (e.target.tagName === '.eingabe') {
            const canSubmit = [...document.forms.querySelectorAll('.eingabe')]
                .every(i => {
                    return i.value
                })
            document.forms.querySelector('#absenden').disabled = !canSubmit
        }
    };
    $('form').on('#absenden',
        (e) => {
            e.preventDefault()
            $("#absenden").prop("disabled", true);
            $('form').submit();
        }
    );
}); */

// Deaktivieren des Buttons nach Senden der Daten sowie das aktivieren des Buttons nach vollständigen ausfüllen des Formulars...

$(document).ready(() => {
    $(".eingabe").on("keyup", function() {
        var empty = false;
        $(".eingabe").each(function() {
            if ($(this).val() == false) {
                empty = true;
            }
        });

        if (empty === true) {
            $("#absenden").prop("disabled", true);
        } else {
            $("#absenden").prop("disabled", false);
        }
    });

    $("form").on("#absenden", (e) => {
        e.preventDefault();
        $("#absenden").prop("disabled", true);
        $("form").submit();
    });

    $(document).on("click", "#aendern", function() {
        var result = confirm("Soll der Datensatz wirklich geändert werden?");
        if (!result) {
            return false;
        }
    });

    $(function() {
        var $inputsform = $("#myform");

        $.validator.addMethod(
            "nospace",
            function(value, element) {
                return value == "" || value.trim().length != 0;
            },
            "Leerfelder sind nicht erlaubt!"
        );

        if ($inputsform.length) {
            $inputsform.validate({
                rules: {
                    name: {
                        required: true,
                        nospace: true,
                    },
                    vorname: {
                        required: true,
                        nospace: true,
                    },
                    email: {
                        required: true,
                        nospace: true,
                        email: true,
                    },
                    betreff: {
                        required: true,
                        nospace: true,
                    },
                    text: {
                        required: true,
                        nospace: true,
                    },
                },
                messages: {
                    name: {
                        required: "Bitte Namen einfügen!",
                    },
                    vorname: {
                        required: "Bitte Ihren Vornamen!",
                    },
                    email: {
                        required: "Ihre Emailadresse!",
                        email: "Bitte validierte Email!",
                    },
                    betreff: {
                        required: "Ihr Betreff!",
                    },
                    text: {
                        required: "Ihr Text!",
                    },
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.next("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                success: function(label, element) {
                    if (!$(element).next("span")[0]) {
                        $(
                            "<span class='glyphicon glyphicon-ok form-control-feedback'></span>"
                        ).insertAfter($(element));
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },
            });
        }
    });
});