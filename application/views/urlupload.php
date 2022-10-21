<!-- FORM UPLOAD -->
<form action="<?=base_url('home/do_url_upload');?>" enctype="multipart/form-data" method="POST">
    <div class="field">
        <textarea class="textarea has-fixed-size" name="url" placeholder="URL."></textarea>
    </div>
        <?php if ($this->session->userdata('user_id')): ?>
    <div class="field has-addons">
        <p class="control">
            <a class="button is-static">
                <i class="fas fa-folder"></i>Collection
            </a>
        </p>            

        <div class="select is-normal is-fullwidth">
            <select name="folder">
                <option value="1"> / </option>
                <?php foreach ($folders as $folder): ?>
                    <option value="<?= $folder['id']?>"><?= $folder['folder_name'] ?></option>
                <?php endforeach ?>                
            </select>
        </div>
        <p class="control">
            <!-- <input type="button" class="button" name="" onclick="myFunction()" value="New"> -->
            <a class="button is-white-ter" onclick="myFunction()"><i class="fas fa-plus-square"></i></a>
        </p>
    </div>
        <?php endif ?>

    <div class="field is-grouped is-grouped-centered">
        <p class="control">
            <input class="button is-success" name="submit" type="submit" value="Upload">
        </p>
    </div>
</form>

<!-- FORM UPLOAD END -->
<br>
    <?php if ($this->session->flashdata('uploaded')): ?>
    <div class="control">
  <textarea class="textarea has-fixed-size" id="myInput" readonly><?=$this->session->flashdata('uploaded');?></textarea>
  <button class="button is-link" onclick="copyLink()">Copy Link</button>
</div>
<?php endif?>