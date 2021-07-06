<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <title>Hello, world!</title>
</head>

<body>
    <style>
        .cCamera {
            position: relative;
        }

        #my_camera {
            width: 100%;
            padding: 0
        }

        .takePhoto {
            position: absolute;
            top: 50%;
            right: 0;
        }

    </style>
    <div class="container border">
        <h1>Form bank ID</h1>

        <form method="POST" action="">
            @csrf
            <label for="camera1">
                ini camera 1
                <input type="file" id="camera1" accept="image/*;capture=camera">
            </label>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama">
            </div>
            <div class="mb-3">
                <label for="no_ktp" class="form-label">No ktp</label>
                <input type="text" class="form-control" id="no_ktp">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" rows="3"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 cCamera">
                    <div id="my_camera" class="border shadow"></div>

                    <button class="takePhoto btn btn-primary d-flex align-items-center gap-2 border border-white shadow"
                        type="button" onClick="take_snapshot()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-camera-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path
                                d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
                        </svg> Potret
                    </button>
                    <input type="hidden" name="image" class="image-tag">
                </div>
                <div class="col-md-6">
                    <div id="results">Gambar yang kami ambil akan muncul di sini...</div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            {{-- <div class="row">
                <div class="col-md-6">
                    <div id="my_camera"></div>
                    <br />
                    <input type=button value="Take Snapshot" onClick="take_snapshot()">
                    <input type="hidden" name="image" class="image-tag">
                </div>
                <div class="col-md-6 border">
                    <div id="results">Your captured image will appear here...</div>
                </div>
                <div class="col-md-12 text-center">
                    <br />
                    <button class="btn btn-success">Submit</button>
                </div>
            </div> --}}

        </form>
    </div>
    <script>
        Webcam.set({
            // width: 490, 
            height: 390,
            image_format: 'jpeg',
            jpeg_quality: 90,
            force_flash: false,
            flip_horiz: true,
            fps: 45
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img class="w-100" src="' + data_uri + '"/>';
            });
        }

    </script>
</body>

</html>
