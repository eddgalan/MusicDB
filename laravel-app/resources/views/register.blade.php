<!DOCTYPE html>
<html>
<head>
    @include('template.index')
</head>
<body>
    @include('template.navbar')
    <div class="container w-25 border p-4 mt-4">
        <form action="/register" method="POST">
            @csrf
            <div class="col-md-12 py-1">
                <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div>
            <div class="col-md-12 py-1">
                <input type="text" class="form-control" name="lastname" placeholder="Lastname" required>
            </div>
            <div class="col-md-12 py-1">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="col-md-12 py-1">
                <input type="email" class="form-control" name="email" placeholder="email" required>
            </div>
            <div class="col-md-12 py-1">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="col-md-12 py-1">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <div class="col-md-12 py-1">
                <button class="btn btn-success w-100" type="submit"> <i class="fas fa-check"></i> Create account </button>
            </div>
        </form>
    </div>

    @include('template.scripts')
</body>
</html>
