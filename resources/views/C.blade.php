@extends('Layout.app')
@section('title', 'C Programming')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 mt-3">
        <div class="card text-center">
            <div class="card-header">
                <h4>Axios File Upload</h4>
            </div>
            <div class="card-body">
                <input id="myFileId" class="form-control" type="file">
                <button onclick="onUpload()" id="fileBtn" class="btn btn-block btn-primary mt-3">Upload</button>
                <h2 id="successMsg" class="text-green mt-3"></h2>
                <h2 id="errorMsg" class="text-red"></h2>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection('content')

@section('script')

    <script type="text/javascript">
        
        function onUpload(){
            let mainFile = document.getElementById('myFileId').files[0];
            let fileName = mainFile.name;
            let fileFormat = fileName.split('.').pop();
            
            let fileData = new FormData();
            fileData.append('FileKeyc', mainFile);

            let config = {
                headers: {'content-type' : 'multipart/form-data'}
            }

            let url = '/cfileup';

            axios.post(url, fileData, config)
            .then(function(response){

                if(response.status == 200){
                    $('#successMsg').html('File Upload success');

                    setTimeout(() => {
                        $('#successMsg').html('');
                    }, 2000);
                }

            }).catch(function(error){
                $('#errorMsg').html('Upload failed');
            })

        }

    </script>

@endsection('script')
