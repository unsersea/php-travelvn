<!-- Create Location -->
<div class="modal fade" id="modal-create-location" tabindex="-1" aria-labelledby="ex-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../views/includes/modal/modal_location.php" id="form-create-location" class="form form-modal" enctype="multipart/form-data">
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
                        <label class="form-label">Khu Vực</label>
                        <input type="text" name="location_name" class="form-control">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Thành Phố</label>
                        <input type="text" name="city" class="form-control">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Ký Tự (nếu có)</label>
                        <input type="text" name="acronym" class="form-control">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Địa Chỉ (nếu có)</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" value="submit_location_create" name="action">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>