@extends('Layout.app')

@section('content')




<div id="testimonialDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">
<button id="addNewTestimonialBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
<table id="testimonialDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="testimonial_table">

  </tbody>
</table>

</div>
</div>
</div>

<div id="testimonialloaderDiv" class="container">
<div class="row">
<div class="col-md-12 p-5 text-center">
<img class="loading-icon"  src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>

<div id="testimonialWrongDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">
<h3>Somethis went wrong!</h3>
</div>
</div>
</div>


<div class="modal fade" id="testimonialDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-3 text-center">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="testimonialDeleteId" class="mt-4 d-none">   </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button  id="testimonialDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="testimonialEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update Testimonial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body p-5 text-center">

        <h5 id="testimonialEditId" class="mt-4 d-none">   </h5>
        <div id="testimonialEditForm" class="d-none w-100">
          <input id="testimonialNameID" type="text" id="" class="form-control mb-4" placeholder="Testimonial Name">
          <input id="testimonialDesID" type="text" id="" class="form-control mb-4" placeholder="Testimonial Description">
          <input id="testimonialImgID" type="text" id="" class="form-control mb-4" placeholder="Testimonial Image Link">
        </div>

      <img id="testimonialEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
      <h5 id="testimonialEditWrong" class="d-none">Something Went Wrong !</h5>


</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="testimonialEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="addTestimonialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">


          <div id="serviceAddForm" class=" w-100">
          <h6 class="mb-4">Add New Service</h6>  
          <input id="testimonialNameAddID" type="text" id="" class="form-control mb-4" placeholder="Testimonial Name">
          <input id="testimonialDesAddID" type="text" id="" class="form-control mb-4" placeholder="Testimonial Description">
          <input id="testimonialImgAddID" type="text" id="" class="form-control mb-4" placeholder="Testimonial Image Link">
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="testimonialAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>






@endsection

@section('script')
<script type="text/javascript">
getTestimonialData();
function getTestimonialData() {
  axios.get('/getTestimonialData')

    .then(function (response) {

      if (response.status == 200) {

        $('#testimonialDiv').removeClass('d-none');
        $('#testimonialloaderDiv').addClass('d-none');
        $('#testimonialDataTable').DataTable().destroy();
        $('#testimonial_table').empty();

        var jsonData = response.data;

        $.each(jsonData, function (i, item) {
          $('<tr>').html(
            "<td><img width='200px' height='auto' class='table-img' src=" + jsonData[i].testimonial_image + "></td>" +
            "<td>" + jsonData[i].testimonial_name + "</td>" +
            "<td>" + jsonData[i].testimonial_description + "</td>" +
            "<td><a class='testimonialEditBtn'  data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
            "<td> <a  class='testimonialDeleteBtn'  data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"
          ).appendTo('#testimonial_table');
        });

        // // Testimonial Table Delete Icon Click
        $('.testimonialDeleteBtn').click(function () {
          var id = $(this).data('id');
          $('#testimonialDeleteId').html(id);
          $('#testimonialDeleteModal').modal('show');

        })

        // Testimonial Table Edit Icon Click
        $('.testimonialEditBtn').click(function () {
          var id = $(this).data('id');
          $('#testimonialEditId').html(id);
          testimonialUpdateDetails(id);
          $('#testimonialEditModal').modal('show');

          })
          $('#testimonialDataTable').DataTable({ "order": false });
          $('.dataTables_length').addClass('bs-select');

        } else {
          $('#testimonialloaderDiv').addClass('d-none');
          $('#testimonialWrongDiv').removeClass('d-none');
        }

    })
    .catch(function (error) {
      $('#testimonialloaderDiv').addClass('d-none');
      $('#testimonialWrongDiv').removeClass('d-none');
    });

}











// Course Delete Confirm 
$('#testimonialDeleteConfirmBtn').click(function () {
  var id = $('#testimonialDeleteId').html();
  CourseDelete(id);
})


