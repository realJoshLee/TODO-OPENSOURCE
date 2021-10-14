<div class="folderlist app-page" id="fdiv-${fid}" data-id="${fid}">
  <div class="content">
    <h2 class="noselect"><span class="day" id="fn-${fid}">${foldervar}</span> &nbsp;&nbsp;<span style="float:right;" class="edit-folder-content" data-id="${fid}"><span class="f-edit"><i class="fas fa-ellipsis-h"></i></span></span></h2>

    <div class="folder-edit-container fec-${fid}">
      <div class="folder-edit-main fedit-${fid}">
        <span class="edit-folder-close"><i class="far fa-times-circle"></i></span><br><br>
        <form method="POST" class="folder-settings-edit" data-id="${fid}">
          <label class="label"><b>Name</b></label><br>
          <input type="text" class="form-control-folder-name" value="${foldervar}" name="foldername" id="fnb-${fid}">
          <input type="submit" class="submit form-control-submit" value="Save Folder Name" data-id="${fid}">
        </form><br><br>

        <form method="POST" class="folder-color-edit" data-id="${fid}">
          <select name="colors" class="form-control-folder-name" id="fcolor-${fid}">
            <option value="green">Green</option>
            <option value="teel">Teel</option>
            <option value="purple">Purple</option>
            <option value="grey" selected>Grey (Default)</option>
            <option value="blue">Blue</option>
            <option value="maroon">Maroon</option>
            <option value="lightpink">Light Pink</option>
            <option value="pink">Pink</option>
            <option value="orange">Orange</option>
            <option value="yellowish">Yellowish</option>
          </select>
        </form>
        <input type="button" class="submit form-control-submit folder-color-savebtn" value="Save Color" data-id="${fid}"><br><br><br>

        <form method="POST" class="folder-share-container" data-id=${fid}">
          <label class="label"><b>Sharing</b></label><br>
          <label class="label">Only folder owners can share folders. Folders are shared as view only.</label>
          <input type="text" class="form-control-folder-name" id="fshareone-${fid}">
        </form>
        <input type="button" class="submit form-control-submit folder-share-savebtn" value="Share With Users" data-id="${fid}"><br><br><br>

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