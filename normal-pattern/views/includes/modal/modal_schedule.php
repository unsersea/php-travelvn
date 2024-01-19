<!-- Create Modal -->
<div class="modal fade" id="modal-create-schedule" tabindex="-1" aria-labelledby="ex-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../views/includes/modal/modal_schedule.php" id="form-create-schedule"
                class="form form-modal" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ex-modal-label">Tạo Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="bx bx-x"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal">
                        <label class="form-label">Sản Phẩm</label>
                        <select name="tour_id" id="select2-tour-schedule-create"
                            class="form-control select2bs4-tour-schedule">
                            <option value=""></option>
                            <?php

                            foreach ($list_tour as $row_tour) {
                                ?>

                                <option data-select-id="<?php echo $row_tour["id"]; ?>"
                                    value="<?php echo $row_tour["id"]; ?>">
                                    <?php echo $row_tour["id"].". ".$row_tour["title"]; ?>
                                </option>

                                <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="select-result-form d-none">
                        <hr class="hr">
                        <div class="field-modal">
                            <label class="form-label">Ngày Bắt Đầu</label>
                            <input type="text" id="start-datetime-schedule-create" class="form-control datepicker-config"
                                name="start_datetime" readonly="true">
                        </div>
                        <div class="field-modal">
                            <label class="form-label">Ngày Kết Thúc</label>
                            <input type="text" id="end-datetime-schedule-create" class="form-control"
                                name="end_datetime" readonly="true">
                        </div>
                        <div class="field-modal">
                            <label class="form-label">Ghi Chú</label>
                            <textarea name="note" id="note-schedule-create" rows="4"
                                class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <div class="submit-schedule-create">
                        <button type="submit" class="btn btn-primary" value="submit_schedule_create" name="action">Lưu Thay
                            Đổi</button>
                    </div>
                    <button type="button" class="btn btn-danger submit_schedule_select">Xác Nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Update Modal -->

<!-- Detail Modal -->