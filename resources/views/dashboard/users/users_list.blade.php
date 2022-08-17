@extends('layouts.common')

@section('content')
    <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary mb-2">Create New User</a>
    <div class="card card-body">
        <div class="table-responsive">
            <table id="dt" class="table table-bordered w-100"></table>
        </div>
    </div>
@endsection

@section('js')
    <script defer>
        function editUserRoute(id) {
            let url = "{{ route('dashboard.users.edit', ['user' => 'replaceme']) }}";
            return url.replace('replaceme', id)
        }

        function deleteUserRoute(id) {
            let url = "{{ route('dashboard.users.delete', ['user' => 'replaceme']) }}";
            return url.replace('replaceme', id)
        }

        function deleteUser(event, id) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Save',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.get(deleteUserRoute(id));
                    window.dt_users.draw();
                    return Swal.fire('Done!', '', 'success')
                }
            })

        }
        $(() => {

            window.dt_users = $('#dt').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{ route('dashboard.users.list') }}",
                columnDefs: [{
                    orderable: false,
                    targets: 0
                }, {
                    orderable: false,
                    targets: 1
                }],
                order: [
                    [2, 'asc']
                ],
                columns: [{
                        title: " ",
                        defaultContent: 404,
                        render(data, type, row, meta) {
                            return "#" + (+meta.row + 1)
                        }
                    }, {
                        title: " ",
                        defaultContent: 404,
                        sortable: false,
                        orderable: false,
                        searchable: false,
                        render(data, type, row) {
                            if (row.image_profile) {
                                return ` <img src="/${row.image_profile}" style="width: 60px;height: 60px;border-radius: 30px;object-fit: cover;margin: 0px auto;display: block;" alt="User Image">`;
                            } else {
                                return ` <img src="https://via.placeholder.com/150/000000/FFFFFF?text=${row.name[0]}" style="width: 60px;height: 60px;border-radius: 30px;object-fit: cover;margin: 0px auto;display: block;" alt="User Image">`;
                            }
                        }
                    }, {
                        title: "Name",
                        data: 'name',
                        defaultContent: 404,
                    },
                    {
                        title: "Email",
                        data: 'email',
                        defaultContent: 404,
                    },

                    {
                        title: "Created at",
                        data: 'created_at',
                        defaultContent: 404,
                        render: function(data, type, row) {
                            const date = moment(data)
                            return date.format('YYYY/MM/DD');
                        }
                    },
                    {
                        title: "Action",
                        sortable: false,
                        orderable: false,
                        searchable: false,
                        defaultContent: 404,
                        render: function(data, type, row) {
                            return `
                                <a href="${editUserRoute(row.id)}"><i class='fas fa-edit'></i></a>
                                <a style="cursor:pointer" onclick='deleteUser(event,${row.id})'><i class='fas fa-trash text-danger'></i></a>

                            `;
                        }
                    },

                ]
            });
        })
    </script>
@endsection
