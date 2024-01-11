<!-- Create Event -->
<div class="modal fade" id="modal-create-event" tabindex="-1" aria-labelledby="ex-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../views/includes/modal/modal_event.php" id="form-create-event" class="form form-modal" enctype="multipart/form-data">
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
                        <label class="form-label">Tựa Đề</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Hình Ảnh 1</label>
                        <input type="file" name="thumbnail" class="form-control h-auto">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Hình Ảnh 2</label>
                        <input type="file" name="images" class="form-control h-auto">
                    </div>
                    <div class="field-modal textarea">
                        <label class="form-label">Phần Đầu</label>
                        
                        <!-- Setup Textarea -->
                        <textarea name="dis-tmce-header-event" id="dis-tmce-header-event" rows="4" class="form-control tinymce"></textarea>
                        <textarea name="get-tmce-header-event" id="get-tmce-header-event" rows="" class="" hidden="true"></textarea>
                    </div>
                    <div class="field-modal textarea">
                        <label class="form-label">Nội Dung</label>
                        
                        <!-- Setup Textarea -->
                        <textarea name="dis-tmce-content-event" id="dis-tmce-content-event" rows="4" class="form-control tinymce"></textarea>
                        <textarea name="get-tmce-content-event" id="get-tmce-content-event" rows="" class="" hidden="true"></textarea>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Thể Loại</label>
                        <select name="category[]" id="select2-category-event" class="form-control select2bs4" multiple="multiple" aria-readonly="">
                            <?php 
                            
                            foreach ($list_category as $row_category) {
                                ?>

                                <option data-select-id="<?php echo $row_category["id"]; ?>" value="<?php echo $row_category["category"]; ?>">
                                    <?php echo $row_category["category"]; ?>
                                </option>

                                <?php
                            }
                            
                            ?>
                        </select>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày</label>
                        <input type="text" id="datetime-event" class="form-control datepicker-config" name="datetime" readonly="true">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" value="submit_event_create" name="action">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>