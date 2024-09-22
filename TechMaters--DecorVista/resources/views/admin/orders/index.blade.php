@extends('admin.layouts.main-file')

@section('main-section')
    <!-- Start Container Fluid -->
    <div class="container-xxl">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                        <h4 class="card-title flex-grow-1">All Orders List</h4>                       
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="ordersTable" class="table table-striped">
                                <thead class="bg-light-subtle">
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Cutomer Name</th>
                                        <th>Sub Total</th>
                                        <th>Shipping Charges</th>
                                        <th>Grand Total</th>
                                        <th>Status</th>
                                        <th>Action</th> <!-- Added Action column -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be populated via AJAX -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer border-top">
                        <div id="paginationControls" class="pagination-controls">
                            <!-- Custom pagination HTML will be injected here -->
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
    $(document).ready(function() {
        var table = $('#ordersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("admin.orders.index") }}',
            responsive: true,
            pageLength: 10,
            paging: false,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'order_number', name: 'order_id' },
                { data: 'customer_name', name: 'customer_name' },
                { data: 'sub_total', name: 'sub_total' },
                { data: 'shipping_charges', name: 'shipping_charges' },
                { data: 'grand_total', name: 'grand_total' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center' } // For Edit button
            ],
            "drawCallback": function() {
                $('#paginationControls').empty();
                var api = this.api();
                var info = api.page.info();

                $('#paginationControls').append(`
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item ${info.page === 0 ? 'disabled' : ''}">
                                <a class="page-link" href="#" aria-label="Previous" data-dt-idx="previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            ${Array.from({ length: info.pages }, (v, i) => `
                                <li class="page-item ${info.page === i ? 'active' : ''}">
                                    <a class="page-link" href="#" data-dt-idx="${i}">${i + 1}</a>
                                </li>
                            `).join('')}
                            <li class="page-item ${info.page === info.pages - 1 ? 'disabled' : ''}">
                                <a class="page-link" href="#" aria-label="Next" data-dt-idx="next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                `);
            }
        });


         // Function to handle the status toggle change
         window.updateStatusToggle = function(element) {
            var id = $(element).val();
            var status = $(element).is(':checked') ? 1 : 0;

            updateStatus(
                '{{ route("admin.orders.status") }}',
                id,
                status
            );
        };
    });


    
</script>
@endpush



@push('styles')
<style>
    .pagination-controls {
        text-align: left; /* Align pagination to the left */
        padding: 10px; /* Add padding for spacing */
    }
    .pagination {
        display: inline-flex;
        border-radius: 0.25rem;
        padding-left: 0;
        list-style: none;
        border: 1px solid #dee2e6;
    }
    .page-item {
        margin: 0;
    }
    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin: 0;
        line-height: 1.25;
        color: #007bff;
        text-align: center;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }
    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }
    .page-link:hover {
        color: #0056b3;
        text-decoration: none;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }
</style>
@endpush
