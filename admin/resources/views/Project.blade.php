@extends('Layout.app')

@section('content')
<div id="ProjectDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">
<button id="addNewBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
<table id="projectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="project_table">

  </tbody>
</table>

</div>
</div>
</div>

<div id="ProjectLoaderDiv" class="container">
<div class="row">
<div class="col-md-12 p-5 text-center">
<img class="loading-icon"  src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>

<div id="projectWrongDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">
<h3>Somethis went wrong!</h3>
</div>
</div>
</div>




<div class="modal fade" id="projectDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body p-3 text-center">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="projectDeleteId" class="mt-4 d-none">   </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button  id="projectDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body p-5 text-center">

        <h5 id="projectEditId" class="mt-4 d-none">   </h5>
        <div id="projectEditForm" class="d-none w-100">
          <input id="projectNameID" type="text" id="" class="form-control mb-4" placeholder="Project Name">
          <input id="projectDesID" type="text" id="" class="form-control mb-4" placeholder="Project Description">
          <input id="projectImgID" type="text" id="" class="form-control mb-4" placeholder="Project Image Link">
        </div>

      <img id="projectEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
      <h5 id="projectEditWrong" class="d-none">Something Went Wrong !</h5>


</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="projectEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="addprojectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">


          <div id="projectAddForm" class=" w-100">
          <h6 class="mb-4">Add New Project</h6>  
          <input id="projectNameAddID" type="text" id="" class="form-control mb-4" placeholder="Project Name">
          <input id="projectDesAddID" type="text" id="" class="form-control mb-4" placeholder="Project Description">
          <input id="projectImgAddID" type="text" id="" class="form-control mb-4" placeholder="Project Image Link">
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="projectAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>








@endsection

@section('script')
<script type="text/javascript">
getProjectData();
</script>
@endsection