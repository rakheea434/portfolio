
function getProjectData() {
    axios.get('/getProjectData')

        .then(function (response) {

            if (response.status == 200) {

                $('#ProjectDiv').removeClass('d-none');
                $('#ProjectLoaderDiv').addClass('d-none');
                $('#projectDataTable').DataTable().destroy();
                $('#project_table').empty();

                var jsonData = response.data;

                $.each(jsonData, function (i, item) {
                    $('<tr>').html(
                        "<td><img width='200px' height='auto class='table-img' src=" + jsonData[i].project_image + "></td>" +
                        "<td>" + jsonData[i].project_title + "</td>" +
                        "<td>" + jsonData[i].project_description + "</td>" +
                        "<td><a class='projectEditBtn'  data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td> <a  class='projectDeleteBtn'  data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#project_table');
                });

                //      // Services Table Delete Icon Click
                $('.projectDeleteBtn').click(function () {
                    var id = $(this).data('id');
                    $('#projectDeleteId').html(id);
                    $('#projectDeleteModal').modal('show');

                })

                //   // Services Table Edit Icon Click
                $('.projectEditBtn').click(function () {
                    var id = $(this).data('id');
                    $('#projectEditId').html(id);
                    ProjectUpdateDetails(id);
                    $('#editProjectModal').modal('show');

                })





                $('#projectDataTable').DataTable({ "order": false });
                $('.dataTables_length').addClass('bs-select');

            } else {

                $('#ProjectLoaderDiv').addClass('d-none');
                $('#projectWrongDiv').removeClass('d-none');

            }

        })
        .catch(function (error) {
            $('#ProjectLoaderDiv').addClass('d-none');
            $('#projectWrongDiv').removeClass('d-none');
        });

}



//Project Delete Model Yes Btn

$('#projectDeleteConfirmBtn').click(function () {
    var id = $('#projectDeleteId').html();
    getProjectDelete(id);
})

//Project Delete

function getProjectDelete(deleteID) {
    $('#projectDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
    axios.post('/projectDelete', { id: deleteID })
        .then(function (response) {
            $('#projectDeleteConfirmBtn').html("Yes");
            if (response.status = 200) {

                if (response.data == 1) {
                    $('#projectDeleteModal').modal('hide');
                    toastr.success('Delete Success');
                    getProjectData();
                }
                else {
                    $('#projectDeleteModal').modal('hide');
                    toastr.error('Delete Fail');
                    getProjectData();
                }
            } else {
                $('#projectDeleteModal').modal('hide');
                toastr.error('Something Went Wrong !!!');
            }


        })
        .catch(function (error) {
            $('#projectDeleteModal').modal('hide');
            toastr.error('Something Went Wrong !!!');
        });
}





function ProjectUpdateDetails(detailID) {
    axios.post('/projectDetails', { 
            id: detailID })
      .then(function (response) {
        if (response.status == 200) {
          $('#projectEditForm').removeClass('d-none');
          $('#projectEditLoader').addClass('d-none');
          var jsonData=response.data;
         $('#projectNameID').val(jsonData[0].project_title);
         $('#projectDesID').val(jsonData[0].project_description);
         $('#projectImgID').val(jsonData[0].project_image);
        }
        else {
          $('#projectEditLoader').addClass('d-none');
          $('#projectEditWrong').removeClass('d-none');
        }
  
      })
      .catch(function (error) {
        $('#projectEditLoader').addClass('d-none');
        $('#projectEditWrong').removeClass('d-none');
      });
  }


  $('#projectEditConfirmBtn').click(function () {
    var id = $('#projectEditId').html();
    var name = $('#projectNameID').val();
    var description = $('#projectDesID').val();
    var image = $('#projectImgID').val();
    ProjectUpdate(id,name,description,image);
  })

  
  function ProjectUpdate(updateID, projectName, projectDes, projectImg) {
    if(projectName.length==0){
      toastr.error('Project Name is Empty');
    }
    if(projectDes.length==0){
      toastr.error('Project Description is Empty');
    }
    if(projectImg.length==0){
      toastr.error('Project Image is Empty');
    }else{
      $('#projectEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
      axios.post('/projectUpdate', { 
        id: updateID,
        name: projectName,
        description: projectDes,
        image: projectImg,
      
      
      })
  .then(function (response) {
    $('#projectEditConfirmBtn').html("Save"); 
    if(response.status=200){
      if (response.data == 1) {
        $('#editProjectModal').modal('hide');
        toastr.success('Update Success');
        getProjectData();
      }
      else {
        $('#editProjectModal').modal('hide');
        toastr.error('Update Fail');
        getProjectData();
      }
    }else{
      $('#editProjectModal').modal('hide');
      toastr.error('Something wrong !!!');
    }
  
  })
  .catch(function (error) {
    $('#editProjectModal').modal('hide');
    toastr.error('Something wrong !!!');
  });
    }
   
  }
  




  
// Project Add New btn Click

$('#addNewBtnId').click(function(){
    $('#addprojectModal').modal('show');
  });
  
  
  
  // Services Add Modal Save Btn
  $('#projectAddConfirmBtn').click(function() {
     var name = $('#projectNameAddID').val();
     var des = $('#projectDesAddID').val();
     var img = $('#projectImgAddID').val();
     ProjectAdd(name,des,img);
  })
  
  // Project Add Method
  
  function ProjectAdd(projectName,projectDes,projectImg) {
  
    if(projectName.length==0){
     toastr.error('Project Name is Empty !');
    }
    else if(projectDes.length==0){
     toastr.error('Project Description is Empty !');
    }
    else if(projectImg.length==0){
      toastr.error('Project Image is Empty !');
    }
    else{
    $('#projectAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
    axios.post('/projectAdd', {
            name: projectName,
            des: projectDes,
            img: projectImg,
        })
        .then(function(response) {
            $('#projectAddConfirmBtn').html("Save");
  
            if(response.status==200){
  
              if (response.data == 1) {
                $('#addprojectModal').modal('hide');
                toastr.success('Add Success');
                getProjectData();
            } else {
                $('#addprojectModal').modal('hide');
                toastr.error('Add Fail');
                getProjectData();
            }  
         } 
         else{
             $('#addprojectModal').modal('hide');
             toastr.error('Something Went Wrong !');
         }   
  
    })
    .catch(function(error) {
             $('#addprojectModal').modal('hide');
             toastr.error('Something Went Wrong !!');
   });
  
  }
  
  }

