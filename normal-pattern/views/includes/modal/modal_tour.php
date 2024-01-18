<!-- Create Modal -->
<div class="modal fade" id="modal-create-tour" tabindex="-1" aria-labelledby="ex-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../views/includes/modal/modal_tour.php" id="form-create-tour" class="form form-modal"
                enctype="multipart/form-data">
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
                        <label class="form-label">Tổng Giá Tiền</label>
                        <input type="text" name="price_total" class="form-control">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Giá Trẻ Em</label>
                        <input type="text" name="price_children" class="form-control">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Giá Người Lớn</label>
                        <input type="text" name="price_person" class="form-control">
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
                        <label class="form-label">Nội Dung</label>

                        <!-- Setup Textarea -->
                        <textarea name="dis-tmce-content-tour" id="dis-tmce-content-tour" rows="4"
                            class="form-control tinymce"></textarea>
                        <textarea name="get-tmce-content-tour" id="get-tmce-content-tour" rows="" class=""
                            hidden="true"></textarea>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Số Ngày</label>
                        <input type="text" name="days" class="form-control">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Số Chổ</label>
                        <input type="text" name="number_of_seat" class="form-control">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Khu Vực</label>
                        <select name="location_id" id="select2-location-tour-create"
                            class="form-control select2bs4-location-tour">
                            <option value=""></option>
                            <?php

                            foreach ($list_location as $row_location) {
                                ?>

                                <option data-select-id="<?php echo $row_location["id"]; ?>"
                                    value="<?php echo $row_location["id"]; ?>">
                                    <?php echo $row_location["location_name"]; ?>
                                </option>

                                <?php
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" value="submit_tour_create" name="action">Lưu Thay
                        Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="modal-update-tour" tabindex="-1" aria-labelledby="ex-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../views/includes/modal/modal_tour.php" id="form-update-tour" class="form form-modal"
                enctype="multipart/form-data">
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
                        <input type="text" name="id" class="form-control" id="single-update-id-tour">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Tựa Đề</label>
                        <input type="text" name="title" class="form-control" id="single-update-title-tour">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Tổng Giá Tiền</label>
                        <input type="text" name="price_total" class="form-control" id="single-update-price-total-tour">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Giá Trẻ Em</label>
                        <input type="text" name="price_children" class="form-control"
                            id="single-update-price-children-tour">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Giá Người Lớn</label>
                        <input type="text" name="price_person" class="form-control"
                            id="single-update-price-person-tour">
                    </div>
                    <div class="field-modal">
                        <div class="field-flex-file">
                            <label class="form-label">Hình Ảnh 1</label>
                            <img class="mt-2 mb-2" src="" alt="" id="upload-update-thumbnail-tour" width="100"
                                height="75">
                        </div>
                        <input type="file" name="thumbnail" class="form-control h-auto"
                            id="single-update-thumbnail-tour">
                    </div>
                    <div class="field-modal">
                        <div class="field-flex-file">
                            <label class="form-label">Hình Ảnh 2</label>
                            <img class="mt-2 mb-2" src="" alt="" id="upload-update-images-tour" width="100" height="75">
                        </div>
                        <input type="file" name="images" class="form-control h-auto" id="single-update-images-tour">
                    </div>
                    <div class="field-modal textarea">
                        <label class="form-label">Nội Dung</label>

                        <!-- Setup Textarea -->
                        <textarea name="dis-tmce-content-tour-update" id="dis-tmce-content-tour-update" rows="4"
                            class="form-control tinymce"></textarea>
                        <textarea name="get-tmce-content-tour-update" id="get-tmce-content-tour-update" rows="" class=""
                            hidden="true"></textarea>
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Số Ngày</label>
                        <input type="text" name="days" class="form-control" id="single-update-days-tour">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Số Chổ</label>
                        <input type="text" name="number_of_seat" class="form-control"
                            id="single-update-number-of-seat-tour">
                    </div>
                    <div class="field-modal">
                        <label class="form-label">Khu Vực</label>
                        <select name="location_id" id="select2-location-tour-update"
                            class="form-control select2bs4-location-tour">
                            <option value=""></option>
                            <?php

                            foreach ($list_location as $row_location) {
                                ?>

                                <option data-select-id="<?php echo $row_location["id"]; ?>"
                                    value="<?php echo $row_location["id"]; ?>">
                                    <?php echo $row_location["location_name"]; ?>
                                </option>

                                <?php
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" value="submit_tour_update" name="action">Lưu Thay
                        Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>