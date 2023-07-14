@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between my-3">
        <a class="btn btn-secondary" href="{{ route('komunitas_posts.index') }}" role="button">Kembali</a>
    </div>
    <h2 class="my-5">Form Edit Berita</h2>
    <form action="{{ route('komunitas_posts.update', ['slug' => $post->slug]) }}" method="POST" enctype="multipart/form-data"
        class="col-11">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $post->judul }}"
                onkeyup="createTextSlug()" />
        </div>
        <div class="mb-3">
            {{-- <label for="slug" class="form-label">Slug</label> --}}
            <input type="hidden" class="form-control" id="slug" name="slug" value="{{ $post->slug }}" />
        </div>
        <div class="mb-3">
            <label for="isi_post" class="form-label">Isi Berita</label>
            <textarea class="form-control" id="isi_post" rows="3" name="isi_post" required>{{ $post->isi_post }}</textarea>
        </div>

        <div class="mb-3">
            <label for="komunitas" class="form-label">Komunitas</label>
            <select class="form-select" aria-label="Komunitas" name="komunitas">
                <option selected>-- Pilih Komunitas --</option>

                @foreach ($komunitas as $item)
                    <option value="{{ $item->id }}" @if ($post->komunitas->id === $item->id) selected @endif>
                        {{ $item->nama_komunitas }}</option>
                @endforeach

            </select>
        </div>


        @if ($post->gambar)
            <div class="mb-3">
                <img src="{{ url('img/komunitas') . '/' . $post->gambar }}" alt="{{ $post->judul }}"
                    style="max-width:200px">
            </div>
        @endif


        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" />
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Update">
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('isi_post', {
            height: 300,
            filebrowserUploadUrl: "{{ route('upload.gambar.berita', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>

    <script>
        function createTextSlug() {
            var judul = document.getElementById("judul").value;
            document.getElementById("slug").value = generateSlug(judul);
        }

        function generateSlug(text) {
            return text.toString().toLowerCase()
                .replace(/^-+/, '')
                .replace(/-+$/, '')
                .replace(/\s+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/[^\w\-]+/g, '');
        }
    </script>
@endsection
