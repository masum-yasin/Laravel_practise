@extends('layouts.app')
@section('title','contact page')
@section('content')

<body>



  <div class="container mt-5">


    <div class="row">
      <div class="col-sm-12">
        <h2>Contact Me</h2>
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
            <a class="nav-link" href="about">about</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact">contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
        <hr class="d-sm-none">
      </div>
      <div class="col-sm-12">
        <h2>TITLE HEADING</h2>
        <h5>Title description, Dec 7, 2020</h5>
        <div class="fakeimg">Fake Image</div>
        <h1>Contact Form</h1>
        <!-- Errors message -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <!-- Errors message ending -->
        <!-- Success Data -->
        @if(session('msg'))
        <div class="alert alert-success">
          {{session('msg')}}

        </div>
        @endif
        
        <form method="post" action="/contact/update/{{$single['id']}}">
          @csrf
          <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name</label>
            <input type="text" name="name"  value="{{old('name')? old('name'):$single['name']}}" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
            @error('name')
            <div id="emailHelp" class="form-text alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail2" class="form-label">Email address</label>
            <input type="email" name="email"  value="{{old('email')? old('email'):$single['email']}}" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
            @error('email')
            <div id="emailHelp" class="form-text alert alert-danger">{{ $message }}</div>
          </div>
          @enderror
          <div class="mb-3">
            <label for="exampleInputSubject3" class="form-label">Subject</label>
            <input type="text" name="subject" value="{{old('subject')? old('subject'):$single['subject']}}"class="form-control" id="exampleInputSubject3" aria-describedby="emailHelp">
            @error('subject')
            <div id="emailHelp" class="form-text alert alert-danger">{{ $message }}</div>
          </div>
        @enderror
          <div class="mb-3">
            <label for="exampleInputmessage4" class="form-label">message</label>
            <input type="text" name="message"  value="{{old('message')? old('message'):$single['message']}}"class="form-control" id="exampleInputMessage3">
            @error('message')
            <div id="emailHelp" class="form-text alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        
          </div>
          <!-- @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror -->
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>


</body>
@endsection