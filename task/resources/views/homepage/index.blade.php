<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css" />

    <script>
        $(document).on('click', '.rowBtn', function() {
            $('#user-action')[0].reset();
            let id = $(this).data("id");
            $.ajax({
                url: "{{ route('homepage.index') }}" + '/' + id,
                type: "GET",

                success: function(data) {

                    $('#user_type_id').val(data.user_type_id);
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#last_name').val(data.last_name);
                    $('#email').val(data.email);

                }

            });
        });
        $(document).on('click', '.deleteBtn', function() {
            $('#user-action')[0].reset();
            let id = $(this).data("id");
            $.ajax({
                url: "{{ url('/userDestroy') }}" + '/' + id,
                type: "GET",
                success: function(data) {
                    location.reload();

                }

            });
        });
    </script>

</head>

<body>

    <div class="container">
        @if (\Session::has('message'))

            <div class="alert alert-success">
                {!! \Session::get('message') !!}
            </div>
        @endif
        <h3>User Crud Actions</h3>



        <form id="user-action" action="/homepage" method="POST">
            @csrf
            <div>
                <label for="user_type">User Type</label>
                <select class="u-full-width" id="user_type_id" name="user_type_id">
                    <option value="" selected>- User Type -</option>
                    @foreach ($getUserTypeList as $list)
                        <option value="{{ $list->id }}">{{ $list->user_type }}</option>
                    @endforeach
                </select>
            </div>
            <div>

            <input type="hidden" id="id" name="id" class="u-full-width" autocomplete="off">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="u-full-width" autocomplete="off">
            </div>
            <div>
                <label for="lastName">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="u-full-width" autocomplete="off">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="u-full-width" autocomplete="off">
            </div>
            <div>

                <input type="submit" class="button-primary u-full-width" value="Save">
            </div>

        </form>
        <hr>
        <table class="u-full-width">
            <thead>
                <tr>
                    <th>User Type</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($getUserList as $userList)
                <tbody>

                    <td>{{ $userList->userType->user_type }}</td>
                    <td>{{ $userList->name }}</td>
                    <td>{{ $userList->last_name }}</td>
                    <td>{{ $userList->email }}</td>
                    <td> <button data-id="{{ $userList->id }}" class="btn btn-primary rowBtn"><i
                                class="fas fa-edit"></i></button>
                        <button data-id="{{ $userList->id }}" class="btn deleteBtn btn-danger"><i
                                class="fas fa-trash"></i></button>
                    </td>

                </tbody>
            @endforeach

        </table>
    </div>

</body>



</html>
