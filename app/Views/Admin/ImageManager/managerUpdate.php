

    <div class="d-flex flex-wrap" >
    <!-- Folders -->
    <?php foreach ($folders as $f): ?>
        <div class="position-relative">
            <button class="position-absolute btn btn-danger btn-xs " style="left:35%;bottom:20px;" onclick="deleteFolder('<?= trim($dir . '/' . $f, '/') ?>')"><i class="fas fa-trash"></i></button>
            <div class="box folder" onclick="openFolder('<?= trim($dir . '/' . $f, '/') ?>')">
                📁<?= esc($f) ?>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Images -->
    <?php foreach ($images as $img): ?>
        <div class="box image" onclick="selectImage(this,'<?= trim($dir . '/' . $img, '/') ?>')">
            <input type="checkbox" name="image[]" value="<?= str_replace('./', '', 'uploads/manager/' . $dir . '/' . $img);?>" hidden >
            <img src="<?= base_url('uploads/manager/' . trim($dir . '/' . $img, '/')) ?>">
            <button class="btn btn-danger btn-xs" onclick="deleteImage('<?= trim($dir . '/' . $img, '/') ?>');"><i class="fas fa-trash"></i> </button>
        </div>
    <?php endforeach; ?>
    </div>