// Course Delete
function CourseDelete(deleteID) {
  $('#testimonialDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....

  axios.post('/testimonialDelete', {
    id: deleteID
  })
    .then(function (response) {
      $('#testimonialDeleteConfirmBtn').html("Yes");
      if (response.status == 200) {
        if (response.data == 1) {
          $('#testimonialDeleteModal').modal('hide');
          toastr.success('Delete Success');
          getTestimonialData();
        } else {
          $('#testimonialDeleteModal').modal('hide');
          toastr.error('Delete Fail');
          getTestimonialData();
        }

      }
      else {
        $('#testimonialDeleteModal').modal('hide');
        toastr.error('Something Went Wrong !');
      }

    })
    .catch(function (error) {
      $('#testimonialDeleteModal').modal('hide');
      toastr.error('Something Went Wrong !');
    });
}






//Each Testimonial Update Details

function testimonialUpdateDetails(detailID) {
  axios.post('/TestimonialDetails', {
    id: detailID
  })
    .then(function (response) {
      if (response.status == 200) {
        $('#testimonialEditForm').removeClass('d-none');
        $('#testimonialEditLoader').addClass('d-none');
        var jsonData = response.data;
        $('#testimonialNameID').val(jsonData[0].testimonial_name);
        $('#testimonialDesID').val(jsonData[0].testimonial_description);
        $('#testimonialImgID').val(jsonData[0].testimonial_image);
      }
      else {
        $('#testimonialEditLoader').addClass('d-none');
        $('#testimonialEditWrong').removeClass('d-none');
      }

    })
    .catch(function (error) {
      $('#testimonialEditLoader').addClass('d-none');
      $('#testimonialEditWrong').removeClass('d-none');
    });
}







$('#testimonialEditConfirmBtn').click(function () {
  var id = $('#testimonialEditId').html();
  var name = $('#testimonialNameID').val();
  var description = $('#testimonialDesID').val();
  var image = $('#testimonialImgID').val();
  testimonialUpdateData(id,name,description,image);
})



function testimonialUpdateData(updateID,testimonialName, testimonialDes, testimonialImg) {
  if(testimonialName.length==0){
    toastr.error('Testimonial Name is Empty');
  }
  if(testimonialDes.length==0){
    toastr.error('Testimonial Description is Empty');
  }
  if(testimonialImg.length==0){
    toastr.error('Testimonial Image is Empty');
  }else{
    $('#testimonialEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
    axios.post('/testimonialUpdate', { 
      id: updateID,
      name: testimonialName,
      description: testimonialDes,
      image: testimonialImg,
    
    
    })
.then(function (response) {
  $('#testimonialEditConfirmBtn').html("Save"); 
  if(response.status=200){
    if (response.data == 1) {
      $('#testimonialEditModal').modal('hide');
      toastr.success('Update Success');
      getTestimonialData();
    }
    else {
      $('#testimonialEditModal').modal('hide');
      toastr.error('Update Fail');
      getTestimonialData();
    }
  }else{
    $('#testimonialEditModal').modal('hide');
    toastr.error('Something wrong !');
  }

})
.catch(function (error) {
  $('#testimonialEditModal').modal('hide');
  toastr.error('Something wrong !!!');
});
  }
 
}






// Testimonial Add New btn Click

$('#addNewTestimonialBtnId').click(function(){
  $('#addTestimonialModal').modal('show');
});



// Testimonial Add Modal Save Btn
$('#testimonialAddConfirmBtn').click(function() {
   var name = $('#testimonialNameAddID').val();
   var des = $('#testimonialDesAddID').val();
   var img = $('#testimonialImgAddID').val();
   testimonialAdd(name,des,img);
})

// Testimonial Add Method

function testimonialAdd(testimonialName,testimonialDes,testimonialImg) {

  if(testimonialName.length==0){
   toastr.error('Testimonial Name is Empty !');
  }
  else if(testimonialDes.length==0){
   toastr.error('Testimonial Description is Empty !');
  }
  else if(testimonialImg.length==0){
    toastr.error('Testimonial Image is Empty !');
  }
  else{
  $('#testimonialAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
  axios.post('/addTestimonial', {
          name: testimonialName,
          des: testimonialDes,
          img: testimonialImg,
      })
      .then(function(response) {
          $('#testimonialAddConfirmBtn').html("Save");

          if(response.status==200){

            if (response.data == 1) {
              $('#addTestimonialModal').modal('hide');
              toastr.success('Add Success');
              getTestimonialData();
          } else {
              $('#addTestimonialModal').modal('hide');
              toastr.error('Add Fail');
              getTestimonialData();
          }  
       } 
       else{
           $('#addTestimonialModal').modal('hide');
           toastr.error('Something Went Wrong !');
       }   

  })
  .catch(function(error) {
           $('#addTestimonialModal').modal('hide');
           toastr.error('Something Went Wrong !');
 });

}

}


</script>
@endsection