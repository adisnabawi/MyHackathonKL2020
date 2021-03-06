<script type="module">
    import QrScanner from '{{url('qr-scanner-nimiq/qr-scanner.min.js')}}';

    QrScanner.WORKER_PATH = '{{url('qr-scanner-nimiq/qr-scanner-worker.min.js')}}';
    const video = document.getElementById('qrscan');

    function setResult(result) {
        scanner.destroy();
        console.log(result);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route("fill")}}',
            method: 'post',
            data: {
              "key": result,
            },
            success: function (data) {
                data = JSON.parse(data);
                console.log(data.nama);
                $('#nama').val(data.nama);
                $('#ic').val(data.ic);
                $('#alamat').val(data.alamat);
                $('#warganegara').val(data.status);
                $('#status').html('The data is auto populate');
              }
            });


    }

    QrScanner.hasCamera().then(hasCamera => camHasCamera(hasCamera));

    function camHasCamera(hasCamera) {
        if (!hasCamera) {
            document.getElementById('cam-has-camera').innerHTML = 'Sorry. Not able to detect camera';
        }
    }

    const scanner = new QrScanner(video, result => setResult(result));
    scanner.start();

</script>
