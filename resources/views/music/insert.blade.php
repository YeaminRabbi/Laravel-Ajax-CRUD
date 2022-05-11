<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music Insert</title>

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4>Music Insert</h4>
                </div>
                <div class="col-md-9">
                    <h4>Music List</h4>
                </div>
                
            </div>

            <div class="row">
                

                <div class="col-md-3">
                    
                    <div id="ContactMSG" style="display: none;">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Music Inserted Successfully!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                   
                    <form action="{{ route('MusicInsert') }}" method="POST" id="FORM"  role="form">

                        @csrf
                        <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" placeholder="Album name" name="title" id="title" required>
                        </div>

                        <div class="form-group">
                        <label for="singer">Singer:</label>
                        <input type="text" class="form-control" placeholder="Singer" name="singer" id="singer" required>
                        </div>


                        <div class="form-group">
                            <label for="realease_date">Release:</label>
                            <input type="date" class="form-control" placeholder="Date" name="release_date" id="release_date" required>
                        </div>

                        <div class="form-group">
                            <label for="songs">No. Songs:</label>
                            <input type="number" class="form-control" placeholder="songs" name="songs" id="songs" required>
                        </div>

                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="col-md-9 mt-3">
                    @if (\Session::has('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {!! \Session::get('delete') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (\Session::has('like'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! \Session::get('like') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Album</th>
                                <th>Singer</th>
                                <th>Likes</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                                    <tr>
                                        {{--  <td>{{ $data->title }}</td>
                                        <td>
                                            <a href="{{ route('AlbumSearch', $data->singer) }}">{{ $data->singer }}</a>
                                        </td>
                                        <td>{{ $data->like }}</td>
                                        
                                        <td>
                                            <a href="{{ route('MusicViewEdit', $data->id) }}" class="btn btn-warning btn-sm">View/Edit</a>
                                            <a href="{{ route('MusicDelete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            <a href="{{ route('MusicLike', $data->id) }}" class="btn btn-primary btn-sm">Like</a>
                                        </td>  --}}
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-sm">View/Edit</a>
                                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                                            <a href="" class="btn btn-primary btn-sm">Like</a>
                                        </td>
                                    </tr>
                               
                        </tbody>
                    </table>
                </div>
                
           </div>
        </div>
    </section>

















    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>

        //Ajax for Fetch Data from DB
        fetchMusic();
        function fetchMusic(){
            $.ajax({
                url: '{{ route('MusicListFetch') }}',
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    $('tbody').html("");
                    $.each(response.musics, function( key, data ) {
                       $('tbody').append(
                        '<tr>\
                            <td>'+data.title+'</td>\
                            <td>'+data.singer+'</td>\
                            <td>'+data.like+'</td>\
                            <td><a href="{{ route('MusicViewEdit', '+data.id+') }}" class="btn btn-warning btn-sm">View/Edit</a><a href="{{ route('MusicDelete', '+data.id+') }}" class="btn btn-danger btn-sm">Delete</a><a href="{{ route('MusicLike', '+data.id+') }}" class="btn btn-primary btn-sm">Like</a></td>\
                        </tr>'
                       );
                    });
                }
            });
        }


        //AJAX for Insert
		$('form').on('submit', function (e) {
			e.preventDefault(); // prevent the form submit
			var url = '{{ route('MusicInsert') }}';
			// create the FormData object from the form context (this),
			// that will be present, since it is a form event
			var formData = new FormData(this); 
			// build the ajax call
			$.ajax({
				url: url,
				type: 'POST',
				data: formData,
				success: function (response) {
					// handle success response
					//console.log(response.data);
					var x = document.getElementById('ContactMSG');
					if (x.style.display === "none") {
						x.style.display = "block";
					}

                    //Calling for fetching the latest updated data
                    fetchMusic();
				},
				error: function (response) {
					// handle error response
					console.log(response.data);
				},
				contentType: false,
				processData: false
			});
			document.getElementById('FORM').reset();
		});
	</script>
</body>
</html>