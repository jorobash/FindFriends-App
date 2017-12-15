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
                    <select class="form-control" id="countryID">
                        @isset($countryname)
                        @foreach($countryname as $country)
                            <option class="{{$country}}">{{$country}}</option>
                        @endforeach
                        @endisset
                    </select>
            </div>
                 <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <th scope="col">№</th>
                            <th scope="col">Name</th>
                            <th scope="col">Country</th>
                        </thead>
                        <tbody class="content">
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
                </div>
            </div>
        </div>
    </div>
</div>





<script type="text/javascript">
    $(document).on('click','.pagination a',function(e){
    e.preventDefault();
    // console.log($(this).attr('href').split('page=')[1]);
    var page = $(this).attr('href').split('page=')[1];
    getUnFriend(page);
});
    function getUnFriend(page){
        // console.log('geetting people for page = ' + page);
        $.ajax({
            url:'http://localhost/findfriends/public/index.php/getdata?page=' + page
        }).done(function(data){
            $('.content').html(data);
        });
    }
    $(document).ready(function(){
        $('#countryID').on('change',function(){
            var country = $(this).val();
            loadData(country);
        });
    });
    function loadData(country_name)
    {
        $.ajax({
            type : 'get',
            url  : "{{url ('/getdataa')}}",
            data : {country_name},
            dataType : 'json',
            success:function(data)
            {
                // $('.country').html(data);
            }
        })
    }
</script>
@endsection
