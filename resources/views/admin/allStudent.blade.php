@extends('admin.admin_master') 
@section('admin') 


		<!-- BEGIN #content -->

        <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Registered Students</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Matric Number</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Student Course</th>
                        <th scope="col">Room Number</th>

                      </tr>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                      <tr>
                      <td> <img src="/upload/userImages/{{ $user->profile_photo_path }}" style="width:60 px; height:60px"></td>
                              <td>{{  $user->name}}</td>
                              <td>{{  $user->email}}</td>
                              <td>{{  $user->matricNo}}</td>
                              <td>{{  $user->phoneNo}}</td>
                              <td>{{  $user->studCourse}}</td>
                              <td>{{  $user->roomNo}}</td>
                              <td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div>



            



@endsection