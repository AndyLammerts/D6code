@role('user')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verander een Gebruikers privilege') }}</div>
                <table class="table">
                <div class="card-body">
                    <thead>
                        <tr>
                           <th>Naam</th>
                           <th> Privilege </th>
                           <th> Veranderen </th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                        <tr>
                            <td> 
                                <a>{{$user->username}}</a> 
                            </td>
                            <td>
                                <a>{{$user->role}}</a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#ModalEdit"> {{__('Verander')}}
                            </td>
                        </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('privilege.edit')
@endsection
@endrole