@extends('layouts.app')

@section('content')
    <div class="w-full admin-stock-bg bg-topo-pattern"></div>

    <div class="h-full flex justify-center my-4">
        <div class="w-11/12 bg-white p-6 mt-6 rounded-lg">
            <div class="text-2xl border-l-4 border-yellow-500 pl-4 mb-4">
                <p>
                    Recieved Messages!
                </p>
            </div>
            <table class="table table-bordered">
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Number</th>
            <th>Email</th>
            <th>Message</th>
            <th width="280px">Action</th>
            </tr>
            @foreach($contacts as $key => $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->number }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->msg }}</td>
                <td>
                <a class="btn btn-primary" href="{{ route('contact.delete',$contact->id) }}">Delete</a></td>
            </tr>
            @endforeach
                
            </table>

        </div>
    </div>
@endsection
