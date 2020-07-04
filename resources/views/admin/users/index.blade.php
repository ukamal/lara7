@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                   <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                   @foreach($users as $user)
                    <tr>
                        <th scope="row">1</th>
                        <td> {{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                        <td>
                          <a href="{{ route('admin.users.edit', $user->id )}}" class="float-left">
                              <button type="button" class="btn btn-primary">Edit</button>
                          </a>


                          <form action="{{ route('admin.users.destroy', $user )}}" method="POST" class="float-left"> @csrf
                            {{ method_field('DELETE')}}
                             <button type="submit" class="btn btn-warning">Delete</button>
                          
                          </form>

                        </td>
                      </tr>
                   @endforeach
                     
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
