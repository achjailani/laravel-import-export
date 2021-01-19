@extends('web.layout.app')

@section('title')
Monday - Home
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between">
	<h1 class="page-title mb-0 text-gray-800">Product Item</h1>
    <div>
        <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Import</a>
        <a href="#" class="btn btn-outline-warning btn-sm">Export</a>
    </div>
</div>
    <div class="row mt-4">
        <div class="col-12">
			@if(\Session::has('success'))
				<div class="alert alert-info" role="alert">
					{!! \Session::get('success') !!}
				</div>
			@endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
						<th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga</th>
						<th scope="col">Qty</th>
                    </tr>
                 </thead>
                 <tbody>
				 @php( $i=1)
				 @foreach($datas as $data)
                    <tr>
                        <td scope="row">{{ $i++ }}</td>
						<td>{{ $data->kode }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->jenis }}</td>
                        <td>{{ $data->harga }}</td>
						<td>{{ $data->qty }}</td>
                    </tr>
				@endforeach
                </tbody>
            </table>
        </div>
    </div>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
			<form action="/item/import" method="post" id="import" enctype="multipart/form-data">
				@csrf
		    	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel">Import data</h5>
		        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      	</div>
		      	<div class="modal-body">
					<div class="form-group">
		                <input type="file" class="form-control-file" name="import-file" id="import-file">
		            </div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
		        	<button type="button" class="btn btn-primary" id="btn-import">Import</button>
		      	</div>
			</form>
	    </div>
	  </div>
	</div>

	@push('js-script')
		<script>
			let imp = document.getElementById('btn-import');
			imp.addEventListener('click', () => {
				let file = document.getElementById('import-file').value;
				if(!file) {
					alert('File expty!');
				} else {
					document.getElementById("import").submit();
				}
			});
		</script>
	@endpush
@endsection
