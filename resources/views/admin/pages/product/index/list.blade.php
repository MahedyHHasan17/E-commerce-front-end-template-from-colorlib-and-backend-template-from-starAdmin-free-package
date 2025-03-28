@extends('admin.layout.main')

@section('title')
    {{ $title }}
@endsection


@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <x-card-title title="{{ $title }}"
                    button="<a  class='btn btn-info' href='{{ route('admin.product.list.create') }}'>+ Add Product</a>" />
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Selling Price</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('css-lib')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css">
@endpush

@push('style')
    <style>
        .dt-length label {
            margin-left: 5px !important;
        }

        thead tr th {
            padding: 10px !important;
        }

        tbody tr td {
            padding: 10px !important;
        }

        td {
            margin: 10px !important;
            padding: 10px !important;
        }

        td.dt-type-date {
            text-align: center !important;
        }

        td:last-child {
            text-align: right !important;
        }

        .dropdown .dropdown-menu {
            top: -30px;
            right: 30px;
            font-size: 0.812rem;
            box-shadow: 0px 1px 15px 1px rgba(230, 234, 236, 0.35);
        }

        .action-dropdown-btn {
            padding: 5px;
        }

        .dt-paging {
            background: #c4c8cb;
            border-radius: 10px;
        }
    </style>
@endpush


@push('js-lib')
    <script src="{{ asset('aset/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('aset/assets/js/dataTables.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
@endpush

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            const table = $('.datatable').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{{ route('admin.product.list.index') }}'
                },
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'image_one',
                        name: 'image_one',
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'category',
                        name: 'category.name',
                        className: "text-center"
                    },
                    {
                        data: 'brand',
                        name: 'brand.brand_name',
                        className: "text-center"
                    },
                    {
                        data: 'selling_price',
                        name: 'selling_price',
                        className: "text-center"
                    },
                    {
                        data: 'quantity',
                        name: 'quantity',
                        className: "text-center"
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: "text-center"
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: "text-center"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: "text-end"
                    }
                ],
                drawCallback: function(settings) {
                    // Initialize dropdowns after each table draw
                    initDropdowns();
                }
            });

            function initDropdowns() {
                // Remove any existing click handlers to prevent duplication
                $('.datatable').off('click', '.action-dropdown-btn');
                $(document).off('click', hideDropdowns);
                $('.datatable').off('click', '.dropdown-menu');

                // Toggle dropdown when button is clicked
                $('.datatable').on('click', '.action-dropdown-btn', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const dropdownMenu = $(this).next('.dropdown-menu');
                    const isVisible = dropdownMenu.hasClass('show');

                    // Hide all other dropdowns
                    $('.dropdown-menu').removeClass('show');

                    // Toggle current dropdown if it wasn't visible
                    if (!isVisible) {
                        dropdownMenu.addClass('show');
                    }
                });

                // Hide dropdowns when clicking outside
                function hideDropdowns(e) {
                    if (!$(e.target).closest('.dropdown').length) {
                        $('.dropdown-menu').removeClass('show');
                    }
                }
                $(document).on('click', hideDropdowns);

                // Prevent dropdown from closing when clicking inside it
                $('.datatable').on('click', '.dropdown-menu', function(e) {
                    e.stopPropagation();
                });

                // Handle form submissions within dropdowns
                $('.datatable').on('click', '.dropdown-item', function(e) {
                    // If it's a submit button, let it submit
                    if ($(this).is('button[type="submit"]')) {
                        return true;
                    }
                    // Otherwise prevent default for regular links/buttons
                    if ($(this).attr('href') === '#' || !$(this).attr('href')) {
                        e.preventDefault();
                    }
                });
            }

            // Initialize dropdowns on page load
            initDropdowns();
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.show-alert-delete-box', function(event) {
                event.preventDefault();
                var form = $(this).closest("form");
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you really want to delete this Product?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
