@extends('layouts.app')
@section('title','Home page')
@section('content')
<div class="container mt-5">
    <div class="row ">
      <div class="col-sm-4">
        <h2>Contact page</h2>
        <h5>Photo of me:</h5>
        <div class="fakeimg">Fake Image</div>
        <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
        <h3 class="mt-4">Some Links</h3>
        <p>Lorem ipsum dolor sit ame.</p>
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">Active</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
        <hr class="d-sm-none">
      </div>
      <!-- /resources/views/post/create.blade.php -->
 
{{-- errors message --}}
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<!-- Create Post Form -->
      {{-- session message --}}
      @if(session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
        @endif
      
          
  
      <div class="col-sm-8">
        <h1>Contact Form</h1>
        <form method="post" action="send">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Enter Your Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="exampleInputName1" aria-describedby="nameHelp">
            @error('name')
                <div id="nameHelp" class="form-text alert alert-danger">{{$message}}</div>
          </div>
          @enderror
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" value="{{old('email')}}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('email')
          <div id="emailHelp" class="form-text alert alert-danger">{{$message}}</div>
          @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Subject</label>
            <input type="text" class="form-control" value="{{old('subject')}}" name="subject" id="exampleInputEmail2" aria-describedby="emailHelp">
           @error('subject')
           <div id="subjectHelp" class="form-text alert alert-danger">{{$message}}</div>
           @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Message</label>
            <input type="text" class="form-control" value="{{old('message')}}" name="message" id="exampleInputmessage1" aria-describedby="messageHelp">
            @error('message')
            <div id="messageHelp" class="form-text alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection