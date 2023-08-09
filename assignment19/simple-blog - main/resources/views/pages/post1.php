@extends('app')
@section('content')
    <div class="row g-5">
        <div class="col-md-8 col-offset-md-2">
            <article class="blog-post" id="blog-post">
                {{-- Post Detail --}}
                {{-- <h2 class="display-5 link-body-emphasis mb-1" id="title"></h2>
                <p class="blog-post-meta">{{ $post->created_at->format('M d, Y - h:i a') }} by <a href="#"
                        id="author">Admin</a></p>
                <img class="w-100 h-100 mb-3" src="" alt="Post Image" id="image">
                <p id="content"></p> --}}
            </article>
        </div>
    </div>

    <script>
        getPost(postId);
        async function getPost(postId) {
            try {
                // let url = "/postData";
                // // Loader Show Content Hide
                // document.getElementById('loading-div').classList.remove('d-none');
                // document.getElementById('content-div').classList.add('d-none');

                // let result = await axios.get(url);

                // // Loader Hide Content Show
                // document.getElementById('loading-div').classList.add('d-none');
                // document.getElementById('content-div').classList.remove('d-none');

                // document.getElementById('title').innerHTML = result.data.title;
                // document.getElementById('author').innerHTML = result.data.user.name;
                // document.getElementById('image').src = result.data.image;
                // document.getElementById('content').innerHTML = result.data.content;

                const response = await axios.get(`/api/posts/${postId}`);
                const post = response.data;

                // Render the post data on the page
                const postContainer = document.querySelector('.blog-post');
                postContainer.innerHTML = `
                    <h2 class="display-5 link-body-emphasis mb-1">${post.title}</h2>
                    <p class="blog-post-meta">${post.created_at} by <a href="#">${post.user.name}</a></p>
                    <img class="w-100 h-100 mb-3" src="${post.image}" alt="Post Image">
                    <p>${post.content}</p>
                `;
            } catch (error) {
                alert(error);
            }
        }
        }
    </script>
@endsection
