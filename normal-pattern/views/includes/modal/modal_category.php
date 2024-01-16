<!-- Create Category -->
<div class="modal fade" id="modal-create-category" tabindex="-1" aria-labelledby="ex-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../views/includes/modal/modal_category.php" id="form-create-category"
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
                        <label class="form-label">Thể Loại</label>
                        <input type="text" name="category" class="form-control">
                    </div>
                    <div class="field-modal textarea">
                        <label class="form-label">Nội Dung</label>

                        <!-- Setup Textarea -->
                        <textarea name="dis-tmce-content-category" id="dis-tmce-content-category" rows="4"
                            class="form-control tinymce"></textarea>
                        <textarea name="get-tmce-content-category" id="get-tmce-content-category" rows="" class=""
                            hidden="true"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" value="submit_category_create" name="action">Lưu Thay
                        Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Category -->
<div class="modal fade" id="modal-update-category" tabindex="-1" aria-labelledby="ex-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../views/includes/modal/modal_category.php" id="form-update-category"
                class="form form-modal" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ex-modal-label">Cập Nhật</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="bx bx-x"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal d-none">
                        <label class="form-label">Mã</label>
                        <input type="text" name="id" class="form-control" id="single-update-id">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Thể Loại</label>
                        <input type="text" name="category" class="form-control" id="single-update-category">
                    </div>
                    <div class="field-modal textarea">
                        <label class="form-label">Nội Dung</label>

                        <!-- Setup Textarea -->
                        <textarea name="dis-tmce-content-category-update" id="dis-tmce-content-category-update" rows="4"
                            class="form-control tinymce"></textarea>
                        <textarea name="get-tmce-content-category-update" id="get-tmce-content-category-update" rows=""
                            class="" hidden="true"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" value="submit_category_update" name="action">Lưu Thay
                        Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Detail Category -->
<div class="modal fade" id="modal-detail-category" tabindex="-1" aria-labelledby="ex-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../views/includes/modal/modal_category.php" id="form-detail-category"
                class="form form-modal" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ex-modal-label">Xem Chi Tiết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="bx bx-x"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="field-modal">
                        <label class="form-label">Mã</label>
                        <input type="text" name="id" class="form-control" id="single-detail-id" readonly="true">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Thể Loại</label>
                        <input type="text" name="category" class="form-control" id="single-detail-category"
                            readonly="true">
                    </div>
                    <div class="field-modal textarea">
                        <label class="form-label">Nội Dung</label>

                        <!-- Setup Textarea -->
                        <textarea name="dis-tmce-content-category-detail" id="dis-tmce-content-category-detail" rows="4"
                            class="form-control tinymce"></textarea>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ngày Cập Nhật</label>
                        <input type="text" name="create_at" class="form-control" id="single-detail-create-at"
                            readonly="true">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>