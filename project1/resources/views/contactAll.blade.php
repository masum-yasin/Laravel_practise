
@extends('layouts.app')
@section('title','All Contact page')
@section('content')

<body>

<div class="container mt-5 p-lg-5">
  @if(session('msg'))
  <div class="alert alert-success">{{session('msg')}}</div>
  @endif
  <table class="table table-success table-striped">
    <thead>
      <tr>
        <th scope="col">#Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Subject</th>
        <th scope="col">Message</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($messages as $item)
      <tr>
        <th>{{$item['id']}}</th>
        <td>{{$item['name']}}</td>
        <td>{{$item['email']}}</td>
        <td>{{$item['subject']}}</td>
        <td>{{$item['message']}}</td>
        <td>
          <a href="/contact/delete/{{$item['id']}}"><i class="btn btn-danger">Delete</i></a>
          <a href="/contact/edit/{{$item['id']}}"><i class="btn btn-warning">Edit</i></a>
        </td>
      </tr>
      @endforeach
     
    </tbody>
  </table>
   
</div>


    

</body>
@endsection


