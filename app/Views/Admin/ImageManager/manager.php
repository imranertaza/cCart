<div >
    <style>
        .box{
            width:118px;
            height:118px;
            border:1px solid #ccc;
            margin:6px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            flex-direction:column
        }
        img{
            max-width:100%;
            max-height:90px;
        }
        .folder{
            font-weight:bold;
        }

        #dropZone {
            border: 2px dashed #999;
            padding: 25px;
            text-align: center;
            cursor: pointer;
            margin-bottom: 15px;
            background: #fafafa;
        }
        #dropZone.dragover {
            border-color: #1e91cf;
            background: #eef7fc;
        }
        .box.image {
            border: 1px solid #ebebeb;
            transition: .2s;
        }
        .box.image:hover {
            border-color: #ccc;
        }
        .box.image.selected {
            border-color: #1e91cf;
            box-shadow: 0 0 5px rgba(30,145,207,.6);
        }
        #oc-loader {
            position: fixed;
            inset: 0;
            background: rgba(255,255,255,.7);
            z-index: 99999;
            display: none;
            align-items: center;
            justify-content: center;
        }

        #oc-loader .spinner {
            width: 42px;
            height: 42px;
            border: 4px solid #ddd;
            border-top-color: #1e91cf;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title">Image Manager</h3>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <?php if (session()->getFlashdata('message')): ?>
                                <div class="alert <?= session()->getFlashdata('success') ? 'alert-success' : 'alert-danger'; ?> alert-dismissible fade show" role="alert">
                                    <?= session()->getFlashdata('message'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" id="dir" value="<?= esc($dir) ?>">
                    <div>
                        <h4>Folder: /uploads/manager/<span id="dirLink"><?= esc($dir) ?></span></h4>
                        <button class="btn btn-primary" onclick="createFolder()"><i class="fas fa-plus"></i> New Folder</button>
                    </div>
                    <br>
                    <span id="backBtn"></span>

                    <hr>
                    <!-- Upload -->
                    <div id="dropZone">
                        <p>Drag & Drop images here<br>or click to upload</p>
                        <input type="file" id="upload" multiple hidden>
                    </div>

                    <hr>
                    <div id="imageArea">
                        <div class="d-flex flex-wrap" >
                        <!-- Folders -->
                        <?php foreach ($folders as $folder): ?>
                            <div class="position-relative">
                                <button class="position-absolute btn btn-danger btn-xs " style="left:35%;bottom:20px;width: 43px;" onclick="deleteFolder('<?= trim($dir . '/' . $folder, '/') ?>')"><i class="fas fa-trash"></i></button>
                                <div class="box folder" onclick="openFolder('<?= trim($dir . '/' . $folder, '/') ?>')">
                                    📁<?= esc($folder) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!-- Images -->
                        <?php foreach ($images as $img): ?>
                            <div class="box image" onclick="selectImage(this,'<?= trim($dir . '/' . $img, '/') ?>')">
                                <input type="checkbox" name="image[]" value="<?= str_replace('./', '', 'uploads/manager/' . $dir . '/' . $img);?>" hidden >
                                <img src="<?= base_url('uploads/manager/' . trim($dir . '/' . $img, '/')) ?>">
                                <button class="btn btn-danger btn-xs" style="width: 43px;" onclick="deleteImage('<?= trim($dir . '/' . $img, '/') ?>'); event.stopPropagation();" ><i class="fas fa-trash"></i> </button>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button class="btn btn-success float-right" onclick="confirmImage('<?= $showId ?>','<?= $type ?>')" >Confirm</button>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
        <div id="oc-loader">
            <div class="spinner"></div>
        </div>

    <script>
        let csrfName = '<?= csrf_token() ?>';
        let csrfVal  = '<?= csrf_hash() ?>';

        let dir      = document.getElementById('dir').value;

        // function bindModalEvents() {
        //        //     let dropZone = document.getElementById('dropZone');
        //        //     let fileInput = document.getElementById('upload');
        //        //
        //        //     /* Click upload */
        //        //     dropZone.addEventListener('click', () => fileInput.click());
        //        //
        //        //     /* Browse upload */
        //        //     fileInput.addEventListener('change', () => {
        //        //         uploadFiles(fileInput.files);
        //        //     });
        //        //
        //        //     /* Drag over */
        //        //     dropZone.addEventListener('dragover', e => {
        //        //         e.preventDefault();
        //        //         dropZone.classList.add('dragover');
        //        //     });
        //        //
        //        //     /* Drag leave */
        //        //     dropZone.addEventListener('dragleave', () => {
        //        //         dropZone.classList.remove('dragover');
        //        //     });
        //        //
        //        //     /* Drop */
        //        //     dropZone.addEventListener('drop', e => {
        //        //         e.preventDefault();
        //        //         dropZone.classList.remove('dragover');
        //        //         uploadFiles(e.dataTransfer.files);
        //        //     });
        //        // }
        // bindModalEvents();
        /* Upload function */
        function uploadFiles(files) {
            let dir = document.getElementById('dir').value;
            [...files].forEach(file => {
                let fd = new FormData();
                fd.append('image', file);
                fd.append('dir', dir);
                fd.append(csrfName, csrfVal);
                showLoader()
                fetch('<?= base_url('admin/image-manager-upload') ?>', {
                    method: 'POST',
                    body: fd
                })
                    .then(res => res.json())
                    .then(data => {
                        hideLoader();
                        if (data.success) {
                            csrfVal = data.csrf;
                            reloadImageArea();
                        } else {
                            alert(data.error);
                        }
                    });
            });
        }

        /* Folder navigation */
        function openFolder(dir) {
            let parts = dir.split('/');
            parts.pop();
            let parent = parts.join('/');
            if (dir == ''){
                var btn = ''
            }else{
                var btn = '<button class="btn btn-sm btn-danger"  onclick="openFolder(\'' + parent + '\')"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>';
            }
            showLoader()
            $.ajax({
                url: "<?= base_url('admin/image-folder-show') ?>",
                type: "GET",
                data: { dir: dir},
                success: function(response){
                    hideLoader()
                    $("#dir").val(dir);
                    $("#dirLink").html(dir);
                    $("#backBtn").html(btn);
                    $("#imageArea").html(response);
                }
            });
        }

        /* Select image */
        function selectImage(div, path) {
            let checkbox = div.querySelector('input[type="checkbox"]');

            // Toggle checkbox
            checkbox.checked = !checkbox.checked;

            // Toggle selected class
            if (checkbox.checked) {
                div.classList.add('selected');
            } else {
                div.classList.remove('selected');
            }

            console.log('Selected image:', path);
        }

        function createFolder() {
            let dir = document.getElementById('dir').value;
            let name = prompt('Folder name');
            if (!name) return;
            send('/image-manager-folder-create', { name: name, dir:dir });
        }

        function deleteFolder(dir) {
            if (!confirm('Delete folder?')) return;
            send('/image-manager-folder-delete', { dir: dir });
        }

        function deleteImage(file) {
            if (!confirm('Delete image?')) return;
            send('/image-manager-image-delete', { file: file });
        }

        function send(url, data) {
            let fd = new FormData();
            Object.keys(data).forEach(k => fd.append(k, data[k]));
            fd.append(csrfName, csrfVal);
            showLoader()
            fetch('<?= base_url('admin/') ?>' + url, {
                method: 'POST',
                body: fd
            })

            .then(r => r.json())
            .then(d => {
                hideLoader()
                if (d.success) {
                    csrfVal = d.csrf;
                    reloadImageArea();
                } else alert(d.error);
            });
        }

        function showLoader() {
            document.getElementById('oc-loader').style.display = 'flex';
        }

        function hideLoader() {
            document.getElementById('oc-loader').style.display = 'none';
        }

        function reloadImageArea(){
            let dir = $("#dir").val();

            $.ajax({
                url: "<?= base_url('admin/image-manager-show-update') ?>",
                type: "GET",
                data: { dir: dir},
                success: function(response){
                    $("#imageArea").html(response);
                }
            });
        }

        function confirmImage(preViewId,type ) {

            let selected = document.querySelectorAll(
                'input[name="image[]"]:checked'
            );

            if (selected.length === 0) {
                alert('Please select at least one image');
            }

            let view = '';
            if (type === 'single') {
                if (selected.length > 1) {
                    alert('Maximum 1 image allowed.');
                    return;
                } else {
                    let str = selected[0].value;
                    let imagePath = str.replace("//", "/");
                    view += '<input type="text" name="image" value="' + imagePath + '" class="form-control mb-2" hidden >';
                    view += '<img src="<?= base_url()?>/' + imagePath + '" style="width:120px;height:120px;">';
                }
            }

            if (type === 'multiple') {
                selected.forEach(input => {
                    let str = input.value;
                    let imagePath = str.replace("//", "/");
                    view += '<input type="text" name="multiImage[]" value="' + imagePath + '" class="form-control mb-2 mt-2" hidden >';
                    view += '<img src="<?= base_url()?>/' + imagePath + '" style="width:120px;height:120px;padding-left: 10px;">';
                });
            }
            document.getElementById(preViewId).innerHTML = view;
            $('#managerModal').modal('hide');
        }

    </script>
</div>

