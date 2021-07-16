@extends('Layout.app')
@section('title','Home')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-5 text-center">
                <div class="card-header">
                    <h1>Laravel Ajax file upload</h1>
                </div>

                <div class="card-body">
                    <input id="fileId" class="form-control" type="file">
                    <button id="fileBtn" onclick="fileUpload()" class="btn btn-block btn-primary mt-2">Upload file</button>
                    <h1 id="percentage"></h1>
                    <h1 id="successMsg" class="text-success"></h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')

@section('script')
    <script type="text/javascript">

        function fileUpload(){
            let myFile = $('fileId').files[0];
            let fileName = myFile.name;
            let fileSize = myFile.size;
            let fileFormat = fileName.split('.').pop();
            

            let fileData = new FormData();
            fileData.append('FileKey', myFile);

            let config = {
                headers:{'content-type' : 'multipart/form-data'},
                onUploadProgress:function(progressEvent){
                    let progPer = Math.round((progressEvent.loaded*100) / progressEvent.total);

                    let uploaded = progressEvent.loaded / (1028*1028);

                    $('#percentage').html(uploaded.toFixed(2) + "MB");
                }
            }

            let url = '/fileUp'; 

            axios.post(url, fileData, config)
            .then(function(response){
                
                if(response.status == 200){
                    $('#percentage').html(' ');
                    $('#successMsg').html('Upload success!');
                    
                    setTimeout( () => {
                        $('#successMsg').html('');
                    }, 2000)
                }

            }).catch(function(error){
                
            })


        }

    </script>

@endsection('script')