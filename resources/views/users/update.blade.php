<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<div class="container">
    <div class="col-md-4" style="margin-top: 20px">
        <form action="/update/{{$user->id}}" method="post">
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="name" name="name" value='{{$user->name}}' class="form-control" id="exampleInputName1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" value='{{$user->email}}' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
