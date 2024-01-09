const LANG_VI_URL_DATATABLES = "https://cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json";
const TYPE_POST = "POST";

const URL_FOLDER_DATATABLES = "../../views/includes/data/";
const URL_DATATABLES_CATEGORY = "data_category.php";

// Textarea
const TEXTAREA_INIT = "textarea#";
const WIDTH_INIT = "100%";
const HEIGHT_INIT = "320"; // px 
const LANGUAGE_VI = "vi";
const ELEMENT_FORMAT = "html";

const TINYMCE = "";

// Validate Ajax
const URL_ACTION_VALIDATE = "../../views/action/";

var FILE_VALIDATE;
var SELECT2;
var SELECT2_BOOTSTRAP4;
var STATUS;
var CALCULATE_DATE;
var DATEPICKER;
var MONTH_NAME = 
[
    "Tháng Một", "Tháng Hai", "Tháng Ba", "Tháng Tư", "Tháng Năm", "Tháng Sáu", 
    "Tháng Bảy", "Tháng Tám", "Tháng Chín", "Tháng Mười", "Tháng Mười Một", "Tháng Mười Hai"
];

var DAY_NAME =
[
    "Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"
];

var DAY_NAME_SHORT = ["CN", "T2", "T3", "T4", "T5", "T6", "T7"];

var TODAY = new Date();
var DAY = String(TODAY.getDate()).padStart(2, '0');
var MONTH = String(TODAY.getMonth() + 1).padStart(2, '0');
var YEAR = TODAY.getFullYear();


var MODAL_CATEGORY_ADMIN;
var MODAL_EVENT_ADMIN;


(function() {

    FILE_VALIDATE = function file_validate() {
        jQuery.validator.addMethod("fileSizeLimit", function(val, el, limit) {
            return !el.files[0] || (el.files[0].size <= limit);
        }, "*Kích Thước Tệp Quá Lớn");
    };

    SELECT2 = function select2() {
        if(document.querySelector(".select2")) {
            try {
                return $(".select2").select2();
            } catch (ex) {
                return console.log(ex);
            }
        }
    }

    SELECT2_BOOTSTRAP4 = function select2bs4() {
        if(document.querySelector(".select2bs4")) {
            try {
                return $(".select2bs4").select2({
                    theme: "bootstrap4"
                });
            } catch (ex) {
                return console.log(ex);
            }

        }
    }

    CALCULATE_DATE = function calculate_date(today, day, month, year) {
        today = day + '/' + month + '/' + year;

        return today;
    }

    DATEPICKER = function datepicker() {
        $.datepicker.regional['vi'] = {
            monthNames: MONTH_NAME,
            dayNames: DAY_NAME,
            dayNamesShort: DAY_NAME_SHORT,
            dayNamesMin: DAY_NAME_SHORT,
            days: DAY_NAME
        }

        $.datepicker.setDefaults($.datepicker.regional['vi']);

        if(document.querySelector(".datepicker-config")) {
            try {
                return $(".datepicker-cofig").datepicker({
                    dateFormat: "dd/mm/yy",
                    minDate: new Date("01/01/1970"),
                    duration: "fast"
                });
            } catch (ex) {
                return console.log(ex);
            }
        }
    }

    MODAL_CATEGORY_ADMIN = function modal_category_admin() {
        // DataTables Setup
        if(document.getElementById("datatables-category-list")) {
            try {
                $("#datatables-category-list").DataTable({
                    "language": {"url": LANG_VI_URL_DATATABLES},
                    "processing": true,
                    "serverSide": true,
                    "padding": true,
                    "responsive": true,
                    "order": [],
                    "ajax": {
                        "url": "../../views/includes/data/data_category.php",
                        "type": TYPE_POST
                    },
                    "fnCreateRow": function( nRow, aData, iDataIndex) {
                        // Add Data Id in tag <tr>
                        $(nRow).attr("id", aData[0]);
                        //
                    },          
                    "columnDefs": [
                        { 
                            "targets": [0, 3],
                            "searchable": false,
                            "orderable": false,
                            // "visible": false
                        },
                        // {
                        //     "targets": '_all', 
                        //     "visible": false
                        // }
                    ],
                });
            } catch (ex) {
                return console.log(ex);
            }
        }

        // Create Modal
        // Check if have tmce
        if(document.querySelector("#dis-tmce-content-category")) {
            const tinymce_create_category = tinymce.init({
                selector: TEXTAREA_INIT+"dis-tmce-content-category",
                width: WIDTH_INIT,
                height: HEIGHT_INIT,
                language: LANGUAGE_VI,
                element_format: ELEMENT_FORMAT,
                mode: "textareas",
                // remove logo tinymce
                branding: false,
                promotion: false,
                // resize textarea
                resize: false,
                setup: function(editor, ed) {
                    editor.on("init keydown change", (e) => {
                        var get_content = document.querySelector("#get-tmce-content-category");
                        // innerHTML
                        get_content.innerHTML = editor.getContent();
                    });
                }
            });

            const form_create_category = $("#form-create-category").validate({
                ignore: [],
                rules: {
                    "category": {
                        required: true,
                        rangelength: [3, 25],
                    },
                    "get-tmce-content-category": {
                        required: true,
                        minlength: 25
                    },
                },
                messages: {
                    "category": {
                        required: "*Bạn Chưa Nhập Thể Loại",
                        rangelength: "*Thể Loại Chỉ Nhận Từ 3 Đến 25 Ký Tự"
                    },
                    "get-tmce-content-category": {
                        required: "*Bạn Chưa Nhập Nội Dung",
                        minlength: "*Nội Dung Phải Từ 25 Ký Tự Trở Lên"
                    }
                },
                submitHandler: function (form) { 
                    $.ajax({
                        type: TYPE_POST,
                        url: URL_ACTION_VALIDATE+"action_category.php",
                        data: $(form).serializeArray(),
                        success: function (data) {
                            var datatables = $("#datatables-category-list").DataTable();

                            datatables.ajax.reload();

                            // Close Modal
                            $("#modal-create-category").modal("hide");

                            // TinyMCE Reset
                            tinymce.get("dis-tmce-content-category").setContent("");
                            
                            $("#get-tmce-content-category").html("");

                            // Form Input Reset
                            $("#form-create-category")[0].reset();
                        }
                    });
                }
            });
        }
        // Update Modal
        if(document.getElementById("")) {
            
        }
        // Delete Modal

        // Find

        // Button Excel

    }

})(jQuery)

FILE_VALIDATE();
SELECT2();
SELECT2_BOOTSTRAP4();
CALCULATE_DATE(TODAY, DAY, MONTH, YEAR);
MODAL_CATEGORY_ADMIN();