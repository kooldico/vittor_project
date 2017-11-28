

<div class="container">
    <div class="row">


        @if(isset($data))
            @foreach($data as $eachVal)

                <div class="col-md-12">
                    <h2>{{$eachVal['title']}}</h2> <p>{{$eachVal['first_name']}} {{$eachVal['last_name']}} </p>
                    <p>{{$eachVal['description']}}</p>

                    @if($auth != null)
                        <p><a href="javascript:void(0);" onclick="edit({{$eachVal['id']}})" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-pencil"></i></a> |
                            <a href="javascript:void(0);" onclick="del({{$eachVal['id']}})"><i class="fa fa-trash-o" aria-hidden="true"></i></a></p>
                    @endif

                </div>


                @endforeach

                @endif





                        <!-- <div class="col-md-12">
	        <h2>What is Lorem Ipsum?</h2>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
	    </div> -->
    </div>
</div>