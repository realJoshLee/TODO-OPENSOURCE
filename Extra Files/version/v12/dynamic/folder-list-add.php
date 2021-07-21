<div class="folderlist" id="fdiv-${fid}" data-id="${fid}">
  <div class="content">
    <h2><span class="day" id="fn-${fid}">${foldervar}</span> &nbsp;&nbsp;<span class="edit-folder-content" data-id="${fid}"><span class="f-edit"><i class="fas fa-ellipsis-h"></i></span></span></h2>

    <div class="folder-edit-container fec-${fid}">
      <div class="folder-edit-main fedit-${fid}">
        <span class="edit-folder-close"><i class="far fa-times-circle"></i></span><br><br>
        <form method="POST" class="folder-settings-edit" data-id="${fid}">
          <label class="label"><b>Folder Name</b></label>
          <input type="text" class="form-control" value="${foldervar}" name="foldername" id="fnb-${fid}">
          <input type="submit" class="submit form-control-submit" value="Save Folder Name" data-id="${fid}">
        </form>
        <input type="submit" class="form-control-submit delete-folder" value="Delete Folder" data-id="${fid}">

        <br><br>
      </div>
      <br><br>
    </div>

    <div id="ftl-${fid}">
    </div>
    <form class="folderform ff-${fid}" data-id="${fid}">
      <input type="text" name="task" placeholder="Add a task" class="form-control" id="finput-${fid}" data-id="${fid}">
    </form>
  </div>
</div>