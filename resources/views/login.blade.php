@extends('app')
@section('content')

<form action="{{asset('login-submit')}}" method="post">

	{{ csrf_field() }}

  <div class="container">
    <label><b>email</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
    
  </div>

  
</form>

@stop