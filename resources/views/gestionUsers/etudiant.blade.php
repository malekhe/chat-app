
@extends('layouts.layout')

@section('content')
<link rel="stylesheet" type="text/css" href="/css/tablecss.css" />

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Liste <b>Etudiant</b></h2>
                        </div>
                        
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        @if($user->role=='Etudiant')
                        <tr>
                   
                            <td>{{$user->fname}}</td>
                            <td>{{$user->lname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->status}}</td>
                            <td>
                               
                                <a class="btn btn-danger" style="color:white;" href="{{ route('user.destroy',$user->id) }}" >Delete</a>
                               
                            </td>
                        </tr>
                        @endif
                        @endforeach
                          
				</tbody>
			</table>

@endsection