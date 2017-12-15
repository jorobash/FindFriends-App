
	    @foreach($ffriends as $key => $item)
	        <tr>
	            <td>{{ $key+1 }}</td>
	            <td>{{ $item->real_name }}</td>
	            <td>{{ $item->country_name }}</td>
	        </tr>
	    @endforeach
	    {{$ffriends->links()}}
