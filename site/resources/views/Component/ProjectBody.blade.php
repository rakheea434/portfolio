
<div class="container mt-5">
    <div class="row">
    @foreach($projectData as $result)
        <div class="col-md-3 p-1 text-center">
      
            <div class=" m-1 card">
                <div class="text-center">
                    <img class="w-100" src="{{$result->project_image}}" alt="Card image cap">
                    <h5 class="service-card-title mt-4">{{$result->project_title}} </h5>
                    <h6 class="service-card-subTitle p-0 m-0">{{$result->project_description}}</h6>
                    <a href="{{$result->project_link}}" class="normal-btn mt-2 mb-4 btn">বিস্তারিত</a>
                </div>
            </div>
           
        </div>
        @endforeach
    </div>
</div>

