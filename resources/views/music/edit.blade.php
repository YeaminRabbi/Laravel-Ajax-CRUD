<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music View</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>


    <section>
        <div class="container">
            <div class="row">
               
                <div class="col-md-6">
                    <h1>Album: {{ $music->title }}</h1>
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! \Session::get('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form action="{{ route('MusicEdit') }}" method="POST">

                        @csrf

                        <input type="hidden" name="id" value="{{ $music->id }}" id="id">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" placeholder="Album name" name="title" value="{{ $music->title }}" id="title">
                        </div>

                        <div class="form-group">
                        <label for="singer">Singer:</label>
                        <input type="text" class="form-control" placeholder="Singer" name="singer" value="{{ $music->singer }}" id="singer">
                        </div>


                        <div class="form-group">
                            <label for="realease_date">Release:</label>
                            <input type="date" class="form-control" placeholder="Date" name="release_date" value="{{ $music->release_date }}" id="release_date">
                        </div>

                        <div class="form-group">
                            <label for="songs">No. Songs:</label>
                            <input type="number" class="form-control" placeholder="songs" value="{{ $music->songs }}" name="songs" id="songs">
                        </div>

                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('music') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>

            </div>
        </div>
    </section>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>