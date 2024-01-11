const LANG_VI_URL_DATATABLES = "https://cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json";
const TYPE_POST = "POST";

const URL_FOLDER_DATATABLES = "../../views/includes/data/";
const URL_DATATABLES_CATEGORY = "data_category.php";
const URL_DATATABLES_EVENT = "data_event.php";

// Textarea
const TEXTAREA_INIT = "textarea#";
const WIDTH_INIT = "100%";
const HEIGHT_INIT = "320"; // px 
const LANGUAGE_VI = "vi";
const ELEMENT_FORMAT = "html";

const TINYMCE = "";

// Validate Ajax
const URL_ACTION_VALIDATE = "../../views/action/";
const URL_ACTION_FIND = "../../views/action/";


// Sweetalert2
const CONFIRM_BUTTON_COLOR = "#3085d6";
const CANCEL_BUTTON_COLOR = "#d33";
const CONFIRM_BUTTON_TEXT = "Vâng, xóa nó đi!";
const CANCEL_BUTTON_TEXT = "Hủy bỏ";
const ICON_WARNING = "warning";
const ICON_SUCCESS = "success";

//
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
//
var MODAL_CATEGORY_ADMIN;
var MODAL_EVENT_ADMIN;
var MODAL_LOCATION_ADMIN;
var MODAL_TOUR_ADMIN;
var MODAL_SCHEDULE_ADMIN;
var MODAL_BOOKING_ADMIN;
var MODAL_FEEDBACK_ADMIN;

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

    // Modal Category Admin
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
                    //
                    "colReorder": true,
                    "autoWidth": true,
                    "scrollX": true,
                    "stateSave": true,
                    //
                    "order": [],
                    // Button
                    "dom": 'Bfrtip',
                    "buttons": [
                        'csv', 'excel', 'print'
                    ],
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
        if(document.querySelector("#dis-tmce-content-category-update")) {
            const tinymce_update_category = tinymce.init({
                selector: TEXTAREA_INIT+"dis-tmce-content-category-update",
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
                        var get_content = document.querySelector("#get-tmce-content-category-update");
                        // innerHTML
                        get_content.innerHTML = editor.getContent();
                    });
                }
            });
            // Find
            $("#datatables-category-list").on("click", "#btn-update-category", function (e) {
                // var datatables = $("#datatables-category-list").DataTable();
                // Get Id From tag data-id
                var data_id = $(this).data("id");

                // Open Modal
                $("#modal-update-category").modal("show");
                // Call Ajax
                $.ajax({
                    url: URL_ACTION_FIND+"action_category.php",
                    data: { 
                        id: data_id,
                        action: "submit_category_find"
                    },
                    type: TYPE_POST,
                    success: function (data) {
                        var response = JSON.parse(data);

                        // Add Data in Input Value
                        $("#single-update-id").val(response.id);
                        $("#single-update-category").val(response.category);

                        // TinyMCE
                        tinymce.get("dis-tmce-content-category-update").setContent(response.content);
                        $("#dis-tmce-content-category-update").val(response.content);
                    
                        // Validate
                        const form_update_category = $("#form-update-category").validate({
                            ignore: [],
                            rules: {
                                "category": {
                                    required: true,
                                    rangelength: [3, 25],
                                },
                                "get-tmce-content-category-update": {
                                    required: true,
                                    minlength: 25
                                },
                            },
                            messages: {
                                "category": {
                                    required: "*Bạn Chưa Nhập Thể Loại",
                                    rangelength: "*Thể Loại Chỉ Nhận Từ 3 Đến 25 Ký Tự"
                                },
                                "get-tmce-content-category-update": {
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
                                        $("#modal-update-category").modal("hide");                                            

                                        // Form Input Reset
                                        $("#form-update-category")[0].reset();
                                    }
                                });
                            }
                        }); 
                    }
                });
            });
        }
        // Delete Modal
        $("#datatables-category-list").on("click", "#btn-delete-category", function (e) {
            var datatables = $("#datatables-category-list").DataTable();
            e.preventDefault();
            // Get Id From tag data-id
            var data_id = $(this).data("id");

            // Create Sweetalert2
            Swal.fire({
                title: "Bạn có chắc không?",
                text: "Bạn sẽ không thể phục hồi thể loại mã ["+data_id+"] này nữa!",
                icon: ICON_WARNING,
                showCancelButton: true,
                confirmButtonColor: CONFIRM_BUTTON_COLOR,
                cancelButtonColor: CANCEL_BUTTON_COLOR,
                confirmButtonText: CONFIRM_BUTTON_TEXT,
                cancelButtonText: CANCEL_BUTTON_TEXT,
            }).then((result) => {
                if(result.isConfirmed) {
                    // Delete
                    $.ajax({
                        url: URL_ACTION_FIND+"action_category.php",
                        data: {
                            id: data_id,
                            action: "submit_category_delete"
                        },
                        type: TYPE_POST,
                        success: function (data) {
                            datatables.ajax.reload();
                            // Check Status or Display Alert
                            Swal.fire({
                                title: "Đã xóa!",
                                text: "Dữ liệu đã xóa thành công.",
                                icon: "success"
                            });
                        }
                    });
                }
            });
        });
        // Detail Modal
        if(document.querySelector("#dis-tmce-content-category-detail")) {
            const tinymce_update_category = tinymce.init({
                selector: TEXTAREA_INIT+"dis-tmce-content-category-detail",
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
                // readonly
                readonly: true,
            });
            $("#datatables-category-list").on("click", "#btn-detail-category", function (e) {
                // var datatables = $("#datatables-category-list").DataTable();
                // e.preventDefault();
                // Get Id From tag data-id
                var data_id = $(this).data("id");

                // Open Modal
                $("#modal-detail-category").modal("show");
                // Call Ajax
                $.ajax({
                    url: URL_ACTION_FIND+"action_category.php",
                    data: {
                        id: data_id,
                        action: "submit_category_find"
                    },
                    type: TYPE_POST,
                    success: function (data) {
                        var response = JSON.parse(data);

                        // Add Data in Input Value
                        $("#single-detail-id").val(response.id);
                        $("#single-detail-category").val(response.category);

                        // TinyMCE
                        tinymce.get("dis-tmce-content-category-detail").setContent(response.content);
                        $("#dis-tmce-content-category-detail").val(response.content);

                        // Create at
                        $("#single-detail-create-at").val(response.create_at);
                    }
                });
            });
        }
        // Button Excel
        
    }

    // Modal Event Admin
    MODAL_EVENT_ADMIN = function modal_event_admin() {
        // DataTables Setup
        if(document.getElementById("datatables-event-list")) {
            try {
                $("#datatables-event-list").DataTable({
                    "language": {"url": LANG_VI_URL_DATATABLES},
                    "processing": true,
                    "serverSide": true,
                    "padding": true,
                    "responsive": true,
                    //
                    "colReorder": true,
                    "autoWidth": true,
                    "scrollX": true,
                    "stateSave": true,
                    //
                    "order": [],
                    // Button
                    "dom": 'Bfrtip',
                    "buttons": [
                        'csv', 'excel', 'print'
                    ],
                    "ajax": {
                        "url": "../../views/includes/data/data_event.php",
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
        if(document.querySelector("#dis-tmce-content-event") && document.querySelector("#dis-tmce-header-event")) {
            const tinymce_create_event_content = tinymce.init({
                selector: TEXTAREA_INIT+"dis-tmce-content-event",
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
                        var get_content = document.querySelector("#get-tmce-content-event");
                        // innerHTML
                        get_content.innerHTML = editor.getContent();
                    });
                }
            });
            const tinymce_create_event_header = tinymce.init({
                selector: TEXTAREA_INIT+"dis-tmce-header-event",
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
                        var get_content = document.querySelector("#get-tmce-header-event");
                        // innerHTML
                        get_content.innerHTML = editor.getContent();
                    });
                }
            });
            
            // Setup Create "datepicker" event
            $("#form-create-event #datetime-event").val(CALCULATE_DATE(TODAY, DAY, MONTH, YEAR));

            // Form
            const form_create_category = $("#form-create-event").validate({
                ignore: "",
                rules: {
                    "title": {
                        required: true,
                        rangelength: [6, 50]
                    },
                    "get-tmce-header-event": {
                        required: true,
                        minlength: 50
                    },
                    "get-tmce-content-event": {
                        required: true,
                        minlength: 50
                    },
                    "thumbnail": {
                        required: true,
                        fileSizeLimit: 1000000
                    },
                    "images": {
                        required: true,
                        fileSizeLimit: 1000000
                    },
                },
                messages: {
                    "title": {
                        required: "*Bạn Chưa Nhập Tựa Đề",
                        rangelength: "*Tựa Đề Chỉ Nhận Từ 6 Đến 50 Ký Tự"
                    },
                    "get-tmce-header-event": {
                        required: "*Bạn Chưa Nhập Phần Đầu",
                        minlength: "*Phần Đầu Chỉ Nhận Từ 50 Ký Tự Trở Lên"
                    },
                    "get-tmce-content-event": {
                        required: "*Bạn Chưa Nhập Phần Nội Dung",
                        minlength: "*Phần Nội Dung Chỉ Nhận Từ 50 Ký Tự Trở Lên"
                    },
                    "thumbnail": {
                        required: "*Bạn Chưa Nhập Hình Ảnh 1"
                    },
                    "images": {
                        required: "*Bạn Chưa Nhập Hình Ảnh 2"
                    },
                },
                submitHandler: function (form) {
                    $.ajax({
                        type: TYPE_POST,
                        url: URL_ACTION_VALIDATE+"action_event.php",
                        data: new FormData(form),
                        contentType: false,
                        processData: false,
                        // dataType: "json",
                        // cache : false,
                        success: function (data) {
                            var datatables = $("#datatables-event-list").DataTable();

                            datatables.ajax.reload();

                            // Close Modal
                            $("#modal-create-event").modal("hide");

                            // TinyMCE Reset
                            tinymce.get("dis-tmce-header-event").setContent("");
                            $("#get-tmce-header-event").html("");

                            tinymce.get("dis-tmce-content-event").setContent("");
                            $("#get-tmce-content-event").html("");

                            // Form Input Reset
                            $("#form-create-event")[0].reset();
                            
                            // Select2 Reset
                            $("#select2-category-event").select2({
                                theme: "bootstrap4",
                                tag: [] // Set Tag
                            });
                            
                            // Datetime Reset
                            $("#form-create-event #datetime-event").val(CALCULATE_DATE(TODAY, DAY, MONTH, YEAR));
                        }
                    });
                },
            });
        }
        // Update Modal
        // Delete Modal
        // Detail Modal
    }

    //
})(jQuery);

FILE_VALIDATE();
SELECT2();
SELECT2_BOOTSTRAP4();
// CALCULATE_DATE(TODAY, DAY, MONTH, YEAR);
MODAL_CATEGORY_ADMIN();
MODAL_EVENT_ADMIN();