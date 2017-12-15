@extends('layouts/layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div panel-heading>
                 <h1>click the button and find new friends</h1>

                 <form method="GET">
                    <input type="submit" class="btn btn-success" name="findfriends" value="findfriends">
                </form>
                <button class="btn btn-info pull-right btn-xs" id="read-data">Load Data By Ajax</button>
            </div>
                 <div class="panel-body">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <th scope="col">№</th>
                    <th scope="col">real_name</th>
                    <th scope="col">Country</th>
                </thead>
                <tbody id="findFriends">
                </tbody>
            </table>
            </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#read-data').on('click',function(){

        $.get("{{ URL::to('unfriends/fetchdata') }}",function(data){

            $.each(data,function(i,value){
                alert(value.)
            })
        });

    });
</script>

@endsection
