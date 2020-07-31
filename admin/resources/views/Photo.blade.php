@extends('Layout.app')
@section('title','Photo Gallery')
@section('content')


<div class="container-fluid m-0 ">
        <div class="row">
            <div class="col-md-12">
                <button data-toggle="modal" data-target="#PhotoModal" id="addNewPhotoBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
            </div>
        </div>
        <div class="row photoRow">

        </div>
    </div>

<div class="modal fade" id="addPhotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          <div id="serviceAddForm" class=" w-100">
          <h6 class="mb-4">Add New Service</h6>  
          <input class="form-control" id="imgInput" type="file" id="" class="form-control mb-4">
          <img class="imagePreview" id="imagePreview" src="{{asset('images/defaultimg.png')}}">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="SavePhoto" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>

@endsection



@section('script')
<script type="text/javascript">
$('#addNewPhotoBtnId').click(function(){
  $('#addPhotoModal').modal('show');
});



$('#imgInput').change(function(){
    var reader= new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload=function(event){
        var Imgsource= event.target.result;
        $('#imagePreview').attr('src', Imgsource)
    }
})


$('#SavePhoto').on('click',function () {
            $('#SavePhoto').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
           var PhotoFile= $('#imgInput').prop('files')[0];
           var formData=new FormData();
           formData.append('photo',PhotoFile);
           axios.post("/PhotoUpload",formData).then(function (response) {
               if(response.status==200 && response.data==1){
                   $('#addPhotoModal').modal('hide');
                   $('#SavePhoto').html('Save');
                   toastr.success('Photo Upload Success');
               }
               else{
                   $('#addPhotoModal').modal('hide');
                   toastr.error('Photo Upload Fail');
               }
           }).catch(function (error) {
               $('#addPhotoModal').modal('hide');
               toastr.error('Photo Upload Fail !!');
               $('#SavePhoto').html('Save');
           })
        });


        LoadPhoto();
        function LoadPhoto() {
            axios.get('/PhotoJSON').then(function (response) {
                $.each(response.data, function(i, item) {
                    $("<div class='col-md-3 p-1'>").html(
                        "<img class='imgOnRow' src="+item['location']+">"
                    ).appendTo('.photoRow');
                });
            }).catch(function (error) {
            })
        }




</script>
@endsection