
<div class="container mt-5">
    <div class="row">
        @foreach($courceData as $result)
        <div class="col-md-4 p-1 text-center">
            <div class="card">
                <div class="text-center">
                    <img class="w-100" src="{{$result->course_img}}" alt="Card image cap">
                    <h5 class="service-card-title mt-4">{{$result->course_name}}</h5>
                    <h6 class="service-card-subTitle p-0 ">{{$result->course_des}}</h6>
                    <h6 class="service-card-subTitle p-0 ">{{$result->course_fee}} </h6>
                    <button class="normal-btn-outline mt-2 mb-4 btn">শুরু করুন </button>
                </div>
            </div>
        </div>
@endforeach
    </div>
</div>


