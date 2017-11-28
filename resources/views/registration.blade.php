@extends('app')
@section('content')




<div align="center">

<form action="{{asset('reg-submit')}}" method="post" >
  <div class="container">

  {{ csrf_field() }}

  	<label><b>First Name</b></label>
    <input type="text" placeholder="First Name" name="first_name" required>



    <label><b>Last Name</b></label>
    <input type="text" placeholder="Last Name" name="last_name" required>

    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label><b>Phone</b></label>
    <input type="text" placeholder="Phone" name="phone" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <!-- <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required> -->
       

    <div class="clearfix">
       <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>


</div>







@stop