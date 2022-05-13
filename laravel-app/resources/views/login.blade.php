<!DOCTYPE html>
<html>
<head>
    @include('template.index')
</head>
<body>
    @include('template.navbar')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="col-md-12 py-1">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="col-md-12 py-1">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="col-md-12 py-1">
                <button type="submit" class="btn btn-primary w-100"> Login <i class="fas fa-arrow-right"></i> </button>
            </div>
            @include('template.messages')
        </form>
    </div>

    @include('template.scripts')
</body>
</html>
