{{-- @if ($errors->any())
    <div class="alert alert-warning">
        <ol>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ol>
    </div>
@endif

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        alert() - > success('Berhasil', '{!! $message !!}');
    </script>
@endif --}}

<script>
    $('.delete').click(function() {

        var slug = $(this).attr('data-id');
        var judul = $(this).attr('data-judul');
        Swal.fire({
            title: 'Hapus {!! $active !!}!',
            text: "Yakin ingin hapus {!! $active !!} " + judul + "?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "{!! $active !!}/delete/" + slug + ""
            }
        })
    });
</script>
