      <div class="folderview div-${folderid}" data-id="${folderid}" id="div-${folderid}">
        <div class="main" id="main">
          <h2 class="blue">${foldername}</h2>
          <div class="folderitems f-${folderid}">
          </div>
          <form id="folderform" class="ff-${folderid}" method="POST" data-id="${folderid}">
            <input class="form-control fi-${folderid}" type="text" name="task" id="fi-${folderid}" placeholder="Add a task..." required>
          </form>
        </div>
      </div>