@extends('app')
@section('content')

@if($auth != null)

<div class="container">
    <div class="col-md-12 blog-text-input">
    <form action="{{asset('blog-submit')}}" method="post">

      {{csrf_field()}}

        <div class="form-group">
          <label for="text">Enter your blog heading</label>
          <input type="text" class="form-control" id="b-heading" placeholder="Enter your blog heading" name="blog heading">
        </div>
        <div class="form-group">
          <label for="text">Enter your blog content</label>
          <textarea name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
</div>

@endif



<div class="container">
	<div class="row">

  

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

  

		
	    
	    <!-- <div class="col-md-12">
	        <h2>What is Lorem Ipsum?</h2>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
	    </div> -->
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form name="editBlg" id="editBlg" method="post">

    	{{csrf_field()}}

        <div class="form-group">
          <label for="text">Enter your blog heading</label>
          <input type="text" class="form-control" id="title" placeholder="Enter your blog heading" name="title">
        </div>
        <div class="form-group">
          <label for="text">Enter your blog content</label>
          <textarea name="description2" id="description2"></textarea>
        </div>
        <input type="hidden" id="editID" name="editID" value="">
        <button type="button" class="btn btn-default" onclick="editSub()">Submit</button>
      </form>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>







@stop
@section('editBlog')
<script>
	
function edit(val)
{

	$('#editID').val(val);

	
}


function editSub()
{
	$.ajax({
            url: 'edit-blog',
            type:'POST',
            data:$('#editBlg').serialize(),
            success:function(res)
            {
                if(res.success==true)
                {
                	location.reload();
                   //console.log(res);
                }
                //
            },
            error:function(res)
            {
                alert('remove Cart error')
            }
        });
}

function del(val)
{
	$.ajax({
            url: 'delete-blog',
            type:'GET',
            data:{editID:val},
            success:function(res)
            {
                if(res.success==true)
                {
                	location.reload();
                   //console.log(res);
                }
                //
            },
            error:function(res)
            {
                alert('remove Cart error')
            }
        });
}

</script>
@stop
