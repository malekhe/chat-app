
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
                            <h2>Liste <b>Enseignants</b></h2>
                        </div>
                        
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Status</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        @if($user->role!='Etudiant')
                        <tr>
                   
                            <td>{{$user->fname}}</td>
                            <td>{{$user->lname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->status}}</td>
                          
                        </tr>
                        @endif
                        @endforeach
                          
				</tbody>
			</table>
        </div>
    </div></div>
       
        </body>
@endsection
