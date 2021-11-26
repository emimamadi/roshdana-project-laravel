@extends('layout.struct')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>


        <div class="col-md-6">

        <header><h3>What do you have to say?</h3></header>
            <form action="" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>

            <hr>

            <header><h3>What other people say...</h3></header>
            
            <article class="post" data-postid="">
                <p></p>
                <div class="info">
                     on 
                </div>
                <div class="interaction">
                    <a href="#" class="like"></a> |
                    <a href="#" class="like"></a>
                   
                        |
                        <a href="#" class="edit">Edit</a> |
                        <a href="">Delete</a>
                    
                </div>
            </article>
            
        </div>


        <div class="col-md-3">
            
        </div>
    </div>
</div>











@endsection