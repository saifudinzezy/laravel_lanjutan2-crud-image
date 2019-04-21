<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Upload file</title>
</head>
<body>
    <div class="row">
		<div class="container">
			<h2 class="text-center my-5">Tutorial Laravel #30 : Membuat Upload File Dengan Laravel</h2>
			
			<div class="col-lg-8 mx-auto my-5">	
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{$error}} <br>
                        @endforeach
                    </div>
                @endif

                <form action="/upload2/proses" method="POST" enctype="multipart/form-data">
                    {{-- {{ csrf_field() }} --}}
                    {{-- tulis ini jika @csrf error --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <b>File Gambar</b><br/>
                        <input type="file" name="file">
                    </div>
                    <div class="form-group">
                            <b>Keterangan</b>
                            <textarea class="form-control" name="keterangan"></textarea>
                        </div>
    
                        <input type="submit" value="Upload" class="btn btn-primary">
                    </form>

                    <h4 class="my-5">Data</h4>

                    <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1%">File</th>
                                    <th>Keterangan</th>
                                    <th width="1%">OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gambar as $g)
                                <tr>
                                    {{-- bisa memakai url / asset --}}
                                    <td><img width="150px" src="{{ url('/data_file/'.$g->file) }}"></td>
                                    <td>{{$g->keterangan}}</td>
                                    <td><a class="btn btn-danger" href="/upload/hapus/{{ $g->id }}">HAPUS</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
</body>
</html>