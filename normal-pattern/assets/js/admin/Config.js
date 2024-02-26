const LANG_VI_URL_DATATABLES =
  "https://cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json";
const TYPE_POST = "POST";
const TYPE_GET = "GET";

const URL_FOLDER_DATATABLES = "../../views/includes/data/";
const URL_DATATABLES_CATEGORY = "data_category.php";
const URL_DATATABLES_EVENT = "data_event.php";
const URL_DATATABLES_LOCATION = "data_location.php";
const URL_DATATABLES_TOUR = "data_tour.php";
const URL_DATATABLES_SCHEDULE = "data_schedule.php";

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
var MONTH_NAME = [
  "Tháng Một",
  "Tháng Hai",
  "Tháng Ba",
  "Tháng Tư",
  "Tháng Năm",
  "Tháng Sáu",
  "Tháng Bảy",
  "Tháng Tám",
  "Tháng Chín",
  "Tháng Mười",
  "Tháng Mười Một",
  "Tháng Mười Hai",
];

var DAY_NAME = [
  "Chủ Nhật",
  "Thứ Hai",
  "Thứ Ba",
  "Thứ Tư",
  "Thứ Năm",
  "Thứ Sáu",
  "Thứ Bảy",
];

var DAY_NAME_SHORT = ["CN", "T2", "T3", "T4", "T5", "T6", "T7"];

var TODAY = new Date();
var DAY = String(TODAY.getDate()).padStart(2, "0");
var MONTH = String(TODAY.getMonth() + 1).padStart(2, "0");
var YEAR = TODAY.getFullYear();
//
var MODAL_CATEGORY_ADMIN;
var MODAL_EVENT_ADMIN;
var MODAL_LOCATION_ADMIN;
var MODAL_TOUR_ADMIN;
var MODAL_SCHEDULE_ADMIN;
var MODAL_BOOKING_ADMIN;
var MODAL_FEEDBACK_ADMIN;

