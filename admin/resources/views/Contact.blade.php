@extends('Layout.app')

@section('content')
<div id="ContactDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">
<table id="contactDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name</th>
	  <th class="th-sm">Phone</th>
	  <th class="th-sm">Email</th>
	  <th class="th-sm">Masssage</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="contact_table">

  </tbody>
</table>

</div>
</div>
</div>

<div id="contactLoaderDiv" class="container">
<div class="row">
<div class="col-md-12 p-5 text-center">
<img class="loading-icon"  src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>

<div id="contactWrongDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">
<h3>Somethis went wrong!</h3>
</div>
</div>
</div>




<div class="modal fade" id="contactDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body p-3 text-center">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="contactDeleteId" class="mt-4 d-none">   </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button  id="contactDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>




@endsection

@section('script')
<script type="text/javascript">
getContactData();






function getContactData() {
    axios.get('/getContactData')

        .then(function (response) {

            if (response.status == 200) {

                $('#ContactDiv').removeClass('d-none');
                $('#contactLoaderDiv').addClass('d-none');
                $('#contactDataTable').DataTable().destroy();
                $('#contact_table').empty();

                var jsonData = response.data;

                $.each(jsonData, function (i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].contact_name + "</td>" +
                        "<td>" + jsonData[i].contact_mobile + "</td>" +
                        "<td>" + jsonData[i].contact_email + "</td>" +
                        "<td>" + jsonData[i].contact_massage + "</td>" +
                        "<td> <a  class='contactDeleteBtn'  data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#contact_table');
                });

                //      // Services Table Delete Icon Click
                $('.contactDeleteBtn').click(function () {
                    var id = $(this).data('id');
                    $('#contactDeleteId').html(id);
                    $('#contactDeleteModal').modal('show');

                })

                $('#contactDataTable').DataTable({ "order": false });
                $('.dataTables_length').addClass('bs-select');

            } else {

                $('#contactLoaderDiv').addClass('d-none');
                $('#contactWrongDiv').removeClass('d-none');

            }

        })
        .catch(function (error) {
            $('#contactLoaderDiv').addClass('d-none');
            $('#contactWrongDiv').removeClass('d-none');
        });

}





//Project Delete Model Yes Btn

$('#contactDeleteConfirmBtn').click(function () {
    var id = $('#contactDeleteId').html();
    getContactDelete(id);
})

//Project Delete

function getContactDelete(deleteID) {
    $('#contactDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
    axios.post('/contactDelete', { id: deleteID })
        .then(function (response) {
            $('#contactDeleteConfirmBtn').html("Yes");
            if (response.status = 200) {

                if (response.data == 1) {
                    $('#contactDeleteModal').modal('hide');
                    toastr.success('Delete Success');
                    getContactData();
                }
                else {
                    $('#contactDeleteModal').modal('hide');
                    toastr.error('Delete Fail');
                    getContactData();
                }
            } else {
                $('#contactDeleteModal').modal('hide');
                toastr.error('Something Went Wrong !!!');
            }


        })
        .catch(function (error) {
            $('#contactDeleteModal').modal('hide');
            toastr.error('Something Went Wrong !!!');
        });
}

















</script>
@endsection