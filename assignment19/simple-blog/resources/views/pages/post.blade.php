@extends('layouts.app')
@section('content')
    <div class="row g-5">
        <div class="col-md-8 offset-md-2">
            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1" id="post-title"></h2>
                <p class="blog-post-meta"><span id="post-created"></span> by <a href="#" id="post-user"></a></p>
                <img class="w-100 h-100 mb-3" src="" alt="Post Image" id="post-image">
                <p id="post-content"></p>
            </article>
        </div>
    </div>

    <script>
        getPostData();
        async function getPostData() {
                let response = await axios.get("/posts/{id}");

                // Render the post data on the page
                document.getElementById('post-title').innerHTML = response.data['title'];
                document.getElementById('post-created').innerHTML = moment(response.data['created_at']).format(
                    'D MMM, YYYY - h:mm a');
                // document.getElementById('post-user').textContent = post.user.name;
                document.getElementById('post-image').src = response.data['image'];
                document.getElementById('post-content').innerHTML = response.data['content'];
        }
    </script>
@endsection
