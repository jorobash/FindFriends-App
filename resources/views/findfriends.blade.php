@extends('layouts/layout')

    @section('content')
        <h1>click the button and find new friends</h1>
    		<form method="GET">
                <input type="submit" class="btn btn-success" name="findfriends" value="findfriends">
            </form>

            <table class="table table-hover">
                <thead>
                    <th scope="col">№</th>
                    <th scope="col">real_name</th>
                    <th scope="col">Country</th>
                </thead>
                <tbody>
                    @isset($ffriends)
                    @foreach($ffriends as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->real_name }}</td>
                            <td>{{ $item->country_name }}</td>
                        </tr>
                    @endforeach

                    {{$ffriends->links()}}
                    @endisset
                </tbody>
            </table>
 @endsection
