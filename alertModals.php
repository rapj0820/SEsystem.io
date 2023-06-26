<!-- LOGOUT MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="ConfirmLogout" width="100px">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-3 shadow">
      <div class="modal-body p-4 text-center">
        <h5 class="mb-1">Are you sure to leave?</h5>
        <p class="mb-0">You can always change your mind.</p>
      </div>
      <div class="modal-footer flex-nowrap p-0">
        <button type="button" class="btn text-danger btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" id="logout_yes"><strong>Log out</strong></button>
        <button type="button" class="btn text-muted btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">Not Yet</button>
      </div>
    </div>
  </div>
</div>


<!-- ALERT SUCCESS -->
<div class="modal modal-sheet fade py-5" tabindex="-1" role="dialog" id="alertSuccess">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-bottom-0">
        <h1 class="modal-title fs-5">Saving Successful</h1>
      </div>
      <div class="modal-body py-0">
        <p>New record was successfully added/updated to the database.</p>
      </div>
      <div class="modal-footer flex-column border-top-0">
        <button type="button" class="btn btn-lg btn-light w-100 mx-0" id="successClose" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- ALERT INCOMPLETE ENTRY -->
<div class="modal modal-sheet fade py-5" tabindex="-1" role="dialog" id="alertincEntry">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-bottom-0">
        <h1 class="modal-title fs-5">Incomplete Entry</h1>
      </div>
      <div class="modal-body py-0">
        <p>Please fill out required fields!<br>All fields with asterisk( <span class="text-danger">*</span> ) are required.</p>
      </div>
      <div class="modal-footer flex-column border-top-0">
        <button type="button" class="btn btn-lg btn-light w-100 mx-0" data-bs-dismiss="modal">Okay</button>
      </div>
    </div>
  </div>
</div>


<!-- ALERT RECORD EXIST -->
<div class="modal modal-sheet fade py-5" tabindex="-1" role="dialog" id="alertExist">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-bottom-0">
        <h1 class="modal-title fs-5">Record Exist</h1>
      </div>
      <div class="modal-body py-0">
        <p>This record was already added. Records should not be duplicated.</p>
      </div>
      <div class="modal-footer flex-column border-top-0">
        <button type="button" class="btn btn-lg btn-light w-100 mx-0" data-bs-dismiss="modal">Okay</button>
      </div>
    </div>
  </div>
</div>

<!-- ALERT RECORD Unsuccessful -->
<div class="modal modal-sheet fade py-5" tabindex="-1" role="dialog" id="alertNotSave">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-bottom-0">
        <h1 class="modal-title fs-5">Saving Failed</h1>
      </div>
      <div class="modal-body py-0">
        <p>Record is not save. Check inputs carefully.</p>
      </div>
      <div class="modal-footer flex-column border-top-0">
        <button type="button" class="btn btn-lg btn-light w-100 mx-0" data-bs-dismiss="modal">Okay</button>
      </div>
    </div>
  </div>
</div>


<!-- validate delete -->
<div class="modal fade" tabindex="-1" role="dialog" id="ConfirmDelete" width="100px">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-3 shadow">
      <div class="modal-body p-4 text-center">
        <h5 class="mb-1">Are you sure to delete record?</h5>
        <p class="mb-0">This process cannot be undone.</p>
      </div>
      <div class="modal-footer flex-nowrap p-0">
        <button type="button" class="btn text-danger btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" id="delete_yes"><strong>Delete</strong></button>
        <button type="button" class="btn text-muted btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>


<!-- ALERT SUCCESS Delete-->
<div class="modal modal-sheet fade py-5" tabindex="-1" role="dialog" id="alertDeleteSuccess">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-bottom-0">
        <h1 class="modal-title fs-5">Record Deleted</h1>
      </div>
      <div class="modal-body py-0">
        <p>Record was successfully deleted from the database!</p>
      </div>
      <div class="modal-footer flex-column border-top-0">
        <button type="button" class="btn btn-lg btn-light w-100 mx-0" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>