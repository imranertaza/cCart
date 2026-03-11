<?= $this->extend('Admin/layout') ?>

<?= $this->section('content') ?>
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Image Manager</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Image Manager</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

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
                    <h4>Folder: /uploads/manager/<?= esc($dir) ?></h4>
                    <button class="btn btn-primary" onclick="createFolder('<?= $dir ?>')"><i class="fas fa-plus"></i> New Folder</button>
                </div>
                <?php if (!empty($dir)): ?>
                    <br>
                    <a href="<?= base_url(str_replace('.','','admin/image-manager?dir='.dirname($dir)))?>">⬅ Back</a>
                <?php endif; ?>

                <hr>

                <!-- Upload -->
                <div id="dropZone">
                    <p>Drag & Drop images here<br>or click to upload</p>
                    <input type="file" id="upload" multiple hidden>
                </div>

                <hr>

                <div class="d-flex flex-wrap">
                <!-- Folders -->
                <?php foreach ($folders as $f): ?>
                    <div class="position-relative">
                        <button class="position-absolute btn btn-danger btn-xs " style="left:35%;bottom:20px;" onclick="deleteFolder('<?= trim($dir.'/'.$f,'/') ?>')"><i class="fas fa-trash"></i></button>
                        <div class="box folder" onclick="openFolder('<?= trim($dir . '/' . $f, '/') ?>')">
                            📁<?= esc($f) ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Images -->
                <?php foreach ($images as $img): ?>
                    <div class="box image" onclick="selectImage(this,'<?= trim($dir.'/'.$img,'/') ?>')">
                        <input type="checkbox" name="image[]" value="<?= str_replace('./','','uploads/manager/'.$dir.'/'.$img );?>" hidden >
                        <img src="<?= base_url('uploads/manager/' . trim($dir.'/'.$img,'/')) ?>">
                        <button class="btn btn-danger btn-xs" onclick="deleteImage('<?= trim($dir.'/'.$img,'/') ?>');"><i class="fas fa-trash"></i> </button>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button class="btn btn-success float-right" >Confirm</button>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <div id="oc-loader">
        <div class="spinner"></div>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('java_script') ?>
<script>
    let dir      = document.getElementById('dir').value;
    let dropZone = document.getElementById('dropZone');
    let fileInput = document.getElementById('upload');

    /* Click upload */
    dropZone.addEventListener('click', () => fileInput.click());

    /* Browse upload */
    fileInput.addEventListener('change', () => {
        uploadFiles(fileInput.files);
    });

    /* Drag over */
    dropZone.addEventListener('dragover', e => {
        e.preventDefault();
        dropZone.classList.add('dragover');
    });

    /* Drag leave */
    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('dragover');
    });

    /* Drop */
    dropZone.addEventListener('drop', e => {
        e.preventDefault();
        dropZone.classList.remove('dragover');
        uploadFiles(e.dataTransfer.files);
    });

    /* Upload function */
    function uploadFiles(files) {
        [...files].forEach(file => {
            let fd = new FormData();
            fd.append('image', file);
            fd.append('dir', dir);
            fd.append(
                $('meta[name="csrf-name"]').attr("content"),
                $('meta[name="csrf-token"]').attr("content")
            );
            showLoader()
            fetch('<?= base_url('admin/image-manager-upload') ?>', {
                method: 'POST',
                body: fd
            })
                .then(res => res.json())
                .then(data => {
                    hideLoader();
                    if (data.success) {
                        $('input[name="<?= csrf_token() ?>"]').val(data.csrf);
                        location.reload();
                    } else {
                        alert(data.error);
                    }
                });
        });
    }

    /* Folder navigation */
    function openFolder(dir) {
        window.location = '<?= base_url('admin/image-manager') ?>?dir=' + dir;
    }

    /* Select image */
    function selectImage(div, path) {
        // // 1️⃣ Unselect previous
        // document.querySelectorAll('.box.image').forEach(b => b.classList.remove('selected'));
        // document.querySelectorAll('.box.image input[type="radio"]').forEach(r => r.checked = false);
        //
        // // 2️⃣ Select current
        // div.classList.add('selected');
        // let radio = div.querySelector('input[type="radio"]');
        // radio.checked = true;
        //
        //
        // // Optional: console log
        // console.log('Selected image:', path);

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

    function createFolder(dir) {
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
        fd.append(
            $('meta[name="csrf-name"]').attr("content"),
            $('meta[name="csrf-token"]').attr("content")
        );
        showLoader()
        fetch('<?= base_url('admin/') ?>' + url, {
            method: 'POST',
            body: fd
        })

        .then(r => r.json())
        .then(d => {
            hideLoader()
            if (d.success) {
                $('input[name="<?= csrf_token() ?>"]').val(d.csrf);
                location.reload();
            } else alert(d.error);
        });
    }
    function showLoader() {
        document.getElementById('oc-loader').style.display = 'flex';
    }

    function hideLoader() {
        document.getElementById('oc-loader').style.display = 'none';
    }

</script>
<?= $this->endSection() ?>