(function () {
  FILE_VALIDATE = function file_validate() {
    jQuery.validator.addMethod(
      "fileSizeLimit",
      function (val, el, limit) {
        return !el.files[0] || el.files[0].size <= limit;
      },
      "*Kích Thước Tệp Quá Lớn"
    );
  };

  SELECT2 = function select2() {
    if (document.querySelector(".select2")) {
      try {
        return $(".select2").select2();
      } catch (ex) {
        return console.log(ex);
      }
    }
  };

  SELECT2_BOOTSTRAP4 = function select2bs4() {
    if (document.querySelector(".select2bs4")) {
      try {
        return $(".select2bs4").select2({
          theme: "bootstrap4",
        });
      } catch (ex) {
        return console.log(ex);
      }
    }
    if (document.querySelector(".select2bs4-location-tour")) {
      try {
        return $(".select2bs4-location-tour").select2({
          theme: "bootstrap4",
          placeholder: "Chọn Khu Vực",
          allowClear: true,
        });
      } catch (ex) {
        return console.log(ex);
      }
    }
    if (document.querySelector("#select2-tour-schedule-create")) {
      try {
        return $("#select2-tour-schedule-create").select2({
          theme: "bootstrap4",
          placeholder: "Chọn Sản Phẩm",
          allowClear: true,
        });
      } catch (ex) {
        return console.log(ex);
      }
    }
  };

  CALCULATE_DATE = function calculate_date(today, day, month, year) {
    today = day + "/" + month + "/" + year;

    return today;
  };

  DATEPICKER = function datepicker() {
    $.datepicker.regional["vi"] = {
      monthNames: MONTH_NAME,
      dayNames: DAY_NAME,
      dayNamesShort: DAY_NAME_SHORT,
      dayNamesMin: DAY_NAME_SHORT,
      days: DAY_NAME,
    };

    $.datepicker.setDefaults($.datepicker.regional["vi"]);

    if (document.querySelector(".datepicker-config")) {
      try {
        return $(".datepicker-config").datepicker({
          dateFormat: "dd/mm/yy",
          minDate: new Date("01/01/1970"),
          duration: "fast",
        });
      } catch (ex) {
        return console.log(ex);
      }
    }
    if (document.querySelector(".datepicker-config-2")) {
      try {
        return $(".datepicker-config-2").datepicker({
          dateFormat: "dd/mm/yy",
          minDate: +1,
          duration: "fast",
          yearRange: new Date().getFullYear() + ":" + new Date().getFullYear(),
          onSelect: function (date) {
            // Create
            var start_date = $("#start-datetime-schedule-create").datepicker(
              "getDate"
            );
            var days = $("#single-create-days-schedule").val();

            var get_start_date = new Date(start_date);
            get_start_date.setDate(get_start_date.getDate() + parseInt(days));
            var end_date =
              String(get_start_date.getDate()).padStart(2, "0") +
              "/" +
              String(get_start_date.getMonth() + 1).padStart(2, "0") +
              "/" +
              get_start_date.getFullYear();

            $("#end-datetime-schedule-create").val(end_date);

            // Update
            var start_date_update = $(
              "#start-datetime-schedule-update"
            ).datepicker("getDate");
            var days_update = $("#single-update-days-schedule").val();

            var get_start_date_update = new Date(start_date_update);
            get_start_date_update.setDate(
              get_start_date_update.getDate() + parseInt(days_update)
            );
            var end_date_update =
              String(get_start_date_update.getDate()).padStart(2, "0") +
              "/" +
              String(get_start_date_update.getMonth() + 1).padStart(2, "0") +
              "/" +
              get_start_date_update.getFullYear();

            $("#end-datetime-schedule-update").val(end_date_update);
          },
        });
      } catch (ex) {
        return console.log(ex);
      }
    }
  };

  // Modal Category Admin
  MODAL_CATEGORY_ADMIN = function modal_category_admin() {
    // DataTables Setup
    if (document.getElementById("datatables-category-list")) {
      try {
        $("#datatables-category-list").DataTable({
          language: { url: LANG_VI_URL_DATATABLES },
          processing: true,
          serverSide: true,
          padding: true,
          responsive: true,
          //
          colReorder: true,
          autoWidth: true,
          scrollX: true,
          stateSave: true,
          //
          order: [],
          // Button
          dom: "Bfrtip",
          buttons: ["csv", "excel", "print"],
          ajax: {
            url: "../../views/includes/data/data_category.php",
            type: TYPE_POST,
          },
          fnCreateRow: function (nRow, aData, iDataIndex) {
            // Add Data Id in tag <tr>
            $(nRow).attr("id", aData[0]);
            //
          },
          columnDefs: [
            {
              targets: [0, 3],
              searchable: false,
              orderable: false,
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
    if (document.querySelector("#dis-tmce-content-category")) {
      const tinymce_create_category = tinymce.init({
        selector: TEXTAREA_INIT + "dis-tmce-content-category",
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
        setup: function (editor, ed) {
          editor.on("init keydown change", (e) => {
            var get_content = document.querySelector(
              "#get-tmce-content-category"
            );
            // innerHTML
            get_content.innerHTML = editor.getContent();
          });
        },
      });

      const form_create_category = $("#form-create-category").validate({
        ignore: [],
        rules: {
          category: {
            required: true,
            rangelength: [3, 25],
          },
          "get-tmce-content-category": {
            required: true,
            minlength: 25,
          },
        },
        messages: {
          category: {
            required: "*Bạn Chưa Nhập Thể Loại",
            rangelength: "*Thể Loại Chỉ Nhận Từ 3 Đến 25 Ký Tự",
          },
          "get-tmce-content-category": {
            required: "*Bạn Chưa Nhập Nội Dung",
            minlength: "*Nội Dung Phải Từ 25 Ký Tự Trở Lên",
          },
        },
        submitHandler: function (form) {
          $.ajax({
            type: TYPE_POST,
            url: URL_ACTION_VALIDATE + "action_category.php",
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
            },
          });
        },
      });
    }
    // Update Modal
    if (document.querySelector("#dis-tmce-content-category-update")) {
      const tinymce_update_category = tinymce.init({
        selector: TEXTAREA_INIT + "dis-tmce-content-category-update",
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
        setup: function (editor, ed) {
          editor.on("init keydown change", (e) => {
            var get_content = document.querySelector(
              "#get-tmce-content-category-update"
            );
            // innerHTML
            get_content.innerHTML = editor.getContent();
          });
        },
      });
      // Find
      $("#datatables-category-list").on(
        "click",
        "#btn-update-category",
        function (e) {
          // var datatables = $("#datatables-category-list").DataTable();
          // Get Id From tag data-id
          var data_id = $(this).data("id");

          // Open Modal
          $("#modal-update-category").modal("show");
          // Call Ajax
          $.ajax({
            url: URL_ACTION_FIND + "action_category.php",
            data: {
              id: data_id,
              action: "submit_category_find",
            },
            type: TYPE_POST,
            success: function (data) {
              var response = JSON.parse(data);

              // Add Data in Input Value
              $("#single-update-id").val(response.id);
              $("#single-update-category").val(response.category);

              // TinyMCE
              tinymce
                .get("dis-tmce-content-category-update")
                .setContent(response.content);
              $("#dis-tmce-content-category-update").val(response.content);

              // Validate
              const form_update_category = $("#form-update-category").validate({
                ignore: [],
                rules: {
                  category: {
                    required: true,
                    rangelength: [3, 25],
                  },
                  "get-tmce-content-category-update": {
                    required: true,
                    minlength: 25,
                  },
                },
                messages: {
                  category: {
                    required: "*Bạn Chưa Nhập Thể Loại",
                    rangelength: "*Thể Loại Chỉ Nhận Từ 3 Đến 25 Ký Tự",
                  },
                  "get-tmce-content-category-update": {
                    required: "*Bạn Chưa Nhập Nội Dung",
                    minlength: "*Nội Dung Phải Từ 25 Ký Tự Trở Lên",
                  },
                },
                submitHandler: function (form) {
                  $.ajax({
                    type: TYPE_POST,
                    url: URL_ACTION_VALIDATE + "action_category.php",
                    data: $(form).serializeArray(),
                    success: function (data) {
                      var datatables = $(
                        "#datatables-category-list"
                      ).DataTable();

                      datatables.ajax.reload();

                      // Close Modal
                      $("#modal-update-category").modal("hide");

                      // Form Input Reset
                      $("#form-update-category")[0].reset();
                    },
                  });
                },
              });
            },
          });
        }
      );
    }
    // Delete Modal
    $("#datatables-category-list").on(
      "click",
      "#btn-delete-category",
      function (e) {
        var datatables = $("#datatables-category-list").DataTable();
        e.preventDefault();
        // Get Id From tag data-id
        var data_id = $(this).data("id");

        // Create Sweetalert2
        Swal.fire({
          title: "Bạn có chắc không?",
          text:
            "Bạn sẽ không thể phục hồi thể loại mã [" + data_id + "] này nữa!",
          icon: ICON_WARNING,
          showCancelButton: true,
          confirmButtonColor: CONFIRM_BUTTON_COLOR,
          cancelButtonColor: CANCEL_BUTTON_COLOR,
          confirmButtonText: CONFIRM_BUTTON_TEXT,
          cancelButtonText: CANCEL_BUTTON_TEXT,
        }).then((result) => {
          if (result.isConfirmed) {
            // Delete
            $.ajax({
              url: URL_ACTION_FIND + "action_category.php",
              data: {
                id: data_id,
                action: "submit_category_delete",
              },
              type: TYPE_POST,
              success: function (data) {
                datatables.ajax.reload();
                // Check Status or Display Alert
                Swal.fire({
                  title: "Đã xóa!",
                  text: "Dữ liệu đã xóa thành công.",
                  icon: "success",
                });
              },
            });
          }
        });
      }
    );
    // Detail Modal
    if (document.querySelector("#dis-tmce-content-category-detail")) {
      const tinymce_detail_category = tinymce.init({
        selector: TEXTAREA_INIT + "dis-tmce-content-category-detail",
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
      $("#datatables-category-list").on(
        "click",
        "#btn-detail-category",
        function (e) {
          // var datatables = $("#datatables-category-list").DataTable();
          // e.preventDefault();
          // Get Id From tag data-id
          var data_id = $(this).data("id");

          // Open Modal
          $("#modal-detail-category").modal("show");
          // Call Ajax
          $.ajax({
            url: URL_ACTION_FIND + "action_category.php",
            data: {
              id: data_id,
              action: "submit_category_find",
            },
            type: TYPE_POST,
            success: function (data) {
              var response = JSON.parse(data);

              // Add Data in Input Value
              $("#single-detail-id").val(response.id);
              $("#single-detail-category").val(response.category);

              // TinyMCE
              tinymce
                .get("dis-tmce-content-category-detail")
                .setContent(response.content);
              $("#dis-tmce-content-category-detail").val(response.content);

              // Create at
              $("#single-detail-create-at").val(response.create_at);
            },
          });
        }
      );
    }
    // Button Excel
  };

  // Modal Event Admin
  MODAL_EVENT_ADMIN = function modal_event_admin() {
    // DataTables Setup
    if (document.getElementById("datatables-event-list")) {
      try {
        $("#datatables-event-list").DataTable({
          language: { url: LANG_VI_URL_DATATABLES },
          processing: true,
          serverSide: true,
          padding: true,
          responsive: true,
          //
          colReorder: true,
          autoWidth: true,
          scrollX: true,
          stateSave: true,
          //
          order: [],
          // Button
          dom: "Bfrtip",
          buttons: ["csv", "excel", "print"],
          ajax: {
            url: "../../views/includes/data/data_event.php",
            type: TYPE_POST,
          },
          fnCreateRow: function (nRow, aData, iDataIndex) {
            // Add Data Id in tag <tr>
            $(nRow).attr("id", aData[0]);
            //
          },
          columnDefs: [
            {
              targets: [0, 4],
              searchable: false,
              orderable: false,
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
    if (
      document.querySelector("#dis-tmce-content-event") &&
      document.querySelector("#dis-tmce-header-event")
    ) {
      const tinymce_create_event_content = tinymce.init({
        selector: TEXTAREA_INIT + "dis-tmce-content-event",
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
        setup: function (editor, ed) {
          editor.on("init keydown change", (e) => {
            var get_content = document.querySelector("#get-tmce-content-event");
            // innerHTML
            get_content.innerHTML = editor.getContent();
          });
        },
      });
      const tinymce_create_event_header = tinymce.init({
        selector: TEXTAREA_INIT + "dis-tmce-header-event",
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
        setup: function (editor, ed) {
          editor.on("init keydown change", (e) => {
            var get_content = document.querySelector("#get-tmce-header-event");
            // innerHTML
            get_content.innerHTML = editor.getContent();
          });
        },
      });

      // Setup Create "datepicker" event
      $("#form-create-event #datetime-event").val(
        CALCULATE_DATE(TODAY, DAY, MONTH, YEAR)
      );

      // Form
      const form_create_category = $("#form-create-event").validate({
        ignore: "",
        rules: {
          title: {
            required: true,
            rangelength: [6, 50],
          },
          "get-tmce-header-event": {
            required: true,
            minlength: 50,
          },
          "get-tmce-content-event": {
            required: true,
            minlength: 50,
          },
          thumbnail: {
            required: true,
            fileSizeLimit: 1000000,
          },
          images: {
            required: true,
            fileSizeLimit: 1000000,
          },
        },
        messages: {
          title: {
            required: "*Bạn Chưa Nhập Tựa Đề",
            rangelength: "*Tựa Đề Chỉ Nhận Từ 6 Đến 50 Ký Tự",
          },
          "get-tmce-header-event": {
            required: "*Bạn Chưa Nhập Phần Đầu",
            minlength: "*Phần Đầu Chỉ Nhận Từ 50 Ký Tự Trở Lên",
          },
          "get-tmce-content-event": {
            required: "*Bạn Chưa Nhập Phần Nội Dung",
            minlength: "*Phần Nội Dung Chỉ Nhận Từ 50 Ký Tự Trở Lên",
          },
          thumbnail: {
            required: "*Bạn Chưa Nhập Hình Ảnh 1",
          },
          images: {
            required: "*Bạn Chưa Nhập Hình Ảnh 2",
          },
        },
        submitHandler: function (form) {
          $.ajax({
            type: TYPE_POST,
            url: URL_ACTION_VALIDATE + "action_event.php",
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
                tag: [], // Set Tag
              });

              // Datetime Reset
              $("#form-create-event #datetime-event").val(
                CALCULATE_DATE(TODAY, DAY, MONTH, YEAR)
              );
            },
          });
        },
      });
    }
    // Update Modal
    if (
      document.querySelector("#dis-tmce-content-event-update") &&
      document.querySelector("#dis-tmce-header-event-update")
    ) {
      const tinymce_update_event_content = tinymce.init({
        selector: TEXTAREA_INIT + "dis-tmce-content-event-update",
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
        setup: function (editor, ed) {
          editor.on("init keydown change", (e) => {
            var get_content = document.querySelector(
              "#get-tmce-content-event-update"
            );
            // innerHTML
            get_content.innerHTML = editor.getContent();
          });
        },
      });
      const tinymce_update_event_header = tinymce.init({
        selector: TEXTAREA_INIT + "dis-tmce-header-event-update",
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
        setup: function (editor, ed) {
          editor.on("init keydown change", (e) => {
            var get_content = document.querySelector(
              "#get-tmce-header-event-update"
            );
            // innerHTML
            get_content.innerHTML = editor.getContent();
          });
        },
      });
      // Find
      $("#datatables-event-list").on(
        "click",
        "#btn-update-event",
        function (e) {
          // var datatables = $("#datatables-event-list").DataTable();
          // Get Id From tag data-id
          e.preventDefault();
          var data_id = $(this).data("id");

          // Open Modal
          $("#modal-update-event").modal("show");

          $.ajax({
            url: URL_ACTION_FIND + "action_event.php",
            data: {
              id: data_id,
              action: "submit_event_find",
            },
            type: TYPE_POST,
            success: function (data) {
              var response = JSON.parse(data);

              // Add Data in Input Value
              $("#single-update-id-event").val(response.id);
              $("#single-update-title-event").val(response.title);

              $("#upload-update-thumbnail-event").attr(
                "src",
                "../../../normal-pattern/upload/thumbnail/" +
                  response.thumbnail +
                  ""
              );
              $("#upload-update-images-event").attr(
                "src",
                "../../../normal-pattern/upload/images/" + response.images + ""
              );

              // TinyMCE
              tinymce
                .get("dis-tmce-header-event-update")
                .setContent(response.header);
              $("#dis-tmce-header-event-update").val(response.header);

              tinymce
                .get("dis-tmce-content-event-update")
                .setContent(response.content);
              $("#dis-tmce-content-event-update").val(response.content);

              var str = [response.category_id];
              var str_stringify = JSON.stringify(str[0]).trim();
              var arr = str_stringify.split(",");

              var clear_arr = arr.map(function (el) {
                return el.replace(/["\\]/g, "");
              });

              var values = clear_arr;
              var select_el = $("#select2-category-event-update");

              select_el.val(values);
              select_el.trigger("change");

              // Datetime
              $("#datetime-event-update").val(response.datetime);

              //
              const form_update_category = $("#form-update-event").validate({
                ignore: "",
                rules: {
                  title: {
                    required: true,
                    rangelength: [6, 50],
                  },
                  "get-tmce-header-event-update": {
                    required: true,
                    minlength: 50,
                  },
                  "get-tmce-content-event-update": {
                    required: true,
                    minlength: 50,
                  },
                  thumbnail: {
                    // required: true,
                    fileSizeLimit: 1000000,
                  },
                  images: {
                    // required: true,
                    fileSizeLimit: 1000000,
                  },
                },
                messages: {
                  title: {
                    required: "*Bạn Chưa Nhập Tựa Đề",
                    rangelength: "*Tựa Đề Chỉ Nhận Từ 6 Đến 50 Ký Tự",
                  },
                  "get-tmce-header-event-update": {
                    required: "*Bạn Chưa Nhập Phần Đầu",
                    minlength: "*Phần Đầu Chỉ Nhận Từ 50 Ký Tự Trở Lên",
                  },
                  "get-tmce-content-event-update": {
                    required: "*Bạn Chưa Nhập Phần Nội Dung",
                    minlength: "*Phần Nội Dung Chỉ Nhận Từ 50 Ký Tự Trở Lên",
                  },
                  thumbnail: {
                    // required: "*Bạn Chưa Nhập Hình Ảnh 1"
                  },
                  images: {
                    // required: "*Bạn Chưa Nhập Hình Ảnh 2"
                  },
                },
                submitHandler: function (form) {
                  $.ajax({
                    type: TYPE_POST,
                    url: URL_ACTION_VALIDATE + "action_event.php",
                    data: new FormData(form),
                    contentType: false,
                    processData: false,
                    // dataType: "json",
                    // cache : false,
                    success: function (data) {
                      var datatables = $("#datatables-event-list").DataTable();

                      datatables.ajax.reload();

                      // Close Modal
                      $("#modal-update-event").modal("hide");

                      // Form Input Reset
                      $("#form-create-event")[0].reset();
                    },
                  });
                },
              });
            },
          });
        }
      );
    }
    // Delete Modal
    $("#datatables-event-list").on("click", "#btn-delete-event", function (e) {
      var datatables = $("#datatables-event-list").DataTable();
      e.preventDefault();
      // Get Id From tag data-id
      var data_id = $(this).data("id");

      // Create Sweetalert2
      Swal.fire({
        title: "Bạn có chắc không?",
        text: "Bạn sẽ không thể phục hồi sự kiện mã [" + data_id + "] này nữa!",
        icon: ICON_WARNING,
        showCancelButton: true,
        confirmButtonColor: CONFIRM_BUTTON_COLOR,
        cancelButtonColor: CANCEL_BUTTON_COLOR,
        confirmButtonText: CONFIRM_BUTTON_TEXT,
        cancelButtonText: CANCEL_BUTTON_TEXT,
      }).then((result) => {
        if (result.isConfirmed) {
          // Delete
          $.ajax({
            url: URL_ACTION_FIND + "action_event.php",
            data: {
              id: data_id,
              action: "submit_event_delete",
            },
            type: TYPE_POST,
            success: function (data) {
              datatables.ajax.reload();
              // Check Status or Display Alert
              Swal.fire({
                title: "Đã xóa!",
                text: "Dữ liệu đã xóa thành công.",
                icon: "success",
              });
            },
          });
        }
      });
    });
    // Detail Modal
    if (
      document.querySelector("#dis-tmce-content-event-detail") &&
      document.querySelector("#dis-tmce-header-event-detail")
    ) {
      const tinymce_detail_event_content = tinymce.init({
        selector: TEXTAREA_INIT + "dis-tmce-content-event-detail",
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
      const tinymce_detail_event_header = tinymce.init({
        selector: TEXTAREA_INIT + "dis-tmce-header-event-detail",
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
      $("#datatables-event-list").on(
        "click",
        "#btn-detail-event",
        function (e) {
          // var datatables = $("#datatables-event-list").DataTable();
          // e.preventDefault();
          // Get Id From tag data-id
          var data_id = $(this).data("id");

          // Open Modal
          $("#modal-detail-event").modal("show");
          // Call Ajax
          $.ajax({
            url: URL_ACTION_FIND + "action_event.php",
            data: {
              id: data_id,
              action: "submit_event_find",
            },
            type: TYPE_POST,
            success: function (data) {
              var response = JSON.parse(data);

              // Add Data in Input Value
              $("#single-detail-id-event").val(response.id);
              $("#single-detail-title-event").val(response.title);

              $("#upload-detail-thumbnail-event").attr(
                "src",
                "../../../normal-pattern/upload/thumbnail/" +
                  response.thumbnail +
                  ""
              );
              $("#upload-detail-images-event").attr(
                "src",
                "../../../normal-pattern/upload/images/" + response.images + ""
              );

              // TinyMCE
              tinymce
                .get("dis-tmce-header-event-detail")
                .setContent(response.header);

              tinymce
                .get("dis-tmce-content-event-detail")
                .setContent(response.content);

              var str = [response.category_id];
              var str_stringify = JSON.stringify(str[0]).trim();
              var arr = str_stringify.split(",");

              var clear_arr = arr.map(function (el) {
                return el.replace(/["\\]/g, "");
              });

              var values = clear_arr;
              var select_el = $("#select2-category-event-detail");

              select_el.val(values);
              select_el.trigger("change");

              $("#select2-category-event-detail").val(response.category_id);
              $("#datetime-event-detail").val(response.datetime);

              // Create at
              $("#single-detail-create-at-event").val(response.create_at);
            },
          });
        }
      );
    }
    // Button
  };

  // Modal Location Admin
  MODAL_LOCATION_ADMIN = function modal_location_admin() {
    // DataTables Setup
    if (document.getElementById("datatables-location-list")) {
      try {
        $("#datatables-location-list").DataTable({
          language: { url: LANG_VI_URL_DATATABLES },
          processing: true,
          serverSide: true,
          padding: true,
          responsive: true,
          //
          colReorder: true,
          autoWidth: true,
          scrollX: true,
          stateSave: true,
          //
          order: [],
          // Button
          dom: "Bfrtip",
          buttons: ["csv", "excel", "print"],
          ajax: {
            url: "../../views/includes/data/data_location.php",
            type: TYPE_POST,
          },
          fnCreateRow: function (nRow, aData, iDataIndex) {
            // Add Data Id in tag <tr>
            $(nRow).attr("id", aData[0]);
            //
          },
          columnDefs: [
            {
              targets: [0, 4],
              searchable: false,
              orderable: false,
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
    const form_create_location = $("#form-create-location").validate({
      ignore: "",
      rules: {
        location_name: {
          required: true,
          rangelength: [3, 25],
        },
        city: {
          required: true,
          rangelength: [3, 50],
        },
        acronym: {
          // required: false,
          rangelength: [0, 10],
        },
        address: {
          // required: false,
          rangelength: [0, 100],
        },
      },
      messages: {
        location_name: {
          required: "*Bạn Chưa Nhập Khu Vực",
          rangelength: "*Khu Vực Chỉ Nhận Từ 3 Đến 25 Ký Tự",
        },
        city: {
          required: "*Bạn Chưa Nhập Thành Phố",
          rangelength: "*Thành Phố Chỉ Nhận Từ 3 Đến 50 Ký Tự",
        },
        acronym: {
          rangelength: "*Ký Tự Chỉ Nhận Từ 0 Đến 10 Ký Tự",
        },
        address: {
          rangelength: "*Địa Chỉ Chỉ Nhận Từ 0 Đến 100 Ký Tự",
        },
      },
      submitHandler: function (form) {
        $.ajax({
          type: TYPE_POST,
          url: URL_ACTION_VALIDATE + "action_location.php",
          data: $(form).serializeArray(),
          success: function (data) {
            // console.log($(form).serializeArray());
            var datatables = $("#datatables-location-list").DataTable();

            datatables.ajax.reload();
            // Close Modal
            $("#modal-create-location").modal("hide");

            // Refesh Map

            // Form Input Reset
            $("#form-create-location")[0].reset();
          },
        });
      },
    });
    // Update Modal
    $("#datatables-location-list").on(
      "click",
      "#btn-update-location",
      function (e) {
        // var datatables = $("#datatables-location-list").DataTable();
        // Get Id From tag data-id
        e.preventDefault();
        var data_id = $(this).data("id");

        // Open Modal
        $("#modal-update-location").modal("show");

        $.ajax({
          url: URL_ACTION_FIND + "action_location.php",
          data: {
            id: data_id,
            action: "submit_location_find",
          },
          type: TYPE_POST,
          success: function (data) {
            var response = JSON.parse(data);

            // Add Data in Input Value
            $("#single-update-id-location").val(response.id);
            $("#single-update-name-location").val(response.location_name);
            $("#single-update-city-location").val(response.city);
            $("#single-update-acronym-location").val(response.acronym);
            $("#single-update-address-location").val(response.address);

            //
            const form_update_location = $("#form-update-location").validate({
              ignore: "",
              rules: {
                location_name: {
                  required: true,
                  rangelength: [3, 25],
                },
                city: {
                  required: true,
                  rangelength: [3, 50],
                },
                acronym: {
                  // required: false,
                  rangelength: [0, 10],
                },
                address: {
                  // required: false,
                  rangelength: [0, 100],
                },
              },
              messages: {
                location_name: {
                  required: "*Bạn Chưa Nhập Khu Vực",
                  rangelength: "*Khu Vực Chỉ Nhận Từ 3 Đến 25 Ký Tự",
                },
                city: {
                  required: "*Bạn Chưa Nhập Thành Phố",
                  rangelength: "*Thành Phố Chỉ Nhận Từ 3 Đến 50 Ký Tự",
                },
                acronym: {
                  rangelength: "*Ký Tự Chỉ Nhận Từ 0 Đến 10 Ký Tự",
                },
                address: {
                  rangelength: "*Địa Chỉ Chỉ Nhận Từ 0 Đến 100 Ký Tự",
                },
              },
              submitHandler: function (form) {
                $.ajax({
                  type: TYPE_POST,
                  url: URL_ACTION_VALIDATE + "action_location.php",
                  data: $(form).serializeArray(),
                  success: function (data) {
                    // console.log($(form).serializeArray());
                    var datatables = $("#datatables-location-list").DataTable();

                    datatables.ajax.reload();
                    // Close Modal
                    $("#modal-update-location").modal("hide");

                    // Refesh Map

                    // Form Input Reset
                    $("#form-update-location")[0].reset();
                  },
                });
              },
            });
          },
        });
      }
    );
    // Delete Modal
    $("#datatables-location-list").on(
      "click",
      "#btn-delete-location",
      function (e) {
        var datatables = $("#datatables-location-list").DataTable();
        e.preventDefault();
        // Get Id From tag data-id
        var data_id = $(this).data("id");

        // Create Sweetalert2
        Swal.fire({
          title: "Bạn có chắc không?",
          text:
            "Bạn sẽ không thể phục hồi khu vực mã [" + data_id + "] này nữa!",
          icon: ICON_WARNING,
          showCancelButton: true,
          confirmButtonColor: CONFIRM_BUTTON_COLOR,
          cancelButtonColor: CANCEL_BUTTON_COLOR,
          confirmButtonText: CONFIRM_BUTTON_TEXT,
          cancelButtonText: CANCEL_BUTTON_TEXT,
        }).then((result) => {
          if (result.isConfirmed) {
            // Delete
            $.ajax({
              url: URL_ACTION_FIND + "action_location.php",
              data: {
                id: data_id,
                action: "submit_location_delete",
              },
              type: TYPE_POST,
              success: function (data) {
                datatables.ajax.reload();
                // Check Status or Display Alert
                Swal.fire({
                  title: "Đã xóa!",
                  text: "Dữ liệu đã xóa thành công.",
                  icon: "success",
                });
              },
            });
          }
        });
      }
    );
    // Detail Modal
    $("#datatables-location-list").on(
      "click",
      "#btn-detail-location",
      function (e) {
        // var datatables = $("#datatables-location-list").DataTable();
        // Get Id From tag data-id
        e.preventDefault();
        var data_id = $(this).data("id");

        // Open Modal
        $("#modal-detail-location").modal("show");

        $.ajax({
          url: URL_ACTION_FIND + "action_location.php",
          data: {
            id: data_id,
            action: "submit_location_find",
          },
          type: TYPE_POST,
          success: function (data) {
            var response = JSON.parse(data);

            // Add Data in Input Value
            $("#single-detail-id-location").val(response.id);
            $("#single-detail-name-location").val(response.location_name);
            $("#single-detail-city-location").val(response.city);
            $("#single-detail-acronym-location").val(response.acronym);
            $("#single-detail-address-location").val(response.address);
            $("#single-detail-create-at-location").val(response.create_at);
          },
        });
      }
    );
  };

  // Modal Tour Admin
  MODAL_TOUR_ADMIN = function modal_tour_admin() {
    // DataTables Setup
    if (document.getElementById("datatables-tour-list")) {
      try {
        $("#datatables-tour-list").DataTable({
          language: { url: LANG_VI_URL_DATATABLES },
          processing: true,
          serverSide: true,
          padding: true,
          responsive: true,
          //
          colReorder: true,
          autoWidth: true,
          scrollX: true,
          stateSave: true,
          //
          order: [],
          // Button
          dom: "Bfrtip",
          buttons: ["csv", "excel", "print"],
          ajax: {
            url: "../../views/includes/data/data_tour.php",
            type: TYPE_POST,
          },
          fnCreateRow: function (nRow, aData, iDataIndex) {
            // Add Data Id in tag <tr>
            $(nRow).attr("id", aData[0]);
            //
          },
          columnDefs: [
            {
              targets: [0, 5],
              searchable: false,
              orderable: false,
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
    if (document.querySelector("#dis-tmce-content-tour")) {
      const tinymce_create_tour = tinymce.init({
        selector: TEXTAREA_INIT + "dis-tmce-content-tour",
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
        setup: function (editor, ed) {
          editor.on("init keydown change", (e) => {
            var get_content = document.querySelector("#get-tmce-content-tour");
            // innerHTML
            get_content.innerHTML = editor.getContent();
          });
        },
      });

      const form_create_tour = $("#form-create-tour").validate({
        ignore: [],
        rules: {
          title: {
            required: true,
            rangelength: [6, 50],
          },
          price_total: {
            required: true,
            number: true,
            remote: {
              url: "../../../normal-pattern/views/includes/validate/tour/validate_price_total.php",
              type: TYPE_POST,
              data: {
                price_total: function () {
                  return $(
                    "#form-create-tour :input[name='price_total']"
                  ).val();
                },
              },
            },
          },
          price_children: {
            required: true,
            number: true,
            remote: {
              url: "../../../normal-pattern/views/includes/validate/tour/validate_price_children.php",
              type: TYPE_POST,
              data: {
                price_children: function () {
                  return $(
                    "#form-create-tour :input[name='price_children']"
                  ).val();
                },
              },
            },
          },
          price_person: {
            required: true,
            number: true,
            remote: {
              url: "../../../normal-pattern/views/includes/validate/tour/validate_price_person.php",
              type: TYPE_POST,
              data: {
                price_person: function () {
                  return $(
                    "#form-create-tour :input[name='price_person']"
                  ).val();
                },
              },
            },
          },
          content: {
            required: true,
            minlength: 50,
          },
          thumbnail: {
            required: true,
            fileSizeLimit: 1000000,
          },
          images: {
            required: true,
            fileSizeLimit: 1000000,
          },
          days: {
            required: true,
            number: true,
            remote: {
              url: "../../../normal-pattern/views/includes/validate/tour/validate_days.php",
              type: TYPE_POST,
              data: {
                days: function () {
                  return $("#form-create-tour :input[name='days']").val();
                },
              },
            },
          },
          number_of_seat: {
            required: true,
            number: true,
            remote: {
              url: "../../../normal-pattern/views/includes/validate/tour/validate_number_of_seat.php",
              type: TYPE_POST,
              data: {
                number_of_seat: function () {
                  return $("#form-create-tour :input[name='number_of_seat']").val(), $("#form-create-tour :input[name='amount_person']").val(), $("#form-create-tour :input[name='amount_children']").val();                  
                },
              },
            },
          },
          location_id: {
            required: true,
          },
        },
        messages: {
          title: {
            required: "*Bạn Chưa Nhập Tựa Đề",
            rangelength: "*Tựa Đề Chỉ Nhận Từ 6 Đến 50 Ký Tự",
          },
          price_total: {
            required: "*Bạn Chưa Nhập Giá Tiền",
            number: "*Giá Tiền Phải Là Ký Số",
            remote: "*Giá Tiền Chỉ Nhận Từ 0 VNĐ Đến 100.000.000 VNĐ",
          },
          price_children: {
            required: "*Bạn Chưa Nhập Giá Trẻ Em",
            number: "*Giá Trẻ Em Phải Là Ký Số",
            remote: "*Giá Trẻ Em Chỉ Nhận Từ 0 VNĐ Đến 10.000.000 VNĐ",
          },
          price_person: {
            required: "*Bạn Chưa Nhập Giá Người Lớn",
            number: "*Giá Người Lớn Phải Là Ký Số",
            remote: "*Giá Ngưởi Lớn Chỉ Nhận Từ 0 VNĐ Đến 10.000.000 VNĐ",
          },
          content: {
            required: "*Bạn Chưa Nhập Phần Nội Dung",
            minlength: "*Phần Nội Dung Chỉ Nhận Từ 50 Ký Tự Trở Lên",
          },
          thumbnail: {
            required: "*Bạn Chưa Nhập Hình Ảnh 1",
          },
          images: {
            required: "*Bạn Chưa Nhập Hình Ảnh 2",
          },
          days: {
            required: "*Bạn Chưa Nhập Số Ngày",
            number: "*Số Ngày Phải Là Ký Số",
            remote: "*Số Ngày Chỉ Nhận Từ 1 Đến 90 Ngày",
          },
          number_of_seat: {
            required: "*Bạn Chưa Nhập Số Chổ",
            number: "*Số Chỗ Phải Là Ký Số",
            remote: "*Số Chỗ Chỉ Nhận Từ 1 Đến 1000 Chỗ",
          },
          location_id: {
            required: "*Bạn Chưa Chọn Khu Vực",
          },
        },
        errorPlacement: function (error, element) {
          if (element.attr("name") == "location_id") {
            error.insertAfter("#modal-create-tour span.select2");
          } else {
            error.insertAfter(element);
          }
        },
        submitHandler: function (form) {
          $.ajax({
            type: TYPE_POST,
            url: URL_ACTION_VALIDATE + "action_tour.php",
            data: new FormData(form),
            contentType: false,
            processData: false,
            // dataType: "json",
            // cache : false,
            success: function (data) {
              var datatables = $("#datatables-tour-list").DataTable();

              datatables.ajax.reload();

              // Close Modal
              $("#modal-create-tour").modal("hide");

              // TinyMCE Reset
              tinymce.get("dis-tmce-content-tour").setContent("");
              $("#get-tmce-content-event").html("");

              // Form Input Reset
              $("#form-create-tour")[0].reset();

              // Reset Select2 Location
              $("#select2-location-tour-create").select2({
                theme: "bootstrap4",
                placeholder: "Chọn Khu Vực",
                allowClear: true,
                tag: [],
              });
            },
          });
        },
      });
    }
    // Update Modal
    if (document.querySelector("#dis-tmce-content-tour-update")) {
      const tinymce_update_tour = tinymce.init({
        selector: TEXTAREA_INIT + "dis-tmce-content-tour-update",
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
        setup: function (editor, ed) {
          editor.on("init keydown change", (e) => {
            var get_content = document.querySelector(
              "#get-tmce-content-tour-update"
            );
            // innerHTML
            get_content.innerHTML = editor.getContent();
          });
        },
      });
      $("#datatables-tour-list").on("click", "#btn-update-tour", function (e) {
        // var datatables = $("#datatables-tour-list").DataTable();
        // Get Id From tag data-id
        e.preventDefault();
        var data_id = $(this).data("id");

        // Open Modal
        $("#modal-update-tour").modal("show");

        $.ajax({
          url: URL_ACTION_FIND + "action_tour.php",
          data: {
            id: data_id,
            action: "submit_tour_find",
          },
          type: TYPE_POST,
          success: function (data) {
            var response = JSON.parse(data);

            // Add Data in Input Value
            $("#single-update-id-tour").val(response.id);
            $("#single-update-title-tour").val(response.title);
            $("#single-update-price-total-tour").val(response.price_total);
            $("#single-update-price-children-tour").val(
              response.price_children
            );
            $("#single-update-price-person-tour").val(response.price_person);

            $("#upload-update-thumbnail-tour").attr(
              "src",
              "../../../normal-pattern/upload/thumbnail/" +
                response.thumbnail +
                ""
            );
            $("#upload-update-images-tour").attr(
              "src",
              "../../../normal-pattern/upload/images/" + response.images + ""
            );

            // TinyMCE
            tinymce
              .get("dis-tmce-content-tour-update")
              .setContent(response.content);

            $("#single-update-days-tour").val(response.days);
            $("#single-update-number-of-seat-tour").val(
              response.number_of_seat
            );
            var select_el = $("#select2-location-tour-update");

            select_el.val(response.location_id);
            select_el.trigger("change");

            const form_update_tour = $("#form-update-tour").validate({
              ignore: [],
              rules: {
                title: {
                  required: true,
                  rangelength: [6, 50],
                },
                price_total: {
                  required: true,
                  number: true,
                  remote: {
                    url: "../../../normal-pattern/views/includes/validate/tour/validate_price_total.php",
                    type: TYPE_POST,
                    data: {
                      price_total: function () {
                        return $(
                          "#form-update-tour :input[name='price_total']"
                        ).val();
                      },
                    },
                  },
                },
                price_children: {
                  required: true,
                  number: true,
                  remote: {
                    url: "../../../normal-pattern/views/includes/validate/tour/validate_price_children.php",
                    type: TYPE_POST,
                    data: {
                      price_children: function () {
                        return $(
                          "#form-update-tour :input[name='price_children']"
                        ).val();
                      },
                    },
                  },
                },
                price_person: {
                  required: true,
                  number: true,
                  remote: {
                    url: "../../../normal-pattern/views/includes/validate/tour/validate_price_person.php",
                    type: TYPE_POST,
                    data: {
                      price_person: function () {
                        return $(
                          "#form-update-tour :input[name='price_person']"
                        ).val();
                      },
                    },
                  },
                },
                content: {
                  // required: true,
                  minlength: 50,
                },
                thumbnail: {
                  // required: true,
                  fileSizeLimit: 1000000,
                },
                images: {
                  // required: true,
                  fileSizeLimit: 1000000,
                },
                days: {
                  required: true,
                  number: true,
                  remote: {
                    url: "../../../normal-pattern/views/includes/validate/tour/validate_days.php",
                    type: TYPE_POST,
                    data: {
                      days: function () {
                        return $("#form-update-tour :input[name='days']").val();
                      },
                    },
                  },
                },
                number_of_seat: {
                  required: true,
                  number: true,
                  remote: {
                    url: "../../../normal-pattern/views/includes/validate/tour/validate_number_of_seat.php",
                    type: TYPE_POST,
                    data: {
                      number_of_seat: function () {
                        return $(
                          "#form-update-tour :input[name='number_of_seat']"
                        ).val();
                      },
                    },
                  },
                },
                location_id: {
                  required: true,
                },
              },
              messages: {
                title: {
                  required: "*Bạn Chưa Nhập Tựa Đề",
                  rangelength: "*Tựa Đề Chỉ Nhận Từ 6 Đến 50 Ký Tự",
                },
                price_total: {
                  required: "*Bạn Chưa Nhập Giá Tiền",
                  number: "*Giá Tiền Phải Là Ký Số",
                  remote: "*Giá Tiền Chỉ Nhận Từ 0 VNĐ Đến 100.000.000 VNĐ",
                },
                price_children: {
                  required: "*Bạn Chưa Nhập Giá Trẻ Em",
                  number: "*Giá Trẻ Em Phải Là Ký Số",
                  remote: "*Giá Trẻ Em Chỉ Nhận Từ 0 VNĐ Đến 10.000.000 VNĐ",
                },
                price_person: {
                  required: "*Bạn Chưa Nhập Giá Người Lớn",
                  number: "*Giá Người Lớn Phải Là Ký Số",
                  remote: "*Giá Ngưởi Lớn Chỉ Nhận Từ 0 VNĐ Đến 10.000.000 VNĐ",
                },
                content: {
                  required: "*Bạn Chưa Nhập Phần Nội Dung",
                  minlength: "*Phần Nội Dung Chỉ Nhận Từ 50 Ký Tự Trở Lên",
                },
                thumbnail: {
                  // required: "*Bạn Chưa Nhập Hình Ảnh 1",
                },
                images: {
                  // required: "*Bạn Chưa Nhập Hình Ảnh 2",
                },
                days: {
                  required: "*Bạn Chưa Nhập Số Ngày",
                  number: "*Số Ngày Phải Là Ký Số",
                  remote: "*Số Ngày Chỉ Nhận Từ 1 Đến 90 Ngày",
                },
                number_of_seat: {
                  required: "*Bạn Chưa Nhập Số Chổ",
                  number: "*Số Chỗ Phải Là Ký Số",
                  remote: "*Số Chỗ Chỉ Nhận Từ 1 Đến 1000 Chỗ",
                },
                location_id: {
                  required: "*Bạn Chưa Chọn Khu Vực",
                },
              },
              errorPlacement: function (error, element) {
                if (element.attr("name") == "location_id") {
                  error.insertAfter("#modal-update-tour span.select2");
                } else {
                  error.insertAfter(element);
                }
              },
              submitHandler: function (form) {
                $.ajax({
                  type: TYPE_POST,
                  url: URL_ACTION_VALIDATE + "action_tour.php",
                  data: new FormData(form),
                  contentType: false,
                  processData: false,
                  // dataType: "json",
                  // cache : false,
                  success: function (data) {
                    var datatables = $("#datatables-tour-list").DataTable();

                    datatables.ajax.reload();

                    // Close Modal
                    $("#modal-update-tour").modal("hide");

                    // Form Input Reset
                    $("#form-update-tour")[0].reset();
                  },
                });
              },
            });
          },
        });
      });
    }
    // Delete Modal
    $("#datatables-tour-list").on("click", "#btn-delete-tour", function (e) {
      var datatables = $("#datatables-tour-list").DataTable();
      e.preventDefault();
      // Get Id From tag data-id
      var data_id = $(this).data("id");

      // Create Sweetalert2
      Swal.fire({
        title: "Bạn có chắc không?",
        text:
          "Bạn sẽ không thể phục hồi sản phẩm mã [" + data_id + "] này nữa!",
        icon: ICON_WARNING,
        showCancelButton: true,
        confirmButtonColor: CONFIRM_BUTTON_COLOR,
        cancelButtonColor: CANCEL_BUTTON_COLOR,
        confirmButtonText: CONFIRM_BUTTON_TEXT,
        cancelButtonText: CANCEL_BUTTON_TEXT,
      }).then((result) => {
        if (result.isConfirmed) {
          // Delete
          $.ajax({
            url: URL_ACTION_FIND + "action_tour.php",
            data: {
              id: data_id,
              action: "submit_tour_delete",
            },
            type: TYPE_POST,
            success: function (data) {
              datatables.ajax.reload();
              // Check Status or Display Alert
              Swal.fire({
                title: "Đã xóa!",
                text: "Dữ liệu đã xóa thành công.",
                icon: "success",
              });
            },
          });
        }
      });
    });
    // Detail Modal
    if (document.querySelector("#dis-tmce-content-tour-detail")) {
      const tinymce_detail_tour = tinymce.init({
        selector: TEXTAREA_INIT + "dis-tmce-content-tour-detail",
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
      $("#datatables-tour-list").on("click", "#btn-detail-tour", function (e) {
        // var datatables = $("#datatables-tour-list").DataTable();
        // Get Id From tag data-id
        e.preventDefault();
        var data_id = $(this).data("id");

        // Open Modal
        $("#modal-detail-tour").modal("show");

        $.ajax({
          url: URL_ACTION_FIND + "action_tour.php",
          data: {
            id: data_id,
            action: "submit_tour_find",
          },
          type: TYPE_POST,
          success: function (data) {
            var response = JSON.parse(data);

            // Add Data in Input Value
            $("#single-detail-id-tour").val(response.id);
            $("#single-detail-title-tour").val(response.title);
            $("#single-detail-price-total-tour").val(response.price_total);
            $("#single-detail-price-children-tour").val(
              response.price_children
            );
            $("#single-detail-price-person-tour").val(response.price_person);

            $("#upload-detail-thumbnail-tour").attr(
              "src",
              "../../../normal-pattern/upload/thumbnail/" +
                response.thumbnail +
                ""
            );
            $("#upload-detail-images-tour").attr(
              "src",
              "../../../normal-pattern/upload/images/" + response.images + ""
            );

            // TinyMCE
            tinymce
              .get("dis-tmce-content-tour-detail")
              .setContent(response.content);

            $("#single-detail-days-tour").val(response.days);
            $("#single-detail-number-of-seat-tour").val(
              response.number_of_seat
            );

            // Create at
            $("#single-detail-create-at-tour").val(response.create_at);
          },
        });
      });
    }
  };

  // Modal Schedule Admin
  MODAL_SCHEDULE_ADMIN = function modal_schedule_admin() {
    // DataTables Setup
    if (document.getElementById("datatables-schedule-list")) {
      try {
        $("#datatables-schedule-list").DataTable({
          language: { url: LANG_VI_URL_DATATABLES },
          processing: true,
          serverSide: true,
          padding: true,
          responsive: true,
          //
          colReorder: true,
          autoWidth: true,
          scrollX: true,
          stateSave: true,
          //
          order: [],
          // Button
          dom: "Bfrtip",
          buttons: ["csv", "excel", "print"],
          ajax: {
            url: "../../views/includes/data/data_schedule.php",
            type: TYPE_POST,
          },
          fnCreateRow: function (nRow, aData, iDataIndex) {
            // Add Data Id in tag <tr>
            $(nRow).attr("id", aData[0]);
            //
          },
          columnDefs: [
            {
              targets: [0, 4],
              searchable: false,
              orderable: false,
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
    // Setup
    $(".submit-schedule-create").addClass("d-none");

    $("#modal-create-schedule").on(
      "click",
      ".submit_schedule_select",
      function (e) {
        e.preventDefault();

        const select_tour = $("#select2-tour-schedule-create").val();

        if (
          select_tour === "" ||
          select_tour === null ||
          select_tour === undefined
        ) {
          // console.log("empty");
          $(".select-result-form").addClass("d-none");
          $(".submit-schedule-create").addClass("d-none");

          // Clear Input
          $("#single-create-id-schedule").val("");
          $("#single-create-title-schedule").val("");
          $("#single-create-days-schedule").val("");
          $("#start-datetime-schedule-create").val("");
          $("#end-datetime-schedule-create").val("");
          $("#note-schedule-create").val("");
        } else {
          // console.log("value");
          $.ajax({
            url: URL_ACTION_FIND + "action_schedule.php",
            type: TYPE_POST,
            data: { id: select_tour, action: "ajax_find_tour" },
            success: function (data) {
              $(".select-result-form").removeClass("d-none");
              $(".submit-schedule-create").removeClass("d-none");

              var response = JSON.parse(data);
              // Get Value
              $("#single-create-id-schedule").val(response.id);
              $("#single-create-title-schedule").val(response.title);
              $("#single-create-days-schedule").val(response.days);
              $("#single-create-number-of-seat-schedule").val(
                response.number_of_seat
              );

              // Validate
              const form_create_schedule = $("#form-create-schedule").validate({
                ignore: "",
                rules: {
                  start_datetime: {
                    required: true,
                  },
                  end_datetime: {
                    required: true,
                  },
                  note: {
                    // required: false,
                  },
                },
                messages: {
                  start_datetime: {
                    required: "*Bạn Chưa Có Dữ Liệu Ngày Bắt Đầu",
                  },
                  end_datetime: {
                    required: "*Bạn Chưa Có Dữ Liệu Ngày Kết Thúc",
                  },
                  note: {},
                },
                submitHandler: function (form) {
                  $.ajax({
                    type: TYPE_POST,
                    url: URL_ACTION_VALIDATE + "action_schedule.php",
                    data: $(form).serializeArray(),
                    success: function (data) {
                      // console.log($(form).serializeArray());
                      var datatables = $(
                        "#datatables-schedule-list"
                      ).DataTable();

                      datatables.ajax.reload();
                      // Close Modal
                      $("#modal-create-schedule").modal("hide");

                      // Form Input Reset
                      $("#form-create-schedule")[0].reset();

                      // Close and Clear
                      $("#select2-tour-schedule-create").select2({
                        theme: "bootstrap4",
                        placeholder: "Chọn Sản Phẩm",
                        allowClear: true,
                        tag: [],
                      });

                      $(".select-result-form").addClass("d-none");
                      $(".submit-schedule-create").addClass("d-none");
                    },
                  });
                },
              });
            },
          });
        }
      }
    );

    // Update Modal
    $("#datatables-schedule-list").on(
      "click",
      "#btn-update-schedule",
      function (e) {
        // var datatables = $("#datatables-schedule-list").DataTable();
        // Get Id From tag data-id
        var data_id = $(this).data("id");

        // Open Modal
        $("#modal-update-schedule").modal("show");
        // Call Ajax
        $.ajax({
          url: URL_ACTION_FIND + "action_schedule.php",
          data: {
            id: data_id,
            action: "submit_schedule_find",
          },
          type: TYPE_POST,
          success: function (data) {
            var response = JSON.parse(data);

            // Add Data in Input Value
            $("#single-update-id-schedule").val(response.schedule_id);
            $("#single-update-tour-id-schedule").val(response.id);
            $("#single-update-title-schedule").val(response.title);
            $("#single-update-days-schedule").val(response.days);
            $("#start-datetime-schedule-update").val(response.start_datetime);
            $("#end-datetime-schedule-update").val(response.end_datetime);
            $("#single-update-remaining-schedule").val(response.remaining);
            $("#note-schedule-update").val(response.note);

            // console.log(response);

            // Validate
            const form_update_schedule = $("#form-update-schedule").validate({
              ignore: "",
              rules: {
                start_datetime: {
                  required: true,
                },
                end_datetime: {
                  required: true,
                },
                note: {
                  // required: false,
                },
              },
              messages: {
                start_datetime: {
                  required: "*Bạn Chưa Có Dữ Liệu Ngày Bắt Đầu",
                },
                end_datetime: {
                  required: "*Bạn Chưa Có Dữ Liệu Ngày Kết Thúc",
                },
                note: {},
              },
              submitHandler: function (form) {
                $.ajax({
                  type: TYPE_POST,
                  url: URL_ACTION_VALIDATE + "action_schedule.php",
                  data: $(form).serializeArray(),
                  success: function (data) {
                    // console.log($(form).serializeArray());
                    var datatables = $("#datatables-schedule-list").DataTable();
                    datatables.ajax.reload();
                    // Close Modal
                    $("#modal-update-schedule").modal("hide");
                  },
                });
              },
            });
          },
        });
      }
    );

    // Delete
    $("#datatables-schedule-list").on(
      "click",
      "#btn-delete-schedule",
      function (e) {
        var datatables = $("#datatables-schedule-list").DataTable();
        e.preventDefault();
        // Get Id From tag data-id
        var data_id = $(this).data("id");

        // Create Sweetalert2
        Swal.fire({
          title: "Bạn có chắc không?",
          text:
            "Bạn sẽ không thể phục hồi lịch trình mã [" +
            data_id +
            "] này nữa!",
          icon: ICON_WARNING,
          showCancelButton: true,
          confirmButtonColor: CONFIRM_BUTTON_COLOR,
          cancelButtonColor: CANCEL_BUTTON_COLOR,
          confirmButtonText: CONFIRM_BUTTON_TEXT,
          cancelButtonText: CANCEL_BUTTON_TEXT,
        }).then((result) => {
          if (result.isConfirmed) {
            // Delete
            $.ajax({
              url: URL_ACTION_FIND + "action_schedule.php",
              data: {
                id: data_id,
                action: "submit_schedule_delete",
              },
              type: TYPE_POST,
              success: function (data) {
                datatables.ajax.reload();
                // Check Status or Display Alert
                Swal.fire({
                  title: "Đã xóa!",
                  text: "Dữ liệu đã xóa thành công.",
                  icon: "success",
                });
              },
            });
          }
        });
      }
    );

    // Detail
    $("#datatables-schedule-list").on(
      "click",
      "#btn-detail-schedule",
      function (e) {
        // var datatables = $("#datatables-schedule-list").DataTable();
        // Get Id From tag data-id
        var data_id = $(this).data("id");

        // Open Modal
        $("#modal-detail-schedule").modal("show");
        // Call Ajax
        $.ajax({
          url: URL_ACTION_FIND + "action_schedule.php",
          data: {
            id: data_id,
            action: "submit_schedule_find",
          },
          type: TYPE_POST,
          success: function (data) {
            var response = JSON.parse(data);

            // Add Data in Input Value
            $("#single-detail-id-schedule").val(response.schedule_id);
            $("#single-detail-tour-id-schedule").val(response.id);
            $("#single-detail-title-schedule").val(response.title);
            $("#single-detail-days-schedule").val(response.days);
            $("#start-datetime-schedule-detail").val(response.start_datetime);
            $("#end-datetime-schedule-detail").val(response.end_datetime);
            $("#single-detail-remaining-schedule").val(response.remaining);
            $("#note-schedule-detail").val(response.note);
            $("#single-detail-create-at-schedule").val(
              response.create_at_schedule
            );
          },
        });
      }
    );
  };
})(jQuery);

FILE_VALIDATE();
SELECT2();
SELECT2_BOOTSTRAP4();
// CALCULATE_DATE(TODAY, DAY, MONTH, YEAR);
DATEPICKER();
MODAL_CATEGORY_ADMIN();
MODAL_EVENT_ADMIN();
MODAL_LOCATION_ADMIN();
MODAL_TOUR_ADMIN();
MODAL_SCHEDULE_ADMIN();
