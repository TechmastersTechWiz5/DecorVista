@extends('admin.layouts.main-file')

@section('main-section')
<!-- Start Container Fluid -->
<div class="container-xxl">
    <div class="row">
        @foreach($ParentBrands as $bprow)                                
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="rounded bg-secondary-subtle d-flex align-items-center justify-content-center mx-auto">
                            <img src="{{ env('ASSET2_URL') }}{{$bprow->banner_image}}" alt="" class="avatar-xl">
                        </div>
                        <h4 class="mt-3 mb-0">{{$bprow->name}}</h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center gap-1">
                    <h4 class="card-title flex-grow-1">All Brands List</h4>
                    <a href="{{ route('brands.create') }}" class="btn btn-sm btn-primary">
                        Add Brand
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="brandTable" class="table table-hover table-centered">
                            <thead class="bg-light-subtle">
                                <tr>
                                    <th>#</th>
                                    <th>Icon Image</th>
                                    <th>Banner Image</th>
                                    <th>Cover Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be populated via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer border-top">
                    <div id="table-pagination" class="pagination-controls">
                        <!-- Prebuilt pagination HTML will be injected here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container Fluid -->
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var columnDefs = [
                { data: 'id', name: 'id' },
                {
                    data: 'icon_image',
                    name: 'icon_image',
                    render: function (data) {
                        const imageUrl = data ? '{{ env("ASSET2_URL") }}' + data : '{{ env("ASSET2_URL") }}/placeholder.png';
                        return '<div class="d-flex align-items-center gap-2">' +
                            '  <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">' +
                            '    <img src="' + imageUrl + '" alt="" class="avatar-md">' +
                            '  </div>' +
                            '</div>';
                    }
                },
                {
                    data: 'cover_image',
                    name: 'cover_image',
                    render: function (data) {
                        const imageUrl = data ? '{{ env("ASSET2_URL") }}' + data : '{{ env("ASSET2_URL") }}/placeholder.png';
                        return '<div class="d-flex align-items-center gap-2">' +
                            '  <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">' +
                            '    <img src="' + imageUrl + '" alt="" class="avatar-md">' +
                            '  </div>' +
                            '</div>';
                    }
                },
                {
                    data: 'banner_image',
                    name: 'banner_image',
                    render: function (data) {
                        const imageUrl = data ? '{{ env("ASSET2_URL") }}' + data : '{{ env("ASSET2_URL") }}/placeholder.png';
                        return '<div class="d-flex align-items-center gap-2">' +
                            '  <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">' +
                            '    <img src="' + imageUrl + '" alt="" class="avatar-md">' +
                            '  </div>' +
                            '</div>';
                    }
                },
                { data: 'name', name: 'name' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center' } // For Edit button
            ];

            // Initialize DataTable with custom pagination
            initializeDataTable('#brandTable', '{{ route("brands.index") }}', columnDefs);

            window.updateStatusToggle = function (element) {
                var id = $(element).val();
                var status = $(element).is(':checked') ? 1 : 0;

                updateStatus(
                    '{{ route("brands.status") }}',
                    id,
                    status
                );
            };
        });


    </script>
@endpush